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

  <?php require 'controllers/UserController.php'; 
  $phoneNo = $_SESSION['phone'];
  $objUserController = new UserController();
  $objUserController->getPortalUserProfileInfo($phoneNo);
  ?>

</head>
<body style="background:#9ABDEF;background-size: 100%">
<?php include 'header.php'; ?>
<br><br><br><br><br><br>
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
      <th scope="col"><?php echo $objUserController->objPortalUser->objAccountModel->accno ?></th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row">Name</th>
      <td><?php echo $objUserController->objPortalUser->username ?></td>
    </tr>
    
    <tr>
      <th scope="row">Balance</th>
      <td><?php echo $objUserController->objPortalUser->objAccountModel->balance ?></td>
    </tr>
    <tr>
      <th scope="row">Car Type</th>
      <td><?php echo $objUserController->objPortalUser->objAccountModel->acctype ?></td>
    </tr>
    <tr>
      <th scope="row">Phone Number</th>
      <td><?php echo $objUserController->objPortalUser->objAccountModel->phone ?></td>
    </tr>    <tr>
      <th scope="row">Car Number</th>
      <td><?php echo $objUserController->objPortalUser->carno ?></td>
    </tr>
    <tr>
      <th scope="row">Car Model</th>
      <td><?php echo $objUserController->objPortalUser->model ?></td>
    </tr>
    <tr>
      <th scope="row">Address</th>
      <td><?php echo $objUserController->objPortalUser->address ?></td>
    </tr>
    <tr>
      <th scope="row">Rewards.</th>
      <td><?php echo $objUserController->objPortalUser->objAccountModel->rewards ?></td>
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