<?php
  session_start();
  include "connect.php";
  if(isset($_SESSION['email'])){
    if(isset($_SESSION['listid1'])){
      $listid = $_SESSION['listid1'];
      $sql = "select * from products where product_id in ($listid)";
      $rs = mysqli_query($conn, $sql);
      $email = $_SESSION['email'];
      $date = date('Y-m-d H:i:s');
      // echo $date;
      // get id
      $sql_get_id = "select order_id from orders order by order_id DESC limit 1";
      $rsid = mysqli_query($conn,$sql_get_id);
      while($rid = mysqli_fetch_array($rsid)){
        $i = $rid['order_id'];
      }
      $i += 1;
      $sql_order = "insert into orders(order_id, email, order_date) values($i,N'$email', '$date')";
      echo $sql_order;
      if(mysqli_query($conn, $sql_order)){
        // add line item to order_detail
        while ($row = mysqli_fetch_array($rs)) {
          $product_id = $row['product_id'];
          $price = $row['price'];
          $quantity = $_SESSION['cart'][$product_id];
          $sql_order_detail = "insert into order_details(product_id, order_id, price, quantity_order) values($product_id,$i, $price, $quantity)";
          //echo $sql_order_detail;
          if(mysqli_query($conn, $sql_order_detail)){
            $sqlupdate = "UPDATE `products` SET `quantity`= quantity - $quantity  WHERE product_id = $product_id ";
            mysqli_query($conn, $sqlupdate);
          }
        }

        $_SESSION['notice-process'] = '<script> swal("Thông báo","Giao dịch thành công, shop sẽ liên hệ với bạn để giao hàng. Cảm ơn bạn đã mua hàng của shop","success");</script>';
        unset($_SESSION['cart']);
        unset($_SESSION['total_item']);
        header("location:shoping-cart.php");
      }

    }

  }else{
    $_SESSION['old_url'] = "shoping-cart.php";
    header("location:sign-in.php");
  }
?>
