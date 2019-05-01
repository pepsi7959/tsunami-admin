<?php
/**
 * M_device Class
 *
 * 
 *
 * @package		Mseries
 * @subpackage	M_device
 * @category	API
 * @author		Narongsak Mala<narongsak.mala@gmail.com>
 * @link		
 */
defined('BASEPATH') OR exit('No direct script access allowed');

class M_device extends CI_Model{

    private $TBL_MDEVICEPROFILE = "dbo.MDeviceProfile";
    private $TBL_CUSTOMERPROFILE = "dbo.CustomerProfile";
    private $TBL_SDEVICEPROFILE = "mon.ProjectDetail";
    private $TBL_CUSTOMER = "dbo.Customer";
    private $TBL_PROVINCE = "loc.Province";
    private $TBL_DISTRICT = 'loc.District';
    private $TBL_MUsageLog = 'mon.MUsageLog';
    private $TBL_MonitoringData = 'mon.MonitoringData';


    function __construct() {
        parent::__construct();
        $this->load->database('tsunami');
    }

    public function getDevices( $ownerid ){

        $this->db->select("deviceid, devicename");
        $this->db->where('IsActive >= 1');
        $this->db->where('ownerid', $ownerid);
        $this->db->from($this->TBL_MDEVICEPROFILE);
        $q = $this->db->get();

        if ( $q === NULL ) {
            return NULL;
        }
        
        return $q->result_array();
    }
    
    public function getMReports( $deviceid, $from, $to ){

        $this->db->select("id
        ,deviceid
        ,ownerid
        ,current
        ,power
        ,voltage
        ,phaseshift
        ,status
        ,timestamp
        ,createdat");

        $this->db->from($this->TBL_MUsageLog);
        $this->db->where('deviceid', $deviceid);
        $this->db->where('TimeStamp >= ', $from." 00:00:00");
        $this->db->where('TimeStamp <= ', $to." 23:59:59");

        $q = $this->db->get();
        if ( $q === NULL ) {
            return NULL;
        }
        
        return $q->result_array();
    }

    public function getSReports( $deviceid, $from, $to ){
    //     SELECT id,
    //     projectid,
    //     timestamp,
    //     powergenerated,
    //     powerconsumed,
    //     createdat
    // FROM [mon].[MonitoringData]
        $this->db->select("id,
        projectid,
        timestamp,
        powergenerated,
        powerconsumed,
        createdat");

        $this->db->from($this->TBL_MonitoringData);
        $this->db->where('projectid', $deviceid);
        $this->db->where('TimeStamp >= ', $from." 00:00:00");
        $this->db->where('TimeStamp <= ', $to." 23:59:59");

        $q = $this->db->get();
        if ( $q === NULL ) {
            return NULL;
        }
        log_message('debug', 'last query: '.$this->db->last_query());
        return $q->result_array();
    }

    public function countMDevices( $ownerid ){
        $this->db->select("isactive, count( isactive ) as count");
        $this->db->from($this->TBL_MDEVICEPROFILE);
        $this->db->where('ownerid', $ownerid);
        $this->db->group_by('isactive');
        $q = $this->db->get();
        return $q->result_array();
    }

    public function countSdevices( $customerid ){
        $this->db->select("isactive, count(IsActive) as count");
        $this->db->from($this->TBL_SDEVICEPROFILE);
        $this->db->where('customerid', $customerid);
        $this->db->group_by('isactive');
        $q = $this->db->get();
        return $q->result_array();
    }
}
?>
