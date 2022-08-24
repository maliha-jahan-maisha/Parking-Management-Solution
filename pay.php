
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
</nav><br><br><br>

</nav><br><br><br><br><br><br>


<div class="container">
  <div class="card  w-75 mx-auto">
  <div class="card-header text-center">
Choose Payment Method
  </div>
  <br>
  <div class="card-body">
<br>
<div class="col">
    <div class="row" style="padding: 22px;padding-top: 0">
      <div class="col">
      <form method='POST'>
        <div class="card shadowBlack ">
          <img class="card-img-top" src="images/mobi.jpg" alt="Card image cap" style="max-height: 200px;min-height: 200px">
        <div class="card-body">
        <button type='submit' name='pro' class="btn btn-outline-success btn-block">Mobile Banking</a>
          </form>
          <?php if (isset($_POST['pro'])) 
      {
        echo "<script>alert('Successfully Payed');window.location.href='statements.php'</script>";
      } 
      ?> 

         </div>
        </div>
      </div>
      <div class="col">
        <div class="card shadowBlack ">
          <img class="card-img-top" src="images/bitlogo.png" alt="Card image cap" style="max-height: 200px;min-height: 200px">
        <div class="card-body">   
          <button type='submit' name='pro' class="btn btn-outline-success btn-block">Use Reward points</a>
          </form>
          <?php if (isset($_POST['pro'])) 
      {
        echo "<script>alert('Successfully Payed');window.location.href='statements.php'</script>";
      } 
      ?> 
         </div>
        </div>
      </div>
    </div>

<div class="container">

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