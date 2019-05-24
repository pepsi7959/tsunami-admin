<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Setting extends CI_Controller {
    public  function __construct() {
        parent::__construct();
        $this->load->library('session');
        $this->load->library('auth');
        $this->load->database('');
        $this->load->helper('url');
        $this->load->model(
			array(
                 'm_setting'
			));
       
    }
    public function isLogin(){
        if ( $this->auth->is_login() == FALSE ) {
			redirect('login');
		}
    }
    public function index(){
        $this->isLogin();
        $data	            = array();
        
        $total = $this->m_setting->getServerList();
     
        $string = '';
        foreach($total['results'] as $item){

            $string .= ",".$item->domain.":".$item->port; 
        }
         $string = substr($string, 1); 

        $data['title'] = 'Home';
        $data['section'] = 'setting';
        $data['profiles'] = $this->auth->get_profiles();
        $data['listIP'] = $string;

       
        $this->load->view('templates/body', $data);

        
    }
    public function UpdateIP(){
     if(!$this->m_setting->TrancateIP()){
       return false;
    }else{
        $arr = array(); 
        $_server_arr = array();
        // $arr_ip = $_POST['tokenfield'];
        $arr = explode(",",$_POST['listip']);
        
        foreach ($arr as $item){
                $data = explode(":",$item);
            
                $_server_arr = array(
                            'id'        => ''
                            ,'domain'	=> $data['0']
                            ,'port'	    => $data['1']
                            );

                $this->db->trans_start();
                $this->db->insert('ServerLists', $_server_arr);
                $this->db->trans_complete();
               
                if ($this->db->trans_status() === FALSE){
                    $_data['status'] = "fail";
                }else{
                    $_data['status'] = "success";
                }
        
        }
        
        $this->output->set_content_type('application/json')->set_output(json_encode($_data));
    }
      
    //    $query =  $this->m_setting->TrancateIP();
    //    if($query['status'] == false){
    //        return false;
    //    }else{
    //         $this->m_setting->InsertServerList($List);
    //    }
    }

    
}