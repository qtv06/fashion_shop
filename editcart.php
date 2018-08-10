<?php
  session_start();
  include "connect.php";
  if (isset($_POST['product_id'])) {
    $sl = $_POST['num-product'];
    $id = $_POST['product_id'];
    $qr = "SELECT  `quantity`, name FROM `products` WHERE product_id = $id";
    $rs = mysqli_query($conn, $qr);
    $row = mysqli_fetch_array($rs);
    $old_quantity = $row['quantity'];


    if($old_quantity < $sl){
      $_SESSION['notice-process'] = '<script> var old_quantity ='.json_encode($old_quantity).';var name='.json_encode($row['name']).'; swal("Thông báo",name+ " chỉ còn lại " +old_quantity+" sản phẩm","warning");</script>';
    }else{
      $_SESSION['cart'][$id] = $sl;
      $_SESSION['notice-process'] = '<script> swal("Thông báo","Bạn đã cập nhật số lượng sản phẩm thành công","success");</script>';
    }
    // echo $_SESSION['cart'][$id];
    header("location:shoping-cart.php");
  }
?>
