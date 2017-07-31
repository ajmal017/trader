<?php
$CI =& get_instance();
        
function binary_tree_update($userid,$placementid,$place,$sponsorid)
{
	global $CI;
	$CI->load->database();
	$conn = mysqli_connect($CI->db->hostname, $CI->db->username, $CI->db->password,$CI->db->database);
	
	$updateQuery = "update users set sponsorid = ".$sponsorid." where userid='".$userid."'"; 
	mysqli_query($conn,$updateQuery);
	//for starting users
	if($place == 'right')
	{
		$columnname = "rightmember";
	}else if($place == 'left')
	{
		$columnname = "leftmember";
	}
	
	$qry = 'select * from users WHERE userid = '.$placementid;
	$res = mysqli_query($conn,$qry);
	$next_placementid = 0;
	while($rows = mysqli_fetch_array($res))
	{
		$place_string = '';
		if($rows[$columnname] == 0)
		{
			$place_string = $place;
			$placement_column = $columnname;
		}
		if($place_string != '')
		{
			//echo "<br>".$place_string."=====".$userid."=====".$placement_column."=====".$rows['userid']."</br>";
			$updateQuery = "update users set placementid = ".$rows['userid'].",placement='$place_string' where userid='".$userid."'"; 
			mysqli_query($conn,$updateQuery);
			$updateQuery = "update users set $placement_column='$userid' where userid='".$rows['userid']."'";
			mysqli_query($conn,$updateQuery);
			return "SUCCESS";	
		}
		$next_placementid = $rows[$columnname];
	}

	$query = 'select * from users where userid >= '.$next_placementid;
	//echo $query."<br>********FIRST*********";
	$result = mysqli_query($conn,$query);
	while($row = mysqli_fetch_array($result))
	{
		$place_string = '';
		if($row['leftmember'] == 0)
		{
			$place_string = 'left';
			$placement_column = 'leftmember';
		}
		else if($row['rightmember'] == 0)
		{
			$place_string = 'right';
			$placement_column = 'rightmember';
		}
		if($place_string != '')
		{
			//echo "<br>".$place_string."=====".$userid."=====".$placement_column."=====".$row['userid']."</br>";
			$updateQuery = "update users set placementid = ".$row['userid'].",placement='$place_string' where userid='".$userid."'"; 
			mysqli_query($conn,$updateQuery);
			$updateQuery = "update users set $placement_column='$userid' where userid='".$row['userid']."'";
			mysqli_query($conn,$updateQuery);
			return "SUCCESS";	
		}
	}
}
/*
for ($i =1 ;$i < 10 ;$i++)
{
	mysqli_query($conn,"INSERT INTO `users` (`userid`, `username`, `password`, `sponsorid`, `placementid`, `placement`, `leftmember`, `rightmember`, `firstname`, `middlename`, `lastname`, `email`, `profile_image`, `email_verification_token`, `email_verified`, `role_id`, `status`, `entry`, `last_login`, `created_date`) VALUES (NULL, 'amit".$i."', '123456', '0', '0', '', '0', '0', '', '', '', '', '', '', '', '', '', '0', '2017-05-24 00:00:00', '2017-05-24 00:00:00');");
	$id = mysqli_insert_id($conn);
	update($id,6,'left');
}*/
?>