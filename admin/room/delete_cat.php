<?php
session_start();
include('../../inc/connection.php');
if (isset($_GET['id'])) {
	$cat_id = $_GET['id'];

	$delete = mysqli_query($connection,"DELETE FROM category WHERE cat_id='$cat_id'") or die("Could not delete the category");
	if (!$delete) {
		echo "Failed to delete";
	}else{
		//header("Location:suppliers.php?msg=3");
		?>
		<script type="text/javascript">
					
			 /* $('#massage').html('<div class="alert alert-danger"><a href="#" class="close" data-dismiss="alert">&times;</a><strong>Success!</strong> Category Deleted Successfully.</div>');*/
		
			 window.setTimeout(function(){

                            window.location.href = 'category.php';

                        }, 100);
		</script>

		<?php
	}
}



?>