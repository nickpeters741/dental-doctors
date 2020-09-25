<?php

include('../../inc/connection.php');
 
	$guest = $_POST['guest']; 
	$in = $_POST['in'];
	$out = $_POST['out'];
	$ref = $_POST['ref'];
	$mode = $_POST['mode']; 
	$amount = $_POST['amount'];
	$room = $_POST['room'];
	$pax = $_POST['pax'];
 
	$new_customer = "INSERT INTO booking(cust_id,room_id,pax,amount,check_in,check_out,transaction_date,book_type) VALUES('$guest','$room','$pax','$amount','$in','$out',CURRENT_DATE,3)" or die("Error creaeting the customer profile");
		$new_customer_r = mysqli_query($connection,$new_customer) or die("Error");
		$edit_room = "UPDATE room SET status=3 WHERE room_id='$room' " or die("Error o 25");
	    $edit_room_r = mysqli_query($connection,$edit_room) or die("Error editing the room");
		 
		 ?>
 <script type="text/javascript">
 	window.setTimeout(function(){
 		window.location.href = 'room.php';
 	}, 200);
 </script>
  