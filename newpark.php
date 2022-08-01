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
        <a class="nav-link " href="mindex.php">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item ">  <a class="nav-link" href="maddnew.php">Add New Parking</a></li>
      <li class="nav-item ">  <a class="nav-link" href="mfeedback.php">See Reports</a></li>
</nav><br><br><br><br><br><br>

<?php
if (isset($_POST['saveAccount']))
{
  $con = mysqli_connect('localhost','root','','mybank');
  if (!$con->query("insert into parking (location,address,rate,Pstatus,glink,type) values ('$_POST[name]','$_POST[add]','$_POST[rate]','$_POST[stat]','$_POST[link]','$_POST[type]')")) {
    echo "<div claass='alert alert-success'>Failed. Error is:".$con->error."</div>";
  }
}
if (isset($_GET['del']) && !empty($_GET['del']))
{
  $con->query("delete from login where id ='$_GET[del]'");
}
?>

<div class="container">
<div class="card w-100 text-center shadowBlue">
  <div class="card-header">
   New Parking Slot Details
  </div>
  <div class="card-body bg-dark text-white">
    <table class="table">
      <tbody>
        <tr>
          <form method="POST">
          <th>Location</th>
          <td><input type="text" name="name" class="form-control input-sm" required></td>
          <th>Address</th>
          <td><input type="text" name="add" class="form-control input-sm" required></td>
        </tr>

        <tr>
          <th>Status</th>
          <td><input type="text" name="stat" min="0" class="form-control input-sm" required></td>
          <th>Rate</th>
          <td><input type="text" name="rate"  min="0" class="form-control input-sm" required></td>
        </tr>
        <tr>
          <th>Map Link</th>
          <td><input type="text" name="link" min="0" class="form-control input-sm" required></td>
          <th>Type</th>
          <td><input type="text" name="type"  min="0" class="form-control input-sm" required></td>
        </tr>
        <tr>

          </td>
        </tr>
        <tr>
          <td colspan="4">
            <button type="submit" name="saveAccount" class="btn btn-primary btn-sm">Save Account</button>
            <button type="Reset" class="btn btn-secondary btn-sm">Reset</button></form>
          </td>
        </tr>
      </tbody>
    </table>
    

  </div>
  <div class="card-footer text-muted">
  <?php echo 'জায়গা আছে?'; ?>
  </div>
</div>


