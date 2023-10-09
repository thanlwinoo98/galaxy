<?php
  if(!empty($_GET['file'])){
   $filename = basename($_GET['file']);
   $filepath = 'productzip/' .$filename;

   if(!empty($filename)&&file_exists($filepath)){
     header("Cache-Control: public");
     header("Content-Description: File Transfer");
     header("Content-Disposition: attachment; filename=$filename");
     header("Content-Transfer-Encoding: binary");

     readfile($filepath);
     exit;
   }
   else{
     echo"File does not exist";
   }
  }

 ?>
