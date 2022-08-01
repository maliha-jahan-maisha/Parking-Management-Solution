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
 <a class="navbar-brand" href="login.php">
 <?php echo 'জায়গা আছে?'; ?> 
  </a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item ">
        <a class="nav-link " href="mindex.php">Home <span class="sr-only">(current)</span></a>

</nav><br><br><br><br><br><br>

<?php
if (isset($_POST['saveAccount']))
{
  $con = mysqli_connect('localhost','root','','mybank');
  if (!$con->query("insert into users (username,email,nid,address,phone,pin,carno,model) values ('$_POST[name]','$_POST[email]','$_POST[nid]','$_POST[address]','$_POST[phone]','$_POST[pin]','$_POST[carno]','$_POST[model]')")) {
    echo "<div claass='alert alert-success'>Failed. Error is:".$con->error."</div>";
  }
  else{
    $con->query("insert into account (accno,rewards,balance,acctype,phone) values ('$_POST[accno]','$_POST[rewards]','$_POST[balance]','$_POST[acctype]','$_POST[phone]')");
    echo "<div class='alert alert-info text-center'>Thank you! Request Pending for the Admin Validation</div>";
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
   New Account Form
  </div>
  <div class="card-body bg-dark text-white">
    <table class="table">
      <tbody>
        <tr>
          <form method="POST">
          <th>Name</th>
          <td><input type="text" name="name" class="form-control input-sm" required></td>
          <th>NID</th>
          <td><input type="number" name="nid" class="form-control input-sm" required></td>
        </tr>
        <tr>
          <th>Account Number</th>
          <td><input type="" name="accno" readonly value="<?php echo time() ?>" class="form-control input-sm" required></td>
          <th>Vehicle Type</th>
          <td>
            <select class="form-control input-sm" name="acctype" required>
              <option value selected ></option>
              <option value="sedan" selected>Sedan</option>
              <option value="suv" selected>SUV</option>
              <option value="micro" selected>Microbus</option>
              <option value="bike" selected>Bike</option>
            </select>
          </td>
        </tr>
        <tr>
          <th>Phone Number</th>
          <td><input type="text" name="phone" class="form-control input-sm" required></td>
          <th>Address</th>
          <td><input type="text" name="address" class="form-control input-sm" required></td>
        </tr>
        <tr>
          <th>Email</th>
          <td><input type="email" name="email" class="form-control input-sm" required></td>
          <th>PIN</th>
          <td><input type="password" name="pin" class="form-control input-sm" required></td>
        </tr>
        <tr>
          <th>Lisence Number</th>
          <td><input type="text" name="rewards" min="0" class="form-control input-sm" required></td>
          <th>Date Of Birth</th>
          <td><input type="date" name="balance"  min="0" class="form-control input-sm" required></td>
        </tr>
        <tr>
          <th>Car Number</th>
          <td><input type="text" name="carno" min="0" class="form-control input-sm" required></td>
          <th>Car Model</th>
          <td><input type="text" name="model"  min="0" class="form-control input-sm" required></td>
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


