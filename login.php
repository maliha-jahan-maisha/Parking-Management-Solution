<!DOCTYPE html>
<html>
<head>
	<title>Banking</title>
	<?php require 'assets/autoloader.php'; ?>
	<?php require 'assets/autoloader.php'; ?>
	<?php require 'assets/function.php'; ?>
	<?php
    $con = new mysqli('localhost','root','','mybank');
    define('bankName', 'জায়গা আছে?');
	
		$error = "";
		if (isset($_POST['userLogin']))
		{
			$error = "";
  			$phone = $_POST['phone'];
		    $pin = $_POST['pin'];
		   
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

		if (isset($_POST['employeeLogin']))
		{
			$error = "";
  			$empid = $_POST['empid'];
		    $pin = $_POST['pin'];
		   
		    $result = $con->query("select * from employee where empid='$empid' AND pin='$pin'");
		    if($result->num_rows>0)
		    { 
		      session_start();
		      $data = $result->fetch_assoc();
			  $_SESSION['empid']=$data['empid'];
		      $_SESSION['username'] = $data['username'];
		      header('location:mindex.php');
		     }
		    else
		    {
		      $error = "<div class='alert alert-warning text-center rounded-0'>Username or password wrong try again!</div>";
		    }
		}

	 ?>
</head>
<meta name="viewport" content="width=device-width, initial-scale=1" />
<body style="background: url(images/bg3.jpg);">
<h1 class="alert alert-success rounded-0"><?php echo bankName; ?><small class="float-right text-muted" style="font-size: 12pt;"></small></h1>
<br>
<?php echo $error ?> 
<br>
<div id="accordion" role="tablist" style="margin-left:40%; margin-right:40%;" >
	<br><h4 class="text-center text-white">Select Your Session</h4>
  <div class="card rounded-0">
    <div class="card-header" role="tab" id="headingOne">
      <h5 class="mb-0">
        <a style="text-decoration: none;" data-toggle="collapse" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
         <button class="btn btn-outline-success btn-block">User Login</button>
        </a>
      </h5>
    </div>

    <div id="collapseOne" class="collapse" role="tabpanel" aria-labelledby="headingOne" data-parent="#accordion">
      <div class="card-body">
       <form method="POST">
       	<input type="phone" name="phone" class="form-control" required placeholder="Enter Phone Number"><br/>
       	<input type="password" name="pin" class="form-control" required placeholder="Enter PIN"><br/>
       	<button type="submit" class="btn btn-primary btn-block btn-sm my-1" name="userLogin">Enter </button>
       </form>
      </div>
    </div>
  </div>
  <div class="card rounded-0">
    <div class="card-header" role="tab" id="headingTwo">
      <h5 class="mb-0">
        <a class="collapsed btn btn-outline-success btn-block" data-toggle="collapse" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
          Employee Login
        </a>
      </h5>
    </div>
    <div id="collapseTwo" class="collapse" role="tabpanel" aria-labelledby="headingTwo" data-parent="#accordion">
      <div class="card-body">
         <form method="POST">
       	<input type="empid" name="empid" class="form-control" required placeholder="Enter Employee ID"><br/>
       	<input type="password" name="pin" class="form-control" required placeholder="Enter PIN"><br/>
       	<button type="submit" class="btn btn-primary btn-block btn-sm my-1" name="employeeLogin">Enter </button>
       </form>
	   
      </div>
	  
	</div>
	  <div{align="center"} class="signup-link">
		&nbsp;Don't have an account?&nbsp;<a href="maddnew.php">Register now</a>
      </div>
    </ul>
  </div>
</div>

</body>
</html>