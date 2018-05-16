<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="../assets/images/favicon.png">
    <title>Admin Shop</title>
    <!-- Bootstrap Core CSS -->
    <link href="../assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="css/style.css" rel="stylesheet">
    <!-- You can change the theme colors from here -->
    <link href="css/colors/blue.css" id="theme" rel="stylesheet">
    <link rel="stylesheet" href="css/button.css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
</head>

<body class="fix-header card-no-border">
    <div class="preloader">
        <svg class="circular" viewBox="25 25 50 50">
            <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10" /> </svg>
    </div>
    <div id="main-wrapper">


        <?php
            session_start();

            include ("left-sidebar.php"); ?>
        <div class="page-wrapper">

            <div class="container-fluid">

                <div class="row page-titles">
                    <div class="col-md-6 col-8 align-self-center">
                        <h3 class="text-themecolor m-b-0 m-t-0">Order Detail</h3>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                            <li class="breadcrumb-item "><a href="table-hoadon.php">Receipt</a></li>
                            <li class="breadcrumb-item active">Order Detail</li>
                        </ol>
                    </div>

                </div>

                 <?php if(isset($_SESSION['noti-err-pr'])){
                 ?>
                <div class="row">
                    <div class="col-md-12">
                        <div class="alert alert-success">
                           <?php
                           $loi = $_SESSION['noti-err-pr'];
                           echo $loi;
                           ?>
                        </div>
                    </div>
                </div>
                <?php unset($_SESSION['noti-err-pr']); } ?>
                <div class="tab01">
          <!-- Nav tabs -->
                <ul class="nav nav-tabs" role="tablist">
                  <li class="nav-item p-b-10">
                    <a class="nav-link active" data-toggle="tab" href="#description" role="tab">Order Header</a>
                  </li>

                  <li class="nav-item p-b-10">
                    <a class="nav-link" data-toggle="tab" href="#information" role="tab">Order Items</a>
                  </li>
                </ul>

                <!-- Tab panes -->
                <div class="tab-content p-t-43">
                  <!-- - -->
                  <?php
                    include "../../connect.php";
                    if(isset($_GET['order_id'])){
                      $order_id = $_GET['order_id'];
                      $sql = "select o.order_id,u.username, u.email,o.status,order_date  from users u join orders o on u.email=o.email where order_id = '$order_id'";
                      $rs = mysqli_query($conn,$sql);
                      while($row = mysqli_fetch_array($rs)){
                        $status = $row['status'];
                        $_SESSION['customer_email'] = $row['email'];
                        $_SESSION['customer_name'] = $row['username'];
                  ?>
                  <div class="tab-pane fade show active" id="description" role="tabpanel">
                    <div class="how-pos2 p-lr-15-md" style="padding: 20px;">
                      <form action="update-order.php" method="post">
                        <input type="hidden" name="order_id" value="<?php echo $row['order_id']; ?>">
                        <p class="stext-102 cl6">
                          <span style="font-weight: bold;">#Order ID</span>: <?php echo $row['order_id']; ?>
                        </p>
                        <p class="stext-102 cl6">
                          <span style="font-weight: bold;">#Customer: </span> <?php echo $row['username']; ?>
                        </p>
                        <div class="row">
                          <div class="col-md-2"><span style="font-weight: bold;">#Status: </span></div>
                          <div class="col-md-2">
                            <select name="status" id="inputStatus" class="form-control" required="required">
                              <?php if($status == "pending") {?>
                                <option value="pending" selected="true">Pending</option>
                                <option value="done">Done</option>
                                <option value="delivering">Delivering</option>
                              <?php }else if($status == "done"){ ?>
                                <option value="pending">Pending</option>
                                <option value="done" selected="true">Done</option>
                                <option value="delivering">Delivering</option>
                              <?php }else{ ?>
                                <option value="pending" selected="true">Pending</option>
                                <option value="done">Done</option>
                                <option value="delivering" selected="true">Delivering</option>
                              <?php } ?>
                            </select>
                          </div>
                          <div class="col-md-2">
                            <button type="submit" name="submit" class="btn btn-primary">Update</button>
                          </div>
                        </div>

                        </p>
                        <p class="stext-102 cl6">
                          <span style="font-weight: bold;">#Order Date: </span> <?php echo $row['order_date']; ?>
                        </p>
                      </form>
                    </div>
                  </div>
                  <?php }} ?>
                  <!-- - -->
                  <div class="tab-pane fade" id="information" role="tabpanel">
                    <div class="row">
                      <div class="col-sm-12 col-md-12 col-lg-12 m-lr-auto">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Product ID</th>
                                        <th>Product Name</th>
                                        <th>Price</th>
                                        <th>Quantity Order</th>
                                        <th>Image</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        include ("../../connect.php");
                                        $total_price = 0;
                                        $total_items = 0;
                                        if(isset($_GET['order_id'])){
                                          $order_ids = $_GET['order_id'];
                                          $qr = "select p.product_id,p.name,image, quantity_order, d.price  from orders o join order_details d on o.order_id = d.order_id join products p on d.product_id = p.product_id where o.order_id = '$order_ids'";

                                          $result = mysqli_query($conn,$qr);
                                          $i = 1;

                                          while($row = mysqli_fetch_array($result)){
                                            $total_price += ($row['price'] * $row['quantity_order']);
                                            $total_items += $row['quantity_order'];
                                    ?>
                                    <tr>
                                        <td><?php echo $i; ?></td>
                                        <td><?php echo $row['product_id']; ?></td>
                                        <td><?php echo $row['name']; ?></td>
                                        <td>$ <?php echo $row['price']; ?></td>
                                        <td><?php echo $row['quantity_order']; ?></td>
                                        <td><img src="../../images/<?php echo $row['image']; ?>" alt="" width="150" height="160"></td>
                                    </tr>
                                    <?php
                                        $i += 1;}}
                                    ?>
                                    <tr>
                                      <td colspan="4" align="right">Total Price: $ <?php echo $total_price; ?></td>
                                      <td colspan="2">Total Items: <?php echo $total_items; ?></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <footer class="footer text-center">
                <p>&copy;Copyright QTV06 | Dev-ROR | 2018</p>
            </footer>

        </div>

    </div>

    <script src="../assets/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="../assets/plugins/bootstrap/js/tether.min.js"></script>
    <script src="../assets/plugins/bootstrap/js/bootstrap.min.js"></script>
    <!-- slimscrollbar scrollbar JavaScript -->
    <script src="js/jquery.slimscroll.js"></script>
    <!--Wave Effects -->
    <script src="js/waves.js"></script>
    <!--Menu sidebar -->
    <script src="js/sidebarmenu.js"></script>
    <!--stickey kit -->
    <script src="../assets/plugins/sticky-kit-master/dist/sticky-kit.min.js"></script>
    <!--Custom JavaScript -->
    <script src="js/custom.min.js"></script>
    <!-- ============================================================== -->
    <!-- Style switcher -->
    <!-- ============================================================== -->
    <script src="../assets/plugins/styleswitcher/jQuery.style.switcher.js"></script>

</body>

</html>
