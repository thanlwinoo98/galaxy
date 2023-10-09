<?php
include("config/db_connect.php");
$email = $username = "";
$errors =  array('email'=>'','username'=>'');

if (isset($_POST["submit"])) {
  session_start();
//checking username and email
  if(empty($_POST["username"])){
    $errors["username"] = "Username is required";
  }
  if(empty($_POST["email"])){
    $errors["email"] = "An Email is required";
  }
  else if (!empty($_POST["email"])) {
  $email = $_POST["email"];
  $username = $_POST["username"];
  $sql_e = "SELECT * FROM user WHERE username='$username' AND email='$email'";
  $res_e = mysqli_query($conn, $sql_e);
    if (mysqli_num_rows($res_e) > 0) {
        $_SESSION["reset_email"]=$_POST["email"];
        $_SESSION["reset_username"]=$_POST["username"];

        header("location: resetp.php");
      }
    else{
        $errors["email"] = "Please Enter both correct username and email";
      }
  }
  else {
  $email = $_POST["email"];
    if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
      $errors["email"] = "Email must be a valid email address";
    }
  }



  // if(array_filter($errors)){
  //       }else
  //       {
  //         $email = mysqli_real_escape_string($conn, $_POST["email"]);
  //       }
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
    .input-field input[type=password]:focus + label {
      color: #e91e63;
    }

    .input-field input[type=date]:focus,
    .input-field input[type=text]:focus,
    .input-field input[type=email]:focus,
    .input-field input[type=password]:focus {
      border-bottom: 2px solid #e91e63;
      box-shadow: none;
    }
  </style>
</head>

<body>
  <?php include ("header.php"); ?>
  <div class="section"></div>
  <main>
    <center>
      <!-- <div class="section"></div> -->
      <h5 class="white-text">Please, login into your account</h5>
      <div class="section"></div>

      <div class="container">
        <div class="row">
          <div class="col l4"></div>
              <div class="col s4 l4 center-align z-depth-1 indigo darken-3 row" style="display: inline-block; padding: 32px 48px 0px 48px;">

                <form class="col s12" action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="post">
                  <div class='row'>
                    <div class='col s12'>
                    </div>
                  </div>

                  <div class='row'>
                    <div class="red-text"> <?php echo  $errors['email']; ?>  </div>
                    <div class='input-field col s12'>
                      <input class='validate white-text' type='email' name='email' id='email' />
                      <label for='email'>Enter your email</label>
                    </div>

                    <div class='row'>
                      <div class="red-text"> <?php echo  $errors['username']; ?>  </div>
                      <div class='input-field col s12'>
                        <input class='validate white-text' type='text' name='username' id='username' />
                        <label for='username'>Enter your username</label>
                      </div>
                    </div>

                  <br />
                  <center>
                    <div class='row'>
                      <button type='submit' name='submit' class='col s12 btn btn-large waves-effect indigo'>Comfirm</button>
                    </div>
                  </center>
                </form>
              </div>
              <div class="col s12 l4"></div>
        </div>
        </div>
      </div>
      <a href="login.php">Back</a>
    </center>

    <div class="section"></div>
    <div class="section"></div>

  </main>
  <footer style="position: relative; top:200px;"><?php include ("footer.php"); ?></footer>

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
