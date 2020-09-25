<?php
session_start();
include('../../includes/connection.php');
if (isset($_REQUEST['cust_id'])) {
	$cust_id = $_REQUEST['cust_id'];

	$delete = mysqli_query($connection,"DELETE FROM customers WHERE cust_id='$cust_id'") or die("Could not delete the customer");
	if (!$delete) {
		?>
		 <div class="alert alert-danger"><a href="#" class="close" data-dismiss="alert">&times;</a><strong>Warning!</strong> Error Deleting Customer Details.</div>
		<script type="text/javascript">
			window.setTimeout(function(){

                            window.location.href = 'customers.php';

                        }, 1000);
		</script>

		<?php
	}else{
?>
		 <div class="alert alert-Success"><a href="#" class="close" data-dismiss="alert">&times;</a><strong>Success!</strong> Successfully Deleted.</div>
		<script type="text/javascript">
			window.setTimeout(function(){

                            window.location.href = 'customers.php';

                        }, 1000);
		</script>

		<?php
	}
}



?>