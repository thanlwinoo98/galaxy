<?php

define('DB_SERVER', 'localhost');
  define('DB_USERNAME', 'than');
  define('DB_PASSWORD', 'test1234');
  define('DB_DATABASE', 'galaxy');

$conn = mysqli_connect('localhost','than','test1234','galaxy');

//check connection
  if(!$conn) {
    echo 'Connection error: ' . mysqli_connect_error();
  }?>
