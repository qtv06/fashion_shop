<?php
	session_start();
	if(isset($_GET['email'])){
		include ("../../connect.php");
		$email = $_GET['email'];
		$qr = "delete from users where email='$email'";
		// echo $qr;
		if(mysqli_query($conn,$qr)){
			$_SESSION['noti-update'] = "You deleted succesful";
			header("location:table-user.php");
		}
		else{
			echo mysqli_error($conn);
		}
		mysqli_close($conn);
	}
?>
