






      <!-- <?php
      if (isset($_POST['book']))
      {
        $con = mysqli_connect('localhost','root','','mybank');
        $slot = $_POST['slot'];
        
        $acc="select accno from account where phone='$_SESSION[phone]'";
        
        $result=mysqli_query($con,$acc);
        $r=mysqli_fetch_array($result);
        setBalance($amount,'debit', $r['accno']); 
        if ($con->query("insert into transaction (accno) values ('$r[accno]')")) {
          $sql="select * from booking where id=(select max(id) from booking)";
          if($t=mysqli_query($con, $sql)){
            if(mysqli_num_rows($t)>0){
              $row=mysqli_fetch_array($t);
              $con->query("insert into billpayment (transid) values ($row[transid])");
              $con->query("update billpayment set type='$_POST[pmeth]' where transid=$row[transid]");
          echo "<script>alert('Successfully Payed');window.location.href='book.php'</script>";
        } else
        echo "<div class='alert alert-danger'>Not Paid Error is:".$con->error."</div>";
      }
    }
  }
    
    ?> -->