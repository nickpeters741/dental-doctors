<?php

include('../../inc/connection.php');
if (isset($_REQUEST['name'])) {
	$cust_id = $_REQUEST['cust_id'];
	$name = $_REQUEST['name']; 
	$phone = $_REQUEST['phone'];
	$nid = $_REQUEST['nid'];
	$gender = $_REQUEST['gender'];
	
	

	if (empty($name) ) {
		header("Location:edit_customer.php?id=$customer_id");
		?>
		 <div class="alert alert-danger"><a href="#" class="close" data-dismiss="alert">&times;</a><strong>Warning!</strong> FIll All The Fields.</div>
		<script type="text/javascript">
			window.setTimeout(function(){

                            window.location.href = 'customers.php';

                        }, 200);
		</script>

		<?php
	}else{
		$edit_customer = "UPDATE customer SET name='$name',nid='$nid',phone='$phone',gender='$gender' WHERE cust_id='$cust_id' " or die("Error o 25");
	    $edit_customer_r = mysqli_query($connection,$edit_customer) or die(mysqli_error($connection));
	    if (!$edit_customer_r) { 
	    	?>
		 <div class="alert alert-danger"><a href="#" class="close" data-dismiss="alert">&times;</a><strong>Warning!</strong> Error Editing Customer Details.</div>
		<script type="text/javascript">
			window.setTimeout(function(){

                            window.location.href = 'customers.php';

                        }, 200);
		</script>

		<?php
	    }else{
	    	//header("Location:customers.php?msg=2");
	    	?>
		 <div class="alert alert-success"><a href="#" class="close" data-dismiss="alert">&times;</a><strong>Warning!</strong> Customer  Successfully Edited.</div>
		<script type="text/javascript">
			window.setTimeout(function(){

                            window.location.href = 'customers.php';

                        }, 200);
		</script>

		<?php
	    }
	}
}



?>