<?php 

class DBModel{
    private $server = "localhost";
    private $user = "root";
    private $pass = "";
    private $dbname = "mybank";
    public $dbConnection;

    function createDBConnection(){
        $this->dbConnection = new mysqli('localhost','root','','mybank');

        if($this->dbConnection->connect_error){
            die("Connection failed: ".$conn->connect_error);
        }
    }
}
?>