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
  <?php require 'controllers/UserController.php'; ?>

  <?php 
  
  if (isset($_GET['delete'])) 
  {
    $phoneNo = $_SESSION['phone'];
    $objUserController = new UserController();
    $objUserController-> removingUser($phoneNo);
    header("location:mindex.php");
  } ?>
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
      <li class="nav-item ">  <a class="nav-link" href="newpark.php">Add New Parking</a></li>
      <li class="nav-item ">  <a class="nav-link" href="mfeedback.php">See Reports</a></li>



    </ul>
    <?php include 'msideButton.php'; ?>
    
  </div>
</nav><br><br><br><br><br><br>
<div class="container">
<div class="card w-100 text-center shadowBlue">
<form action="msearch.php" method="post">
    <input type="text" name= "id" placeholder="Enter Account Number" 
    style="margin-left:60%; margin-top:10px; margin-bottom:10px; text_align:center; width: 280px;height: 50px;" />
    <button type="submit" name="search" value="search data" class="btn btn-outline-primary">Search</button>
  </form>
  <div class="input-group">

  </div>

  <div class="card-header">
    Accounts Information 
  </div>
  
  <div class="card-body">
   <table class="table table-bordered table-sm">
  <thead>
    <tr>
      <th scope="col">Slot no#</th>
      <th scope="col">User Name</th>
      <th scope="col">Account No.</th>
      <th scope="col">Rewards</th>
      <th scope="col">Date Of birth</th>
      <th scope="col">Car type</th>
      <th scope="col">Phone Number</th>
      <th scope="col">Car Number</th>
      <th scope="col">NID</th>
      <th scope="col"></th>
    </tr>
  </thead>
  <tbody>
    <?php
      $i=0;
      $con = mysqli_connect('localhost','root','','mybank');
      $array = $con->query("SELECT * from users,account where users.phone = account.phone");
      if ($array->num_rows > 0)
      {
        while ($row = $array->fetch_assoc())
        {$i++;
    ?>
      <tr>
        <th scope="row"><?php echo $i ?></th>
        <td><?php echo $row['username'] ?></td>
        <td><?php echo $row['accno'] ?></td>
        <td><?php echo $row['rewards'] ?></td>
        <td><?php echo $row['date'] ?></td>
        <td><?php echo $row['model'] ?></td>
        <td><?php echo $row['phone'] ?></td>
        <td><?php echo $row['carno'] ?></td>
        <td><?php echo $row['nid'] ?></td>
        <td>
          <a href="show.php?phone=<?php echo $row['phone'] ?>" class='btn btn-success btn-sm' data-toggle='tooltip' title="View More info">View</a>
          <a href="mindex.php?delete=<?php echo $row['phone'] ?>" class='btn btn-danger btn-sm' data-toggle='tooltip' title="Delete this account">Delete</a>
        </td>
        
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