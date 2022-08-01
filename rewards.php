<?php
session_start();
if(!isset($_SESSION['empid'])){ header('location:login.php');}
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
        <a class="nav-link " href="mindex.php">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item ">  <a class="nav-link" href="maddnew.php">Add New Account</a></li>
      <li class="nav-item ">  <a class="nav-link" href="mfeedback.php">See Reports</a></li>


    </ul>
    <?php include 'msideButton.php'; ?>
    
  </div>

  <?php 
  $con = mysqli_connect('localhost','root','','mybank');
  $array = $con->query("select * from account where  account.accno = '$_GET[accno]'");
  $row = $array->fetch_assoc();
  ?> 
</nav><br><br><br><br><br><br>
<div class="container">
  <div class="card  w-75 mx-auto">
  <div class="card-header text-center">
    Your Account Information
  </div>
  <div class="card-body">
    <table class="table table-striped table-dark w-75 mx-auto">
  <thead>
    <tr>
      <td scope="col">Account No.</td>
      <th scope="col"><?php echo $row['accno']; ?></th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row">Rewards</th>
      <td><?php echo $row['rewards']; ?></td>
    </tr>
  </tbody>
</table> 
</div>
<div class="container">
  <div class="card  w-75 mx-auto">
  <div class="card-body">
      <form method="POST">
          <div class="alert alert-success w-50 mx-auto" style="text-align:center;">
            <h5>Add Rewards</h5>
            <input type="number" name="amount" class="form-control " min="1" placeholder="Enter Amount of Rewards" required><br/>
            <button type="submit" name="add" class="btn btn-primary btn-bloc btn-sm my-1">ADD</button>
          </div>
      </form>
      <?php
      if (isset($_POST['add']))
      {
        $con = mysqli_connect('localhost','root','','mybank');
        $amount = $_POST['amount'];

        $acc="select rewards from account where accno='$_GET[accno]'";
        $balance = $row['rewards'] + $amount;      
        $result=mysqli_query($con,$acc);
        $r=mysqli_fetch_array($result);
        if ($con->query("update account set rewards= $balance where accno='$_GET[accno]'")) {
          echo "<script>alert('Successfully Added');window.location.href='mindex.php'</script>";
        } else
        echo "<div class='alert alert-danger'>Not Added Error is:".$con->error."</div>";
      }
    ?> 
</div>
</div>
  <div class="card-footer text-muted" style="text-align:center;">
  <?php echo 'জায়গা আছে?'; ?> 
  </div>
</div>

</div>
</body>
</html>