<?php
include('../../inc/connection.php');

if (isset($_REQUEST['staff'])) {
	$staff = $_REQUEST['staff'];
	$username = $_REQUEST['username']; 
	$roles = $_REQUEST['roles'];
	$password = $_REQUEST['password'];

	echo $password;

	if (empty($staff) ) {
	
		?>
	<div class="alert alert-danger">
		<a href="#" class="close" data-dismiss="alert">&times;</a><strong>Warning!</strong> Fill all the required Fields.</div>
		<script type="text/javascript">

			window.setTimeout(function(){
				window.location.href = 'user_index.php';
			}, 1000);
		</script>
	<?php
	}else{
		$new_user= "INSERT INTO users(staff_id,username,password,role_id) 
		VALUES('$staff','$username','$password','$roles')" or die("Error creating the user profile");
		$new_user_r = mysqli_query($connection,$new_user) or die("Error");

		 $set_status = "UPDATE staff SET user=1 WHERE staff_id='$staff' " or die("Error o 25");
		    $set_r = mysqli_query($connection,$set_status) or die("Error editing the room");
		    
		if (!$new_user_r) {?>
		<div class="alert alert-danger">
		<a href="#" class="close" data-dismiss="alert">&times;</a><strong>Warning!</strong> Failed to upload Try again...</div>
		<?php
			/*echo "Failed";*/
		}else{?>
		<div class="alert alert-success">
		<a href="#" class="close" data-dismiss="alert">&times;</a><strong>Success!</strong>Customer Succesfully Added.
	</div>

		<script type="text/javascript">

			window.setTimeout(function(){

                            window.location.href = 'user_index.php';

                        }, 200);
		</script>


		<?php
			/*header("location:landing.php?msg=1");*/
		}
	}


}



?>