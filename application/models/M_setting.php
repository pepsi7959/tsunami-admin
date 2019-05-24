<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class M_setting extends CI_Model{

    private $TBL_SERVERLIST = "ServerLists";
  
    function __construct() {
        parent::__construct();
        //$this->load->database();
    }

  

    
    public function getServerList(){
        $this->db->select('*');
        $this->db->from('ServerLists');
        $this->db->order_by("id", "asc");
        $query = $this->db->get();
       // var_dump($query->result());
        $return_array = array();

		if ($query) {
			$return_array['status'] = true;
            $return_array['results'] = $query->result();
            return $return_array;
        }else{
            $return_array['status'] = false;
            $return_array['message'] = $this->db->error();
            return $return_array;
        }

    }
    public function TrancateIP(){
        // $query =  $this->db->truncate('ServerLists');
        // var_dump()
        if ($this->db->truncate('ServerLists')) {
			return true;
        }else{
            return false;
        }
    }
    public function InsertServerList($serverList){

        if($this->db->insert_batch($this->TBL_SERVERLIST, $serverList)){
             print_r($this->db->last_query());    
            return true;
        }
       else{
            return false;
           
       }
    }
    
}