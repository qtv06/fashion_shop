<?php ob_start() ; ?>
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
        </aside>
        <div class="page-wrapper">
            <div class="container-fluid">
                <div class="row page-titles">
                    <div class="col-md-6 col-8 align-self-center">
                        <h3 class="text-themecolor m-b-0 m-t-0">Information User</h3>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                            <li class="breadcrumb-item active">Information User</li>
                        </ol>
                    </div>

                </div>
                <?php

                    if(isset($_POST['submit'])){
                        include '../../connect.php';
                        $fullname = $_POST['username'];
                        $email = $_POST['email'];
                        $role = $_POST['role'];
                        $email_old = $_POST['email_old'];
                        $password = $_POST['password'];
                        $filename = $_FILES['hinhanh']['name'];
                        $file_tmp = $_FILES['hinhanh']['tmp_name'];
                        move_uploaded_file($file_tmp,'../../images/'.$filename);
                        if($filename == ""){
                            $qrup = "update users set username='$fullname',password='$password',email='$email',role_id='$role' where email='$email_old'";
                        }else{
                            $qrup = "update users set username='$fullname',email='$email', avatar='$filename',role_id='$role', password='$password' where email='$email_old'";
                        }

                        if(mysqli_query($conn,$qrup)){
                            $_SESSION['noti-update']= "You updated successful";
                            header("location:table-user.php");
                        }else{
                            echo mysqli_errors($conn);
                        }

                    }
                ?>
                <div class="row">
                    <!-- Column -->
                    <?php

                        include ("../../connect.php");
                        if(isset($_GET['email'])){
                            $email = $_GET['email'];

                            $qr = "select * from users where email='$email'";

                            $result = mysqli_query($conn,$qr);

                            if(mysqli_num_rows($result)>0){
                                while($row = mysqli_fetch_array($result)){

                    ?>
                    <div class="col-lg-4 col-xlg-3 col-md-5">
                        <div class="card">
                            <div class="card-block">
                                <center class="m-t-30">
                                    <?php if($row['avatar']=="") {?>
                                        <img src="../../images/user.jpg" class="img-circle" width="150" />
                                    <?php }else{ ?>
                                        <img src="../../images/<?php echo $row['avatar']; ?>" class="img-circle" width="150" />
                                    <?php } ?>
                                    <h4 class="card-title m-t-10"><?php echo $row['username']; ?></h4>
                                    <h6 class="card-subtitle">Account contact with pages</h6>
                                    <div class="row text-center justify-content-md-center">
                                        <div class="col-4"><a href="javascript:void(0)" class="link"><i class="icon-people"></i> <font class="font-medium">254</font></a></div>
                                        <div class="col-4"><a href="javascript:void(0)" class="link"><i class="icon-picture"></i> <font class="font-medium">54</font></a></div>
                                    </div>
                                </center>
                            </div>
                        </div>
                    </div>
                    <!-- Column -->
                    <!-- Column -->
                    <div class="col-lg-8 col-xlg-9 col-md-7">
                        <div class="card">
                            <div class="card-block">
                                <form class="form-horizontal form-material" method="POST" action="edit-user.php" enctype="multipart/form-data">

                                    <div class="form-group">
                                        <label class="col-md-12">Full Name</label>
                                        <div class="col-md-12">
                                            <input type="text" name="username" value="<?php echo $row['username']; ?>" class="form-control form-control-line">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-12">Avatar</label>
                                        <div class="col-md-12">
                                            <input type="file" name="hinhanh" class="form-control form-control-line">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="example-email" class="col-md-12">Email</label>
                                        <div class="col-md-12">
                                            <input type="email"  value="<?php echo $row['email']; ?>" class="form-control form-control-line" name="email" id="email">
                                            <input type="hidden"  value="<?php echo $row['email']; ?>" class="form-control form-control-line" name="email_old" >
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-12">Password</label>
                                        <div class="col-md-12">
                                            <input type="password" name="password"  value="<?php echo $row['password']; ?>" class="form-control form-control-line" >
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-12">Phone Numbers</label>
                                        <div class="col-md-12">
                                            <input type="text" name="phone"  value="<?php echo $row['phone_number']; ?>" class="form-control form-control-line" >
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-12">Role</label>
                                        <div class="col-md-12">
                                            <select name="role" class="form-control" required="required">
                                                <?php
                                                    $slq_role = "select * from role";
                                                    $qrsl = mysqli_query($conn,$slq_role);
                                                    while($ro=mysqli_fetch_array($qrsl)){
                                                        if($ro['role_id']==$row['role_id']){
                                                ?>
                                                <option value="<?php echo $ro['role_id']; ?>" selected="true"><?php echo $ro['role_name']; ?></option>
                                            <?php }else{ ?>
                                                <option value="<?php echo $ro['role_id']; ?>"><?php echo $ro['role_name']; ?></option>
                                            <?php }} ?>
                                            </select>
                                        </div>
                                    </div>


                                    <div class="form-group">
                                        <div class="col-sm-12">
                                            <button type="submit" name="submit" value="capnhat" class="btn btn-success">Update</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <?php
                                }
                            }
                        }
                    ?>
                    <!-- Column -->
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
<?php ob_flush()  ; ?>
