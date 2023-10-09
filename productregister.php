<?php

include("config/session.php");
$product_name = $dev_team_id = $developername = $description =$publisher= $dev_id = $price = "";
$errors =  array('product_name'=>'','dev_team_id'=>'','developername'=>'','dev_id'=>'','publisher'=>'','uploadfile'=>'','price'=>'','img1'=>'','img2'=>'','img3'=>'','img4'=>'');
if (isset($_POST["submit"])) {

//check product name
  if(empty($_POST["product_name"])){
  $errors["product_name"] = "Please Enter a Product Name";
  }else if (!empty($_POST["product_name"])) {
  $product_name = $_POST["product_name"];
  $sql_tp = "SELECT * FROM product WHERE product_name='$product_name'";
  $res_tp = mysqli_query($conn, $sql_tp);
  if (mysqli_num_rows($res_tp) > 0) {
  	  $errors["product_name"] = "Product Name Already Exist";
  	}
  }

//checking dev_team_id
  if(empty($_POST["dev_team_id"])){
  $errors["dev_team_id"] = "A Developer Team ID is required <br/>";
}else{
  $dev_team_id = $_POST["dev_team_id"];
  $sql_tu = "SELECT * FROM dev_team WHERE dev_team_id='$dev_team_id' AND approval='1'";
  $res_tu = mysqli_query($conn, $sql_tu);
  if (mysqli_num_rows($res_tu) == 0) {
  	  $errors["dev_team_id"] = "Developer Team ID does not exist";
  	}
  }

  $developername = $_POST["developername"];

  //checking teamname

    if(!empty($_POST["dev_id"])) {
    $dev_id = $_POST["dev_id"];
    $sql_tu = "SELECT * FROM dev WHERE user_id='$id' AND approval='1'";
    $res_tu = mysqli_query($conn, $sql_tu);
    if (mysqli_num_rows($res_tu) == 0) {
        $errors["dev_id"] = "Developer Id does not exist";
      }
    }


      if(!empty($_POST["price"])) {
      $price = $_POST["price"];
    }else{
      $errors["price"]="Please Enter Price For the Product";
    }


          if(!empty($_POST["publisher"])) {
            $publisher = $_POST["publisher"];
        }else{
          $errors["publisher"]="Please Enter Publisher For the Product";
        }
      $description = $_POST["description"];

 //need 1 img at least

  //check uploaded file
  $file = $_FILES['uploadfile'];
  $fileName = $_FILES['uploadfile']['name'];
  $fileTmpName = $_FILES['uploadfile']['tmp_name'];
  $fileSize = $_FILES['uploadfile']['size'];
  $fileError = $_FILES['uploadfile']['error'];
  $fileType = $_FILES['uploadfile']['type'];
  $fileExt = explode('.', $fileName);
  $fileActualExt = strtolower(end($fileExt));
  $allowed = array('zip','rar','7z');
  if(in_array($fileActualExt, $allowed)){
          if($fileError === 0){
                $fileNameNew = $fileName;

          }else {
            $errors["uploadfile"]="There was an error uploading your file!";
          }
  }else {
    $errors["uploadfile"]="You cannot upload files of this type";
  }

//check upload img1
$file1 = $_FILES['img1'];
$fileName1 = $_FILES['img1']['name'];
$fileTmpName1 = $_FILES['img1']['tmp_name'];
$fileSize1 = $_FILES['img1']['size'];
$fileError1 = $_FILES['img1']['error'];
$fileType1 = $_FILES['img1']['type'];
$fileExt1 = explode('.', $fileName1);
$fileActualExt1 = strtolower(end($fileExt1));
$allowed1 = array('jpg','jpeg','png');
if(in_array($fileActualExt1, $allowed1)){
  if($fileError1 === 0){
      if($fileSize1 < 4000000){
        $fileNameNew1 = uniqid('',true).".".$fileActualExt1;
      }else {
      $errors['img1']="Your Img exceed 4MB";
      }
  }else {
    $errors['img1']="There was an error uploading your file!";
  }
}else {
  $errors['img1']="You cannot upload files of this type";
}

//check upload img2
$file2 = $_FILES['img2'];
$fileName2 = $_FILES['img2']['name'];
$fileTmpName2 = $_FILES['img2']['tmp_name'];
$fileSize2 = $_FILES['img2']['size'];
$fileError2 = $_FILES['img2']['error'];
$fileType2 = $_FILES['img2']['type'];
$fileExt2 = explode('.', $fileName2);
$fileActualExt2 = strtolower(end($fileExt2));
$allowed2 = array('jpg','jpeg','png');
if (!$fileName2='') {
  if(in_array($fileActualExt2, $allowed2)){
    if($fileError2 === 0){
        if($fileSize2 < 4000000){
          $fileNameNew2 = uniqid('',true).".".$fileActualExt2;
        }else {
        $errors['img2']="Your Img exceed 4MB";
        }
    }else {
      $errors['img2']="There was an error uploading your file!";
    }
  }else {
    $errors['img2']="You cannot upload files of this type";
  }
}


//check upload img3
$file3 = $_FILES['img3'];
$fileName3 = $_FILES['img3']['name'];
$fileTmpName3 = $_FILES['img3']['tmp_name'];
$fileSize3 = $_FILES['img3']['size'];
$fileError3 = $_FILES['img3']['error'];
$fileType3 = $_FILES['img3']['type'];
$fileExt3 = explode('.', $fileName3);
$fileActualExt3 = strtolower(end($fileExt3));
$allowed3 = array('jpg','jpeg','png');

if (!$fileName3='') {
if(in_array($fileActualExt3, $allowed3)){
  if($fileError3 === 0){
      if($fileSize3 < 4000000){
        $fileNameNew3 = uniqid('',true).".".$fileActualExt3;
      }else {
      $errors['img3']="Your Img exceed 4MB";
      }
  }else {
    $errors['img3']="There was an error uploading your file!";
  }
}else {
  $errors['img3']="You cannot upload files of this type";
}
}
//check upload img 4
$file4 = $_FILES['img4'];
$fileName4 = $_FILES['img4']['name'];
$fileTmpName4 = $_FILES['img4']['tmp_name'];
$fileSize4 = $_FILES['img4']['size'];
$fileError4 = $_FILES['img4']['error'];
$fileType4 = $_FILES['img4']['type'];
$fileExt4 = explode('.', $fileName4);
$fileActualExt4 = strtolower(end($fileExt4));
$allowed4 = array('jpg','jpeg','png');

if (!$fileName4='') {

if(in_array($fileActualExt4, $allowed4)){
  if($fileError4 === 0){
      if($fileSize4 < 4000000){
        $fileNameNew4 = uniqid('',true).".".$fileActualExt4;
      }else {
      $errors['img4']="Your Img exceed 4MB";
      }
  }else {
    $errors['img4']="There was an error uploading your file!";
  }
}else {
  $errors['img4']="You cannot upload files of this type";
}
}

//check upload at lease one img
if (($fileName1==''&&$fileName2==''&&$fileName3==''&&$fileName4=='')) {
  $errors['img1']="Please Upload at least one image for the product";
}

if(array_filter($errors)){

}else {

              //check img1
              $fileDestination1 = 'productimg/'.$fileNameNew1;
              //check img2
              $fileDestination2 = 'productimg/'.$fileNameNew2;

              //check img3
              $fileDestination3 = 'productimg/'.$fileNameNew3;

              //check img4
              $fileDestination4 = 'productimg/'.$fileNameNew4;

              $newproduct_name = str_replace("'","~","$product_name");

              $newdescription = str_replace("'","~","$description");

                      //check ZIP
                      $fileDestination = 'productzip/'.$fileNameNew;
                      move_uploaded_file($fileTmpName,$fileDestination);
                      $sql =  "INSERT INTO product(product_name,dev_team_id,description,approval,developer,img_path1,img_path2,img_path3,img_path4,file_name,price,publisher)VALUES
                                                  ('$newproduct_name','$dev_team_id','$newdescription',0,'$developername','$fileDestination1','$fileDestination2','$fileDestination3','$fileDestination4','$fileNameNew','$price','$publisher')";

        //save
              if (mysqli_query($conn,$sql)) {
                $_SESSION['productname']=$product_name;
                $_SESSION['dev_team_id']=$dev_team_id;

                move_uploaded_file($fileTmpName1,$fileDestination1);
                move_uploaded_file($fileTmpName2,$fileDestination2);
                move_uploaded_file($fileTmpName3,$fileDestination3);
                move_uploaded_file($fileTmpName4,$fileDestination4);

                header("Location: devsysreq.php");
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
  <header><?php
  if(isset($_SESSION["log_username"])){
    $session = $_SESSION["log_username"];
    include("header2.php");
  }else{
    include("header.php");
  }

           ?>
  </header>
    <div class="section"></div>

  <main>
    <center>
      <!-- <div class="section"></div> -->
      <h5 class="white-text">Please Enter the Product information Correctly.</h5>
      <div class="section"></div>

      <div class="container">

        <div class="row">
          <div class="col l4 center"></div>
              <div class="col s4 l4 center-align z-depth-1 indigo darken-3 row" style="display: inline-block; padding: 32px 48px 0px 48px; width:500px; ">

                <form class="col s12" action="<?php echo $_SERVER["PHP_SELF"]; ?>" enctype="multipart/form-data" method="post">
                  <div class='row'>
                    <div class='col s12'>
                    </div>
                  </div>

                  <div class='row'>
                    <div class="red-text"> <?php echo  $errors['product_name']; ?>  </div>
                    <div class='input-field col s12'>
                      <input class='validate white-text' type='text' name='product_name' id='product_name' />
                      <label for='product_name'>Please Enter Your Product Name</label>
                    </div>
                  </div>

                  <div class='row'>
                    <div class="red-text"> <?php echo  $errors['dev_team_id']; ?>  </div>
                    <div class='input-field col s12'>
                      <input class='validate white-text' type='text' name='dev_team_id' id='dev_team_id' />
                      <label for='dev_team_id'>Please Enter Your Developer Team ID</label>
                    </div>
                  </div>

                  <div class='row'>
                    <div class="red-text"> <?php echo  $errors['developername']; ?>  </div>
                    <div class='input-field col s12'>
                      <input class='validate white-text' type='text' name='developername' id='developername' />
                      <label for='developername'>Enter Your Developer Name (Optional)</label>
                    </div>
                  </div>


                 <div class='row'>
                   <div class="red-text"> <?php echo  $errors['publisher']; ?>  </div>
                   <div class='input-field col s12'>
                     <input class='validate white-text' type='text' name='publisher' id='publisher' />
                     <label for='publisher'>Enter Publisher of the Product</label>
                   </div>
                 </div>

                 <div class='row'>
                   <div class="red-text"> <?php echo  $errors['price']; ?>  </div>
                   <div class='input-field col s12'>
                     <input class='validate white-text' type='text' name='price' id='price' />
                     <label for='price'>Enter Price of the Product (Number Only)</label>
                   </div>
                 </div>

                  <div class='row'>
                    <div class='input-field col s12'>
                      <textarea class="white"name="description" id="para" cols="30" rows="10"></textarea>
                      <label for='para' class="black-text">Enter Description for you product</label>
                    </div>
                  </div>


                  <div class='row indigo lighten-1'>
                    <div class="red-text"> <?php echo  $errors['uploadfile']; ?>  </div>
                    <div class="white-text"> Please Upload File in Zip,RAR or 7z  </div>
                    <div class='input-field col s12'>
                      <input type="file" name="uploadfile">
                    </div>
                  </div>

                  <div class='row indigo lighten-1'>
                    <div class="red-text"> <?php echo  $errors['img1']; ?>  </div>
                    <div class="white-text"> Upload Image 1  </div>
                    <div class='input-field col s12'>
                      <input type="file" name="img1">
                    </div>
                  </div>

                 <div class='row indigo lighten-1'>
                   <div class="red-text"> <?php echo  $errors['img2']; ?>  </div>
                   <div class="white-text"> Upload Image 2  </div>
                   <div class='input-field col s12'>
                     <input type="file" name="img2">
                   </div>
                 </div>

                 <div class='row indigo lighten-1'>
                   <div class="red-text"> <?php echo  $errors['img3']; ?>  </div>
                   <div class="white-text"> Upload Image 3  </div>
                   <div class='input-field col s12'>
                     <input type="file" name="img3">
                   </div>
                 </div>

                   <div class='row indigo lighten-1'>
                      <div class="red-text"> <?php echo  $errors['img4']; ?>  </div>
                      <div class="white-text"> Upload Image 4  </div>
                        <div class='input-field col s12'>
                          <input type="file" name="img4">
                       </div>
                   </div>




                  <br/>
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
