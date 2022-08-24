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
  <?php if (isset($_GET['delete'])) 
  {
    if ($con->query("delete from users where phone = '$_GET[phone]'"))
    {
      header("location:mindex.php");
    }
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
      <li class="nav-item ">  <a class="nav-link" href="newpark.php">Add New parking</a></li>
      <li class="nav-item ">  <a class="nav-link" href="mfeedback.php">See Reports</a></li>

    </ul>
    <?php include 'msideButton.php'; ?>
    
  </div>
</nav><br><br><br><br><br><br>
<?php 
  $con = mysqli_connect('localhost','root','','mybank');
  $sql="select * from users,account where users.phone = account.phone and account.accno = $_POST[id]";
  if($t=mysqli_query($con, $sql)){
    if(mysqli_num_rows($t)>0){
      $row=mysqli_fetch_array($t);
    }
    else header("Location: mindex.php");
}  
 ?>
<div class="container">
<div class="card w-100 text-center shadowBlue">
  <div class="card-header">
    Account profile for <?php echo $row['username']; echo " <kbd>#";echo $row['accno'];echo "</kbd>"; ?>
  </div>
  <div class="card-body">
    <table class="table table-bordered">
      <tbody>
        <tr>
          <td>Name</td>
          <th><?php echo $row['username'] ?></th>
          <td>Account No</td>
          <th><?php echo $row['accno'] ?></th>
        </tr><tr>
          <td>Phone Number</td>
          <th><?php echo $row['phone'] ?></th>
          <td>Rewards</td>
          <th><?php echo $row['rewards'] ?></th>
        </tr><tr>
          <td>Address</td>
          <th><?php echo $row['address'] ?></th>
          <td>Car Type</td>
          <th><?php echo $row['acctype'] ?></th>
        </tr><tr>
          <td>Nid</td>
          <th><?php echo $row['nid'] ?></th>
          <td>Date of Birth</td>
          <th><?php echo $row['date'] ?></th>
       

      </tbody>
    </table>
    <a href="mindex.php?delete=<?php echo $row['phone'] ?>" class='btn btn-danger btn-sm' data-toggle='tooltip' title="Delete this account">Delete</a>
  </div>
  <div class="card-footer text-muted">
  <?php echo 'জায়গা আছে?'; ?> 
  </div>
</div>

</body>
</html>