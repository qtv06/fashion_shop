  <div class="wrap-header-cart js-panel-cart">
    <div class="s-full js-hide-cart"></div>

    <div class="header-cart flex-col-l p-l-65 p-r-25">
      <div class="header-cart-title flex-w flex-sb-m p-b-8">
        <span class="mtext-103 cl2">
          Your Cart
        </span>

        <div class="fs-35 lh-10 cl2 p-lr-5 pointer hov-cl1 trans-04 js-hide-cart">
          <i class="zmdi zmdi-close"></i>
        </div>
      </div>
      <div class="header-cart-content flex-w js-pscroll">
        <?php
          include "connect.php";
          if(isset($_SESSION['cart'])){
            $listid = "";
            foreach ($_SESSION['cart'] as $key => $value) {
              $listid.= $key .= ",";
            }
            $listid = trim($listid, ',');
            $total = 0;
            $sqllist = "select * from products where product_id in ($listid)";
            $res = mysqli_query($conn,$sqllist);
            $total_item = 0;
          ?>
          <ul class="header-cart-wrapitem w-full">
          <?php while ($ro = mysqli_fetch_array($res)) {
            $id = $ro['product_id'];
            $total_item += $_SESSION['cart'][$id];
            $total += $_SESSION['cart'][$id] * $ro['price'];?>
            <li class="header-cart-item flex-w flex-t m-b-12">
              <div class="header-cart-item-img">
                <img src="images/<?php echo $ro['image']; ?>" alt="IMG">
              </div>

              <div class="header-cart-item-txt p-t-8">
                <a href="#" class="header-cart-item-name m-b-18 hov-cl1 trans-04">
                  <?php echo $ro['name']; ?>
                </a>

                <span class="header-cart-item-info">
                  <?php echo $_SESSION['cart'][$id]." x $".$ro['price']; ?>
                </span>
              </div>
            </li>
            <?php } $_SESSION['total_item'] = $total_item; ?>
          </ul>

        <div class="w-full">
          <div class="header-cart-total w-full p-tb-40">
            Total: $<?php echo $total; ?>
          </div>

          <div class="header-cart-buttons flex-w w-full">
            <a href="shoping-cart.php" class="flex-c-m stext-101 cl0 size-107 bg3 bor2 hov-btn3 p-lr-15 trans-04 m-r-8 m-b-10">
              View Cart
            </a>

            <a href="shoping-cart.php" class="flex-c-m stext-101 cl0 size-107 bg3 bor2 hov-btn3 p-lr-15 trans-04 m-b-10">
              Check Out
            </a>
          </div>
          <?php } ?>
        </div>
      </div>
    </div>
  </div>
