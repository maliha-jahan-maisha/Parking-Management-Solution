<?php
        require_once("db.php");

        $sql="SELECT rewar from users where phone=".$_SESSION['phone']."";

        $result= mysqli_query($conn,$sql);
        if (mysqli_num_rows($result)!=0){
            while ($row=mysqli_fetch_array($result)){

        ?>
        <form class="form-inline my-2 my-lg-0">
                <a href=# class="btn btn-outline-success" data-toggle="tooltip" title="Your current Account Balance">Parking_Points Balance : JaigaCoins <?php echo $row[0]; ?></a>
                <a href="logout.php" data-toggle="tooltip" title="Logout" class="btn btn-outline-danger mx-1" >Logout</a>
        </form>
        <?php

            }
        }
        ?>


