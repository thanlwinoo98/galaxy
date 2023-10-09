<?php
include("config/db_connect.php");
$username = $email = $password = $repassword = "";
$errors =  array('email'=>'','username'=>'','password'=>'','repassword'=>'');
if (isset($_POST["submit"])) {

//checking email
  if(empty($_POST["email"])){
  $errors["email"] = "An email is required";
}else if (!empty($_POST["email"])) {
  $email = $_POST["email"];
  $sql_e = "SELECT * FROM user WHERE email='$email'";
  $res_e = mysqli_query($conn, $sql_e);
  if (mysqli_num_rows($res_e) > 0) {
      $errors["email"] = "Email already exist";
    }
  }
  else {
  $email = $_POST["email"];
    if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
      $errors["email"] = "Email must be a valid email address";
    }
  }
//checking username
  if(empty($_POST["username"])){
  $errors["username"] = "An username is required <br/>";
}else{
  $username = $_POST["username"];
  $sql_u = "SELECT * FROM user WHERE username='$username'";
  $res_u = mysqli_query($conn, $sql_u);
  if (mysqli_num_rows($res_u) > 0) {
  	  $errors["username"] = "Username already exist";
  	}
  }

//checking password
  if(empty($_POST["password"])){
  $errors["password"] = "An password is required";
  } else {
  $password = $_POST["password"];
  if ($_POST["password"]==$_POST["username"]){
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
}else {
        $email = mysqli_real_escape_string($conn, $_POST["email"]);
        $username = mysqli_real_escape_string($conn, $_POST["username"]);
        $password = mysqli_real_escape_string($conn, $_POST["password"]);
        //if profile name is empty, then replaced by username
        if(empty($_POST["pname"])){
          $pname = $username;
        }else {
          $pname = mysqli_real_escape_string($conn, $_POST["pname"]);
        }

      //create sql
        $sql =  "INSERT INTO user(username,password,email,profile_name)VALUES('$username','$password','$email','$pname')";
        //save
              if (mysqli_query($conn,$sql)) {
                //success
                header("Location: login.php");

              }else{
                //errors
                echo"query error: " . mysqli_error($conn);
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
      <h5 class="white-text">Please, enter you information.</h5>
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
                    <div class="red-text"> <?php echo  $errors['username']; ?>  </div>
                    <div class='input-field col s12'>
                      <input class='validate white-text' type='text' name='username' id='username' />
                      <label for='username'>Enter your Username</label>
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

                  <div class='row'>
                    <div class="red-text"> <?php echo  $errors['email']; ?>  </div>
                    <div class='input-field col s12'>
                      <input class='validate white-text' type='email' name='email' id='email' />
                      <label for='email'>Enter your email</label>
                    </div>

                    <div class='row'>
                      <div class='input-field col s12'>
                        <input class='validate white-text' type='text' name='pname' id='pname' />
                        <label for='pname'>Enter your Profile Name (Optional)</label>
                      </div>
                  </div>
                </div>

                  <br />
                  <center>
                    <div class='row'>
                      <button type='submit' name='submit' class='col s12 btn btn-large waves-effect indigo'>Register</button>
                    </div>
                  </center>
                </form>
              </div>
              <div class="col s12 l4"></div>
        </div>
        </div>
      </div>
      <p class="white-text">Have an account?<a href="login.php"> Login</a></p>
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
