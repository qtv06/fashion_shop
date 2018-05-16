<?php
	session_start();
	if(isset($_GET['category_id'])){
		include ("../../connect.php");
		$category_id = $_GET['category_id'];
		$qr = "delete from categories where category_id='$category_id' ";
		// echo $qr;

		if(mysqli_query($conn,$qr)){
			$_SESSION['noti-delete-loai'] = "You deleted succesful";
			header("location:table-loai.php");
		}
		else{
			echo mysqli_error($conn);
		}
		mysqli_close($conn);
	}
?>
