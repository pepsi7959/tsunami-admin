<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
    public  function __construct() {
        parent::__construct();
        $this->load->library('session');
        $this->load->library('auth');
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

    public function isLogin(){
        if ( $this->auth->is_login() == FALSE ) {
			redirect('login');
		}
    }
}
