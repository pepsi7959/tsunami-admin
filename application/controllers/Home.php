<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
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

	public function index()
	{
        $this->isLogin();
        $data['title'] = 'Home';
        $data['section'] = 'dashboard';
		$this->load->view('templates/body', $data);
    }
    
    public function dashboard(){
        $this->isLogin();
        $data['title'] = 'Home';
        $data['section'] = 'dashboard';
        $data['data'] = array(
            'numOfM' => 0,
            'numOfS' => 0,
            'numOfUsers' =>0,
            'numOfTransactions' => 0
        );
        $qret = $this->m_setting->piorityList();
        $ipshooting = "";
        foreach($qret['results'] as $item){

            $ipshooting .= ",".$item->domain; 
        }
         $ipshooting = substr($ipshooting, 1); 
        $data['ip'] = $ipshooting;
        $data['scheme'] = $this->config->item('scheme');
        $data['profiles'] = $this->auth->get_profiles();
		$this->load->view('templates/body', $data);
    }

    public function user(){
        $this->isLogin();
        $data['title'] = 'Home';
        $data['section'] = 'user';
        $data['profiles'] = $this->auth->get_profiles();
		$this->load->view('templates/body', $data);
    }
    
    public function promotion(){
        $this->isLogin();
        $data['title'] = 'Home';
        $data['section'] = 'promotion';
        $data['profiles'] = $this->auth->get_profiles();
		$this->load->view('templates/body', $data);
    }

    public function device(){
        $this->isLogin();
        $data['title'] = 'Home';
        $data['section'] = 'device';
        $data['profiles'] = $this->auth->get_profiles();
		$this->load->view('templates/body', $data);
    }

    public function report(){
        $this->isLogin();
        $data['title'] = 'Home';
        $data['section'] = 'report';
        $data['profiles'] = $this->auth->get_profiles();
		$this->load->view('templates/body', $data);
    }

    public function monitoring(){
        $this->isLogin();
        $data['title'] = 'Home';
        $data['section'] = 'monitoring';
        $data['profiles'] = $this->auth->get_profiles();
		$this->load->view('templates/body', $data);
    }
    public function setting(){
        $this->isLogin();
        $data['title'] = 'Home';
        $data['section'] = 'setting';
        $data['profiles'] = $this->auth->get_profiles();
		$this->load->view('templates/body', $data);
    }

    public function isLogin(){
        if ( $this->auth->is_login() == FALSE ) {
			redirect('login');
		}
    }
    public function callapi(){
        
        $this->isLogin();
        $url = "http://122.155.4.135:8091/api/v1/metrics";
        $ch = curl_init();  
 
        curl_setopt($ch,CURLOPT_URL,$url);
        curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
    //  curl_setopt($ch,CURLOPT_HEADER, false); 
    
        echo $output=curl_exec($ch);
    
        curl_close($ch);
       
    }
}
