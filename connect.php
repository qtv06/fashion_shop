<?php
  $username = "sql12251394";//"root";
  $password = "glyTLxGqSl";//"vovanquang";
  $servername ="sql12.freemysqlhosting.net";//"localhost";
  $dbname = "sql12251394";//"shop_fashion";
  $conn = mysqli_connect($servername,$username,$password,$dbname);
  mysqli_set_charset($conn, 'utf8');
  if(!$conn){
    die("không thể kết nối..".mysqli_connect_error());
  }

?>
