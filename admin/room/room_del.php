<?php
session_start();
include('../../inc/connection.php');
if (isset($_GET['id'])) {
	$id = $_GET['id'];

	$delete = mysqli_query($connection,"UPDATE room SET del_status=1 WHERE room_id='$id'") or die("Could not delete the category");
	if (!$delete) {
		echo "Failed to delete";
	}else{
		//header("Location:suppliers.php?msg=3");
		?>
		<script type="text/javascript">
					
			 /* $('#massage').html('<div class="alert alert-danger"><a href="#" class="close" data-dismiss="alert">&times;</a><strong>Success!</strong> Category Deleted Successfully.</div>');
		*/
			 window.setTimeout(function(){

                            window.location.href = 'room.php';

                        }, 100);
		</script>

		<?php
	}
}



?>