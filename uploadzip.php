<?php
include('config/session.php');
if(isset($_POST["submit"])){

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
                $fileNameNew = uniqid('',true).".".$fileActualExt;
                $fileDestination = 'productzip/'.$fileNameNew;

                move_uploaded_file($fileTmpName,$fileDestination);
                // $ex_sql= mysqli_query($conn, $sql);
                // header("Location: profile.php?uploadsuccess");
          }else {
            echo"There was an error uploading your file!";
          }
  }else {
    echo"You cannot upload files of this type";
  }
}

?>
