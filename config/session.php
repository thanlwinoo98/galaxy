<?php
   include('config/db_connect.php');
   session_start();


   $username = $_SESSION['log_username'];

   $user_id = "SELECT * from user WHERE username='$username'";
   $result = mysqli_query($conn, $user_id);
   $user = mysqli_fetch_all($result, MYSQLI_ASSOC);

   // print_r($user);

  foreach($user as $user){
          $id = htmlspecialchars($user['user_id']);
          $pname = htmlspecialchars($user['profile_name']);
          $ppic = htmlspecialchars($user['img_path']);

       }


   $ses_sql = mysqli_query($conn,"select username from user where username = '$username' ");



   $row = mysqli_fetch_array($ses_sql,MYSQLI_ASSOC);

   $login_session = $row['username'];


   if(!isset($_SESSION['log_username'])){
      header("location:login.php");
      die();
   }

?>
