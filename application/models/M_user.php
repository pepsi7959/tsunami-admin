<?php
/**
 * M_user Class
 *
 * 
 *
 * @package		Mseries
 * @subpackage	M_user
 * @category	API
 * @author		Narongsak Mala<narongsak.mala@gmail.com>
 * @link		
 */
defined('BASEPATH') OR exit('No direct script access allowed');

class M_user extends CI_Model{

    private $TBL_MDEVICEPROFILE = "dbo.MDeviceProfile";
    private $TBL_CUSTOMERPROFILE = "dbo.CustomerProfile";
    private $TBL_SDEVICEPROFILE = "mon.ProjectDetail";
    private $TBL_CUSTOMER = "dbo.Customer";
    private $TBL_PROVINCE = "loc.Province";
    private $TBL_DISTRICT = 'loc.District';
    private $TBL_MUSAGELOG = 'mon.MUsageLog';


    function __construct() {
        parent::__construct();
        $this->load->database('tsunami');
    }

    public function getAllUsers(){
        $this->db->select('customerid,
        firstname,
        lastname,
        email,
        isactive');
        $this->db->from($this->TBL_CUSTOMER);
        $this->db->where('email is not null');
        $q = $this->db->get();
        return $q->result_array();
    }

    public function getUserByEmail( $email ){
        $this->db->select('c.customerid,
        c.firstname,
        c.lastname,
        c.email,
        c.isactive,
        p.provincename as province,
        d.name as district,
        c.Telephone as tel');
        $this->db->from($this->TBL_CUSTOMER.' as c');
        $this->db->join($this->TBL_CUSTOMERPROFILE.' as cp', 'c.CustomerId = cp.CustomerId', 'left');
        $this->db->join($this->TBL_PROVINCE.' as p', 'cp.Province = p.ProvinceId', 'left');
        $this->db->join($this->TBL_DISTRICT.' as d', 'cp.District = d.DistrictId', 'left');
        $this->db->where('email', $email);

        $q = $this->db->get();
        return $q->row_array();
    }
    

    public function getMDeviceByCustomerId( $ownerid ){

        $this->db->select('m.ownerid as customerid,
        m.deviceid,
        m.devicename,
        m.devicecode,
        case when m.status = 0  then \'off\' else \'on\' end as status,
        case when m.isactive = 0  then \'inactive\' else \'active\' end as isactive,
        m.location,
        m.createdat,
        m.updateat,
        c.email');

        if( $ownerid != null){
            $this->db->where('m.ownerid', $ownerid);
        }
        $this->db->from($this->TBL_MDEVICEPROFILE.' as m');
        $this->db->join($this->TBL_CUSTOMER.' as c', 'c.customerid = m.ownerid', 'left');
        $q = $this->db->get();
        return $q->result_array();
    }


    public function getSDeviceByCustomerId( $ownerid=null ){

        $this->db->select('s.customerid,
        s.projectid,
        s.displayname,
        s.apikey,
        s.districtid,
        d.name,
        d.namethai,
        s.installationtypeid,
        s.systemsize,
        s.tariffonpeakweekday,
        s.tariffoffpeakweekday,
        s.tariffonpeakweekend,
        s.tariffoffpeakweekend,
        case when s.isactive = 0  then \'inactive\' else \'active\' end as isactive,
        s.createdby,
        s.createdAt,
        s.updatedby,
        s.updatedat,
        c.email');

        if( $ownerid != null){
            $this->db->where('s.customerid', $ownerid);
        }
        $this->db->from($this->TBL_SDEVICEPROFILE.' as s');
        $this->db->join($this->TBL_DISTRICT.' as d', 'd.districtid = s.districtid', 'left');
        $this->db->join($this->TBL_CUSTOMER.' as c', 'c.customerid = s.customerid', 'left');

        $q = $this->db->get();
        return $q->result_array();
    }

    public function getMRawdataByDeviceId( $deviceid, $begin = null, $end = null){
        $this->select(
            'id,
            deviceid,
            ownerid,
            current,
            power,
            phaseshift,
            status,
            timestamp,
            createdat');
        $this->db->where('deviceid', $deviceid);
        if( $begin != null && $end != null){
            $this->db->where('deviceid', $deviceid);
        }
        $this->db->from($this->TBL_MUSAGELOG);
        $q = $this->db->get();
        return $q->result_array();
    }

    public function getUserByUserPassword($user, $pass){

        $this->load->library('AES');
        $text_hash = hash('SHA256', (get_magic_quotes_gpc() ? stripslashes($pass) : $pass));
        $text_hash = pack("H*", $text_hash);
        $this->aes->init($text_hash, $this->aes->default_hashkey, 256, 'CBC');
        $enc = $this->aes->encrypt();

        $this->db->select('userloginid, displayname, email, password,lastlogindate,createdat');
        $this->db->from('userlogin');
        $this->db->where('isactive', 1);
        $this->db->where('email', $user);

		$sql_result = $this->db->get();
		$data =  $sql_result->row_array();
		log_message('info', 'User: '.$user.'encrypted pass: '.$enc);
        log_message('info', 'search result customer profile: '.print_r($data, true));
        
		if( isset($data['password'] ) && $data['password'] == $enc ){
            log_message('info', 'The password input('.$data['password'].') = '.$enc);
            return $data;
		}else{
			return NULL;
        }
        

    }

    public function getMonitoringByYear($customerid, $year){
		$this->db->select('deviceid, CONVERT(VARCHAR(2), DataDateTime, 1) as Id, max(PowerConsumed)');
		$this->db->from('mon.MYearlyUsageSummary');
		$this->db->where('OwnerId', $ownerId);
        $this->db->where('CONVERT(VARCHAR(4), DataDateTime, 112) = \''.$year.'\'');
        $this->db->group_by('deviceid, CONVERT(VARCHAR(2), DataDateTime, 1)');
        $this->db->order_by('deviceid, CONVERT(VARCHAR(2), DataDateTime, 1)');
		$sql_result = $this->db->get();

        return $sql_result->result_array();
    }

    public function getRealMonM($customerid, $deviceid, $limit=15){
        $this->db->select('createdat, timestamp, power');
        $this->db->from('mon.MUsageLog');
        $this->db->where('deviceid', $deviceid);
        $this->db->where('ownerid', $customerid);
        $this->db->order_by('timestamp', 'desc');
        $this->db->limit($limit);
        $sql_result = $this->db->get();
        return $sql_result->result_array();
    }
    
    public function getRealMonS($customerid, $deviceid, $limit=15){
        $this->db->select('createdat, timestamp, PowerConsumed as power, PowerGenerated');
        $this->db->from('mon.MonitoringData');
        $this->db->where('ProjectId', $deviceid);
        $this->db->order_by('timestamp', 'desc');
        $this->db->limit($limit);
        $sql_result = $this->db->get();
        return $sql_result->result_array();
    }

    public function getAdminProfile($userloginid){
        $this->db->select('userloginid
        ,displayname
        ,email
        ,lastlogindate
        ,createdby
        ,createdat');
        $this->db->from('dbo.UserLogin');
        $this->db->where('userloginid', $userloginid);
        
        $sql_result = $this->db->get();
        log_message('debug', "last query: ".$this->db->last_query());
        return $sql_result->result_array();
    }
}