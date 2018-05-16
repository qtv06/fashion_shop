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
    <?php
        session_start();
        include ("../../connect.php");
        $_SESSION['noti-err-ml'] = NULL;
        if(isset($_POST['submit'])){
            $category_id = $_POST['matheloai'];
            $category_name = $_POST['tentheloai'];

            $qr = "update categories set category_name='{$category_name}' where category_id='{$category_id}'";
            if(mysqli_query($conn,$qr)){
                $_SESSION['noti-err-ml']= "You updated successful";
                header("location:table-loai.php");
            }else{
                $_SESSION['noti-err-ml'] = "Updated not success!!";
                header("location:edit-theloai.php");
            }
        }

    ?>
</head>

<body class="fix-header card-no-border">
    <div class="preloader">
        <svg class="circular" viewBox="25 25 50 50">
            <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10" /></svg>
    </div>
    <div id="main-wrapper">
        <?php

            include ("left-sidebar.php"); ?>
        </aside>
        <div class="page-wrapper">
            <div class="container-fluid">
                <div class="row page-titles">
                    <div class="col-md-6 col-8 align-self-center">
                        <h3 class="text-themecolor m-b-0 m-t-0">Update Category</h3>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                            <li class="breadcrumb-item active">Update Category</li>
                        </ol>
                    </div>

                </div>

                <div class="row">
                    <div class="col-lg-8 col-xlg-9 col-md-7" style="margin: 0px auto;">
                        <div class="card">
                            <div class="card-block">
                                <?php if(isset($_SESSION['noti-err-ml']) && !is_null($_SESSION['noti-err-ml'])){
                                 ?>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="alert alert-warning">
                                           <?php
                                           $err = $_SESSION['noti-err-ml'];
                                           echo $err; ?>
                                        </div>
                                    </div>
                                </div>
                                <?php } ?>
                                <form class="form-horizontal form-material" method="POST" action="edit-theloai.php" >
                                    <?php
                                        if(isset($_GET['category_id'])){
                                           $category_id = $_GET['category_id'];
                                           $qr = "select * from categories where category_id='$category_id' ";
                                           $rs = mysqli_query($conn,$qr);
                                           while($row = mysqli_fetch_array($rs)){

                                    ?>
                                    <div class="form-group">
                                        <label class="col-md-12">Category ID</label>
                                        <div class="col-md-12">
                                            <input type="text" name="matheloai" value="<?php echo $row['category_id']; ?>" readonly class="form-control form-control-line">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-12">Category Name</label>
                                        <div class="col-md-12">
                                            <input type="text" name="tentheloai" value="<?php echo $row['category_name']; ?>" class="form-control form-control-line">
                                        </div>
                                    </div>
                                    <?php }
                                        }
                                    ?>
                                    <div class="form-group">
                                        <div class="col-sm-12">
                                            <button type="submit" name="submit" value="capnhat" class="btn btn-success">Update</button>
                                        </div>
                                    </div>

                                </form>
                            </div>
                        </div>
                    </div>

                    <!-- Column -->
                </div>
            </div>
            <footer class="footer text-center">
                <p>&copy;Copyright QTV06 | Dev-ROR | 2018</p>
            </footer>
        </div>
    </div>
    <script src="../assets/plugins/jquery/jquery.min.js"></script>
    <script src="../assets/plugins/bootstrap/js/tether.min.js"></script>
    <script src="../assets/plugins/bootstrap/js/bootstrap.min.js"></script>
    <script src="js/jquery.slimscroll.js"></script>
    <script src="js/waves.js"></script>
    <script src="js/sidebarmenu.js"></script>
    <script src="../assets/plugins/sticky-kit-master/dist/sticky-kit.min.js"></script>
    <script src="js/custom.min.js"></script>
    <script src="../assets/plugins/styleswitcher/jQuery.style.switcher.js"></script>
</body>
</html>
