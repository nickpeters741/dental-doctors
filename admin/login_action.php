<?php
session_start();
include('../inc/connection.php');
if (isset($_POST['login'])) {
	$username = mysqli_real_escape_string($connection,$_POST['username']);
	$password = mysqli_real_escape_string($connection,$_POST['password']);

	echo $password;

	$check_email = "SELECT * FROM users WHERE username='$username'";
	$check_email_r = mysqli_query($connection,$check_email)
					or die("Erron:".mysqli_error($connection));
	if (mysqli_num_rows($check_email_r) < 1) {
		 header("Location:login.php?msg=1");
	}else{
		$verify = "SELECT * FROM users WHERE username='$username' AND password='$password'";
		$verify_r =mysqli_query($connection,$verify) or die("ERROR:".mysqli_error($connection));
		if (mysqli_num_rows($verify_r) <1) {
			header("Location:login.php?msg=2");
		}else{
			$a = mysqli_fetch_assoc($verify_r);
		   	$id = $a['user_id'];
		    
		   	$name = $a['username'];
		   	$priv = $a['role_id'];
			
			$_SESSION['staff_id'] = $id; 
			$_SESSION['username'] = strtoupper($name); 

			if ($priv == 1) {
				header("Location:dashboard/index.php");
			}elseif ($priv == 2) {
				header("Location:dashboard/index.php");
			}elseif ($priv == 3) {
				header("Location:dashboard/index.php");
			}elseif ($priv == 4) {
				header("Location:dashboard/index.php");
			}elseif ($priv == 5) {
				header("Location:dashboard/index.php");
			}elseif ($priv == 6) {
				header("Location:dashboard/index.php");
			}
			
		}
	}/**/
} else{
	header("Location:login.php?msg=1");
}
?>