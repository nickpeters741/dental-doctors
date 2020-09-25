<?php
include('../../inc/connection.php');

if (isset($_REQUEST['name'])) {
	$name = $_REQUEST['name'];
	$id = $_REQUEST['id'];
	$marital = $_REQUEST['marital'];
	$dob = $_REQUEST['dob'];
	$cat = $_REQUEST['cat'];
	$nssf = $_REQUEST['nssf'];
	$nhif = $_REQUEST['nhif'];
	$acc = $_REQUEST['acc'];
	$resi = $_REQUEST['resi'];
	$phone = $_REQUEST['phone'];
	$gender = $_REQUEST['gender'];
 

	if (empty($name) ) {
	
		?>
	<div class="alert alert-danger">
		<a href="#" class="close" data-dismiss="alert">&times;</a>
		<strong>Warning!</strong> Fill all the required Fields.
	</div>
		<script type="text/javascript">
			window.setTimeout(function(){
				window.location.href = 'staff.php';
			}, 200);
		</script>
	<?php
	}else{
		$new_staff= "INSERT INTO staff(name,phone,id,dob,gender,marital,residence,position,nssf,nhif,account) 
		VALUES('$name','$phone','$id','$dob','$gender','$marital','$resi','$cat','$nssf','$nhif','$acc')" or die("Error creating the user profile");
		$new_staff_r = mysqli_query($connection,$new_staff) or die("Error");

		if (!$new_staff_r) {?>
		<div class="alert alert-danger">
		<a href="#" class="close" data-dismiss="alert">&times;</a><strong>Warning!</strong> Failed to upload Try again...</div>
		<?php 
		}else{?>
		<div class="alert alert-success">
		<a href="#" class="close" data-dismiss="alert">&times;</a><strong>Success!</strong>Customer Succesfully Added.
		</div>
		<script type="text/javascript">
			window.setTimeout(function(){
				window.location.href = 'staff.php';
			}, 200);
		</script>


		<?php
			 
		}
	}


}



?>