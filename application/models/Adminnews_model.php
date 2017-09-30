<?php

class Adminnews_model extends CI_Model
{
    
    function __construct() {
        parent::__construct();  
    }
    
    function save_news($news_heading,$news_desc,$created_date){
        $this->db->trans_start();
        $array = array('news_heading' => $news_heading,'news_desc'=>htmlspecialchars($news_desc),'created_date'=>$created_date);
        $this->db->set($array);
        $this->db->insert('news_master');
        $last_inserted_id = $this->db->insert_id();
        $this->db->trans_complete();
        return $last_inserted_id;
    }

    function edit_news($news_id,$news_heading,$news_desc){
        $this->db->trans_start();
        $array = array('news_heading' => $news_heading,'news_desc'=>htmlspecialchars($news_desc));
        $this->db->where('news_id', $news_id);
        $res = $this->db->update('news_master', $array);
        $this->db->trans_complete();
        return $res;
    }

    function delete_news($news_id){
        $this->db->trans_start();
        $this->db->where('news_id', $news_id);
        $this->db->delete('news_master'); 
        $this->db->trans_complete();
        return 1;
    }
}