<?php
include("config/db_connect.php");
$errors =  array('ausername'=>'','apassword'=>'');


if(isset($_POST["submit"])){
      session_start();
      $ausername = mysqli_real_escape_string($conn,$_POST['ausername']);
      $apassword = mysqli_real_escape_string($conn,$_POST['apassword']);

  //checking ausername and apassword
    if(empty($_POST["ausername"])){
      $errors["ausername"] = "Please enter username and password";
    }
    else if (!empty($_POST["ausername"])) {
        $sql_u = "SELECT * FROM admin WHERE ausername='$ausername' and apassword = '$apassword'";
        $result = mysqli_query($conn, $sql_u);

        //fetch
        $user = mysqli_fetch_all($result, MYSQLI_ASSOC);

        $res_u = mysqli_query($conn, $sql_u);
        if (mysqli_num_rows($res_u) > 0) {
            $_SESSION['log_ausername'] = $ausername;
           // $_SESSION['log_userid'] = $user_id;
           // $_SESSION["profile_name"] = $user['profile_name'];
           header("location: adminpage.php");
         }
          else {
              $errors["ausername"] = "Wrong username or password";
         }
    }

}






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
      background-color:#f48fb1;
    }

    .flexbox {
        display: flex;
        flew-wrap: wrap;
        justify-content: center;
        align-items: center;
      }
    main {
      /* flex: 1 0 auto; */
    }

    body {
      background: #fff;
    }

    .input-field input[type=date]:focus + label,
    .input-field input[type=text]:focus + label,
    .input-field input[type=email]:focus + label,
    .input-field input[type=apassword]:focus + label {
      color: #e91e63;
    }

    .input-field input[type=date]:focus,
    .input-field input[type=text]:focus,
    .input-field input[type=email]:focus,
    .input-field input[type=apassword]:focus {
      border-bottom: 2px solid #e91e63;
      box-shadow: none;
    }
  </style>
</head>

<body class="pink lighten-3">
  <?php include ("header.php"); ?>
  <div class="section"></div>
  <main>
    <center>
      <!-- <div class="section"></div> -->
      <h5 class="white-text">Login into your admin account</h5>
      <div class="section"></div>

      <div class="container">
        <div class="row">
          <div class="col l4"></div>
              <div class="col s4 l4 center-align z-depth-1 indigo darken-3 row" style="display: inline-block; padding: 32px 48px 0px 48px;">

                <form action="<?php echo $_SERVER["PHP_SELF"] ?>"class="col s12" method="post">
                  <div class='row'>
                    <div class='col s12'>
                    </div>
                  </div>

                  <div class='row'>
                    <div class="red-text"> <?php echo  $errors['ausername']; ?>  </div>
                    <div class='input-field col s12'>
                      <input class='validate white-text' type='text' name='ausername' id='ausername' />
                      <label for='ausername'>Enter admin username</label>
                    </div>
                  </div>

                  <div class='row'>
                    <div class='input-field col s12'>
                      <input class='validate white-text' type='password' name='apassword' id='apassword' />
                      <label for='apassword'>Enter password</label>
                    </div>
                  </div>

                  <br />
                  <center>
                    <div class='row'>
                      <button type='submit' name='submit' class='col s12 btn btn-large waves-effect indigo'>Login</button>
                    </div>
                  </center>
                </form>
              </div>
              <div class="col s12 l4"></div>
        </div>
        </div>
    </center>

    <div class="section"></div>
    <div class="section"></div>
  </main>
  <footer style="position: relative; top:100px;"><?php include ("footer.php"); ?></footer>
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
