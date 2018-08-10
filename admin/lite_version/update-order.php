<?php
  session_start();
  include "../../connect.php";
  if(isset($_POST['submit'])){
    $order_idu = $_POST['order_id'];
    $status_update = $_POST['status'];
    $qr_update = "update orders set status = '$status_update' where order_id = '$order_idu'";
    if(mysqli_query($conn,$qr_update)){
      $_SESSION['update_status'] = "Update order status succesfully!";
        $customer_name = $_SESSION['customer_name'];
        $customer_email = $_SESSION['customer_email'];
        // $to = $_SESSION['customer_email'];
        $subject = "Reponse status shopping from CozaStore";
        $message = "Hi ".$customer_name."\nYour order status is updated to ".$status_update."\nYou can check it at here: http://localhost/cozastore/cozastore/history-order.php";
        $headers = 'From: vanquang451@gmail.com' . "\r\n" .
          'Reply-To: webmaster@example.com' . "\r\n" .
          'X-Mailer: PHP/' . phpversion();
        if(mail($customer_email, $subject, $message,$headers))
        {
          echo "<p>Success</p>";
        }else{
          echo "<script></script>";
        }
          // var_dump(mb_send_mail('vanquang451@gmail.com@host.name', 'Test Mail from PHP', 'This is a test mail sent from PHP.'));
      header("location:detail-hoadon.php?order_id=$order_idu");
    }
  }
?>
