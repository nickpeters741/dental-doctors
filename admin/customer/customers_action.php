<?php
session_start();
include('../../inc/connection.php');
 
if (isset($_POST['name'])) {

	$user_id=$_SESSION['staff_id'];

	$name = $_POST['name']; 
	$phone = $_POST['phone'];
	$nid = $_POST['nid'];
	$gender = $_POST['gender'];
	$branch = $_POST['branch'];
	$mrn=$_POST['mrn']; 
	


//udate check on already installed customers with id number and phone number

	if (empty($name) OR empty($phone) OR empty($nid) ) {
		 
		?>
	<div class="alert alert-danger">
		<a href="#" class="close" data-dismiss="alert">&times;</a><strong>Warning!</strong> Fill all the required Fields.</div>
		<script type="text/javascript">

			window.setTimeout(function(){
				window.location.href = 'customers.php';
			}, 200);
		</script> 
	<?php
	}else{
		$new_customer = "INSERT INTO customer(mrn,name,nid,phone,gender,branch_id) VALUES('$mrn',$name','$nid','$phone','$gender','$branch')" or die("Error creaeting the customer profile");
	 if (mysqli_query($connection,$new_customer)) {
	 	header("Location:customers.php");
	 } else {
	    echo "Error: ";
	}
  
		}
	} 
 
?>