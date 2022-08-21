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
        <a class="nav-link active" href="mindex.php">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item ">  <a class="nav-link" href="maddnew.php">Add New Account</a></li>
      <li class="nav-item ">  <a class="nav-link" href="mfeedback.php">See Reports</a></li>

    </ul>
    <?php include 'msideButton.php'; ?>
    
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
      <th scope="col">#</th>
      <th scope="col">Area Name</th>
      <th scope="col">Address</th>
      <th scope="col">Status</th>
    </tr>
  </thead>
  <tbody>
  <?php
      $i=0;
      $con = mysqli_connect('localhost','root','','mybank');
      $array = $con->query("SELECT * FROM parking WHERE location= '$_POST[loc]'");
      if ($array->num_rows > 0)
      {
        while ($row = $array->fetch_assoc())
        {$i++;
    ?>
      <tr>
        <th scope="row"><?php echo $i ?></th>
        <td><?php echo $row['location'] ?></td>
        <td><?php echo $row['address'] ?></td>
        <td><?php echo $row['Pstatus'] ?></td>
        <td>
          <a href="gmap.php" class='btn btn-success btn-sm' data-toggle='tooltip' title="Search in map">Map</a>
          <a href="book.php" class='btn btn-danger btn-sm' data-toggle='tooltip' title="Proceed to booking">Book</a>
        </td>
        
      </tr>
    <?php
        }
      }
     ?>
  </tbody>
  </table>
  <br>

</div>
  <div class="card-footer text-muted">
  <?php echo 'জায়গা আছে?'; ?> 
  </div>
</div>

</body>
</html>