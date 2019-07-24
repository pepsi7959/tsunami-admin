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
    
        $_server_arr = array();
        $data = explode(":",$_POST['listip']);
        $_server_arr = array(
            'id'        => ''
            ,'domain'	=> $data['0']
            ,'port'	    => $data['1']
            );

       
       $query =  $this->m_setting->TrancateIP();
      
       if(!$query){
           return false;
       }else{
            $this->m_setting->InsertServerList($_server_arr);
       }
    }

    
}