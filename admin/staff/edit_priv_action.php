<?php
include('../../inc/connection.php');
if (isset($_POST['edit_priv'])) {
	$role_id= $_POST['role_id'];
	$name = $_POST['name'];
	

	if (empty($name)  ) {
		header("Location:user_index.php?msg=3");
	}else{
		$edit_priv = "UPDATE roles SET name='$name' WHERE role_id='$role_id ' " or die("Error o 25");
	    $edit_priv_r = mysqli_query($connection,$edit_priv) or die("Error editing the roles profile");
	    if (!$edit_priv_r) {
	    	echo "Error editing";
	    }else{
	    	header("Location:user_index.php?msg=2");
	    }
	}
}



?>