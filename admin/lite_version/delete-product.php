<?php
	session_start();
	if(isset($_GET['product_id'])){
		include ("../../connect.php");
		$product_id = $_GET['product_id'];
		$qr = "delete from products where product_id='$product_id' ";
		// echo $qr;

		if(mysqli_query($conn,$qr)){
			$_SESSION['noti-err-pr'] = "You deleted succesful";
			header("location:table-product.php");
		}
		else{
			echo mysqli_error($conn);
		}
		mysqli_close($conn);
	}
?>
