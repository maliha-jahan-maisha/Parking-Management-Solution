
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

</head>
<body style="background: url(images/bg2.png);background-size: 120%">
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
      <th scope="col">Slot number</th>
      <th scope="col">Area Name</th>
      <th scope="col">Address</th>
      <th scope="col">Map link</th>
    </tr>
  </thead>
  <tbody>
    <?php
      $i=0;
      $con = mysqli_connect('localhost','root','','mybank');
      $array = $con->query("SELECT * from parking where Pstatus='Y'");
      if ($array->num_rows > 0)
      {
        while ($row = $array->fetch_assoc())
        {$i++;
    ?>
      <tr>
      <td><?php echo $row['slotno'] ?></td>
        <td><?php echo $row['location'] ?></td>
        <td><?php echo $row['address'] ?></td>
        <td><p><a href=<?php echo $row['glink'] ?>><?php echo $row['location'] ?> <?php echo $row['slotno'] ?></a></p></td>
        
      </tr>
    <?php
        }
      }
     ?>
  </tbody>
</table>
<br>
  <div class="card-footer text-muted">
  <?php echo 'জায়গা আছে?'; ?> 
  </div>
</div>
</body>
</html>