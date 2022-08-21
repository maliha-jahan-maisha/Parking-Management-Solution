
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
  <div class="card  w-75 mx-auto">
  <div class="card-header text-center">
    Report 
  </div>
  <br>
  <div class="card-body">
      <form method="POST">
          <div class="alert alert-success w-50 mx-auto">
            <h5>Enter your message</h5>
            <textarea class="form-control" name="msg" required placeholder="Write your message"></textarea>
            <button type="submit" name="send" class="btn btn-primary btn-block btn-sm my-1">Send</button>
          </div>
      </form>
      
    <br>
  
    <?php
    if (isset($_POST['send']))
    {
      $con = mysqli_connect('localhost','root','','mybank');
      $acc="select accno from account where phone='$_SESSION[phone]'";
      $result=mysqli_query($con,$acc);
      $r=mysqli_fetch_array($result);
      if ($con->query("insert into report (message,accno) values ('$_POST[msg]','$r[accno]')")) {
        echo "<div class='alert alert-success'>Successfully send</div>";
      }else
      echo "<div class='alert alert-danger'>Not sent Error is:".$con->error."</div>";
    }
    
    ?>  
  </div>
  <div class="card-footer text-muted" style="text-align:center;">
  <?php echo 'জায়গা আছে?'; ?> 
  </div>
</div>

</div>
</body>
</html>