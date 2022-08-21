
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
<?php
        require_once("db.php");

        $sql="SELECT * from account where phone=".$_SESSION['phone']."";

        $result= mysqli_query($conn,$sql);
        if (mysqli_num_rows($result)!=0){
            while ($row=mysqli_fetch_array($result)){
        $accno=$row[0];
        $rewards=$row[1];
        $balance=$row[2];
        $acctype=$row[3];
        $phone=$row[4];
            }
        }
        ?>

  </div>
</nav><br><br><br><br><br><br>
<div class="container">
  <div class="card  w-75 mx-auto">
  <div class="card-header text-center">
    Find Spot
  </div>
  <br>
  <div class="card-body">
<br>
<div class="col">
    <div class="row" style="padding: 22px;padding-top: 0">
      <div class="col">
        <div class="card shadowBlack ">
          <img class="card-img-top" src="images/logo 1.png" alt="Card image cap" style="max-height: 200px;min-height: 200px">
        <div class="card-body">
          
          <a href="addmoney.php" class="btn btn-outline-success btn-block">See Spots Nearby</a>
         </div>
        </div>
      </div>
      <div class="col">
        <div class="card shadowBlack ">
          <img class="card-img-top" src="images/logo 2.png" alt="Card image cap" style="max-height: 200px;min-height: 200px">
        <div class="card-body">
          <a href="sendmoney.php" class="btn btn-outline-success btn-block">Search Places</a>
         </div>
        </div>
      </div>
    </div>

<!-- 








    <table class="table table-striped table-dark w-75 mx-auto">
  <thead>
    <tr>
      <td scope="col">Account No.</td>
      <th scope="col"><?php echo $accno; ?></th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row">Balance</th>
      <td><?php echo $balance; ?></td>
    </tr>
  </tbody>
</table> 
</div>
<div class="container">
  <div class="card  w-75 mx-auto">
  <div class="card-body">
    <?php
      $con = mysqli_connect('localhost','root','','mybank');
      $array1 = $con->query("select balance from account where phone = '$_SESSION[phone]'");
      $row = $array1->fetch_assoc();
      echo"<form method='POST'>
            <div class='alert alert-success w-50 mx-auto' style='text-align:center;'>
              <h5>Phone Recharge</h5>
                <div class='form-group'>
                  <label> Select Operator</label>
                  <select name='pmeth' class='form-control' required >
                      <option value selected ></option>
                      <option value='grameenPhone'>GrameenPhone</option>
                      <option value='banglalink'>Banglalink</option>
                      <option value='robi'>Robi</option>
                      <option value='teletalk'>Teletalk</option>
                  </select>
               </div>
              <input type='text' name='number' class='form-control' placeholder='Enter Phone No.' required><br/>
              <input type='number' name='amount' class='form-control'  min='1' max='$row[balance]' placeholder='Enter Amount' required><br/> 
              <button type='submit' name='recharge' class='btn btn-primary btn-bloc btn-sm my-1'>RECHARGE</button>
            </div>
          </form>";
      ?>

      <?php
      if (isset($_POST['recharge']))
      {
        $con = mysqli_connect('localhost','root','','mybank');
        $amount = $_POST['amount'];
        
        $acc="select accno from account where phone='$_SESSION[phone]'";
        
        $result=mysqli_query($con,$acc);
        $r=mysqli_fetch_array($result);
        setBalance($amount,'debit', $r['accno']); 
        if ($con->query("insert into transaction (amount,accno) values ('$_POST[amount]','$r[accno]')")) {
          $sql="select * from transaction where transid=(select max(transid) from transaction)";
          if($t=mysqli_query($con, $sql)){
            if(mysqli_num_rows($t)>0){
              $row=mysqli_fetch_array($t);
              $con->query("insert into recharge (transid) values ($row[transid])");
              $con->query("update recharge set operator='$_POST[pmeth]' where transid=$row[transid]");
          echo "<script>alert('Successfully Recharged');window.location.href='recharge.php'</script>";
        } else
        echo "<div class='alert alert-danger'>Not Recharged Error is:".$con->error."</div>";
      }
    }
  }
    
    ?> 
  </div>
</div>

  </div> -->
  <br><br>
  <div class="card-footer text-muted" style="text-align:center;">
  <?php echo 'জায়গা আছে?'; ?>
  </div>
</div>

</div>
</body>
</html>