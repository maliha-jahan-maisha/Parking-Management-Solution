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
  <div class="card  w-75 mx-auto">
  <div class="card-header text-center">
    Change your password
  </div>
  <div class="card-body">
      <form method="POST"><br>
          <div class="alert alert-success w-50 mx-auto" style='text-align:center;'>
            <input type="password" class="form-control" name="msg1" required placeholder="Type your old password"></textarea><br>
            <input type="password" class="form-control" name="msg2" required placeholder="Type your new password"></textarea><br>
            <input type ="password" class="form-control" name="msg3" required placeholder="Confirm new password"></textarea><br>
            <button type='submit' name='change' class='btn btn-primary btn-bloc btn-sm my-1'>CHANGE</button>
          </div>
      </form>      
    <br>

    <?php
    if (isset($_POST['change']))
    {
      $phoneNo = $_SESSION['phone'];
      $objUserController = new UserController();
      $objUserController-> passUpdate($phoneNo);
      $old_password=$_POST['msg1'];
      $new_password=$_POST['msg2'];
      $con_password=$_POST['msg3'];
      $data_pwd= $objUserController->objPortalUser->pin;  
      if($data_pwd==$old_password){
        if($new_password==$con_password){
          $phoneNo = $_SESSION['phone'];
          $objUserController = new UserController();
          $objUserController-> passChange($phoneNo,$new_password);
          echo "<script>alert('Updated Successfully');window.location.href='passchange.php'</script>";
        }
        else{
        echo "<script>alert('Passwords do not match');window.location.href='passchange.php'</script>";
        }
      }
      else{
        echo "<script>alert('Wrong Password');window.location.href='passchange.php'</script>";
      }
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
