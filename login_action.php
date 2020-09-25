<?php
session_start();
include('inc/connection.php');
if (isset($_POST['login'])) {
	
	$password = mysqli_real_escape_string($connection,$_POST['password']);

	$verify = mysqli_query($connection,"SELECT staff_id,username,role_id,work_status,login_status FROM users WHERE password='$password'") or die("Could not verify the password");

	if (mysqli_num_rows($verify) < 1) {
		header("Location:index.php?msg=1");

	}elseif (mysqli_num_rows($verify) == 1) {
			$row = mysqli_fetch_assoc($verify);

			$work_status=$row['work_status'];
			$login_status=$row['login_status'];


			if ($work_status!=1) {
			header("Location:index.php?msg=2");
			}elseif ($login_status!=2) {
				header("Location:index.php?msg=3");
			}else{

		    $role_id = $row['role_id'];

			$get_perm= mysqli_query($connection,"SELECT permission FROM roles WHERE role_id='$role_id'");
			$acc = mysqli_fetch_assoc($get_perm);

			$permission = $acc['permission'];

			if ($permission !=1 && $permission !=2) {
			echo $permission;
			}else{

				$staff_id=$row['staff_id'];

			$update_login_status = mysqli_query($connection,"UPDATE users SET login_status=2 ") or die(mysqli_error($connection));

			$create_logger_details = mysqli_query($connection,"INSERT INTO logger(staff_id,day) VALUES('$staff_id',CURRENT_DATE )") or die(mysqli_error($connection));

			$_SESSION['staff_id'] = $row['staff_id'];
			$_SESSION['username'] = $row['username'];
			 


				if (!$create_logger_details OR !$update_login_status) {
				echo "Failed";
			}else{
			if ($permission == 1) {
				header("Location:admin/dashboard/index.php");
			}elseif ($permission == 2) {
				header("Location:shop/cash/landing.php");
			} 
		}


}
}
}
}


?>