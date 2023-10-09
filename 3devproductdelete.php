<?php
include('config/db_connect.php');
//check developer in the database
   $sql = "DELETE FROM product
   WHERE product_id='$_GET[productid]'";

   $res_n = mysqli_query($conn, $sql);
   // $not_approved = mysqli_fetch_all($res_n, MYSQLI_ASSOC);

    if (mysqli_query($conn,$sql)) {
          header("refresh:0 url=devproductmgn.php");
    }
    else {
          echo "Not deleted";
         }

?>
