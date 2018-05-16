<?php
  session_start();
  if(isset($_SESSION['email'])){

  }else{
    $_SESSION['notice-wish'] = '<script>swal("Sorry", "Please login to add wish to your wishlist!", "warning");</script>';
    header("location:index.php");
  }
?>
