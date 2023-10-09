<?php
include('config/db_connect.php');
//check developer in the database
  $sqlreq= "DELETE FROM product_spec
  WHERE product_id='$_GET[productid]'";
  $res_q = mysqli_query($conn, $sqlreq);
  
  if (mysqli_query($conn,$sqlreq)) {

       $sql = "DELETE FROM product
       WHERE product_id='$_GET[productid]'";

       $res_n = mysqli_query($conn, $sql);
       // $not_approved = mysqli_fetch_all($res_n, MYSQLI_ASSOC);

        if (mysqli_query($conn,$sql)) {
              header("refresh:0 url=adminproductmgn.php");
        }
        else {
              echo "Not deleted";
              echo("Error description: " . mysqli_error($conn));

             }  }
  else {
        echo "Not deleted";
        echo("Error description: " . mysqli_error($conn));

       }


?>
