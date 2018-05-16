<?php
	session_start();
	if(isset($_GET['id'])){
		include ("../../connect.php");
		$id = $_GET['id'];
		$qr = "delete from feedback where feedback_id='$id' ";
		// echo $qr;

		if(mysqli_query($conn,$qr)){
			$_SESSION['noti-err-pr'] = "You deleted succesful";
			header("location:table-feedback.php");
		}
		else{
			echo mysqli_error($conn);
		}
		mysqli_close($conn);
	}
?>
