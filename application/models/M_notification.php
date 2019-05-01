<?php
/**
 * M_notification Class
 *
 * 
 *
 * @package		Mseries
 * @subpackage	Notification
 * @category	API
 * @author		Narongsak Mala<narongsak.mala@gmail.com>
 * @link		
 */
defined('BASEPATH') OR exit('No direct script access allowed');

class M_notification extends CI_Model{

    private $TBL_EVENT_SCHEDULE = 'dbo.EventSchedule';
    private $TBL_MESSAGE_LOG = 'dbo.MessageLog';

    function __construct() {
        parent::__construct();
        $this->load->database('tsunami');
    }

    public function getSchedule( $scheduleId=NULL, $isactive=NULL ){
        $this->db->select(
        'scheduleid
        ,deviceid
        ,isactive
        ,actiontime
        ,actionstatus
        ,monrepeat
        ,tuerepeat
        ,wenrepeat
        ,thurepeat
        ,frirepeat
        ,satrepeat
        ,sunrepeat
        ,isrepeat');

        if( $scheduleId != NULL ){
            $this->db->where('scheduleid', $scheduleId);
        }

        if( $isactive != NULL ){
            $this->db->where('isactive', $isactive);
        }
        
        $this->db->from($this->TBL_EVENT_SCHEDULE);
        $query = $this->db->get();
        if( $scheduleId != NULL ){
            $result = $query->row_array();
        }else{
            $result = $query->result_array();
        }
        return $result;
    }

    public function getTokenBySchedule($scheduleId){
        $this->db->select('dbo.EventSchedule.actionstatus, dbo.MDeviceProfile.ownerid, dbo.MDeviceProfile.deviceid, dbo.MDeviceProfile.devicename,dbo.MDeviceProfile.ownerid, dbo.NotificationToken.tokenid');
        $this->db->where('dbo.EventSchedule.scheduleId', $scheduleId);
        $this->db->from('dbo.EventSchedule');
        $this->db->join('dbo.MDeviceProfile', 'dbo.MDeviceProfile.DeviceId = dbo.EventSchedule.DeviceId', 'left');
        $this->db->join('dbo.NotificationToken', 'dbo.NotificationToken.OwnerId = dbo.MDeviceProfile.OwnerId', 'left');
        $query = $this->db->get();
        if( isset($query) ){
            $result = $query->result_array();
        }else{
            $result = NULL;
        }
        return $result;
    }

    public function getHistory($limit=100){
    //   SELECT TOP (100) [MessageId]
    //   ,[Title]
    //   ,[MessageType]
    //   ,[Message]
    //   ,[Status]
    //   ,[CreatedBy]
    //   ,[CreatedAt]
    //   FROM [dbo].[MessageLog]
        $this->db->select("messageid, title, messagetype, message, status, createdby, createdat");
        $this->db->from($this->TBL_MESSAGE_LOG);
        $this->db->limit($limit);
        $q = $this->db->get();
        return $q->result_array();
    }

    public function insertHistory( $msg ) {
        $sql = "INSERT INTO ".$this->TBL_MESSAGE_LOG."(title, message, messagetype, createdby, status)".
        'values(N'.$this->db->escape($msg['title']).
        ',N'.$this->db->escape($msg['message']).
        ','.$this->db->escape($msg['messagetype']).
        ',N'.$this->db->escape($msg['createdby']).
        ','.$msg['status'].
        ')';
        $row_affected = $this->db->query($sql);
        //$row_affected = $this->db->insert($this->TBL_MESSAGE_LOG, $msg);
        return ($row_affected == 1)?true:false;
    }
}