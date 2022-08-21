<?php
session_start();
if(!isset($_SESSION['phone'])){ header('location:login.php');}
?>
<!DOCTYPE html>
<html>
<head>
  <title>Banking</title>
  <?php require 'assets/autoloader.php'; ?>
  <?php require 'assets/db.php'; ?>
  <?php require 'assets/function.php'; ?>

</head>
<body style="background:#9ABDEF;background-size: 100%">
<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
 <a class="navbar-brand" href="#">
 <?php echo 'জায়গা আছে?'; ?> 
  </a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item ">
        <a class="nav-link active" href="index.php">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item ">  <a class="nav-link" href="accounts.php">Profile</a></li>
      <li class="nav-item ">  <a class="nav-link" href="statements.php">History</a></li>


    </ul>
    <?php include 'sideButton.php'; ?>
    
  </div>
    <?php
        require_once("db.php");

        $sql="SELECT users.username,account.accno,account.rewards,account.balance,account.acctype,account.phone,users.carno,users.model,users.address from users,account where account.phone=".$_SESSION['phone']." and account.phone=users.phone";

        $result= mysqli_query($conn,$sql);
        if (mysqli_num_rows($result)!=0){
            while ($row=mysqli_fetch_array($result)){
        $username=$row[0];     
        $accno=$row[1];
        $rewards=$row[2];
        $balance=$row[3];
        $acctype=$row[4];
        $phone=$row[5];
        $cano=$row[6];
        $model=$row[7];
        $add=$row[8];
            }
        }
        ?>

  </div>
</nav><br><br><br><br><br><br>
<div class="container">
  <div class="card  w-75 mx-auto">
  <div class="card-header text-center">
    Your Account Information
  </div>
  <br>
  <div class="card-body">
    <table class="table table-striped table-dark w-75 mx-auto">
  <thead>
    <tr>
      <td scope="col">Account No.</td>
      <th scope="col"><?php echo $accno; ?></th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row">Name</th>
      <td><?php echo $username; ?></td>
    </tr>
    <tr>
    <tr>
      <th scope="row">Lisence No.</th>
      <td><?php echo $rewards; ?></td>
    </tr>
    <tr>
      <th scope="row">Date Of Birth</th>
      <td><?php echo $balance; ?></td>
    </tr>
    <tr>
      <th scope="row">Car Type</th>
      <td><?php echo $acctype; ?></td>
    </tr>
    <tr>
      <th scope="row">Phone Number</th>
      <td><?php echo $phone; ?></td>
    </tr>    <tr>
      <th scope="row">Car Number</th>
      <td><?php echo $cano; ?></td>
    </tr>
    <tr>
      <th scope="row">Car Model</th>
      <td><?php echo $model; ?></td>
    </tr>
    <tr>
      <th scope="row">Address</th>
      <td><?php echo $add; ?></td>
    </tr>
    <tr>
      <th><a href="feedback.php" class='btn btn-primary btn-sm' data-toggle='tooltip' title="Log Your Complaints">Log Complaints</a></th>
      <td><a href="passchange.php" class='btn btn-info btn-sm' data-toggle='tooltip' title="Change Password">Change Password</a></td>
    </tr>
  </tbody>
</table>


<br>     
  </div>
  <div class="card-footer text-muted" style="text-align:center;">
  <?php echo 'জায়গা আছে?'; ?> 
  </div>
</div>

</div>
</body>
</html>