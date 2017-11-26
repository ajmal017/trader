<?php

class binaryTree{		
		function __construct() {
			$CI =& get_instance();
			$CI->load->database();
	        $this->conn = mysqli_connect($CI->db->hostname, $CI->db->username, $CI->db->password,$CI->db->database);
	        
	        $this->till_10lac_payout_perc = 9;
	        $this->till_11lac_payout_perc = 10.8;
	        $this->loyality_payout_perc = 10;
	        //$this->payout_perc_per_person = array('1'=>10,'2'=>3,'3'=>2,'4'=>1.5,'5'=>1.5,'6'=>1.5,'7'=>1,'8'=>0.5,'9'=>0.5,'10'=>0.5);
	        $this->payout_perc_per_person = array('1'=>9,'2'=>2.7,'3'=>1.8,'4'=>1.35,'5'=>1.35,'6'=>1.35,'7'=>0.9,'8'=>0.45,'9'=>0.45,'10'=>0.45);
	        $this->payout_perc_per_week = array();
	        foreach($this->payout_perc_per_person as $rowk => $rowv)
	        {
	        	$this->payout_perc_per_week[$rowk] = $rowv/4;
	        }

	        $this->expiry_months = 18;
	    }

	    function reset_variables()
	    {

	    }

		function getTotalAmount($userids =array(),$week_start,$week_end)
		{
			$in_query = '';
			if(count($userids) > 0)
			{
				$userid_string = implode(",",$userids);
				if($userid_string != '')
				{
					$in_query = " AND up.userid IN (".$userid_string.")";
				}
			}
			$query = "SELECT sum(pm.package_amount*up.quantity) as total FROM user_packages up LEFT JOIN package_master pm ON up.package_id=pm.package_id WHERE up.acceptance_date >= '".$week_start."' AND up.acceptance_date < DATE_ADD('".$week_end."', INTERVAL 1 DAY) AND pm.package_status = 'active' ".$in_query;

			$result = mysqli_query($this->conn,$query);
			$total = 0;
			while($row = mysqli_fetch_array($result))
			{
				$total = $row['total'];
			}

			if($total == "")
			{
				$total = 0;
			}
			return $total;
		}

		function calculate_direct_income($userid,$week_start,$week_end)
		{
			//$select_query = "SELECT sum(amount) as total FROM direct_comm WHERE userid='".$userid."' AND date >= '".$week_start."' AND date < DATE_ADD('".$week_end."', INTERVAL 1 DAY) AND status='generated'";
			$select_query = "SELECT sum(amount) as total FROM direct_comm WHERE userid='".$userid."' AND status='generated'";
			//echo "DIRECT INCOME = ".$select_query."<br>";
			$result = mysqli_query($this->conn,$select_query);
			$total = 0;
			while($row = mysqli_fetch_array($result))
			{
				$total = $row['total'];
			}
			if($total == "")
			{
				$total = 0;
			}
			return $total;
		}

		function update_direct_income_status($userid,$week_start,$week_end)
		{
			//$query = "UPDATE direct_comm SET status='billed' WHERE userid='".$userid."' AND date >= '".$week_start."' AND date < DATE_ADD('".$week_end."', INTERVAL 1 DAY)";
			$query = "UPDATE direct_comm SET status='billed' WHERE userid='".$userid."' AND status='generated'";
			$result = mysqli_query($this->conn,$query);
		}

		function return_of_interest_and_loyality_payout($date)
		{
			$today = date("Y-m-d", strtotime($date));
			$select = 'SELECT * FROM users';
			$result = mysqli_query($this->conn,$select);
			while($row = mysqli_fetch_array($result))
			{
				$select_package_amount_query = "SELECT pm.package_amount*up.quantity as total,up.package_id FROM user_packages up LEFT JOIN package_master pm ON up.package_id=pm.package_id WHERE DATE_ADD(up.acceptance_date, INTERVAL ".$this->expiry_months." MONTH) >= '".$today."' AND up.userid='".$row['userid']."' AND pm.package_status = 'active'";
				$result_package_amount_query = mysqli_query($this->conn,$select_package_amount_query);
				while($row1 = mysqli_fetch_array($result_package_amount_query))
				{
					$payout_perc = 0;
					if($row1['total'] <= 1000000)
					{
						$payout_perc = $this->till_10lac_payout_perc/100;
					}else if($row1['total'] > 1000000)
					{
						$payout_perc = $this->till_11lac_payout_perc/100;
					}	
					$amt = $row1['total'] * $payout_perc;
					if($amt > 0)
					{
						$insert = "INSERT INTO return_of_interest(userid,amount,description,status,created_date) VALUES(".$row['userid'].",".$amt.",'".$row1['package_id']."','generated','".$date."')";
						mysqli_query($this->conn,$insert);

						if($row['sponsorid'] > 0)
						{
							$loyalty_amt = $amt * (($this->loyality_payout_perc/100));
							if($loyalty_amt > 0)
							{
								$insert_loyalty_bonus = "INSERT INTO loyality_income(userid,amount,description,status,created_date) VALUES(".$row['sponsorid'].",".$loyalty_amt.",'Loyality Income','generated','".$date."')";
								mysqli_query($this->conn,$insert_loyalty_bonus);	
							}
						}
					}
				}
			}
		}

		function referral_bonus($date,$month_start,$month_end)
		{
			$today = date("Y-m-d", strtotime($date));
			$select_query = "SELECT * FROM users";
			$result = mysqli_query($this->conn,$select_query);
			$level = 1;
			while($row = mysqli_fetch_array($result))
			{
				$ids = array($row['userid']);
				//echo "<br>STARTS<br>";
				for($i = 1;$i <= 10;$i++)
				{
					if(count($ids) > 0)
					{
						$direct_users = getDirectUsers($ids);
	            		$ids = array();
			            foreach ($direct_users as $du ) {
			                array_push($ids,$du['userid']); 
			            }

			            //echo "<br>USER :".$row['userid']." LEVEL :".$i."<br>";
			            if(count($ids) > 0 )
			            {
			            	$user_ids = implode("','", $ids);
			            	//$select_package_amount_query = "SELECT sum(pm.package_amount*up.quantity) as total,max(up_join.qty) as qty FROM user_packages up LEFT JOIN package_master pm ON up.package_id=pm.package_id LEFT JOIN users u ON u.userid=up.userid LEFT JOIN (SELECT sum(up1.quantity) as qty FROM user_packages up1 WHERE up1.userid IN ('".$user_ids."') AND up1.status='accepted') as up_join ON u.userid=up.userid WHERE up.acceptance_date >= '".$month_start."' AND up.acceptance_date < DATE_ADD('".$month_end."', INTERVAL 1 DAY) AND pm.package_status = 'active' AND up.userid IN ('".$user_ids."') AND up.status='accepted' AND pm.package_status = 'active'";
			            	//$where_clause = array(" AND extract(month from up.acceptance_date)=8 "," AND extract(month from up1.acceptance_date)=8 ");
			            	$where_clause = array("","");
			            	$select_package_amount_query = "SELECT sum(pm.package_amount*up.quantity) as total,max(up_join.qty) as qty FROM user_packages up LEFT JOIN package_master pm ON up.package_id=pm.package_id LEFT JOIN users u ON u.userid=up.userid LEFT JOIN (SELECT sum(up1.quantity) as qty FROM user_packages up1 WHERE up1.userid IN ('".$user_ids."') AND up1.status='accepted' ".$where_clause[1].") as up_join ON u.userid=up.userid WHERE up.acceptance_date >= '".$month_start."' AND up.acceptance_date < DATE_ADD('".$month_end."', INTERVAL 1 DAY) ".$where_clause[0]." AND pm.package_status = 'active' AND up.userid IN ('".$user_ids."') AND up.status='accepted' AND pm.package_status = 'active'";
			            	
							$result_package_amount_query = mysqli_query($this->conn,$select_package_amount_query);
							while($row1 = mysqli_fetch_array($result_package_amount_query))
							{
								$amt = $row1['total'] * ($this->payout_perc_per_person[$i]/100);
								//echo "<br>payout_perc_per_week : ".$this->payout_perc_per_person[$i]." total: ".$row1['total']." amt :".$amt."</br>";
								if($amt > 0)
								{
									if($row1['qty'] < $i)
									{
										$status = 'level_'.$i;
									}
									else
									{
										$status = 'generated';
										$update = "UPDATE referral_income set status='".$status."' WHERE userid=".$row['userid']." AND status='level_".$i."'";
										mysqli_query($this->conn,$update);
									}
									$insert = "INSERT INTO referral_income(userid,amount,description,status,created_date) VALUES(".$row['userid'].",".$amt.",'Referral Bonus Level ".$i."','".$status."','".$date."')";
									mysqli_query($this->conn,$insert);
								}
							}
			            }
					}
				}
			}
		}

		function new_referral_bonus($date)
		{
			$today = date("Y-m-d", strtotime($date));
			$select_query_date="SELECT max(created_date) as max_date FROM referral_income WHERE status != 'paid'";
			$result_date = mysqli_query($this->conn,$select_query_date);
			$max_date = null;
			while($row_date = mysqli_fetch_array($result_date))
			{
				if($row_date['max_date'] != '')
				{
					$max_date = $row_date['max_date'];	
				}
			}
			$select_query = "SELECT * FROM users";
			$result = mysqli_query($this->conn,$select_query);
			$level = 1;
			while($row = mysqli_fetch_array($result))
			{
				$ids = array($row['userid']);
				for($i = 1;$i <= 10;$i++)
				{
					if(count($ids) > 0)
					{
						$direct_users = getDirectUsers($ids);
	            		$ids = array();
			            foreach ($direct_users as $du ) {
			                array_push($ids,$du['userid']); 
			            }

			            if(count($ids) > 0 )
			            {
			            	$user_ids = implode("','", $ids);
			            	$where_clause = "";
			            	if($max_date != '')
			            	{
			            		$where_clause = " AND up.acceptance_date > '".$max_date."' ";
			            	}
			            	$select_package_amount_query = "SELECT sum(pm.package_amount*up.quantity) as total,max(up_join.qty) as qty FROM user_packages up LEFT JOIN package_master pm ON up.package_id=pm.package_id LEFT JOIN users u ON u.userid=up.userid LEFT JOIN (SELECT sum(up1.quantity) as qty FROM user_packages up1 WHERE up1.userid IN ('".$user_ids."') AND up1.status='accepted' ) as up_join ON u.userid=up.userid WHERE pm.package_status = 'active' ".$where_clause." AND up.userid IN ('".$user_ids."') AND up.status='accepted' AND pm.package_status = 'active'";
			            	
							$result_package_amount_query = mysqli_query($this->conn,$select_package_amount_query);
							while($row1 = mysqli_fetch_array($result_package_amount_query))
							{
								$amt = $row1['total'] * ($this->payout_perc_per_person[$i]/100);
								if($amt > 0)
								{
									if($row1['qty'] < $i)
									{
										$status = 'level_'.$i;
									}
									else
									{
										$status = 'generated';
										$update = "UPDATE referral_income set status='".$status."' WHERE userid=".$row['userid']." AND status='level_".$i."'";
										mysqli_query($this->conn,$update);
									}
									$insert = "INSERT INTO referral_income(userid,amount,description,status,created_date) VALUES(".$row['userid'].",".$amt.",'Referral Bonus Level ".$i."','".$status."','".$date."')";
									mysqli_query($this->conn,$insert);
								}
							}
			            }
					}
				}
			}
		}
		
		function payout($date)
		{
			$week_start = date("Y-m-d", strtotime('monday this week',$date));
			$week_end =  date("Y-m-d", strtotime('sunday this week',$date));
			
			$this->return_of_interest_and_loyality_payout($date);
			$this->referral_bonus($date,$week_start,$week_end);
		}
	}

//$obj = new binaryTree();
//$date = strtotime(date("Y-m-d"));
//$obj->payout($date);
?>