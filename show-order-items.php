<?php
  include "connect.php";
  session_start();
  if(isset($_POST['id_order'])){
    $id = $_POST['id_order'];
    $sql = "select p.name,image, quantity_order, d.price  from orders o join order_details d on o.order_id = d.order_id join products p on d.product_id = p.product_id where o.order_id = '$id'";
    $total_price = 0;
    $total_items = 0;
    if($result = mysqli_query($conn, $sql)){
    while($row = mysqli_fetch_array($result)){
      $total_price += ($row['price'] * $row['quantity_order']);
      $total_items += $row['quantity_order'];
?>
  <li class="header-cart-item flex-w flex-t m-b-12">
    <div class="header-cart-item-img">
      <img src="images/<?php echo $row['image']; ?>" alt="IMG">
    </div>

    <div class="header-cart-item-txt p-t-8">
      <a href="#" class="header-cart-item-name m-b-18 hov-cl1 trans-04">
        <?php echo $row['name']; ?>
      </a>

      <span class="header-cart-item-info">
        <?php echo $row['quantity_order']." x $".$row['price']; ?>
      </span>
    </div>
  </li>
  <hr>
<?php }}
  $_SESSION['total_order_items_quantity'] = $total_items;
  $_SESSION['total_order_items_price'] = $total_price;?>
  <div class="flex-w flex-t p-t-27 p-b-33">
              <div class="size-209">
                <span class="mtext-101 cl2">
                  Total Quantity:
                </span>
              </div>

              <div class="size-208 p-t-1">
                <span class="mtext-101 cl2">
                  <?php
                    if (isset($_SESSION['total_order_items_quantity'])) {
                      $total_order_items_quantity = $_SESSION['total_order_items_quantity'];
                      echo $total_order_items_quantity;
                      unset($_SESSION['total_order_items_quantity']);
                    }
                  ?>
                </span>
              </div>
            </div>
            <div class="flex-w flex-t p-t-27 p-b-33">
              <div class="size-209">
                <span class="mtext-101 cl2">
                  Total Price:
                </span>
              </div>

              <div class="size-208 p-t-1">
                <span class="mtext-110 cl2">
                  $<?php
                  if (isset($_SESSION['total_order_items_price'])) {
                    $total_order_items_price = $_SESSION['total_order_items_price'];
                    echo $total_order_items_price;
                    unset($_SESSION['total_order_items_price']);
                  }
                  ?>
                </span>
              </div>
            </div>

            <a href="process-cart.php"><button class="flex-c-m stext-101 cl0 size-116 bg3 bor14 hov-btn3 p-lr-15 trans-04 pointer">
              Proceed to Checkout
            </button></a>
            <?php
} ?>
