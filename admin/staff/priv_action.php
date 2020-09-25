<?php
include('../../inc/connection.php');

if (isset($_REQUEST['priviledge'])) {
	$role = $_REQUEST['priviledge'];

	//echo $password;

	if (empty($role) ) {
		//echo $fname;
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
		$new_priviledge= "INSERT INTO roles(name) VALUES ('$role')"
						 or die("Error creaeting the user profile");
		$new_priviledge_r = mysqli_query($connection,$new_priviledge) or die(mysqli_error($connection));
		if (!$new_priviledge_r) {?>
		<div class="alert alert-danger">
		<a href="#" class="close" data-dismiss="alert">&times;</a><strong>Warning!</strong> Failed to upload Try again...</div>
		<?php
			/*echo "Failed";*/
		}else{?>
		<div class="alert alert-success">
		<a href="#" class="close" data-dismiss="alert">&times;</a><strong>Success!</strong>Priviledge Succesfully Added.
	</div>

		<script type="text/javascript">

			window.setTimeout(function(){

                            window.location.href = 'user_index.php';

                        }, 2000);
		</script>


		<?php
			/*header("location:landing.php?msg=1");*/
		}
	}


}



?>