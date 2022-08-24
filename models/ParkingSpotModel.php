<?php
require 'models/ParkingDBModel.php';
require 'models/ParkingModel.php';
require 'models/BookingModel.php';


class ParkingSpotModel extends ParkingDBModel{
    public $objParkingModel;
    public $objBookingModel;
    public $locationWiseParking;
    public $statusCode;
    public $statusMsg;

    public function getNearbyLocation($location){
        $this->createDBConnection();  
        switch ($location) {
            case "Dhanmondi":
                $array = $this->dbConnection->query("SELECT * from parking where location='Dhanmondi'or location='Kalabagan'or location='Kathalbagan' or location='Mohammadpur' or location='Newmarket' or location='Elephanroad'or location='Lalmatia' or location='Farmgate' or location='Adabor'");
                break;
            case "Gulshan":
                $array = $this->dbConnection->query("SELECT * from parking where location='Gulshan'or location='Aftabnagar' or location='Banani' or location='Nikunja' or location='Baridhara'");
                break;
            case "Mirpur":
                $array = $this->dbConnection->query("SELECT * from parking where location='Mirpur'or location='Mirpur 1' or location='Gabtoli' or location='Kallyanpur'");
                break;
            case "Motijheel":
                $array = $this->dbConnection->query("SELECT * from parking where location='Motijheel'or location='Kamlapur' or location='Shantinagar'");
                break;
            case "Ramna":
                $array = $this->dbConnection->query("SELECT * from parking where location='Ramna'or location='Mogbazar'");
                break;
            case "Uttara":
                $array = $this->dbConnection->query("SELECT * from parking where location='Uttara'or location='Airport'");
                break;
            default:
              echo "Your favorite color is neither red, blue, nor green!";
        }

        $locationWiseParking = array();
        $index = 0;
        while($row = $array->fetch_assoc())
        {
            // echo json_encode($row);
            $this->locationWiseParking[$index] = new ParkingModel();
            $this->locationWiseParking[$index]->slotno = $row['slotno'];
            $this->locationWiseParking[$index]->location = $row['location'];
            $this->locationWiseParking[$index]->address = $row['address'];
            $this->locationWiseParking[$index]->rate = $row['rate'];
            $this->locationWiseParking[$index]->Pstatus = $row['Pstatus'];
            $this->locationWiseParking[$index]->glink = $row['glink'];
            $this->locationWiseParking[$index]->type = $row['type'];
            // echo ($index);
            $index++;
        }
       return  $this->locationWiseParking;
    }

    public function addParkingSlot(){
        $this->createDBConnection();
        if (!$this->dbConnection->query("insert into parking (slotno,location,address,rate,Pstatus,glink,type) 
        values ('$this->slotno','$this->location','$this->address','$this->rate','$this->Pstatus','$this->glink','$this->type','$this->slotno')")) {
            $this->statusCode = "400";
            $this->statusMsg = "Failed. Error is:".$this->dbConnection->error.""; 
        }
        else{
            $this->statusCode = "200";
            $this->statusMsg = "Thank you! New Parking Slot added.";
        }
    }
    public function bookingDone($type){
        $this->createDBConnection(); 
        $result = $this->dbConnection->query("insert into booking (type) values ($type)");

    }
    public function bookingUpdateDone($slot,$hour){
        $this->createDBConnection(); 
        $result = $this->dbConnection->query("SELECT * from booking where id=(select max(id) from booking");
        
        $up = $this->dbConnection->query("update booking set slotno='$slot' where id=(select max(id) from booking)");
        $up1 = $this->dbConnection->query("update booking set btime='$hour' where id=(select max(id) from booking)");
        $up2 = $this->dbConnection->query("update parking set Pstatus='N' where slotno='$_POST[slot]'");

    
  
        
    }
}
?>