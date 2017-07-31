<?php
class Admin_notifications_model extends CI_Model
{
    
    function __construct() {
        parent::__construct();	
    }

    function add_notification($notification,$packages,$notification_email){
        $this->db->trans_start();
        $array = array('notification' => $notification,'packages' => $packages,'notification_email'=>$notification_email,'notification_status'=>'active');
        $this->db->set($array);
        $this->db->insert('notifications');
        $last_inserted_id = $this->db->insert_id();
        $this->db->trans_complete();
        return $last_inserted_id;
    }

    function edit_notification($notification,$notification_status,$notification_id){
        $this->db->trans_start();
        $array = array('notification' => $notification,'notification_status'=>$notification_status);
        $this->db->where('notification_id', $notification_id);
        $res = $this->db->update('notifications', $array);
        $this->db->trans_complete();
        return $res;
    }

    function delete_notification($notification_id){
        $this->db->trans_start();
        $this->db->where('notification_id', $notification_id);
        $res = $this->db->delete('notifications'); 
        $this->db->trans_complete();
    }

}