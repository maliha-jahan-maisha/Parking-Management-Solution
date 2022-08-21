
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
    Can not find location? Search Information.
  </div>
<br>
<div class="container">
  <div class="card  w-75 mx-auto">
  <div class="card-body">
  <form action= "search.php" method="post">
          <div class="alert alert-success w-50 mx-auto" style="text-align:center;">
            <h5>Search Location</h5>
            <input type="text" name="loc" class="form-control " placeholder="Enter Location">
            <button type="submit" name="search" value="search data" class="btn btn-primary btn-bloc btn-sm my-1">Search</button>
          </div>
  </form>
  <div class="input-group">
  </div>
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