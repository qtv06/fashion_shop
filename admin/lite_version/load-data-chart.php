<?php
  include "../../connect.php";
  $date = date("Y-m-d H:i:s");
  $sql = "select DAY(o.order_date) as day, sum(d.price * d.quantity_order) as income, sum(d.quantity_order) as quantity  from orders o join order_details d on o.order_id = d.order_id where MONTH(o.order_date) = MONTH('$date') group by DAY(o.order_date)";
  // $sql = "select MONTH(o.order_date) as day, sum(d.price * d.quantity_order) as income, sum(d.quantity_order) as quantity  from orders o join order_details d on o.order_id = d.order_id where YEAR(o.order_date) = YEAR('$date') group by MONTH(o.order_date)";
  mysqli_set_charset($conn,"utf8");
  $result = mysqli_query($conn, $sql);
  $data = array();
  foreach ($result as $row) {
    $data[] = $row;
  }
  mysqli_close($conn);
  print json_encode($data);
?>
