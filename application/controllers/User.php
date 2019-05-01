<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library('session');
        $this->load->library('auth');
    }

	public function login()
	{
        if( $this->auth->is_login() ){
            redirect('dashboard');
        }

        $data['title'] = 'login';
		$this->load->view('login', $data);
    }

    public function authen()
	{
        $user = $_POST['username'];
        $pass = $_POST['password'];

        if( $user == "test"  && $pass == "test" ) {
            $profiles['userloginid'] = 17;
            $profiles['displayname'] = "Narongsak";
            $profiles['email'] = 'narongsak_mala@outook.com';
            $profiles['lastlogindate'] = '2019-03-28 19:00:00.000';
            $profiles['createdat'] = '2019-03-28 19:00:00.000';
            $this->session->set_userdata('login', TRUE);
            $this->session->set_userdata('profiles', $profiles);
            redirect('dashboard');
        }else{
            redirect('login');
         }
    }

    public function logout(){
        $this->session->set_userdata('login', FALSE);
        $this->session->set_userdata('profiles', NULL);
		$this->session->sess_destroy();
        redirect('login');
    }
}
