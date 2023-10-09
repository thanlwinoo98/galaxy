<?php
include("config/db_connect.php");
$title = "Sales and Revenue";

//check developer in the database
   $sale_check = "SELECT sales.sales_id,user.user_id,user.username,product.product_id,product.product_name,product.price,sales.date_created,dev_team.dev_team_id,dev_team.dev_team
   FROM `sales`,user,product,dev_team
   WHERE sales.user_id=user.user_id AND product.product_id=sales.product_id AND product.dev_team_id=dev_team.dev_team_id";
   $res_sc = mysqli_query($conn, $sale_check);
   $sales = mysqli_fetch_all($res_sc, MYSQLI_ASSOC);






?>


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
    body {
      display: flex;
      min-height: 100vh;
      flex-direction: column;
    }


    /* .flexbox {
        display: flex;
        flew-wrap: wrap;
        justify-content: center;
        align-items: center;
      } */



/*
    .input-field input[type=date]:focus + label,
    .input-field input[type=text]:focus + label,
    .input-field input[type=email]:focus + label,
    .input-field input[type=password]:focus + label {
      color: #e91e63;
    }

    .input-field input[type=date]:focus,
    .input-field input[type=text]:focus,
    .input-field input[type=email]:focus,
    .input-field input[type=password]:focus {
      border-bottom: 2px solid #e91e63;
      box-shadow: none;
    } */
  </style>

</head>

<body>
  <header>
    <?php
  include('headeradmin.php');

   ?>
  </header>
  <main>
    <center>
      <section>
        <div class="section"></div>
        <div class="section"></div>
        <div class="section"></div>

        <div class="container " style="width:1500px;">
          <h3 class="white-text">Sales and Revenue</h3>

            <div class="row">
              <div class="col s12">
                <ul class="tabs">
                  <li class="tab col s6"><a class="active" href="#sales">Sales</a></li>
                  <li class="tab col s6"><a  href="#revenue">Revenue</a></li>
                </ul>
              </div>

              <!-- Sales Tab -->
              <div id="sales" class="col s12">
                <li class="collection-item white">
                  <div class="row">
                        <div class="col s1">Sales ID</div>
                        <div class="col s1">User ID</div>
                        <div class="col s1">Username</div>
                        <div class="col s1">Product ID</div>
                        <div class="col s3">Product Name</div>
                        <div class="col s2">Purchase Date</div>
                        <div class="col s1">Dev Team ID</div>
                        <div class="col s1">Dev Team</div>
                        <div class="col s1">Price</div>

                  </div>
                  <hr>
                  <?php foreach ($sales as $sales) {?>
                      <div class="row">
                            <div class="col s1"><?php echo htmlspecialchars($sales['sales_id']); ?></div>
                            <div class="col s1"><?php echo htmlspecialchars($sales['user_id']); ?></div>
                            <div class="col s1"><?php echo htmlspecialchars($sales['username']); ?></div>
                            <div class="col s1"><?php echo htmlspecialchars($sales['product_id']);  ?></div>
                            <div class="col s3"><?php echo htmlspecialchars($sales['product_name']); ?></div>
                            <div class="col s2"><?php echo htmlspecialchars($sales['date_created']); ?></div>
                            <div class="col s1"><?php echo htmlspecialchars($sales['dev_team_id']); ?></div>
                            <div class="col s1"><?php echo htmlspecialchars($sales['dev_team']); ?></div>
                            <div class="col s1">$<?php echo htmlspecialchars($sales['price']); ?></div>

                            </div>
                  <?php  }?>
              </li>
              </div>

              <div id="revenue" class="col s12">
                <li class="collection-item white">
                  <div class="row">
                        <div class="col s1">Product ID</div>
                        <div class="col s2">Product Name</div>
                        <div class="col s1">DevTeam ID</div>
                        <div class="col s2">Dev Team</div>
                        <div class="col s1">Amount Sold</div>
                        <div class="col s1">Price</div>
                        <div class="col s2">Total Revenue</div>
                        <div class="col s2">Revenue Cut</div>

                  </div>
                  <hr>
                  <?php
                  $countsql="SELECT product.product_id,product.product_name,product.price,dev_team.dev_team_id,dev_team.dev_team,COUNT(*)
                             FROM sales,product,dev_team
                             WHERE product.product_id=sales.product_id AND sales.dev_team_id=dev_team.dev_team_id
                             GROUP BY product_id";
                  $rescount= mysqli_query($conn, $countsql);
                  $count = mysqli_fetch_all($rescount, MYSQLI_ASSOC);
                  foreach ($count as $count) {  ?>
                      <div class="row">
                        <div class="col s1"><?php echo htmlspecialchars($count['product_id']) ?></div>
                        <div class="col s2"><?php echo htmlspecialchars($count['product_name']) ?></div>
                        <div class="col s1"><?php echo htmlspecialchars($count['dev_team_id']) ?></div>
                        <div class="col s2"><?php echo htmlspecialchars($count['dev_team']) ?></div>
                            <div class="col s1"><?php echo htmlspecialchars($count['COUNT(*)']) ?></div>
                            <div class="col s1">$<?php echo htmlspecialchars($count['price']) ?></div>
                            <div class="col s2">$<?php
                            $totalsale = htmlspecialchars($count['price'])*htmlspecialchars($count['COUNT(*)']);
                              echo $totalsale;
                            ?></div>
                            <div class="col s2">$<?php
                              echo (30/100) * $totalsale;
                            ?></div>

                      </div>
                  <?php  }?>
                </li>

              </div>
            </div>
        </div>

<div class="container">


</div>


      </section>


    </center>
    <div class="section"></div>
    <div class="section"></div>
  </main>
  <footer><?php include ("footer.php"); ?></footer>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.1/jquery.min.js"></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.5/js/materialize.min.js"></script>
  <!-- Compiled and minified JavaScript -->
  <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-beta/js/materialize.min.js"></script>
  <script>
  $(document).ready(function(){
    $(".sidenav").sidenav();
  })
  </script>
</body>

</html>
