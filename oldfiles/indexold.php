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
      body{
        background: #303f9f;
      }
      header{
        background: url(img/stars.jpg);
        background-size: cover;
        background-position: center;
        min-height: 250px;
      }

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
    <header>
      <div class="navbar-fixed">
        <nav class="nav-wrapper background">
            <div class="container">
              <div class="row">
                <!-- Brand logo -->
                <div class="col l2">
                  <h4>Galaxy</h4>
                  <a href="#"class="sidenav-trigger hide-on-med-and-up" data-target="mobile-menu">
                    <i class="material-icons">menu</i>
                  </a>
                </div>
                <!-- navbar content -->
                <div class="col l8">
                  <ul class="hide-on-med-and-down">
                    <li><a href="#" class="btn-large transparent">User</a></li>
                    <li><a href="#" class="btn-large transparent">User</a></li>
                    <li><a href="#" class="btn-large transparent">User</a></li>
                    <li><a href="#" class="btn-large transparent">User</a></li>
                  </ul>
                </div>
                <!-- Search Box -->
                <div class="col l2">
                  <form action="index.html">
                  <div class="input-field transparent">
                    <i class="material-icons prefix white-text">search</i>
                    <input type="text" id="search">
                    <label for="search">Search</label>
                  </div>
                  </form>
                </div>
               </div>
              </div>
          </div>
          <!-- sidenav content -->
          <ul class="sidenav grey lighten-4" id="mobile-menu">
            <li><a href="#" class="">Photos</a></li>
            <li><a href="#">Services</a></li>
            <li><a href="#">Contact</a></li>
          </ul>
        </nav>
      </div>
    </header>

    <section>
      <div class="container" style="width: 1000px; height: 1000px;"></div>
      <div class="container" style="width: 1000px; height: 1000px;"></div>
      <div class="container" style="width: 1000px; height: 1000px;"></div>
    </section>

    <footer class="page-footer grey darken-3">
      <div class="container">
        <div class="row">
          <div class="col s12 l6">
            <h5>About Me</h5>
            <p>Sh Nam 1 year ago Thanks a lot man. I wish u could make a video for comparing hosting services vs clouds vs github vs firebase for having either a static or dynamic site.</p>
            <p>Sh Nam 1 year ago Thanks a lot man. I wish u could make a video for comparing hosting services vs clouds vs github vs firebase for having either a static or dynamic site.</p>
          </div>
          <div class="col s12 l4 offset-l2">
            <h5>Connect</h5>
            <ul>
              <li><a href="#" class="grey-text text-lighten-3">Facebook</a></li>
              <li><a href="#" class="grey-text text-lighten-3">Twitter</a></li>
              <li><a href="#" class="grey-text text-lighten-3">Linkedin</a></li>
              <li><a href="#" class="grey-text text-lighten-3">YouTube</a></li>

            </ul>
          </div>
        </div>
      </div>
      <div class"footer-copyright grey darken-4">
        <div class="container center-align">&copy; 2019 Galaxy</div>
      </div>
    </footer>



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
