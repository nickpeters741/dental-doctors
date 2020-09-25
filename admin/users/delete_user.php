<?php
include('../../includes/connection.php');
if (isset($_GET['id'])) {
	$staff_id = $_GET['id'];

	$delete = mysqli_query($connection,"DELETE FROM users WHERE staff_id='$staff_id'") or die("delete failed");
	if (!$delete) {
		echo "Failed to delete";
	}else{
		header("Location:users.php?msg=3");
	}
}

?>