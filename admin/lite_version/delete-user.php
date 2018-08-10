<?php
	session_start();
	if(isset($_GET['email'])){
		include ("../../connect.php");
		$email = $_GET['email'];
		$qr = "delete from users where email='$email'";
		// echo $qr;
		if(mysqli_query($conn,$qr)){
			$_SESSION['noti-update'] = "Xóa thành công";
			header("location:table-user.php");
		}
		else{
			$_SESSION['noti-update'] = "Tài khoản này đang mua hàng, không thể xóa";
			header("location:table-user.php");
		}
		mysqli_close($conn);
	}
?>
