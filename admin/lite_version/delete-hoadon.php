<?php
	session_start();
	if(isset($_GET['order_id'])){
		include ("../../connect.php");
		$order_id = $_GET['order_id'];
		$qr = "delete from orders where order_id='$order_id' ";
		// echo $qr;

		if(mysqli_query($conn,$qr)){
			$_SESSION['noti-err-pr'] = "Xóa thành công";
			if (isset($_GET['local'])) {
				header("location:../../history-order.php");
			}else{
				header("location:table-hoadon.php");
			}
		}
		else{
			echo mysqli_error($conn);
		}
		mysqli_close($conn);
	}
?>
