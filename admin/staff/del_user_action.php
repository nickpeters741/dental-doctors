<?php
session_start();
include('../../inc/connection.php');
if (isset($_REQUEST['staff_id'])) {
	$staff_id = $_REQUEST['staff_id'];

	$delete = mysqli_query($connection,"DELETE FROM users WHERE staff_id='$staff_id'") or die("Could not delete the user");
	if (!$delete) {
		?>
		 <div class="alert alert-danger"><a href="#" class="close" data-dismiss="alert">&times;</a><strong>Warning!</strong> Error Deleting Customer Details.</div>
		<script type="text/javascript">
			window.setTimeout(function(){
				window.location.href = 'user_index.php';
			}, 200);
		</script>

		<?php
	}else{
?>
		 <div class="alert alert-Success"><a href="#" class="close" data-dismiss="alert">&times;</a><strong>Success!</strong> Successfully Deleted.</div>
		<script type="text/javascript">
			window.setTimeout(function(){

                            window.location.href = 'user_index.php';

                        }, 200);
		</script>

		<?php
	}
}



?>