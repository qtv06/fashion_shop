<?php
  session_start();
  if(isset($_GET['add-cart'])){

    $check = false;
    $id = $_GET['product-id'];
    $sl = $_GET['num-product'];
    $total = $_SESSION['total_item'];
    if(isset($_SESSION['cart'])){
      foreach ($_SESSION['cart'] as $key => $value) {
        if($id == $key){
          $slold = $_SESSION['cart'][$id];
          $_SESSION['cart'][$id] = $slold + $sl;
          $check = true;
          break;
          $_SESSION['total_item'] += $sl;
        }
      }
    }
    if(!$check){
      $_SESSION['cart'][$id] = $sl;
    }
    $_SESSION['addcart'] = '<script>var nameProduct = $(".js-addcart-detail").parent().parent().parent().parent().parent().find(\'.name-details\').html(); swal(nameProduct,"is added to wishlist !","success").then(function(){location.reload();});</script>';

  }
  header("location: product-detail.php?id=".$_GET['product-id']);

?>
