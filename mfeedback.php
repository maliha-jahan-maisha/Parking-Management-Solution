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
	
  <?php if (isset($_GET['delete'])) 
  {
    $con = mysqli_connect('localhost','root','','mybank');
    if ($con->query("delete from report where reportid = '$_GET[delete]'"))
    {
      header("location:mfeedback.php");
    }
  } ?>
</head>
<body style="background:#9ABDEF;background-size: 100%">
<?php include 'mheader.php'; ?>
<br><br><br><br><br><br>
<div class="container">
<div class="card w-100 text-center shadowBlue">
  <div class="card-header">
    Reports from Account Holders
  </div>
  <br>
  <div class="card-body">
   <table class="table table-bordered table-sm bg-dark text-white">
  <thead>
    <tr>
      <th scope="col">Account No.</th>
      <th scope="col">Date of Report</th>
      <th scope="col">Message</th>
      <th scope="col"></th>
    </tr>
  </thead>
  <tbody>
    <?php
      $i=0;
      $con = mysqli_connect('localhost','root','','mybank');
      $array = $con->query("select * from report");
      if ($array->num_rows > 0)
      {
        while ($row = $array->fetch_assoc())
        {
    ?>
      <tr>
        <td><?php echo $row['accno'] ?></td>
        <td><?php echo $row['date'] ?></td>
        <td><?php echo $row['message'] ?></td>
        <td>
          <a href="mfeedback.php?delete=<?php echo $row['reportid'] ?>" class='btn btn-danger btn-sm' data-toggle='tooltip' title="Delete this Message">Delete</a>
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