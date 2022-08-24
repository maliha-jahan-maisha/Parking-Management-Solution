<?php
require 'models/ParkingSpotModel.php';


class ParkingController {
    public $objParkingSpotModel;
    public $statusCode;
    public $statusMsg;

    public function findNearbyLocatrion($location){
        $locations = array();
        $this->objParkingSpotModel = new ParkingSpotModel();
        $locations = $this->objParkingSpotModel->getNearbyLocation($location);
       // echo  json_encode ($locations);
        //echo  json_decode ($locations);
        return $locations;

    }

    public function newRegisterParkingSlot($slotno,$location,$address,$rate,$Pstatus,$glink,$type){
        $this->objParkingSpot = new ParkingSpotModel();
        $this->objParkingSpot->slotno=$slotno;
        $this->objParkingSpot->location=$location;
        $this->objParkingSpot->address=$address;
        $this->objParkingSpot->rate = $rate;
        $this->objParkingSpot->Pstatus = $Pstatus;
        $this->objParkingSpot->glink= $glink;
        $this->objParkingSpot->type= $type;
        $this->objParkingSpot->addParkingSlot();        
    }
    public function booking($type){
        $this->objParkingSpotModel = new ParkingSpotModel();
        $this->objParkingSpotModel -> bookingDone($type);
    }
    public function bookingUpdate($slot,$hour){
        $this->objParkingSpotModel=new ParkingSpotModel();
        $this->objParkingSpotModel->bookingUpdateDone($slot,$hour);
    }
}
?>