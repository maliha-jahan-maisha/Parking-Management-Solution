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
  <?php require 'controllers/UserController.php'; 
  
  $phoneNo = $_GET['phone'];
  $objUserController = new UserController();
  $objUserController->getPortalUserProfileInfo($phoneNo);
  ?>


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
        <a class="nav-link active" href="mindex.php">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item ">  <a class="nav-link" href="newpark.php">Add New parking</a></li>
      <li class="nav-item ">  <a class="nav-link" href="mfeedback.php">See Reports</a></li>



    </ul>
    
  </div>
</nav><br><br><br><br><br><br>

<div class="container">
<div class="card w-100 text-center shadowBlue">
  <div class="card-header">
    Account profile for <?php echo $objUserController->objPortalUser->username; echo " <kbd>#";echo $objUserController->objPortalUser->objAccountModel->accno;echo "</kbd>"; ?>
  </div>
  <div class="card-body">
    <table class="table table-bordered">
      <tbody>
        <tr>
          <td>Name</td>
          <th><?php echo $objUserController->objPortalUser->username ?></th>
          <td>Account No</td>
          <th><?php echo $objUserController->objPortalUser->objAccountModel->accno ?></th>
        </tr><tr>
          <td>Rewards</td>
          <th><?php echo $objUserController->objPortalUser->objAccountModel->rewards ?></th>
          <td>Address</td>
          <th><?php echo $objUserController->objPortalUser->address ?></th>
        </tr><tr>
          <td>Phone Number</td>
          <th><?php echo $objUserController->objPortalUser->objAccountModel->phone ?></th>
          <td>Car Type</td>
          <th><?php echo $objUserController->objPortalUser->objAccountModel->acctype ?></th>
        </tr><tr>
          <td>Nid</td>
          <th><?php echo $objUserController->objPortalUser->nid ?></th>
          <td>Date of Birth</td>
          <th><?php echo $objUserController->objPortalUser->objAccountModel->date ?></th>
        
      </tbody>
    </table>
    <a href="rewards.php?accno=<?php echo $objUserController->objPortalUser->objAccountModel->accno ?>" class='btn btn-success btn-sm' data-toggle='tooltip' title="Add rewards">Add Rewards</a>
    <a href="mindex.php?delete=<?php echo $objUserController->objPortalUser->objAccountModel->phone ?>" class='btn btn-danger btn-sm' data-toggle='tooltip' title="Delete this account">Delete</a>
  </div>
  <div class="card-footer text-muted">
  <?php echo 'জায়গা আছে?'; ?> 
  </div>
</div>

</body>
</html>