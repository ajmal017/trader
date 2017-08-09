<?php

class Adminpackages_model extends CI_Model
{
    
    function __construct() {
        parent::__construct();	
    }
    
    function addPackage($package_name,$package_amount,$package_type,$package_desc){
		$this->db->trans_start();
        $array = array('package_amount' => $package_amount,'package_name'=>$package_name,'package_type'=>$package_type,'package_desc'=>htmlspecialchars($package_desc), 'package_created_date' => config_item('current_date'),'package_status'=>'active');
		$this->db->set($array);
		$this->db->insert('package_master');
		$last_inserted_id = $this->db->insert_id();
		$this->db->trans_complete();
        return $last_inserted_id;
    }

    function editPackage($package_id,$package_name,$package_amount,$package_type,$package_desc){
        $this->db->trans_start();
        $array = array('package_amount' => $package_amount,'package_name'=>$package_name,'package_type'=>$package_type,'package_desc'=>htmlspecialchars($package_desc));
		$this->db->where('package_id', $package_id);
		$res = $this->db->update('package_master', $array);
		$this->db->trans_complete();
        return $res;
    }

    function addPackageMedia($package_id,$image_path,$type,$created_date){
        $this->db->trans_start();
		$array = array('package_image' => $image_path);
		$this->db->where('package_id', $package_id);
		$res = $this->db->update('package_master', $array); 
		$this->db->trans_complete();
        return true;
    }

    function addPackageStudyDocs($package_id,$image_path,$file_type,$created_date){
        $this->db->trans_start();
        $array = array('package_id' => $package_id,'image_path'=>$image_path,'file_type'=>$file_type,'created_date'=>$created_date);
        $this->db->set($array);
        $this->db->insert('package_media');
        $this->db->trans_complete();
        return true;
    }

    function delete_package_media($package_media_id){

        $this->db->trans_start();
        
        $this->db->select('*');
        $this->db->from('package_media');
        $this->db->where('package_media_id',$package_media_id); 
        $query = $this->db->get();
        $data = array();
        foreach($query->result() as $row)
        {
            $data[] = array(
                            'package_media_id'=>$row->package_media_id,
                            'image_path'=>$row->image_path,
                            );
        }
        $this->db->trans_complete();
        
        $this->db->trans_start();
        foreach($data as $d)
        {
            $this->db->where('package_media_id', $d['package_media_id']);
            $this->db->delete('package_media'); 
            unlink('uploads/packages/online_study_docs/'.$d['image_path']);
        }
        $this->db->trans_complete();
        return 1;
    }
}