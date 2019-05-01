<?php
/**
 * M_dashboard Class
 *
 * 
 *
 * @package		Mseries
 * @subpackage	M_dashboard
 * @category	API
 * @author		Narongsak Mala<narongsak.mala@gmail.com>
 * @link		
 */
defined('BASEPATH') OR exit('No direct script access allowed');

class M_dashboard extends CI_Model{

    private $TBL_MDEVICEPROFILE = "dbo.MDeviceProfile";
    private $TBL_SDEVICEPROFILE = "mon.ProjectDetail";
    private $TBL_CUSTOMER = "dbo.Customer";


    function __construct() {
        parent::__construct();
        $this->load->database('tsunami');
    }


    public function getTotalMDevices(){

        $total = 0;
        $active = 0;

        $this->db->select("isactive, count(IsActive) as count");
        $this->db->from($this->TBL_MDEVICEPROFILE);
        $this->db->group_by('isactive');
        $q = $this->db->get();
 
        $rows = $q->result_array();

        foreach($rows as $row){
            if($row['isactive'] == '2'){
                $active = intval($row['count']);
            }
            $total += intval($row['count']);
        }
        $data = array(
            'active' => $active,
            'total' => $total
        );
        return $data;
    }

    public function getTotalSDevices(){

        $total = 0;
        $active = 0;

        $this->db->select("isactive, count(IsActive) as count");
        $this->db->from($this->TBL_SDEVICEPROFILE);
        $this->db->group_by('isactive');
        $q = $this->db->get();
 
        $rows = $q->result_array();

        foreach($rows as $row){
            if($row['isactive'] == '1'){
                $active = intval($row['count']);
            }
            $total += intval($row['count']);
        }
        $data = array(
            'active' => $active,
            'total' => $total
        );
        return $data;
    }

    public function getTotalUserRegistrations(){
        $total = 0;
        $active = 0;

        $this->db->select("isactive, count(IsActive) as count");
        $this->db->from($this->TBL_CUSTOMER);
        $this->db->group_by('isactive');
        $q = $this->db->get();
 
        $rows = $q->result_array();

        foreach($rows as $row){
            if($row['isactive'] == '1'){
                $active = intval($row['count']);
            }
            $total += intval($row['count']);
        }
        $data = array(
            'active' => $active,
            'total' => $total
        );

        return $data;
    }

    public function getTotalTransactions(){
        $data = array(
            'active' => 300,
            'total' => 1000
        );
        return $data;
    }

    public function getTotalMPerYear(){
        // SELECT YEAR([CreatedAt]) as year, count(DeviceId) as count
        // FROM [dbo].[MDeviceProfile]
        // GROUP BY YEAR([CreatedAt])
        $result = [];
        $this->db->select("YEAR([CreatedAt]) as year, count(DeviceId) as count");
        $this->db->from($this->TBL_MDEVICEPROFILE);
        $this->db->group_by('YEAR([CreatedAt])');
        $q = $this->db->get();
        return $q->result_array();
    }

    public function getTotalSPerYear(){
        // SELECT YEAR([CreatedAt]) as year, count(ApiKey) as num
        // FROM [mon].[ProjectDetail]
        // GROUP BY YEAR([CreatedAt])
        $result = [];
        $this->db->select("YEAR([CreatedAt]) as year, count(ApiKey) as count");
        $this->db->from($this->TBL_SDEVICEPROFILE);
        $this->db->group_by('YEAR([CreatedAt])');
        $q = $this->db->get();
        return $q->result_array();
    }
}