<?php
include('../../inc/connection.php');
if (isset($_POST['edit_user'])) {

	$staff_id= $_POST['staff_id'];
	/*$name = $_POST['name'];*/
	$username = $_POST['username'];
	$roles=$_POST['roles']; 
	$phone = $_POST['phone'];


	 
	

	if (empty($name) or empty($username) or empty($phone) ) {
		header("Location:user_index.php?msg=3");
	}else{
		$edit_user = "UPDATE users SET username='$username',phone='$phone',role_id='$roles' WHERE staff_id='$staff_id ' " or die("Error o 25");
	    $edit_user_r = mysqli_query($connection,$edit_user) or die("Error editing the customer profile");
	    if (!$edit_user_r) {
	    	echo "Error editing";
	    }else{
	    	header("Location:user_index.php?msg=2");
	    }
	}
}



?>