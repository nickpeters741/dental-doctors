<?php
include('../../inc/connection.php');
if (isset($_REQUEST['name'])) {
	$name =$_REQUEST['name'];
	$id = $_REQUEST['id'];

	if ( empty($name)) {
		?>

		<div class="alert alert-danger"><a href="#" class="close" data-dismiss="alert">&times;</a><strong>Warning!</strong> Please Fill All The Fields.</div>
		<script type="text/javascript">
			 window.setTimeout(function(){

                            window.location.href = 'company.php';

                        }, 1000);
		</script>

		<?php
	}else{

		$edit_apart = "UPDATE company SET name='$name' WHERE company_id='$id' " or die("Error edition the file");
		$edit_apart_r = mysqli_query($connection,$edit_apart) or die("error on 18");



		if (!$edit_apart_r) {
			?>

		<div class="alert alert-danger"><a href="#" class="close" data-dismiss="alert">&times;</a><strong>Failed!</strong> Failed To Edited.</div>
		<script type="text/javascript">
			 window.setTimeout(function(){

                            window.location.href = 'company.php';

                        }, 1000);
		</script>

		<?php
		}else{
			?>

		<div class="alert alert-success"><a href="#" class="close" data-dismiss="alert">&times;</a><strong>Success!</strong> Success Edited.</div>
		<script type="text/javascript">
			 window.setTimeout(function(){

                            window.location.href = 'company.php';

                        }, 200);
		</script>

		<?php
		}
	}

}
?>