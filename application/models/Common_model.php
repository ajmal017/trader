<?php

class Common_model extends CI_Model
{
    
    function __construct() {
        parent::__construct();	
    }
    
    function getPackages($package_id,$filterArray = array(),$wherein="")
    {
    	$this->db->trans_start();
    	$this->db->select('*');
		$this->db->from('package_master');

		//$filterArray = array('package_status'=>'active','package_name'=>'Gold');
		foreach($filterArray as $key=>$value)
		{
			$this->db->where($key,$value);
		}
		
		if($package_id > 0)
		{
			$this->db->where('package_id',$package_id);	
		}

		if($wherein != "")
		{
			$this->db->where($wherein);	
		}
		
		$query = $this->db->get();
		
		$category_data = array();
		$category_main_data = array();
		$main_data = array();
		$data = array();
		foreach($query->result() as $row)
		{
			$data = array(
							'package_id'=>$row->package_id,
							'package_name'=>$row->package_name,
							'package_amount'=>$row->package_amount,
							'package_type'=>$row->package_type,
							'package_image'=>$row->package_image,
							'package_desc'=>htmlspecialchars_decode($row->package_desc),
							'package_status'=>$row->package_status,
							'package_created_date'=>$row->package_created_date,
							);

			$this->db->trans_start();
	    	$this->db->select('*');
			$this->db->from('package_media');
			$this->db->where('package_id',$row->package_id); 
			$query = $this->db->get();
			$data1 = array();
			foreach($query->result() as $row)
			{
				$data1[] = array(
								'image_path'=>$row->image_path,
								'file_type'=>$row->file_type,
								'package_media_id'=>$row->package_media_id
								);
			}
	    	$data['study_data'] = $data1;
	    	
	    	$this->db->trans_complete();

			if($package_id > 0)
			{
				$main_data = $data;	
			}else
			{
				array_push($main_data,$data);
			}
		}
    	$this->db->trans_complete();
		return $main_data;
    }

    function getUserPackages($userid,$filterArray = array())
    {
    	$this->db->trans_start();
    	$this->db->select('*,user_packages.status as user_package_status');
    	//$filterArray = array('package_status'=>'active','package_name'=>'Gold');
		foreach($filterArray as $key=>$value)
		{
			$this->db->where($key,$value);
		}
		
		if($userid > 0)
		{
			$this->db->where('user_packages.userid',$userid);	
		}

		$this->db->join('users', 'user_packages.userid = users.userid','left');
		$this->db->join('package_master', 'user_packages.package_id = package_master.package_id','left');
		$query = $this->db->get('user_packages');
		
		$category_data = array();
		$category_main_data = array();
		$main_data = array();
		$data = array();
		foreach($query->result() as $row)
		{
			$data = array(
							'user_package_id'=>$row->id,
							'package_id'=>$row->package_id,
							'payment_details'=>$row->payment_details,
							'payment_type'=>$row->payment_type,
							'userid'=>$row->userid,
							'username'=>$row->username,
							'fullname'=>$row->firstname.' '.$row->middlename.' '.$row->lastname,
							'profile_image'=>$row->profile_image,
							'package_name'=>$row->package_name,
							'package_amount'=>$row->package_amount,
							'quantity'=>$row->quantity,
							'package_type'=>$row->package_type,
							'package_image'=>$row->package_image,
							'package_desc'=>$row->package_desc,
							'package_status'=>$row->package_status,
							'package_created_date'=>$row->package_created_date,
							'purchase_date'=>$row->purchase_date,
							'acceptance_date'=>$row->acceptance_date,
							'user_package_status'=>$row->user_package_status
							);
			
			array_push($main_data,$data);
		}
    	$this->db->trans_complete();
		return $main_data;
    }

    function checkUsernameExists($username)
    {
    	$this->db->trans_start();
    	$this->db->select('*');
		$this->db->from('users');
		$this->db->where('username',$username);
		$query = $this->db->get();
		$count = $query->num_rows();
		$this->db->trans_complete();
		if($count > 0)
		{
			return true;
		}else
		{
			return false;
		}
    }

    function checkExists($tablename,$where_clause = array())
    {
    	$this->db->trans_start();
    	$this->db->select('*');
		$this->db->from($tablename);
		foreach ($where_clause as $key => $value) {
			$this->db->where($key,$value);
		}
		
		$query = $this->db->get();
		$count = $query->num_rows();
		$this->db->trans_complete();
		if($count > 0)
		{
			return true;
		}else
		{
			return false;
		}
    }

    function checkAlignmentSetOfUser($username)
	{
		$this->db->trans_start();
		$this->db->select('user_settings.user_alignment,users.userid');
		$this->db->where('users.username',$username);
		$this->db->join('users', 'users.userid = user_settings.userid','left');
		$query = $this->db->get('user_settings');
		
		$data = array();
		if($query->num_rows()==1){
		    foreach($query->result() as $row)
			{
				$data = array(
							'userid'=>$row->userid,
							'user_alignment'=>$row->user_alignment,
							);
			}
		}    
		$this->db->trans_complete();
		return $data;
	}

	function getUserInfo($userid=0,$username = '',$limit = null,$offset = null)
    {
    	$this->db->trans_start();
    	$this->db->select('*');
    	if($userid > 0)
    	{
    		$this->db->where('users.userid',$userid);
    	}
    	if($username != '')
    	{
    		$this->db->where('users.username',$username);
    	}
		$this->db->join('users', 'users.userid = userdetails.userid','left');
		$this->db->join('user_settings', 'user_settings.userid = users.userid','left');
		
		if($limit != '' && $offset != ''){
	       $this->db->limit($limit, $offset);
	    }
		$query = $this->db->get('userdetails');
		
		$data = array();
		$result = array();
		foreach($query->result() as $row)
		{
			$this->db->select('*');
	    	$this->db->where('user_packages.userid',$row->userid);
	    	$this->db->join('package_master', 'package_master.package_id = user_packages.package_id','left');

	    	$query1 = $this->db->get('user_packages');
	    	$package_list = array();
	    	foreach($query1->result() as $row1)
	    	{
	    		$package_list[] = (array)$row1;
	    	}

	    	$data = array(
							'userid'=>$row->userid,
							'username'=>$row->username,
							'sponsorid'=>$row->sponsorid,
							'placementid'=>$row->placementid,
							'placement'=>$row->placement,
							'leftmember'=>$row->leftmember,
							'rightmember'=>$row->rightmember,
							'firstname'=>$row->firstname,
							'middlename'=>$row->middlename,
							'lastname'=>$row->lastname,
							'email'=>$row->email,
							'profile_image'=>$row->profile_image,
							'address'=>$row->address,
							'city'=>$row->city,
							'state'=>$row->state,
							'country'=>$row->country,
							'pincode'=>$row->pincode,
							'dateofbirth'=>$row->dateofbirth,
							'mobile'=>$row->mobile,
							'gender'=>$row->gender,
							'pancard'=>$row->pancard,
							'pancard_image'=>$row->pancard_image,
							'aadhaar_card'=>$row->aadhaar_card,
							'aadhaar_card_image'=>$row->aadhaar_card_image,
							'bank_account_holder_name'=>$row->bank_account_holder_name,
							'bank_name'=>$row->bank_name,
							'branch'=>$row->branch,
							'account_number'=>$row->account_number,
							'ifsc_code'=>$row->ifsc_code,
							'user_alignment'=>$row->user_alignment,
							'role_id'=>$row->role_id,
							'status'=>$row->status,
							'package_list'=>$package_list,
							'created_date'=>$row->created_date
							);
			if($userid == 0 and $username == '')
			{
				$result[] = $data; 
			}else
			{
				$result = $data;
			}
		}
    	$this->db->trans_complete();
		return $result;
    }

    function getNotifications($notification_id = 0,$packages = array())
    {
    	$this->db->trans_start();
    	$this->db->select('*');
		if($notification_id > 0)
		{
			$this->db->where('notification_id',$notification_id);
		}
		//dump($packages);
		foreach($packages as $row)
		{
			$this->db->like('packages',$row, 'both');
		}
		$query = $this->db->get('notifications');
		
		$main_data = array();
		$data = array();
		foreach($query->result() as $row)
		{
			$data = array(
							'notification_id'=>$row->notification_id,
							'notification'=>$row->notification,
							'notification_status'=>$row->notification_status,
							'notification_created_time'=>$row->notification_created_time,
							);

		if($notification_id > 0)
		{
			$main_data = $data;
		}else
		{
			array_push($main_data,$data);
		}
		}
    	$this->db->trans_complete();
		return $main_data;
    }

    function getNews($news_id = 0)
    {
    	$this->db->trans_start();
    	$this->db->select('*');
		if($news_id > 0)
		{
			$this->db->where('news_id',$news_id);
		}
		$query = $this->db->get('news_master');
		
		$main_data = array();
		$data = array();
		foreach($query->result() as $row)
		{
			$data = array(
							'news_id'=>$row->news_id,
							'news_heading'=>$row->news_heading,
							'news_desc'=>htmlspecialchars_decode($row->news_desc),
							'created_date'=>$row->created_date,
							);

		if($news_id > 0)
		{
			$main_data = $data;
		}else
		{
			array_push($main_data,$data);
		}
		}
    	$this->db->trans_complete();
		return $main_data;
    }

    function getPackageMedia($package_id = 0,$package_media_id=0)
    {
    	$this->db->trans_start();
    	$this->db->select('*');
    	if($package_id > 0)
    	{
    		$this->db->where('package_id',$package_id);
    	}
    	if($package_media_id > 0)
    	{
    		$this->db->where('package_media_id',$package_media_id);
    	}
		$query = $this->db->get('package_media');
		
		$main_data = array();
		$data = array();
		foreach($query->result() as $row)
		{
			$data[] = array(
							'package_id'=>$row->package_id,
							'package_media_id'=>$row->package_media_id,
							'file_path'=>$row->image_path,
							'file_type'=>$row->file_type,
							);


		}
    	$this->db->trans_complete();
		return $data;
    }

    function getBonus($userid,$weekly)
    {
    	$this->db->trans_start();
    	$this->db->select('sum(payout_amount) as amt');
    	$this->db->where('userid',$userid);
    	$this->db->where('status','generated');
    	if($weekly == true)
    	{
    		$date = strtotime(date("Y-m-d",strtotime(config_item('current_date'))));
	    	$week_start = date("Y-m-d", strtotime('monday last week',$date));
			$week_end =  date("Y-m-d", strtotime('sunday last week',$date));
    		$this->db->where('created_date >=',$week_start);
    		$this->db->where("created_date < DATE_ADD('".$week_end."', INTERVAL 1 DAY) ");
    	}
		$query = $this->db->get('payout');
		
		$amt = 0;
		foreach($query->result() as $row)
		{
			$amt = $row->amt;
			
		}
    	$this->db->trans_complete();
		return $amt;
    }

    function totalPackageAmount($userid)
    {
    	$this->db->trans_start();
    	$this->db->select('sum(user_packages.quantity*package_master.package_amount) as total_amount');
    	if($userid > 0)
    	{
    		$this->db->where('user_packages.userid',$userid);
    	}
    	$this->db->where('user_packages.status','accepted');
    	
		$this->db->join('package_master', 'package_master.package_id = user_packages.package_id','left');
		$query = $this->db->get('user_packages');
		
		$amt = 0;
		foreach($query->result() as $row)
		{
			$amt = $row->total_amount;
			
		}
    	$this->db->trans_complete();
		return $amt;
    }

    function getUserEmailIdUsingPackages($package_ids)
    {
    	$this->db->trans_start();
    	$this->db->select('users.email');
    	if(count($package_ids) > 0)
    	{
    		$this->db->where_in('user_packages.package_id',$package_ids);
    	}
    	
		$this->db->join('user_packages', 'user_packages.userid = users.userid','left');
		$this->db->group_by('users.email');
		$query = $this->db->get('users');
		
		$data = array();
		foreach($query->result() as $row)
		{
			$data[] = $row->email;
			
		}
    	$this->db->trans_complete();
		return $data;
    }

    function roi_details($userid=0)
    {
    	$this->db->trans_start();
    	$where_string = '';
    	if($userid > 0)
    	{
    		$where_string = " AND u.userid=".$userid;
    	}

    	$sql_query = "SELECT u.userid,u.username,COALESCE(total_payout.total_amount,0) as Total_Amount,COALESCE(total_paid.paid_amount,0) as Paid_Amount,(COALESCE(total_payout.total_amount,0)-COALESCE(total_paid.paid_amount,0)) as Remaining_Amount FROM users u LEFT JOIN (SELECT a1.userid,sum(COALESCE(a1.amount,0))*1.0 as total_amount  FROM return_of_interest a1 WHERE a1.status='generated' group by a1.userid) as total_payout ON u.userid=total_payout.userid LEFT JOIN (SELECT a2.userid,sum(COALESCE(a2.amount,0))*1.0 as paid_amount FROM return_of_interest a2 WHERE a2.status='paid' group by a2.userid) as total_paid ON u.userid=total_paid.userid WHERE Total_Amount > 0 ".$where_string." ORDER BY Total_Amount DESC";

    	$query = $this->db->query($sql_query);
		
		$data = array();
		foreach($query->result() as $row)
		{
			if($userid > 0)
			{
				$data = (array)$row;	
			}else
			{
				$data[] = (array)$row;
			}		
		}
    	$this->db->trans_complete();
		return $data;
    }

    function loyality_income_details($userid=0)
    {
    	$this->db->trans_start();
    	$where_string = '';
    	if($userid > 0)
    	{
    		$where_string = " AND u.userid=".$userid;
    	}

    	$sql_query = "SELECT u.userid,u.username,COALESCE(total_payout.total_amount,0) as Total_Amount,COALESCE(total_paid.paid_amount,0) as Paid_Amount,(COALESCE(total_payout.total_amount,0)-COALESCE(total_paid.paid_amount,0)) as Remaining_Amount FROM users u LEFT JOIN (SELECT a1.userid,sum(COALESCE(a1.amount,0))*1.0 as total_amount  FROM loyality_income a1 WHERE a1.status='generated' group by a1.userid) as total_payout ON u.userid=total_payout.userid LEFT JOIN (SELECT a2.userid,sum(COALESCE(a2.amount,0))*1.0 as paid_amount FROM loyality_income a2 WHERE a2.status='paid' group by a2.userid) as total_paid ON u.userid=total_paid.userid WHERE Total_Amount > 0 ".$where_string." ORDER BY Total_Amount DESC";
    	$query = $this->db->query($sql_query);
		
		$data = array();
		foreach($query->result() as $row)
		{
			if($userid > 0)
			{
				$data = (array)$row;	
			}else
			{
				$data[] = (array)$row;
			}		
		}
    	$this->db->trans_complete();
		return $data;
    }

    function referral_income_details($userid=0)
    {
    	$this->db->trans_start();
    	$where_string = '';
    	if($userid > 0)
    	{
    		$where_string = " AND u.userid=".$userid;
    	}

    	$sql_query = "SELECT u.userid,u.username,COALESCE(total_payout.total_amount,0) as Total_Amount,COALESCE(total_paid.paid_amount,0) as Paid_Amount,(COALESCE(total_payout.total_amount,0)-COALESCE(total_paid.paid_amount,0)) as Remaining_Amount FROM users u LEFT JOIN (SELECT a1.userid,sum(COALESCE(a1.amount,0))*1.0 as total_amount  FROM referral_income a1 WHERE a1.status='generated' group by a1.userid) as total_payout ON u.userid=total_payout.userid LEFT JOIN (SELECT a2.userid,sum(COALESCE(a2.amount,0))*1.0 as paid_amount FROM referral_income a2 WHERE a2.status='paid' group by a2.userid) as total_paid ON u.userid=total_paid.userid WHERE Total_Amount > 0 ".$where_string." ORDER BY Total_Amount DESC";
    	$query = $this->db->query($sql_query);
		
		$data = array();
		foreach($query->result() as $row)
		{
			if($userid > 0)
			{
				$data = (array)$row;	
			}else
			{
				$data[] = (array)$row;
			}		
		}
    	$this->db->trans_complete();
		return $data;
    }

    function user_payment_details($userid=0)
    {
    	$this->db->trans_start();
    	$where_string = '';
    	if($userid > 0)
    	{
    		$where_string = " WHERE u.userid=".$userid;
    	}
    	$sql_query = "SELECT u.userid,u.username,COALESCE(final_result.Total_Amount,0) as Total_Amount,COALESCE(final_result.Paid_Amount,0) as Paid_Amount,COALESCE(final_result.Remaining_Amount,0) as Remaining_Amount FROM (SELECT result.userid,sum(result.total_amount) AS Total_Amount,sum(result.paid_amount) AS Paid_Amount,(COALESCE(sum(result.total_amount),0)-COALESCE(sum(result.paid_amount),0)) as Remaining_Amount FROM (SELECT ri_total_payout.userid,ri_total_payout.total_amount,ri_total_paid.paid_amount FROM (SELECT a1.userid,sum(COALESCE(a1.amount,0))*1.0 as total_amount  FROM referral_income a1 WHERE a1.status='generated' GROUP by a1.userid) as ri_total_payout LEFT JOIN (SELECT a2.userid,sum(COALESCE(a2.amount,0))*1.0 as paid_amount FROM referral_income a2 WHERE a2.status='paid' group by a2.userid) as ri_total_paid ON ri_total_payout.userid=ri_total_paid.userid UNION ALL select li_total_payout.userid,li_total_payout.total_amount,li_total_paid.paid_amount from (SELECT a3.userid,sum(COALESCE(a3.amount,0))*1.0 as total_amount  FROM loyality_income a3 WHERE a3.status='generated' group by a3.userid) as li_total_payout LEFT JOIN (SELECT a4.userid,sum(COALESCE(a4.amount,0))*1.0 as paid_amount FROM loyality_income a4 WHERE a4.status='paid' group by a4.userid) as li_total_paid ON li_total_payout.userid=li_total_paid.userid UNION ALL select roi_total_payout.userid,roi_total_payout.total_amount,roi_total_paid.paid_amount from (SELECT a5.userid,sum(COALESCE(a5.amount,0))*1.0 as total_amount  FROM return_of_interest a5 WHERE a5.status='generated' group by a5.userid) as roi_total_payout LEFT JOIN (SELECT a6.userid,sum(COALESCE(a6.amount,0))*1.0 as paid_amount FROM return_of_interest a6 WHERE a6.status='paid' group by a6.userid) as roi_total_paid ON roi_total_payout.userid=roi_total_paid.userid) as result GROUP BY result.userid ORDER BY result.userid) as final_result LEFT JOIN users u ON u.userid=final_result.userid ".$where_string." ORDER BY u.userid ASC";

    	//$sql_query = "SELECT users.userid,users.username,COALESCE(total_payout.total_amount,0) as Total_Amount,COALESCE(paid_payout.paid_amount,0) as Paid_Amount,(COALESCE(total_payout.total_amount,0)-COALESCE(paid_payout.paid_amount,0)) as Remaining_Amount FROM users LEFT JOIN (SELECT payout.userid,sum(COALESCE(payout.payout_amount,0))*1.0 as total_amount FROM payout WHERE payout.status='generated' group by payout.userid) as total_payout ON users.userid=total_payout.userid LEFT JOIN (SELECT payout.userid,sum(COALESCE(payout.payout_amount,0))*1.0 as paid_amount FROM payout WHERE payout.status='paid' group by payout.userid) as paid_payout ON users.userid=paid_payout.userid ".$where_string."  ORDER BY Total_Amount DESC";
    	$query = $this->db->query($sql_query);
		
		$data = array();
		foreach($query->result() as $row)
		{
			if($userid > 0)
			{
				$data = (array)$row;	
			}else
			{
				$data[] = (array)$row;
			}
					
		}
    	$this->db->trans_complete();
		return $data;
    }

    function payment_details_view($userid=0,$tablename)
    {
    	$this->db->trans_start();
    	
    	$this->db->select('users.username,'.$tablename.'.*');
    	if($userid > 0)
    	{
    		$this->db->where_in($tablename.'.userid',$userid);
    	}

    	if($tablename == 'referral_income')
    	{
    		//$this->db->not_like($tablename.'.status','level');	
    	}
    	$this->db->join('users', 'users.userid = '.$tablename.'.userid','left');
		$query = $this->db->get($tablename);
		
		$data = array();
		foreach($query->result() as $row)
		{
			$data[] = (array)$row;		
		}
    	$this->db->trans_complete();
		return $data;
    }
    
    function getDirectUsers($userids=array(''))
    {
    	$this->db->trans_start();
    	
    	$this->db->select('users.userid,users.sponsorid,users.firstname,users.middlename,users.lastname,users.username,u.username as sponsorname,u.userid as sponsor_id,users.created_date,users.status');
    	$this->db->where_in('users.sponsorid',$userids);
    	$this->db->join("(select username,userid from users where userid IN (".implode(",",$userids).") ) as u", 'users.sponsorid = u.userid','left');
		$query = $this->db->get('users');
		
		$data = array();
		foreach($query->result() as $row)
		{
			$data[] = (array)$row;		
		}
    	$this->db->trans_complete();
		return $data;
    }

    function get_return_of_interest($userids=array(''))
    {
    	$this->db->trans_start();
    	$this->db->select('*');
    	$this->db->where_in('return_of_interest.userid',$userids);
		$query = $this->db->get('return_of_interest');
		$data = array();
		foreach($query->result() as $row)
		{
			$data[] = (array)$row;		
		}
    	$this->db->trans_complete();
		return $data;
    }

    function get_loyality_income($userids=array(''))
    {
    	$this->db->trans_start();
    	$this->db->select('*');
    	$this->db->where_in('loyality_income.userid',$userids);
		$query = $this->db->get('loyality_income');
		$data = array();
		foreach($query->result() as $row)
		{
			$data[] = (array)$row;		
		}
    	$this->db->trans_complete();
		return $data;
    }

    function get_referral_income($userids=array(''))
    {
    	$this->db->trans_start();
    	$this->db->select('*');
    	$this->db->where_in('referral_income.userid',$userids);
    	$this->db->not_like('referral_income.status', 'level');
		$query = $this->db->get('referral_income');
		
		$data = array();
		foreach($query->result() as $row)
		{
			$data[] = (array)$row;		
		}
    	$this->db->trans_complete();
		return $data;
    }
}