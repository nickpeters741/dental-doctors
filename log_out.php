<?php
	session_start();
include('inc/connection.php');
	$staff_id = $_SESSION['staff_id'];

	$update_loggin_status = mysqli_query($connection,"UPDATE users SET login_status=2 WHERE staff_id='$staff_id'") or die(mysqli_error($connection));
	if (!$update_loggin_status) {
		echo "Logg out error";
	}else{

	$_SESSION =array();

	if(isset($_COOKIE[session_name()])){
		setcookie(session_name(),'',time()-42000,'/');
	}

	session_destroy();

	header('Location:index.php');
}
?>