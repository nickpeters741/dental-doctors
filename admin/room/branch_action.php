<?php
include('../../inc/connection.php');

 
	$name = $_REQUEST['name']; 
	$add = $_REQUEST['add']; 
	$phone = $_REQUEST['phone'];
	$email = $_REQUEST['mail'];  
	 if (empty($name) ) {
		?>
		<div class="alert alert-danger">
			<a href="#" class="close" data-dismiss="alert">&times;</a><strong>Warning!</strong> Fill all the required Fields.</div>
			 <script type="text/javascript">
				window.setTimeout(function(){
					window.location.href = 'branch.php';
				}, 200);
			</script> 
	<?php
	}else{
		$new_apart= "INSERT INTO branches(name,address,phone,email) VALUES('$name','$add','$phone','$email')" or die("Error creating the user profile");
		$new_apart_r = mysqli_query($connection,$new_apart) or die("Error");
		if (!$new_apart_r) {?>
		<div class="alert alert-danger">
		<a href="#" class="close" data-dismiss="alert">&times;</a><strong>Warning!</strong> Failed to upload Try again...</div>
		<?php
			/*echo "Failed";*/
		}else{?>
		<div class="alert alert-success">
		<a href="#" class="close" data-dismiss="alert">&times;</a><strong>Success!</strong>&nbsp;&nbsp;Apartment Succesfully Added.
	</div>
 		<script type="text/javascript">
 			window.setTimeout(function()
 			{
 				window.location.href = 'branch.php';
 			}, 200);
		</script> 
		<?php 
	}
}



?>