<?php
include('../../inc/connection.php');
if (isset($_REQUEST['hse'])) {
	$hse =$_REQUEST['hse'];
	$id = $_REQUEST['id'];

	if ( empty($hse)) {
		?>

		<div class="alert alert-danger"><a href="#" class="close" data-dismiss="alert">&times;</a><strong>Warning!</strong> Please Fill All The Fields.</div>
		 <script type="text/javascript">
			 window.setTimeout(function(){

                            window.location.href = 'house.php';

                        }, 1000);
		</script> 
		<?php
	}else{

		$edit_apart = "UPDATE house SET house_no='$hse' WHERE house_id='$id' " or die("Error edition the file");
		$edit_apart_r = mysqli_query($connection,$edit_apart) or die("error on 18");
		if (!$edit_apart_r) {
			?>

		<div class="alert alert-danger"><a href="#" class="close" data-dismiss="alert">&times;</a><strong>Failed!</strong> Failed To Edited.</div>
		<script type="text/javascript">
			 window.setTimeout(function(){

                            window.location.href = 'house.php';

                        }, 1000);
		</script> 

		<?php
		}else{
			?>

		<div class="alert alert-success"><a href="#" class="close" data-dismiss="alert">&times;</a><strong>Success!</strong> Success Edited.</div>
			 <script type="text/javascript">
			 window.setTimeout(function(){

                            window.location.href = 'house.php';

                        }, 200);
		</script> 
		

		<?php
		}
	}

}
?>