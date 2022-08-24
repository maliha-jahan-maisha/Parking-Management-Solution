<!DOCTYPE html>
<html>
<head>
  <title>Banking</title>
  <?php require 'assets/autoloader.php'; ?>
  <?php require 'assets/db.php'; ?>
  <?php require 'assets/function.php'; ?>
  <?php require 'controllers/UserController.php'; ?>
</head>
<body style="background:#9ABDEF;background-size: 100%">
<?php include 'mheader.php'; ?>
<br><br><br><br><br><br>

<?php
if (isset($_POST['save'])){
  // { slotno,location,address,rate,Pstatus,glink,type
    $slotno= $_POST['Slot No.'];
    $address= $_POST['Address'];
    $location = $_POST['Location'];
    $rate = $_POST['Rate'];
    $Pstatus = $_POST['Status'];
    $glink = $_POST['Map Link'];
    $type = $_POST['Type'];
  
    $objParkingController = new ParkingController();
    $objParkingController->newRegisterParkingSlot(slotno,location,address,rate,Pstatus,glink,type);
    // $con = mysqli_connect('localhost','root','','mybank');
  
    if($objParkingController->objParkingSpot->statusCode == "200")
        {
          $msg = $objParkingController->objParkingSpot->statusMsg;
          echo "<div class='alert alert-info text-center'>Success </div>";
        } 
    else {
          $errmsg = $objUserController->objPortalUser->statusMsg;
          echo "<div claass='alert alert-success'>Failed. Error is:".'$errmsg'."</div>";
        }
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


