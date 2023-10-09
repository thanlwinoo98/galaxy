<?php
include('config/session.php');
if(isset($_POST["submit"])){
  $noer= 0;
  $noer2= 0;
  $file = $_FILES['img'];

  $fileName = $_FILES['img']['name'];
  $fileTmpName = $_FILES['img']['tmp_name'];
  $fileSize = $_FILES['img']['size'];
  $fileError = $_FILES['img']['error'];
  $fileType = $_FILES['img']['type'];

  $fileExt = explode('.', $fileName);
  $fileActualExt = strtolower(end($fileExt));

  $allowed = array('jpg','jpeg','png');

  if(in_array($fileActualExt, $allowed)){
    if($fileError === 0){
        if($fileSize < 500000){
          $fileNameNew = uniqid('',true).".".$fileActualExt;
          $fileDestination = 'profileimg/'.$fileNameNew;

          move_uploaded_file($fileTmpName,$fileDestination);
          $sql = "UPDATE user SET img_path='$fileDestination' WHERE user_id=$id";
          if (mysqli_query($conn,$sql)) {
            echo "success";
            $noer= 1;
          }else{
            //errors
            echo"query error: " . mysqli_error($conn);
          }
          // $ex_sql= mysqli_query($conn, $sql);
          // header("Location: profile.php?uploadsuccess");
        }else {
          echo"Your file is too big!";
        }
    }else {
      echo"There was an error uploading your file!";
    }
  }else {
    echo"You cannot upload files of this type";
  }
}

$pname = $_POST["pname"];
if (strlen($pname) >= 16) {
  echo"Exceeded 15 chars.";
}else {
  $sqlp = "UPDATE user SET profile_name='$pname' WHERE user_id=$id";
  if (mysqli_query($conn,$sqlp)) {
    echo "Name Updated.";
    $noer2 = 1;
  }else{
    //errors
    echo"query error: " . mysqli_error($conn);
  }
}

if ($noer==1 && $noer2==1) {
  header("Location: profile.php");
}else{
  echo "Errors in the Form.";?> <a href="profile.php">Go Back</a><?php
}


 ?>
