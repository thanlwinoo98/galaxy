<?php
include('config/db_connect.php');
//check developer in the database
   $sql = "UPDATE `dev` SET `approval`=0
   WHERE user_id='$_GET[user_id]'";

   $res_n = mysqli_query($conn, $sql);
   // $not_approved = mysqli_fetch_all($res_n, MYSQLI_ASSOC);

    if (mysqli_query($conn,$sql)) {
          header("refresh:0 url=admindevmgn.php");
    }
    else {
          echo "Not Updated";
         }

?>
