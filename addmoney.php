
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


<br>
<div class="col">
    <div class="row" style="padding: 22px;padding-top: 0">
      <div class="col">
        <div class="card shadowBlack ">
          <img class="card-img-top" src="images/gulshan.png" alt="Card image cap" style="max-height: 200px;min-height: 200px">
            <div class="card-body">
              <a href="parkingspot.php?spot=Gulshan" class="btn btn-outline-success btn-block">Gulshan</a>
            </div>
        </div>
      </div>
      <div class="col">
        <div class="card shadowBlack ">
          <img class="card-img-top" src="images/dhanmondi.png" alt="Card image cap" style="max-height: 200px;min-height: 200px">
            <div class="card-body">
              <a href="parkingspot.php?spot=Dhanmondi" class="btn btn-outline-success btn-block">Dhanmondi</a>
            </div>
        </div>
      </div>
    </div>
    <div class="row" style="padding: 22px">
      <div class="col">
        <div class="card shadowBlack ">
          <img class="card-img-top" src="images/uttara.png" alt="Card image cap" style="max-height: 200px;min-height: 200px">
            <div class="card-body">
              <a href="parkingspot.php?spot=Uttara" class="btn btn-outline-success btn-block">Uttara</a>
            </div>
        </div>
      </div>
      <div class="col">
        <div class="card shadowBlack ">
          <img class="card-img-top" src="images/motijheel.png" alt="Card image cap" style="max-height: 200px;min-height: 200px">
            <div class="card-body">
              <a href="parkingspot.php?spot=Motijheel" class="btn btn-outline-success btn-block">Motijheel</a>
             </div>
        </div>
      </div>
     </div>
    <div class="row" style="padding: 22px">
      <div class="col">
        <div class="card shadowBlack ">
          <img class="card-img-top" src="images/mirpur.png" alt="Card image cap" style="max-height: 200px;min-height: 200px">
            <div class="card-body">
              <a href="parkingspot.php?spot=Mirpur" class="btn btn-outline-success btn-block">Mirpur</a>
            </div>
        </div>
      </div>
      <div class="col">
        <div class="card shadowBlack ">
          <img class="card-img-top" src="images/ramna.png" alt="Card image cap" style="max-height: 200px;min-height: 200px">
            <div class="card-body">
              
              <a href="parkingspot.php?spot=Ramna" class="btn btn-outline-success btn-block">Ramna</a>
            </div>
        </div>
      </div>
    </div>
  </div>



   

  </tbody>
  </table> -->
  <br>

</div>
</body>
</html>