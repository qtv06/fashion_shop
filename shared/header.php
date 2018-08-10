<?php session_start(); ?>
<header>
    <!-- Header desktop -->
    <div class="container-menu-desktop">
      <!-- Topbar -->
      <div class="top-bar">
        <div class="content-topbar flex-sb-m h-full container">
          <div class="left-top-bar">
            <marquee>Sĩ từ 10 cái giá mềm - Mua từ ba bộ trở lên miễn tiền ship</marquee>
          </div>

          <div class="right-top-bar flex-w h-full">
            <?php if(!isset($_SESSION['name'])) {?>
            <a href="sign-in.php" class="flex-c-m trans-04 p-lr-25">
              Đăng nhập
            </a>
            <a href="register.php" class="flex-c-m trans-04 p-lr-25">
              Đăng ký
            </a>
            <?php  }else{?>
            <a href="#" class="flex-c-m trans-04 p-lr-25">
              <?php echo $_SESSION['name']; ?>
            </a>
            <a href="history-order.php" class="flex-c-m trans-04 p-lr-25">
              Lịch sử mua hàng
            </a>
            <?php if(isset($_SESSION['role']) && $_SESSION['role'] == 1) {?>

            <a href="admin/lite_version/pages-profile.php" class="flex-c-m trans-04 p-lr-25">
              Admin
            </a>

            <?php } ?>
            <a href="sign-out.php" class="flex-c-m trans-04 p-lr-25">
              Đăng xuất
            </a>
            <?php } ?>

          </div>
        </div>
      </div>

      <div class="wrap-menu-desktop">
        <nav class="limiter-menu-desktop container">

          <!-- Logo desktop -->
          <a href="index.php" class="logo">
            <img src="images/logo4.png" alt="IMG-LOGO">
          </a>

          <!-- Menu desktop -->
          <div class="menu-desktop">
            <ul class="main-menu">
              <li class="active-menu">
                <a href="index.php">Trang chủ</a>
              </li>

              <li>
                <a href="product.php">Cửa hàng</a>
              </li>

              <li class="label1" data-label1="hot">
                <a href="shoping-cart.php">Giỏ hàng</a>
              </li>

              <li>
                <a href="about.php">Giới thiệu</a>
              </li>

              <li>
                <a href="contact.php">Liên hệ</a>
              </li>
            </ul>
          </div>

          <!-- Icon header -->
          <div class="wrap-icon-header flex-w flex-r-m">
            <div class="icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11 js-show-modal-search">
              <i class="zmdi zmdi-search"></i>
            </div>
            <?php
              $total_items = 0;
            if (isset($_SESSION['total_item'])) {
              $total_items = $_SESSION['total_item'];
            } ?>
            <div class="icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11 icon-header-noti js-show-cart" data-notify="<?php echo $total_items; ?>">
              <i class="zmdi zmdi-shopping-cart"></i>
            </div>

            <a href="#" class="dis-block icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11 icon-header-noti" data-notify="0">
              <i class="zmdi zmdi-favorite-outline"></i>
            </a>
          </div>
        </nav>
      </div>
    </div>

    <!-- Header Mobile -->
    <div class="wrap-header-mobile">
      <!-- Logo moblie -->
      <div class="logo-mobile">
        <a href="index.php"><img src="images/logo4.png" alt="IMG-LOGO"></a>
      </div>

      <!-- Icon header -->
      <div class="wrap-icon-header flex-w flex-r-m m-r-15">
        <div class="icon-header-item cl2 hov-cl1 trans-04 p-r-11 js-show-modal-search">
          <i class="zmdi zmdi-search"></i>
        </div>

        <div class="icon-header-item cl2 hov-cl1 trans-04 p-r-11 p-l-10 icon-header-noti js-show-cart" data-notify="2">
          <i class="zmdi zmdi-shopping-cart"></i>
        </div>

        <a href="#" class="dis-block icon-header-item cl2 hov-cl1 trans-04 p-r-11 p-l-10 icon-header-noti" data-notify="0">
          <i class="zmdi zmdi-favorite-outline"></i>
        </a>
      </div>

      <!-- Button show menu -->
      <div class="btn-show-menu-mobile hamburger hamburger--squeeze">
        <span class="hamburger-box">
          <span class="hamburger-inner"></span>
        </span>
      </div>
    </div>


    <!-- Menu Mobile -->
    <div class="menu-mobile">
      <ul class="topbar-mobile">
        <li>
          <div class="left-top-bar">
            <marquee>Sĩ từ 10 cái giá mềm - Mua từ ba bộ trở lên miễn tiền ship</marquee>
          </div>
        </li>

        <li>

        </li>
      </ul>

      <ul class="main-menu">
        <li class="active-menu">
          <a href="index.php">Trang chủ</a>
        </li>

        <li>
          <a href="product.php">Cửa hàng</a>
        </li>

        <li class="label1" data-label1="hot">
          <a href="shoping-cart.php">Giỏ hàng</a>
        </li>

        <li>
          <a href="about.php">Giới thiệu</a>
        </li>

        <li>
          <a href="contact.php">Liên hệ</a>
        </li>
      </ul>
    </div>

    <!-- Modal Search -->
    <div class="modal-search-header flex-c-m trans-04 js-hide-modal-search">
      <div class="container-search-header">
        <button class="flex-c-m btn-hide-modal-search trans-04 js-hide-modal-search">
          <img src="images/icons/icon-close2.png" alt="CLOSE">
        </button>

        <form class="wrap-search-header flex-w p-l-15">
          <button class="flex-c-m trans-04">
            <i class="zmdi zmdi-search"></i>
          </button>
          <input class="plh3" type="text" name="search" placeholder="Search...">
        </form>
      </div>
    </div>
  </header>
