<?php 

$server = "localhost";
$user = "root";
$pass = "";
$dbname = "mybank";

//creating connection
$conn = mysqli_connect($server, $user, $pass, $dbname);
define('bankName', 'EzCash');
//check connection
if($conn->connect_error){
    die("Connection failed: ".$conn->connect_error);
}


