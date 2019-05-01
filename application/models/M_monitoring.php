<?php
/**
 * M_monitoring Class
 *
 * 
 *
 * @package		
 * @subpackage	
 * @category	API
 * @author		Narongsak Mala<narongsak.mala@gmail.com>
 * @link		
 */
defined('BASEPATH') OR exit('No direct script access allowed');

class M_monitoring extends CI_Model{

    private $TBL_MDialyUsageSummary = "mon.MDialyUsageSummary";
    private $TBL_MMonthlyUsageSummary = 'mon.MMonthlyUsageSummary';
    private $TBL_MYearlyUsageSummary = 'mon.MYearlyUsageSummary';

    function __construct() {
        parent::__construct();
        $this->load->database('tsunami');
    }
    
    public function getEnergyConsumptionPerDay($deviceid, $year, $month, $day) {
        $this->db->select("
            DATEPART(HOUR,[DataDateTime]) as \"hour\"
            ,powerconsumed");
        $this->db->where("DeviceId", $deviceid);
        $this->db->where('DataDateTime >= \''.$year.'-'.$month.'-'.$day.' 00:00:00\'');
        $this->db->where('DataDateTime <= \''.$year.'-'.$month.'-'.$day.' 23:59:59\'');
        $this->db->from($this->TBL_MDialyUsageSummary);
        
        
        $q = $this->db->get();
        log_message('debug', "query string: ". $this->db->last_query()); 
        return $q->result_array();
    }

    public function getEnergyConsumptionPerMonth($deviceid, $year, $month) {
        $this->db->select("
            day(DataDateTime) as \"day\"
            ,powerconsumed");
        $this->db->where("DeviceId", $deviceid);
        $this->db->where('DataDateTime >= \''.$year.'-'.$month.'-01\'');
        $this->db->where('DataDateTime <= EOMONTH(\''.$year.'-'.$month.'-01\')');
        $this->db->from($this->TBL_MMonthlyUsageSummary);
        $q = $this->db->get();

        return $q->result_array();
    }
    
    public function getEnergyConsumptionPerYear($deviceid, $year) {
        $this->db->select("
            DATEPART(MONTH, [DataDateTime]) as \"month\"
            ,powerconsumed");
        $this->db->where("DeviceId", $deviceid);
        $this->db->where('DataDateTime >= \''.$year.'-01-01\'');
        $this->db->where('DataDateTime <= EOMONTH(\''.$year.'-12-01\')');
        $this->db->from($this->TBL_MYearlyUsageSummary);
        $this->db->limit(12);
        
        $q = $this->db->get();

        return $q->result_array();
    }
}
?>
