<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {
    public  function __construct() {
        parent::__construct();
        $this->load->model('m_dashboard');
    }

    public function totalMDevices(){

        $total = $this->m_dashboard->getTotalMDevices();
        $totalMDevices = array(
            'active' => $total['active'],
            'total' => $total['total']
        );

        responseSuccess($this, $totalMDevices);
    }

    public function totalSDevices(){
        $total = $this->m_dashboard->getTotalSDevices();
        $totalSDevices = array(
            'active' => $total['active'],
            'total' => $total['total']
        );
        responseSuccess($this, $totalSDevices);
    }

    public function totalUserRegistrations(){
        $total = $this->m_dashboard->getTotalUserRegistrations();
        $totalTotalUsers = array(
            'active' => $total['active'],
            'total' => $total['total']
        );
        responseSuccess($this, $totalTotalUsers);
    }

    
    public function totalTransactions(){
        $total = $this->m_dashboard->getTotalTransactions();
        $totalTotalUsers = array(
            'active' => $total['active'],
            'total' => $total['total']
        );
        responseSuccess($this, $totalTotalUsers);
    }

    public function totalSByYear(){
        $totalTotalUsers = array(
            'active' => $total['active'],
            'total' => $total['total']
        );
        responseSuccess($this, $totalTotalUsers);
    }


    public function totalMByYear(){
        $totalTotalUsers = array(
            'active' => $total['active'],
            'total' => $total['total']
        );
        responseSuccess($this, $totalTotalUsers);
    }

    public function totalMPerYear(){
        $totalMPerYear = [];
        $rows = $this->m_dashboard->getTotalMPerYear();
        if( isset($rows) ){
            foreach($rows as $row){
                $totalMPerYear[] = $row['count'];
            }
        }
        responseSuccess($this, $totalMPerYear);
    }

    public function totalSPerYear(){
        $totalSPerYear = [];
        $rows = $this->m_dashboard->getTotalSPerYear();
        if( isset($rows) ){
            foreach($rows as $row){
                $totalSPerYear[] = $row['count'];
            }
        }
        responseSuccess($this, $totalSPerYear);
    }
}