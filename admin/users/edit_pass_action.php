<?php
include('../../inc/connection.php');



if (isset($_REQUEST['staff_id'])) {
	$staff_id = $_REQUEST['staff_id'];
	$confirmpassword = $_REQUEST['confirmpassword'];

//echo $staff_id;

		$edit_pass = "UPDATE users SET password='$confirmpassword' WHERE staff_id='$staff_id' " or die("Error edition the file");
		$edit_pass_r = mysqli_query($connection,$edit_pass) or die("error on 18");

		if (!$edit_pass_r) {
			?>
			<div class="alert alert-danger">
		<a href="#" class="close" data-dismiss="alert">&times;</a><strong>Warning!</strong> Error Occured Try Again.</div>
		<script type="text/javascript">

			window.setTimeout(function(){

                            window.location.href = 'user_index.php';

                        }, 1000);
		</script>
		<?php
		}else{?>
			<div class="alert alert-info">
		<a href="#" class="close" data-dismiss="alert">&times;</a><strong>Success!</strong> Password Edited SUccessfully.</div>
		<script type="text/javascript">

			window.setTimeout(function(){

                            window.location.href = 'user_index.php';

                        }, 1000);
		</script>
		<?php
		}
	

}
?>