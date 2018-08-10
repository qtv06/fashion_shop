<?php ob_start() ; ?>
<?php session_start();
    if($_SESSION['name'] == "" && $_SESSION['role'] != "1"){
        header("location: ../../sign-in.php");
    }
?>
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
    <link rel="icon" type="image/png" sizes="16x16" href="../../images/logo5.png">
    <title>Admin | TV Shop</title>
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
                        <h3 class="text-themecolor m-b-0 m-t-0">Products</h3>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                            <li class="breadcrumb-item active">Products</li>
                        </ol>
                    </div>
                    <div class="col-md-6 col-4 align-self-center">
                        <a href="add-product.php" class="btn pull-right hidden-sm-down btn-success">New Product</a>
                    </div>
                </div>
                <?php
                if(isset($_SESSION['noti-err-pr']) && !is_null($_SESSION['noti-err-pr'])) {
                ?>
                <div class="row">
                    <div class="col-md-12">
                        <div class="alert alert-success">
                        <?php
                            $me = $_SESSION['noti-err-pr'];
                            echo $me;
                        ?>
                         </div>
                    </div>
                </div>
                <?php $_SESSION['noti-err-pr']=NULL;} ?>
                <div class="category">
                    <div class="dropdown" >
                      <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Select category
                      </button>
                      <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <?php
                            include ("../../connect.php");
                            $qrc = "select * from categories";
                            $resultc = mysqli_query($conn,$qrc);
                            while($rowc= mysqli_fetch_array($resultc)){
                        ?>
                        <a class="dropdown-item category-item" data-type="<?php echo $rowc['category_id']; ?>" href=""><?php echo $rowc['category_name']; ?></a>
                        <?php } ?>
                      </div>
                    </div>
                </div>
                <div class="clearfix"></div>
                <div class="row">
                    <!-- column -->
                    <div class="col-sm-12">

                        <div class="card">
                            <div class="card-block">
                                <h4 class="card-title">Products</h4>
                                <div class="table-responsive">
                                    <table class="table product-table">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Product ID</th>
                                                <th>Product Name</th>
                                                <th>Price</th>
                                                <th>Quantity</th>
                                                <th>Description</th>
                                                <th>Category</th>
                                                <th>Image</th>
                                                <th>Created_at</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                            <?php
                                                if(isset($_GET['search'])){
                                                    $search = $_GET['search'];
                                                    $qr = "select * from product where ten like '%$search%'";
                                                }else{
                                                    $qr = "select product_id,name,price,quantity,description,image,created_at,category_name from products p inner join categories c on p.category_id = c.category_id order by created_at DESC";
                                                }

                                                $result = mysqli_query($conn,$qr);
                                                $i = 1;
                                                while($row = mysqli_fetch_array($result)){
                                            ?>
                                            <tr>
                                                <td><?php echo $i; ?></td>
                                                <td><?php echo $row['product_id']; ?></td>
                                                <td><?php echo $row['name']; ?></td>
                                                <td><?php echo $row['price']; ?></td>
                                                <td><?php echo $row['quantity']; ?></td>
                                                <td><?php echo $row['description']; ?></td>
                                                <td><?php echo $row['category_name']; ?></td>
                                                <td><img src="../../images/<?php echo $row['image']; ?>" alt="" width="150" height="160"></td>
                                                <td><?php echo $row['created_at']; ?></td>
                                                <td><a href="edit-product.php?product_id=<?php echo $row['product_id']; ?>"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                                                <a href="delete-product.php?product_id=<?php echo $row['product_id']; ?>"><i class="fa fa-trash-o" style="color: red;" aria-hidden="true"></i></a></td>
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
    <script src="js/filter-product-by-category.js"></script>
</body>

</html>
