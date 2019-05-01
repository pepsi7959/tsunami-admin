<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * User Authentication
*/

class Auth {
    protected $CI;

    function __construct() {
        $this->CI =& get_instance();
        $this->CI->load->library('session');

    }

    public function is_login(){
        if( $this->CI->session->userdata('login') === TRUE ){
            return TRUE;
        }
        return FALSE;
    }

    public function get_profiles(){
        return $this->CI->session->userdata('profiles');
    }
}