
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
      <li class="nav-item ">  <a class="nav-link" href="feedback.php">Log complaint</a></li>
      <li class="nav-item ">  <a class="nav-link" href="passchange.php">Change Password</a></li>


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
    Your Account Information
  </div>
  <br>
  <div class="card-body">
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
  <form method="POST">
          <div class="alert alert-success w-50 mx-auto" style="text-align:center;">
            <h5>Send Money</h5>
            <input type="text" name="phone" class="form-control " placeholder="Enter Receiver Phone Number" required><br/>
            <button type="submit" name="get" class="btn btn-primary btn-bloc btn-sm my-1">Get Account Info</button>
          </div>
      </form>
      <?php if (isset($_POST['get'])) 
      {
        $con = mysqli_connect('localhost','root','','mybank');
        $array2 = $con->query("select * from users,account where account.phone = '$_POST[phone]' and users.phone = '$_POST[phone]'");
        $array1 = $con->query("select balance from account where phone = '$_SESSION[phone]'");
        $row = $array1->fetch_assoc();
        
        {
          if ($array2->num_rows > 0) 
          { $row2 = $array2->fetch_assoc();
            echo "<div class='alert alert-success w-50 mx-auto' style='text-align:center;'>
                  <form method='POST'>
                    Account No.
                    <input type='text' value='$row2[accno]' name='otherAccNo' class='form-control ' readonly required>
                    Account Holder Name
                    <input type='text' class='form-control' value='$row2[username]' readonly required>
                    Enter Amount
                    <input type='number' name='amount' class='form-control' min='1' max='$row[balance]'  required><br/>
                    <button type='submit' name='send' class='btn btn-primary btn-bloc btn-sm my-1'>SEND</button>
                  </form>
                </div>";
          }
          else
            echo "<div class='alert alert-success w-50 mx-auto'>Account No. $_POST[accno] Does not exist</div>";
        }
      } 
      ?>
  
      <?php
      if (isset($_POST['send']))
      {
        $con = mysqli_connect('localhost','root','','mybank');
        $amount = $_POST['amount'];
        $acc="select accno from account where phone='$_SESSION[phone]'";
        $acc2="select accno from account where accno='$_POST[otherAccNo]'";
        $result=mysqli_query($con,$acc);
        $r=mysqli_fetch_array($result);
        setBalance($amount,'debit', $r['accno']);
        if ($con->query("insert into transaction (amount,accno) values ('$_POST[amount]','$r[accno]')")) {
          $sql="select * from transaction where transid=(select max(transid) from transaction)";
          if($t=mysqli_query($con, $sql)){
            if(mysqli_num_rows($t)>0){
              $row=mysqli_fetch_array($t);
              $con->query("insert into sendmoney (transid) values ($row[transid])");
          echo "<script>alert('Successfully Sent');window.location.href='sendmoney.php'</script>";   
        } else
        echo "<div class='alert alert-danger'>Not Sent Error is:".$con->error."</div>";
        $result2=mysqli_query($con,$acc2);
        $r2=mysqli_fetch_array($result2);
        setBalance($amount,'credit', $r2['accno']);  
      }
    }
  }
    


    
    ?> 
  </div>
</div>

  </div>
  <br><br>
  <div class="card-footer text-muted" style="text-align:center;">
   <?php echo bankName ?>
  </div>
</div>
</div>
</body>
</html>



<!-- 
<?php 
      $con = mysqli_connect('localhost','root','','mybank');
      $array = $con->query("select amount, transaction.date, transaction.time from users,account,transaction,billpayment where users.phone=".$_SESSION['phone']." and users.phone=account.phone and account.accno=transaction.accno and transaction.transid=billpayment.transid order by date desc");
      if ($array ->num_rows > 0) 
      {
         while ($row = $array->fetch_assoc()) 
         {
          ?>
            <tr>
              <td>Tk. <?php echo $row['amount'] ?> has been paid at</td>
              <td><?php echo $row['time'] ?></td>
            </tr>
            <br>
          <?php
              }
            }
            else{
              echo "No Transactions have been made so far";
            }
           ?> -->