<?php
  $username = "root";
  $password = "vovanquang";
  $servername ="localhost";
  $dbname = "shop_fashion";
  $conn = mysqli_connect($servername,$username,$password,$dbname);
  mysqli_set_charset($conn, 'utf8');
  if(!$conn){
    die("không thể kết nối..".mysqli_connect_error());
  }

?>
