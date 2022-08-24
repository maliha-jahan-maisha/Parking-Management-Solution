
<?php
session_start();
if(!isset($_SESSION['phone'])){ header('location:index.php');}
?>
<!DOCTYPE html>
<html>
<head>
  <title>Banking</title>
  <?php require 'assets/autoloader.php'; ?>
  <?php require 'assets/db.php'; ?>
  <?php require 'assets/function.php'; ?>
  <?php require 'controllers/UserController.php'; ?>
  <?php require 'controllers/ParkingController.php'; ?>

</head>
<body style="background:#9ABDEF;background-size: 100%">
<?php include 'header.php'; ?>
<br><br><br><br><br><br>

<div class="container">
  <div class="card  w-75 mx-auto">
  <div class="card-body">
        <form method='POST'>
            <div class='alert alert-success w-50 mx-auto' style='text-align:center;'>
              <h5>Booking</h5>
                <div class='form-group'>
                  <label>Select Booking Type</label>
                  <select name='pmeth' class='form-control' required >
                      <option value selected ></option>
                      <option value='hourly'>Pay Hourly depending on your usage</option>
                      <option value='booked'>Pre book for specfic time</option>
                  </select>
               </div> 
              <button type='submit' name='pro' class='btn btn-primary btn-bloc btn-sm my-1'>Proceed</button>
            </div>
          </form>

      <?php if (isset($_POST['pro'])) 
      {
        $type=$_POST['pmeth'];
        $objParkingController = new ParkingController();
        $objParkingController->booking($type);
                  echo "<div class='alert alert-success w-50 mx-auto' style='text-align:center;'>
                  <form method='POST'>
                  <input type='number' name='slot' class='form-control' placeholder='Enter Slot No.' required><br/>
                  <input type='number' name='hours' class='form-control' placeholder='Enter hours to Book' required><br/> 
                  <button type='submit' name='book' class='btn btn-primary btn-bloc btn-sm my-1'>Book</button>
                  </form>
                </div>";
      } 
      ?>

<?php
      if (isset($_POST['book']))
      {
        $slot=$_POST['slot'];
        $hour=$_POST['hours'];
        


        $objParkingController = new ParkingController();

        $objParkingController->bookingUpdate($slot,$hour);      
        echo "<script>window.location.href='pay.php'</script>";
        }
  ?>

  </div>
</div>

  </div>
  <br><br>
  <div class="card-footer text-muted" style="text-align:center;">
  <?php echo 'জায়গা আছে?'; ?> 
  </div>
</div>

</div>
</body>
</html>