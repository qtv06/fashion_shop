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
                        <h3 class="text-themecolor m-b-0 m-t-0">Receipt</h3>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                            <li class="breadcrumb-item active">Receipt</li>
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
                <div class="row">
                    <!-- column -->
                    <div class="col-sm-12">
                        <div class="card">
                            <div class="card-block">
                                <h4 class="card-title">Receipt Items</h4>
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Order ID</th>
                                                <th>Customer Name</th>
                                                <th>Status</th>
                                                <th>Order Day</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                                include ("../../connect.php");

                                                $qr = "select o.order_id,u.username,o.status,order_date  from users u join orders o on u.email=o.email ";
                                                // $qr = "select o.order_id,p.name,u.username,quantity_order, d.price,o.status,order_date  from users u join orders o on u.email=o.email join order_details d on o.order_id = d.order_id join products p on d.product_id = p.product_id";

                                                $result = mysqli_query($conn,$qr);
                                                $i = 1;
                                                while($row = mysqli_fetch_array($result)){
                                            ?>
                                            <tr>
                                                <td><?php echo $i; ?></td>
                                                <td><?php echo $row['order_id']; ?></td>
                                                <td><?php echo $row['username']; ?></td>
                                                <td><span class="label label-status"><?php echo $row['status']; ?></span></td>
                                                <td><?php echo $row['order_date']; ?></td>
                                                <td>
                                                    <a href="detail-hoadon.php?order_id=<?php echo $row['order_id']; ?>" aria-hidden="true"><i class="fa fa-info" aria-hidden="true"></i></a>
                                                <?php if($row['status'] == "done"){ ?>
                                                    <a href="delete-hoadon.php?order_id=<?php echo $row['order_id']; ?>" aria-hidden="true" style="margin-left:5px;color:red;"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
                                                <?php } ?>
                                                </td>

                                            </tr>
                                            <?php
                                                $i += 1;}
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="dropdown col-md-3" >
                      <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Statistic
                      </button>
                      <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <a class="dropdown-item type-statictis active" data-type="day" href="#">By Day</a>
                        <a class="dropdown-item type-statictis" data-type="month" href="#">By Month</a>
                      </div>
                    </div>
                </div>
                <div class="row" >
                    <canvas id="my-chart"></canvas>
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
    <script src="js/Chart.min.js"></script>
    <script src="js/load-data-chart.js"></script>
    <script src="js/color-label-status.js"></script>
</body>

</html>
