<?php
include('../../inc/connection.php');
if (isset($_REQUEST['cat_name'])) {
	$cat_name =$_REQUEST['cat_name'];
	$cat_id = $_REQUEST['cat_id'];

	if ( empty($cat_name) or empty($cat_id) ) {
		?>

		<div class="alert alert-danger"><a href="#" class="close" data-dismiss="alert">&times;</a><strong>Warning!</strong> Please Fill All The Fields.</div>
		<script type="text/javascript">
			 window.setTimeout(function(){

                            window.location.href = 'category.php';

                        }, 1000);
		</script>

		<?php
	}else{

		$edit_cat = "UPDATE category SET name='$cat_name' WHERE cat_id='$cat_id' " or die("Error edition the file");
		$edit_cat_r = mysqli_query($connection,$edit_cat) or die("error on 18");



		if (!$edit_cat_r) {
			?>

		<div class="alert alert-danger"><a href="#" class="close" data-dismiss="alert">&times;</a><strong>Failed!</strong> Failed To Edited.</div>
		<script type="text/javascript">
			 window.setTimeout(function(){

                            window.location.href = 'category.php';

                        }, 1000);
		</script>

		<?php
		}else{
			?>

		<div class="alert alert-success"><a href="#" class="close" data-dismiss="alert">&times;</a><strong>Success!</strong> Success Edited.</div>
		<script type="text/javascript">
			 window.setTimeout(function(){

                            window.location.href = 'category.php';

                        }, 200);
		</script>

		<?php
		}
	}

}
?>