<?php
session_start();
if (isset($_SESSION["log_username"])) {
  include('config/db_connect.php');

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

  $login_session = $row['username'];}

 ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- font awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">
    <!--Import Google Icon Font-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-beta/css/materialize.min.css">

    <title></title>
      <style>


        nav{
          height: 75px;
          line-height: 75px;
        }
        .container{
          width: 5000px;
        }
        /* label focus color */
         .input-field input:focus + label {
           color: white !important;
         }
         .input-field [type=text]{
           color:white;
      }
         /* label underline focus color */
         .row .input-field input:focus {
           border-bottom: 1px solid #3949ab !important;
           box-shadow: 0 1px 0 0 #3949ab !important
         }
      </style>
  </head>
  <body>
    <header><?php
    if(isset($_SESSION["log_username"])){
      $session = $_SESSION["log_username"];
      include("header2.php");
    }else{
      include("header.php");
    }

             ?>
   </header>

    <section>

      <div class="container" style="width: 1000px; height: 1000px;"></div>
      <!-- parallax -->
      <div class="parallax-container">
        <div class="parallax">
          <img src="img/stars.jpg" alt="" class="responsive-img">
        </div>
      </div>

      <div class="container" style="width: 1000px; height: 1000px;"></div>
      <!-- parallax -->
      <div class="parallax-container">
        <div class="parallax">
          <img src="img/street.jpg" alt="" class="responsive-img">
        </div>
      </div>

      <div class="container" style="width: 1000px; height: 1000px;"></div>
    </section>

    <footer><?php include ("footer.php"); ?></footer>


    <!-- Compiled and minified JavaScript -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-beta/js/materialize.min.js"></script>
    <script>
    $(document).ready(function(){
      $(".sidenav").sidenav();
      $(".parallax").parallax();
    })
    </script>
  </body>
</html>
