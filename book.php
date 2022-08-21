
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
  <?php
    $error = "";
    if (isset($_POST['userLogin']))
    {
      $error = "";
        $phone = $_POST['phone'];
        $pin = $_POST['password'];
       
        $result = $con->query("select * from users where phone='$phone' AND pin='$pin'");
        if($result->num_rows>0)
        { 
          session_start();
          $data = $result->fetch_assoc();
          $_SESSION['phone']=$data['phone'];
          $_SESSION['username'] = $data['username'];
          header('location:index.php');
         }
        else
        {
          $error = "<div class='alert alert-warning text-center rounded-0'>Username or password wrong try again!</div>";
        }
    }

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
      <th scope="row">Lisence No.</th>
      <td><?php echo $rewards; ?></td>
    </tr>
    <tr>
      <th scope="row">Car Type</th>
      <td><?php echo $acctype; ?></td>
    </tr>
  </tbody>
</table> 
</div>
<div class="container">
  <div class="card  w-75 mx-auto">
  <div class="card-body">
        <form method='POST'>
            <div class='alert alert-success w-50 mx-auto' style='text-align:center;'>
              <h5>Booking</h5>
                <div class='form-group'>
                  <label>Select Booking Type</label>
                  <select name='pmeth' class='form-control' required >
                      <option value selected ></option>
                      <option value='hourly'>Pay Hourly depending on your usage</option>
                      <option value='booked'>Pre book for specfic time</option>
                  </select>
               </div> 
              <button type='submit' name='pro' class='btn btn-primary btn-bloc btn-sm my-1'>Proceed</button>
            </div>
          </form>

          <?php if (isset($_POST['pro'])) 
      {
        $con = mysqli_connect('localhost','root','','mybank');
        if ($con->query("insert into booking (type) values ('$_POST[pmeth]')")) {
              echo "<div class='alert alert-success w-50 mx-auto' style='text-align:center;'>
                  <form method='POST'>
                  <input type='number' name='slot' class='form-control' placeholder='Enter Slot No.' required><br/>
                  <input type='number' name='hours' class='form-control' placeholder='Enter hours to Book' required><br/> 
                  <button type='submit' name='book' class='btn btn-primary btn-bloc btn-sm my-1'>Book</button>
                  </form>
                </div>";
      } 
    }
      ?>

<?php
      if (isset($_POST['book']))
      {
        $con = mysqli_connect('localhost','root','','mybank');
        
        $rate="SELECT rate from parking where slotno ='$_POST[slot]'";
        
        
        $sql="select * from booking where id=(select max(id) from booking)";
        if($t=mysqli_query($con, $sql)){
          if(mysqli_num_rows($t)>0){
            $row=mysqli_fetch_array($t);
            $con->query("update booking set slotno='$_POST[slot]' where id=$row[id]");
            // $con->query("update booking set rate=$_rate where id=$row[id]"); 
            $con->query("update booking set btime='$_POST[hours]' where id=$row[id]");
            $con->query("update parking set Pstatus='N' where slotno='$_POST[slot]'");
            echo "<script>window.location.href='pay.php'</script>";
        }
      }
    }
  ?>

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