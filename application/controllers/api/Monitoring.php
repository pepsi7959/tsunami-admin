<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Monitoring extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model("m_user");
        $this->load->model("m_device");
        $this->load->model("m_monitoring");
    }

    public function monitoringByYear($ownerId="2052", $year="2018"){
        $data = [];
        // $data = array(
        //     array(
        //         "name"=> 'device1',
        //         "data"=> [49.9, 71.5, 106.4, 129.2, 144.0, 176.0, 135.6, 148.5, 216.4, 194.1, 95.6, 54.4]),
        //         array(
        //         "name" => 'device2',
        //         "data" => [83.6, 78.8, 98.5, 93.4, 106.0, 84.5, 105.0, 104.3, 91.2, 83.5, 106.6, 92.3]),
        //         array(
        //         "name" => 'device3',
        //         "data" => [48.9, 38.8, 39.3, 41.4, 47.0, 48.3, 59.0, 59.6, 52.4, 65.2, 59.3, 51.2]),
        //         array(
        //         "name" => 'device4',
        //         "data" => [42.4, 33.2, 34.5, 39.7, 52.6, 75.5, 57.4, 60.4, 47.6, 39.1, 46.8, 51.1])
        // );
        
        // $ownerId = "2052";
        // $year = "2018";
        $devList = $this->m_device->getDevices($ownerId);
  
        if ( $devList != NULL ) {
            foreach ($devList as $dev) {
                $energyPerDay = $this->m_monitoring->getEnergyConsumptionPerYear($dev['deviceid'], $year);
                $elist = [];
                foreach ( $energyPerDay as $e ) {
                    array_push($elist, $e['powerconsumed']);
                }
                array_push($data,
                    array(
                        "name" => $dev["devicename"],
                        "data" => $elist
                    )
                );
            }
        }else{
            log_message('error', "no devices found for ownerid: ".$ownerId);
        }

        responseSuccess($this, $data);
    }

    public function monitoringByMonth($ownerId, $year, $month){
        $data = [];
        // $data = array(
        //     array(
        //         "name"=> 'device1',
        //         "data"=> [49.9, 71.5, 106.4, 129.2, 144.0, 176.0, 135.6, 148.5, 216.4, 194.1, 95.6,49.9, 71.5, 106.4, 129.2, 144.0, 176.0, 54.4,49.9, 71.5, 106.4, 129.2, 144.0, 176.0, 135.6, 148.5, 216.4, 194.1, 95.6, 54.4]),
        //         array(
        //         "name" => 'device2',
        //         "data" => [83.6, 78.8, 98.5, 93.4, 106.0, 84.5, 105.0, 104.3, 91.2, 83.5, 106.6, 92.3,83.6, 78.8, 98.5, 93.4, 106.0, 84.5, 105.0, 104.3, 91.2, 83.5, 106.6, 92.3]),
        //         array(
        //         "name" => 'device3',
        //         "data" => [48.9, 38.8, 39.3, 41.4, 47.0, 48.3, 59.0, 59.6, 52.4, 65.2, 59.3, 51.2]),
        //         array(
        //         "name" => 'device4',
        //         "data" => [42.4, 33.2, 34.5, 39.7, 52.6, 75.5, 57.4, 60.4, 47.6, 39.1, 46.8, 51.1])
        // );

        // $ownerId = "2052";
        // $year = "2018";
        // $month = "01";
        $devList = $this->m_device->getDevices($ownerId);
  
        if ( $devList != NULL ) {
            foreach ($devList as $dev) {
                $energyPerDay = $this->m_monitoring->getEnergyConsumptionPerMonth($dev['deviceid'], $year, $month);
                $elist = [];
                foreach ( $energyPerDay as $e ) {
                    array_push($elist, $e['powerconsumed']);
                }
                array_push($data,
                    array(
                        "name" => $dev["devicename"],
                        "data" => $elist
                    )
                );
            }
        }else{
            log_message('error', "no devices found for ownerid: ".$ownerId);
        }
        
        responseSuccess($this, $data);
    }

    public function monitoringByDay($ownerId, $year, $month, $day) {
        $data = [];
        // $data = array(
        //     array(
        //         "name"=> 'device1',
        //         "data"=> [49.9, 71.5, 106.4, 129.2, 144.0, 176.0, 135.6, 148.5, 216.4, 194.1, 95.6, 54.4]),
        //         array(
        //         "name" => 'device2',
        //         "data" => [83.6, 78.8, 98.5, 93.4, 106.0, 84.5, 105.0, 104.3, 91.2, 83.5, 106.6, 92.3]),
        //         array(
        //         "name" => 'device3',
        //         "data" => [48.9, 38.8, 39.3, 41.4, 47.0, 48.3, 59.0, 59.6, 52.4, 65.2, 59.3, 51.2]),
        //         array(
        //         "name" => 'device4',
        //         "data" => [42.4, 33.2, 34.5, 39.7, 52.6, 75.5, 57.4, 60.4, 47.6, 39.1, 46.8, 51.1])
        // );
        //$ownerId = "2052";
        // $year = "2018";
        // $month = "01";
        // $day = 01;
        $devList = $this->m_device->getDevices($ownerId);
        
        if ( $devList != NULL ) {
            foreach ($devList as $dev) {
                $energyPerDay = $this->m_monitoring->getEnergyConsumptionPerDay($dev['deviceid'], $year, $month, $day);
                $elist = [];
                foreach ( $energyPerDay as $e ) {
                    array_push($elist, $e['powerconsumed']);
                }
                array_push($data,
                    array(
                        "name" => $dev["devicename"],
                        "data" => $elist
                    )
                );
            }
        }else{
            log_message('error', "no devices found for ownerid: ".$ownerId);
        }

        responseSuccess($this, $data);
    }

    public function  realMonM($customerid, $deviceid){
        $rows = $this->m_user->getRealMonM($customerid, $deviceid);
        if( isset($rows) ){
            $data = "Time,$deviceid\n";
            $rrows = array_reverse($rows);
            log_message('info', print_r($rrows, true));
            foreach($rrows as $row){
                $data .= $row['timestamp'].','.$row['power']."\n";
            }
           // $data = "Time, Value\n2019-03-29T04:57:23.433Z,-0.5509424688413294\n2019-03-29T04:57:24.433Z,-0.044796701157812535\n2019-03-29T04:57:25.433Z,-2.0546350809976577\n2019-03-29T04:57:26.433Z,2.8984526924698595\n2019-03-29T04:57:27.433Z,-4.010719476454955\n2019-03-29T04:57:28.433Z,1.338181283855";
            echo $data;
        }else{
            echo "";
        }
    }

    public function  realMonS($customerid, $deviceid){
        $rows = $this->m_user->getRealMonS($customerid, $deviceid);
        if( isset($rows) ){
            $data = "Time,PowerConsumed,PowerGenerated\n";
            $rrows = array_reverse($rows);
            log_message('info', print_r($rrows, true));
            foreach($rrows as $row){
                $data .= $row['timestamp'].','.$row['power'].','.$row['PowerGenerated']."\n";
            }
           // $data = "Time, Value\n2019-03-29T04:57:23.433Z,-0.5509424688413294\n2019-03-29T04:57:24.433Z,-0.044796701157812535\n2019-03-29T04:57:25.433Z,-2.0546350809976577\n2019-03-29T04:57:26.433Z,2.8984526924698595\n2019-03-29T04:57:27.433Z,-4.010719476454955\n2019-03-29T04:57:28.433Z,1.338181283855";
            echo $data;
        }else{
            echo "";
        }
    }
    
}