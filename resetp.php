<?php
  include("config/db_connect.php");
  session_start();
  $password = $repassword = "";
  $errors =  array('password'=>'','repassword'=>'');

  $takenemail = $_SESSION["reset_email"];
  $takenusername = $_SESSION["reset_username"];

if (isset($_POST['submit'])) {
  if(empty($_POST["password"])){
    $errors["password"] = "An password is required";
  } else {
    $password = $_POST["password"];

    if ($_POST["password"]==$takenusername){
      $errors["password"]= "Password must not be the same as username.";
    }
  }
  //checking re-enter password
  if(empty($_POST["repassword"])){
    $errors["repassword"] = "Please re-enter password";
  }else {
      $repassword = $_POST["repassword"];
      if($_POST["password"]!=$_POST["repassword"]){
        $errors["repassword"]= "Both password must be the same";
    }
  }

  if(array_filter($errors)){
    echo "errors in the form";
  }else {
        $password = mysqli_real_escape_string($conn, $_POST["password"]);

      //create sql
        $sql =  "UPDATE user
                 SET password = '$password'
                 WHERE username = '$takenusername' AND email = '$takenemail';
                ";
        //save
              if (mysqli_query($conn,$sql)) {
                //success
                header("Location: logout.php");
              }else{
                //errors
                echo"query error: " . mysqli_error($conn);
              }
          }
}

 ?>

<!DOCTYPE html>



<html lang="en" dir="ltr">
  <head>
    <title></title>
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
        <h5 class="white-text">Please, enter your new password</h5>
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
                      <div class="red-text"> <?php echo  $errors['password']; ?>  </div>
                      <div class='input-field col s12'>
                        <input class='validate white-text' type='password' name='password' id='password' />
                        <label for='password'>Enter your password</label>
                      </div>
                    </div>

                    <div class='row'>
                      <div class="red-text"> <?php echo  $errors['repassword']; ?>  </div>
                      <div class='input-field col s12'>
                        <input class='validate white-text' type='password' name='repassword' id='repassword'/>
                        <label for='repassword'>Re-Enter your password</label>
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
