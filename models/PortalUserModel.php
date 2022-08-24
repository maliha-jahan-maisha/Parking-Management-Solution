<?php
require 'models/DBModel.php';
require 'models/EmployeeModel.php';
require 'models/AccountModel.php';
class PortalUserModel extends DBModel{

    public $username;
    public $email;
    public $nid;
    public $address;
    public $phone;
    public $pin;
    public $carno;
    public $model;
    public $reward;
    public $objAccountModel;
    public $objEmployeeModel;
    public $statusCode;
    public $statusMsg;

    public function loginPortalUser($phone, $pin){
        $this->createDBConnection();
        $result = $this->dbConnection->query("select * from users where phone='$phone' AND pin='$pin'");
       
        if($result->num_rows>0)
        { 
          $data = $result->fetch_assoc();
          $this->username  = $data['username'];
          $this->phone  = $data['phone'];
          $this->email  = $data['email'];
          $this->statusCode = "200";
          $this->statusMsg = "Success";
         }
        else
        {
            $this->statusCode = "400";
            $this->statusMsg = "Username or password wrong try again & again! ";
        }
    }

    public function getUserProfile($phone){
        $this->createDBConnection();
        $this->objAccountModel = new AccountModel();
        $sql="SELECT users.username,account.accno,account.rewards,account.balance,account.acctype,account.phone,users.carno,users.model,users.address,account.date,users.nid 
                from users,account where account.phone='$phone' and account.phone=users.phone";
        $result= mysqli_query($this->dbConnection,$sql);
        if (mysqli_num_rows($result)!=0){
            while ($row=mysqli_fetch_array($result))
            {
                $this->username=$row[0]; 
                $this->carno=$row[6];
                $this->model=$row[7];
                $this->address=$row[8];
                $this->nid=$row[10];
                $this->objAccountModel->accno=$row[1];
                $this->objAccountModel->rewards=$row[2];
                $this->objAccountModel->balance=$row[3];
                $this->objAccountModel->acctype=$row[4];
                $this->objAccountModel->phone=$row[5];
                $this->objAccountModel->date=$row[9];
            }
        }    
    }

    public function addPortalUser(){
        $this->createDBConnection();
        if (!$this->dbConnection->query("insert into users (username,email,nid,address,phone,pin,carno,model) 
        values ('$this->username','$this->email','$this->nid','$this->address','$this->phone','$this->pin','$this->carno','$this->model')")) {
            $this->statusCode = "400";
            $this->statusMsg = "Failed. Error is:".$this->dbConnection->error.""; 
        }
        else{
            $accno = $this->objAccountModel->accno;
            $rewards = $this->objAccountModel->rewards;
            $balance = $this->objAccountModel->balance;
            $acctype = $this->objAccountModel->acctype;
            $phone = $this->objAccountModel->phone;
            $this->dbConnection->query("insert into account (accno,rewards,balance,acctype,phone) 
            values ('$accno','$rewards','$balance','$acctype','$phone')");
            $this->statusCode = "200";
            $this->statusMsg = "Thank you! Request Pending for the Admin Validation";
        }
    }

    

    public function deleteUser($phone){
        $this->createDBConnection();
        if ($this->dbConnection->query("DELETE from users where phone = '$_GET[delete]'"))
        {
            $this->dbConnection->query("DELETE from account where phone = '$_GET[delete]'");
        }
    }
    

   

    public function getAllAccountInfo(){
        $this->createDBConnection();
        $array = $this->dbConnection->query("SELECT * from users,account where users.phone = account.phone");
    }

    public function getAccountInfo($accno){
        $this->createDBConnection();
        $this->objAccountModel = new AccountModel();
        $result = $this->dbConnection->query("select * from account where  account.accno = '$accno'");
        if($result->num_rows>0)
        { 
            $data = $result->fetch_assoc();
            $this->objAccountModel->accno=$data['accno'];
            $this->objAccountModel->rewards=$data['rewards'];
            $this->objAccountModel->balance=$data['balance'];
            $this->objAccountModel->acctype=$data['acctype'];
            $this->objAccountModel->phone=$data['phone'];
            // $this->objAccountModel->date=$data['username'];
        }
    }

    public function addReward($accno, $amount){
        $this->createDBConnection();
        $this->getAccountInfo($accno);
        $newReward = $this->objAccountModel->$rewards + $amount;      
        $result=$this->dbConnection->query("update account set rewards= $newReward where accno='$accno'");
    }


    public function editPassword($phone){
        $this->createDBConnection();
        $pass = $this->dbConnection->query("SELECT pin from users where phone='$phone'");
        if($pass->num_rows>0)
        {
        $data = $pass->fetch_assoc();
        $this->pin  = $data['pin'];    
        }

        }
        public function changePassword($phone,$npass){
            $this->createDBConnection();
            $pass = $this->dbConnection->query("UPDATE users set pin='$npass' where phone='$phone'");
        }

        public function logComplaint($accno,$message){
            $this->createDBConnection();
            $report = $this->dbConnection->query("insert into report (message,accno) values ('$message','$accno')");
        }


    public function employeeLogin($empid, $pin){
        $this->createDBConnection();
        $this->objEmployeeModel=new EmployeeModel();
        $result = $this->dbConnection->query("SELECT * from employee where empid='$empid' AND pin='$pin'");
        if($result->num_rows>0)
        {
            $data = $result->fetch_assoc();
            $this->objEmployeeModel->username = $data['username'];
            $this->objEmployeeModel->empid = $data['empid'];
            $this->objEmployeeModel->statusCode = "200";
            $this->objEmployeeModel->statusMsg = "Success";
        }
        else
        {
            $this->objEmployeeModel->statusCode = "400";
            $this->objEmployeeModel->statusMsg = "Username or password wrong try again & again! ";
        }
    
    }



 
}
?>