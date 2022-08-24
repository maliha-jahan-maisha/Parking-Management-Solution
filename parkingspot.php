
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
  <?php require 'controllers/ParkingController.php'; 

  $location = $_GET['spot'];
  $objParkingController = new ParkingController();
  $objlocationSpots = $objParkingController->findNearbyLocatrion($location);
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
        <a class="nav-link active" href="index.php">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item ">  <a class="nav-link" href="accounts.php">Profile</a></li>
      <li class="nav-item ">  <a class="nav-link" href="statements.php">History</a></li>


    </ul>
    <?php include 'sideButton.php'; ?>
    
  </div>
</nav><br><br><br><br><br><br>
<div class="container">
<div class="card w-100 text-center shadowBlue">

  <div class="card-header">
    Available Parking Spots
  </div>
  

  <div class="card-body">
   <table class="table table-bordered table-sm">
  <thead>
    <tr>
      <th scope="col">Slot no#</th>
      <th scope="col">Area Name</th>
      <th scope="col">Address</th>
      <th scope="col">Rate</th>
      <th scope="col">Status</th>
      <th scope="col">Map Link</th>
    </tr>
  </thead>
  <tbody>
  <?php
     foreach ($objlocationSpots as $value) {
    ?>
      <tr>
        
        <td><?php echo $value->slotno;?></td>
        <td><?php echo $value->location; ?></td>
        <td><?php echo $value->address; ?></td>
        <td>Tk.<?php echo $value->rate; ?></td>
        <td><?php echo $value->Pstatus; ?></td>
        
        <td><p><a href=<?php echo $value->glink;?>><?php echo $value->location; ?> <?php echo $value->slotno; ?></a></p></td>
        

        <td>
          <!-- <a href="gmap.php" class='btn btn-success btn-sm' data-toggle='tooltip' title="Search in map">Map</a> -->
          <a href="book.php" class='btn btn-danger btn-sm' data-toggle='tooltip' title="Proceed to booking">Book</a>
        </td>
        
      </tr>
    <?php
        }
     ?>
  </tbody>
  </table>
  <br>

</div>
</body>
</html>