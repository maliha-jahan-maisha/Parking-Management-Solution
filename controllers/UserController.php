<?php
require 'models/PortalUserModel.php';


class UserController {
    public $objPortalUser;
    public $statusCode;
    public $statusMsg;
   
    public function getPortalUserProfileInfo($phone){
        $this->objPortalUser = new PortalUserModel();
        $this->objPortalUser->getUserProfile($phone);
    }

    public function getAccountInfo($accno){
        $this->objPortalUser = new PortalUserModel();
        $this->objPortalUser->getAccountInfo($accno);
    }

    public function addRewards($accno, $amount){
        $this->objPortalUser = new PortalUserModel();
        $this->objPortalUser->addReward($accno, $amount);
    }

    public function portalUserLogin($phone,$pin){
        $this->objPortalUser = new PortalUserModel();
        $this->objPortalUser->loginPortalUser($phone,$pin);
    }

    public function employeeLogin($empid, $pin){
        $this->objPortalUser = new PortalUserModel();
        $this->objPortalUser->employeeLogin($empid, $pin);
    }
    public function passUpdate($phone){
        $this->objPortalUser = new PortalUserModel();
        $this->objPortalUser->editPassword($phone);

        
    }
    public function passChange($phone,$npass){
        $this->objPortalUser = new PortalUserModel();
        $this->objPortalUser->changePassword($phone,$npass);

        
    }
    public function userComplaint($accno,$message){
        $this->objPortalUser = new PortalUserModel();
        $this->objPortalUser->logComplaint($accno,$message);

        
    }
    public function history($accno,$message){
        $this->objPortalUser = new PortalUserModel();
        $this->objPortalUser->showHistory($accno,$message);

        
    }



    public function newUserRegistration($username,$email,$nid,$address,$phone,$pin,$carno,$model,$accno,$rewards,$balance,$acctype){
        $this->objPortalUser = new PortalUserModel();
        $this->objPortalUser->username = $username;
        $this->objPortalUser->email = $email;
        $this->objPortalUser->nid = $nid;
        $this->objPortalUser->address = $address;
        $this->objPortalUser->phone = $phone;
        $this->objPortalUser->pin = $pin;
        $this->objPortalUser->carno = $carno;
        $this->objPortalUser->model = $model;
        $this->objPortalUser->objAccountModel = new AccountModel();
        $this->objPortalUser->objAccountModel->accno = $accno;
        $this->objPortalUser->objAccountModel->rewards = $rewards;
        $this->objPortalUser->objAccountModel->balance = $balance;
        $this->objPortalUser->objAccountModel->acctype = $acctype;
        $this->objPortalUser->objAccountModel->phone = $phone;

        $this->objPortalUser->addPortalUser();
    }

    public function removingUser($phone){
        $this->objPortalUser = new PortalUserModel();
        $this->objPortalUser->deleteUser($phone);
    }
   

}
?>