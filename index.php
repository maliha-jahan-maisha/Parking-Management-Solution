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
<?php include 'header.php'; ?>
<br><br><br><br><br><br>
<section>
  <div class='container'>
  <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
  <ol class="carousel-indicators">
    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
  </ol>
  <div class="carousel-inner" role="listbox" style="width:1980 ;height:630px !important;">
    <div class="carousel-item active">
      <img src="images/parking1.jpg" alt="First slide">
    </div>
    <div class="carousel-item">
      <img src="images/p1.jpg" alt="Second slide">
    </div>
    <div class="carousel-item">
      <img src="images/ss.png" alt="Third slide">
    </div>
  </div>
  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
</div>
</section>
    <div class="row w-80" style="padding: 22px">
      <div class="col">
        <div class="card shadowBlack ">
          <img class="card-img-top" src="images/logo 3.png" alt="Card image cap" style="max-height: 430px;min-height: 50px">
        <div class="card-body">
          <a href="recharge.php" class="btn btn-outline-success btn-block">Book Parking</a>
         </div>
        </div>
      </div>
      <div id="carouselExampleIndicators" class="carousel slide my-2 rounded-1 shadowBlack" data-ride="carousel" >
          <div class="carousel-inner">
          <div class="card shadowBlack ">
            <div class="card-body">
                <div class="mapouter">
                <div class="gmap_canvas">
                <iframe width="1000" height="800" id="gmap_canvas" src="https://maps.google.com/maps?q=DHaka&t=&z=13&ie=UTF8&iwloc=&output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0">
                </iframe>
                <style>.gmap_canvas {overflow:hidden;background:none!important;height:395px;width:1000px;}</style>
                </div>
                </div>
                <br>
              <a href="addmoney.php" class="btn btn-outline-success btn-block">Find Location in Maps</a>
            </div>
          </div>
        </div>
      </div>
  </div>
  <div class="row"  style="padding: 22px">
  <div class="col">
    <div class="card shadowBlack">
  <h4 class="display-5">Welcome to জায়গা আছে?, <?php echo $_SESSION['username'] ?></h4><br>
  <p  class="lead alert alert-warning"><b>For any help, You can contact us through:</b>
  <p  class="lead alert alert-warning"><b>Email: Jaigaache@gmail.com <br>Hotline: +88028332270 or +8809666777111</b>
      </div>
     </div>
  </div> 
    </div>
  </div>
  
</div>
</body>
</html>


