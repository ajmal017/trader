<?php

class binaryTree{		
		function __construct() {
			$CI =& get_instance();
			$CI->load->database();
	        $this->conn = mysqli_connect($CI->db->hostname, $CI->db->username, $CI->db->password,$CI->db->database);
	        $this->binary_payput_percentage = 10;
	        $this->direct_payput_percentage = 10;
	        $this->max_payout = 5;
	        $this->leftmembers = array();
	        $this->rightmembers = array();
	    }

	    function reset_variables()
	    {
	    	$this->leftmembers = array();
	        $this->rightmembers = array();
	    }

		function get_left_members($parent_id)
		{
			$query = "select * from users where userid='".$parent_id."'";
			$result = mysqli_query($this->conn,$query);
			while($row = mysqli_fetch_array($result))
			{	
				$userid = $row['userid']; //for updating userid data
				
				if($row['leftmember'])
				{
					array_push($this->leftmembers,$row['leftmember']);
					$this->get_left_members($row['leftmember']);
				}
				if($row['rightmember'])
				{
					array_push($this->leftmembers,$row['rightmember']);
					$this->get_left_members($row['rightmember']);
				}
			}
		}

		function get_right_members($parent_id)
		{
			$query = "select * from users where userid='".$parent_id."'";
			$result = mysqli_query($this->conn,$query);
			while($row = mysqli_fetch_array($result))
			{	
				$userid = $row['userid']; //for updating userid data
				
				if($row['leftmember'])
				{
					array_push($this->rightmembers,$row['leftmember']);
					$this->get_right_members($row['leftmember']);
				}
				if($row['rightmember'])
				{
					array_push($this->rightmembers,$row['rightmember']);
					$this->get_right_members($row['rightmember']);
				}
			}
		}

		function get_members($parent_id)
		{
			$query = "select * from users where userid='".$parent_id."'";
			$result = mysqli_query($this->conn,$query);
			while($row = mysqli_fetch_array($result))
			{	
				$userid = $row['userid']; //for updating userid data
				
				if($row['leftmember'])
				{
					array_push($this->leftmembers,$row['leftmember']);
					$this->get_left_members($row['leftmember']);
				}
				if($row['rightmember'])
				{
					array_push($this->rightmembers,$row['rightmember']);
					$this->get_right_members($row['rightmember']);
				}
			}

			return array("left"=>$this->leftmembers,"right"=>$this->rightmembers);
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

		function getCarryForwardTotal($userid)
		{
			$data = array("carry_forward"=>0,"placement"=>"");
			$query = "SELECT * FROM binary_income WHERE userid = ".$userid." ORDER BY created_date DESC limit 1";
			$result = mysqli_query($this->conn,$query);
			while($row = mysqli_fetch_array($result))
			{
				$data['carry_forward'] = $row['carry_forward'];
				$data['placement'] = $row['placement'];
			}
			return $data;	
		}

		function binary_payout($date)
		{
			//$userid = 1;
			$week_start = date("Y-m-d", strtotime('monday this week',$date));
			$week_end =  date("Y-m-d", strtotime('sunday this week',$date));

			$query = "SELECT * FROM users";
			$result = mysqli_query($this->conn,$query);
			while($row = mysqli_fetch_array($result))
			{
				$members = $this->get_members($row['userid']);
				
				$left_income_total = 0;
				$right_income_total = 0;
				if(count($members['left']) > 0)
				{
					$left_income_total = $this->getTotalAmount($members['left'],$week_start,$week_end);
				}
				if(count($members['right']) > 0)
				{
					$right_income_total = $this->getTotalAmount($members['right'],$week_start,$week_end);
				}
				//dump($row['userid']);
				//dump($members);

				$carry_forward_data = $this->getCarryForwardTotal($row['userid']);
				//echo $row['userid'];
				//dump($carry_forward_data);
				if($carry_forward_data['placement'] == 'left')
				{	
					$left_income_total = $left_income_total + $carry_forward_data['carry_forward'];	
				}else if($carry_forward_data['placement'] == 'right')
				{
					$right_income_total = $right_income_total + $carry_forward_data['carry_forward'];	
				}
				//echo "||left_income_total:".$left_income_total."right_income_total:".$right_income_total."||";
				if($left_income_total > 0 || $right_income_total > 0)
				{
					$carry_forward = 0;
					$amt = 0;
					$placement = '';
					if($left_income_total < $right_income_total)
					{
						$carry_forward = $right_income_total - $left_income_total;
						$placement = 'right';
						$amt = $left_income_total;
					}else if($right_income_total < $left_income_total)
					{
						$placement = 'left';
						$carry_forward = $left_income_total - $right_income_total;
						$amt = $right_income_total;
					}else
					{
						$placement = '';
						$carry_forward = 0;
						$amt = $left_income_total;
					}
					//echo "</br>amount=".$amt."perc=".$this->binary_payput_percentage."carry_forward=".$carry_forward."</br>";
					//dump($carry_forward);

					$release_payment = $amt * ($this->binary_payput_percentage/100);
					$insert_query = "INSERT INTO binary_income(userid,binary_total,left_binary_total,right_binary_total,carry_forward,placement,payout_status,created_date) VALUES(".$row['userid'].",".$release_payment.",".$left_income_total.",".$right_income_total.",".$carry_forward.",'".$placement."','generated','".date("Y-m-d")."')";
					//echo "QUERY:".$insert_query."</br>";
					mysqli_query($this->conn,$insert_query);
				}
				$this->reset_variables();
			}
		}

		function direct_comm($date)
		{
			$week_start = date("Y-m-d", strtotime('monday this week',$date));
			$week_end =  date("Y-m-d", strtotime('sunday this week',$date));

			$select_query = 'SELECT * FROM users WHERE status=\'active\' AND sponsorid > 0';
			$result = mysqli_query($this->conn,$select_query);
			while($row = mysqli_fetch_array($result))
			{
				$select_query1 = "SELECT sum(pm.package_amount*up.quantity) as total FROM user_packages up LEFT JOIN package_master pm ON up.package_id=pm.package_id WHERE up.acceptance_date >= '".$week_start."' AND up.acceptance_date < DATE_ADD('".$week_end."', INTERVAL 1 DAY) AND userid='".$row['userid']."' AND pm.package_status = 'active'";

				$result1 = mysqli_query($this->conn,$select_query1);
				while($row1 = mysqli_fetch_array($result1))
				{
					$amt = $row1['total'] * ($this->direct_payput_percentage/100);
					if($amt > 0)
					{
						$insert = "INSERT INTO direct_comm(userid,direct_comm_from_userid,amount,date,status) VALUES(".$row['sponsorid'].",".$row['userid'].",".$amt.",'".date("Y-m-d")."','generated')";
						mysqli_query($this->conn,$insert);	
					}
				}
			}
		}

		function calculate_binary_income($userid,$week_start,$week_end)
		{
			//$select_query = "SELECT sum(binary_total) as total FROM binary_income WHERE userid='".$userid."' AND created_date >= '".$week_start."' AND created_date < DATE_ADD('".$week_end."', INTERVAL 1 DAY) AND payout_status='generated'";
			$select_query = "SELECT sum(binary_total) as total FROM binary_income WHERE userid='".$userid."' AND payout_status='generated'";
			//echo "BINARY INCOME = ".$select_query."<br>";
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

		function update_binary_income_status($userid,$week_start,$week_end)
		{
			//$query = "UPDATE binary_income SET payout_status='billed' WHERE userid='".$userid."' AND created_date >= '".$week_start."' AND created_date < DATE_ADD('".$week_end."', INTERVAL 1 DAY)";
			$query = "UPDATE binary_income SET payout_status='billed' WHERE userid='".$userid."' AND payout_status='generated'";
			$result = mysqli_query($this->conn,$query);
		}

		function update_direct_income_status($userid,$week_start,$week_end)
		{
			//$query = "UPDATE direct_comm SET status='billed' WHERE userid='".$userid."' AND date >= '".$week_start."' AND date < DATE_ADD('".$week_end."', INTERVAL 1 DAY)";
			$query = "UPDATE direct_comm SET status='billed' WHERE userid='".$userid."' AND status='generated'";
			$result = mysqli_query($this->conn,$query);
		}

		function payout($date)
		{
			$week_start = date("Y-m-d", strtotime('monday this week',$date));
			$week_end =  date("Y-m-d", strtotime('sunday this week',$date));
			$this->binary_payout($date);
			$this->direct_comm($date);
			$select_query = 'SELECT * FROM users';
			$result = mysqli_query($this->conn,$select_query);
			while($row = mysqli_fetch_array($result))
			{
				$binary_income = $this->calculate_binary_income($row['userid'],$week_start,$week_end);
				$direct_income = $this->calculate_direct_income($row['userid'],$week_start,$week_end);
				
				$income = $binary_income + $direct_income;
				$total_package_amount = totalPackageAmount($row['userid']);
				if($income > ($total_package_amount*$this->max_payout))
				{
					$payout_income = $total_package_amount;
				}else
				{
					$payout_income = $income;
				}

				if($payout_income > 0)
				{
					$insert_query = "INSERT INTO payout(userid,payout_amount,status,created_date) VALUES('".$row['userid']."',".$payout_income.",'generated','".date("Y-m-d H:i:s")."')";
					mysqli_query($this->conn,$insert_query);
					$this->update_binary_income_status($row['userid'],$week_start,$week_end);
					$this->update_direct_income_status($row['userid'],$week_start,$week_end);
				}
			}
		}
	}
//$obj = new binaryTree();
//$date = strtotime("2017-07-02");
//$date = strtotime(date("Y-m-d"));
//$obj->direct_comm($date);		

?>