<?php
   include('config/session.php');
//fetch user
$user_check = "SELECT * from user WHERE user_id='$id'";
$res_u = mysqli_query($conn, $user_check);
$user = mysqli_fetch_all($res_u, MYSQLI_ASSOC);

foreach($user as $user){
        $user_email = htmlspecialchars($user["email"]);
        $img_path = ($user["img_path"]);
        $user_profile = htmlspecialchars($user["profile_name"]);
        $user_date = htmlspecialchars($user["date_created"]);
     }

 $p_check = "SELECT * from sales WHERE user_id='$id'";
 $res_po = mysqli_query($conn, $p_check);
 $owned = mysqli_num_rows($res_po);


//check if the user is admin
   $admin_check = "SELECT * from dev_team WHERE team_admin_id='$id'";
   $res_a = mysqli_query($conn, $admin_check);
   $admin = mysqli_fetch_all($res_a, MYSQLI_ASSOC);

   foreach($admin as $admin){
           $dev_team_id = htmlspecialchars($admin['dev_team_id']);
           $dev_team = htmlspecialchars($admin['dev_team']);
           $dev_team_email = htmlspecialchars($admin['dev_team_email']);
           $date_registered = htmlspecialchars($admin['date_registered']);
           $dev_approval = htmlspecialchars($admin['approval']);
        }
//check developer in the database
   $developer_check = "SELECT * from dev WHERE user_id='$id'";
   $res_d = mysqli_query($conn, $developer_check);
   $developer = mysqli_fetch_all($res_d, MYSQLI_ASSOC);

  foreach($developer as $developer){
          $user_id = htmlspecialchars($developer['user_id']);
          $dev_id = htmlspecialchars($developer['dev_id']);
          $dev_team_id2 = htmlspecialchars($developer['dev_team_id']);
          $admin_approval = htmlspecialchars($developer['approval']);
       }
//check developer team approval
if(isset($dev_team_id2)){
  $approve_check = "SELECT * from dev_team WHERE dev_team_id='$dev_team_id2'";
  $resultc = mysqli_query($conn, $approve_check);
  $approve = mysqli_fetch_all($resultc, MYSQLI_ASSOC);

  foreach($approve as $approve){
       $approve_team = htmlspecialchars($approve["dev_team"]);
  }
}


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

      <title>Profile</title>

      <style>
      .tabs.tabs-fixed-width .indicator{
        background-color: #1a237e;
      }

      .tabs.tabs-fixed-width .tab a:focus, .tabs.tabs-fixed-width .tab a:focus.active{
        background: transparent;
      }

      </style>
   </head>
   <body>
     <header><?php include ("header2.php"); ?></header>

     <div class="section"></div>
     <div class="section"></div>

     <div class="container">

         <div class="card">
             <div class="card-content">
               <div class="row">
                 <div class="col img"style="width:125px; height:125px;">
                     <img src="<?php echo $img_path ?>" height="125" width="125" alt="No image" style="position:relative; right:11px;"/>

                 </div>
                 <h3  class="col" style="position:relative; left:30px;"><?php echo $pname; ?></h3>
               </div>



             </div>
             <div class="card-tabs">
               <ul class="tabs tabs-fixed-width">
                 <li class="tab"><a class="active" href="#test4">User</a></li>
                 <li class="tab"><a href="#test5">Developer</a></li>
               </ul>
             </div>
             <div class="card-content blue lighten-4">
               <div id="test4">
                 <p>User-ID: <?php echo $id; ?> </p>
                 <p>Username: <?php echo $username; ?> </p>
                 <p><a href="library.php" class="black-text">Product Purchased : (<?php echo $owned ?>)</a></p>
                 <p><a href="" class="black-text">Inventory</a> </p>
                 <p><a href="" class="black-text">Screenshots</a> </p>
                 <p><a href="" class="black-text">Reviews</a></p>
                 <p><a href="" class="black-text">Videos</a></p>
                  <form class="" action="profileupload.php" method="post" enctype="multipart/form-data">
                    <p>Change Profile Picture (500kb)(jpg,jpeg,png): <input type="file" name="img"></p>
                    <p>Change Profile Name (15 charmax): <input type="textbox" name="pname" value='<?php echo $user_profile ?>'><input type="submit" name="submit"></p>
                  </form>
               </div>
               <div id="test5">


                    <?php if (mysqli_num_rows($res_d) > 0) {
                      if ($admin_approval == 0) {
                         ?><p>You have not been approved from <?php echo $approve_team ?> yet.</p><?php
                      } elseif($admin_approval == 1){
                         ?><p>You are in a Developer Team</p>
                           <p>User_ID: <?php echo $user_id ?></p>
                           <p>Developer_ID: <?php echo $dev_id ?></p>
                           <p>DeveloperTeamName: <?php echo $approve_team ?></p>
                           <p>DeveloperTeamID: <?php echo $dev_team_id2 ?></p>
                           <p>Uploads, Delete, Update Your Product here.<a href="devproductmgnpage.php">Manage Your Products</a></p>
                         <?php
                      }

                     }
                      else if (mysqli_num_rows($res_a) >0) {
                          ?><p>You are an Admin of Developer Team</p>
                            <p>Your Team Information </p>
                            <p>DeveloperTeamID : <?php echo $dev_team_id ?></p>
                            <p>DeveloperTeamName : <?php echo $dev_team?></p>
                            <p>DeveloperTeamEmail : <?php echo $dev_team_email?></p>
                            <p>RegisterDate : <?php echo $date_registered?></p>
                            <p> <?php if ($dev_approval == 0) {
                              echo "Your Team is not Approved by Admins yet.</br> Please,wait until approved to use.";
                            } elseif ($dev_approval == 1) {
                              echo "Your Team is Approved."; ?>
                              <a href="devmanagement.php">Click Here to Manage your team.</a>
                              <p>Uploads, Delete, Update Your Product here.<a href="devproductmgnpage.php">Manage Your Products</a></p>
                              <?php  }?>
                              </p>

                          <?php
                      }
                      else {
                        ?><p>You are not a developer in our database. <a href="devpage.php">Become one?</a></p><?php
                     }
                     ?>




               </div>


             </div>
           </div>


     </div>
     <div class="section"></div>
     <div class="section"></div>
     <div class="section"></div>
     <div class="section"></div>
     <div class="section"></div>
     <div class="section"></div>
     <footer><?php include ("footer.php"); ?></footer>
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
