<?php
include('config/db_connect.php');
//check developer in the database
   $sql = "DELETE FROM `dev_team`
   WHERE team_admin_id='$_GET[user_id]'";

   $res_n = mysqli_query($conn, $sql);
   // $not_approved = mysqli_fetch_all($res_n, MYSQLI_ASSOC);

    if (mysqli_query($conn,$sql)) {
          header("refresh:0 url=admindevteammgn.php");
    }
    else {
          echo "Remove Team Members first";
         }

?>
