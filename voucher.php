<?php
include('config/session.php');
$error = '';
$getproduct = $_SESSION['productid'];
$method  =  $_SESSION['method'];
$fname   =  $_SESSION['fname'];
$lname   =  $_SESSION['lname'];
$city    =  $_SESSION['city'];
$billaddress = $_SESSION['billaddress'];
$zip  = $_SESSION['zip'] ;
$billaddress2  = $_SESSION['billaddress2'];
$phno = $_SESSION['phno'];
$country = $_SESSION['country'];


if (isset($_SESSION["log_username"])) {
  $username = $_SESSION['log_username'];

  $user_id = "SELECT * from user WHERE username='$username'";
  $result = mysqli_query($conn, $user_id);
  $user = mysqli_fetch_all($result, MYSQLI_ASSOC);
  // $_SESSION['getproduct']    = $_GET['productid'];
  // print_r($user);

  foreach($user as $user){
         $id = htmlspecialchars($user['user_id']);
         $pname = htmlspecialchars($user['profile_name']);
         $ppic = htmlspecialchars($user['img_path']);
      }

  $ses_sql = mysqli_query($conn,"select username from user where username = '$username' ");
  $row = mysqli_fetch_array($ses_sql,MYSQLI_ASSOC);
  $login_session = $row['username'];

  $productsql = "SELECT * from product WHERE product_id='$getproduct'";
  $result = mysqli_query($conn, $productsql);
  $product = mysqli_fetch_all($result, MYSQLI_ASSOC);

          // print_r($user);

          foreach($product as $product){
                 $productid = htmlspecialchars($product['product_id']);
                 $productname = htmlspecialchars($product['product_name']);
                 $dev_team_id = htmlspecialchars($product['dev_team_id']);
                 $description = htmlspecialchars($product['description']);
                 $developer = htmlspecialchars($product['developer']);
                 $publisher = htmlspecialchars($product['publisher']);
                 $img_path1 = htmlspecialchars($product['img_path1']);
                 $img_path2 = htmlspecialchars($product['img_path2']);
                 $img_path3 = htmlspecialchars($product['img_path3']);
                 $img_path4 = htmlspecialchars($product['img_path4']);
                 $date_created = htmlspecialchars($product['date_created']);
                 $approval = htmlspecialchars($product['approval']);
                 $price = htmlspecialchars($product['price']);

              }

            $dev_team = "SELECT * from dev_team WHERE dev_team_id='$dev_team_id'";
            $resultdt = mysqli_query($conn, $dev_team);
            $devteam = mysqli_fetch_all($resultdt, MYSQLI_ASSOC);
                  // print_r($user);
            foreach($devteam as $devteam){
                  $dev_team_name = htmlspecialchars($devteam['dev_team']);
                        }


        $salesql = "SELECT * from sales WHERE product_id='$getproduct' AND user_id='$id'";
        $results = mysqli_query($conn, $salesql);
        $sale = mysqli_fetch_all($results, MYSQLI_ASSOC);

                                // print_r($user);

              foreach($sale as $sale){
                      $sale_id = htmlspecialchars($sale['sales_id']);
                      $date = htmlspecialchars($sale['date_created']);
                  }

} elseif(!isset($_SESSION["log_username"])) {
  $message = "Please Log In to Continue";
  echo "<script type='text/javascript'>alert('$message');</script>";
  header("refresh:0 url=login.php");
}

 ?>

 <!DOCTYPE html>
 <html>
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

        .tabs.tabs-fixed-width .indicator{
          background-color: #1a237e;
        }

        .tabs.tabs-fixed-width .tab a:focus, .tabs.tabs-fixed-width .tab a:focus.active{
          background: transparent;
        }
        @media print {
          header * {
            visibility: hidden;
          }
          footer * {
            visibility: hidden;
          }

          #section-to-print, #section-to-print * {
            visibility: visible;
          }
          #section-to-print {
            position: absolute;
            left: 0;
            top: 0;
          }
        }

 </style>
 </head>
 <body>
   <header>
     <?php
       if(isset($_SESSION["log_username"])){
         $session = $_SESSION["log_username"];
         include("header2.php");
       }else{
         include("header.php");
       }
    ?>
  </header>
  <div class="section"></div>
  <div class="section"></div>

  <div class="container indigo darken-2 z-depth-4 print" id="">


             <div class="card z-depth-4">
                 <div class="card-content  blue darken-4 ">
                   <div class="row">
                     <div class="col s12 l4 center">
                         <img src="<?php echo $img_path1 ?>" height="170" width="300" alt="No image" style="position:relative; right:11px;"/>
                     </div>

                     <div class="col s12 l4">
                       <h5  class=" grey-text text-lighten-3" ><?php echo $productname; ?></h5>
                     </div>

                     <div class="col s12 l4">
                       <h5  class=" grey-text text-lighten-3" >($<?php echo $price; ?>)</h5>
                     </div>
                     <div class="col s12 l4">
                       <h5  class=" grey-text text-lighten-3" >SalesID: <?php echo $sale_id; ?></h5>
                     </div>

                     <div class="col s12 l6 ">
                       <h5  class=" grey-text text-lighten-3" >Date: (<?php echo $date; ?>)</h5>
                     </div>
                    </div>
                    <div class="row">

                     </div>
                 </div>

                 <div class="card-content indigo accent-3">
                   <div class="col s12 l6 center"><p class="red-text"><?php echo $error ?></p></div>
                   <div class="row">
                     <div class="col s12 center">
                           <h6 class=" grey-text text-lighten-3">Product Successfully Purchased</h6>
                           <hr>

                     </div>
                    <div class="col s6 right">
                        <a href="index.php"  class="btn-large hoverable right indigo darken-2">Home</a>
                    </div>
                     <div class="col s6">
                       <button onClick="window.print()">Print this page</button>

                     </div>

                     </div>

                    </div>


                  </div>

              </div>
      </div>

 <footer>
   <?php include ("footer.php"); ?>

 </footer>
 <br>
 <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.1/jquery.min.js"></script>
 <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.5/js/materialize.min.js"></script>
 <!-- Compiled and minified JavaScript -->
 <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-beta/js/materialize.min.js"></script>
<script>
 $(document).ready(function(){
   $(".sidenav").sidenav();
   $(".parallax").parallax();
   $(".tabs").tabs();

 })
 </script>

 </body>
 </html>
