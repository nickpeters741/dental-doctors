<?php
include('../../inc/connection.php');
include('../includes/functions.php');

if (isset($_REQUEST['name'])) {
	$name = $_REQUEST['name'];
	$address = $_REQUEST['add'];
	$phone = $_REQUEST['phone'];
	 
	$target_path=upload($name);
 

	 if (empty($name) ) {
		?>
		<div class="alert alert-danger">
			<a href="#" class="close" data-dismiss="alert">&times;</a><strong>Warning!</strong> Fill all the required Fields.</div>
			<script type="text/javascript">
				window.setTimeout(function(){
					window.location.href = 'company.php';
				}, 1000);
			</script> 
	<?php
	}else{
		$new_apart= "INSERT INTO company(name,address,phone,logo) VALUES('$name','$address','$phone','$target_path')" or die("Error creaeting the user profile");
		$new_apart_r = mysqli_query($connection,$new_apart) or die("Error");
		if (!$new_apart_r) {?>
		<div class="alert alert-danger">
		<a href="#" class="close" data-dismiss="alert">&times;</a><strong>Warning!</strong> Failed to upload Try again...</div>
		<?php
			/*echo "Failed";*/
		}else{?>
		<div class="alert alert-success">
		<a href="#" class="close" data-dismiss="alert">&times;</a><strong>Success!</strong>&nbsp;&nbsp;Apartment Succesfully Added.
	</div> <script type="text/javascript">

			window.setTimeout(function(){

                            window.location.href = 'company.php';

                        }, 200);
		</script>  
		<?php 
		}
	}


}



?>