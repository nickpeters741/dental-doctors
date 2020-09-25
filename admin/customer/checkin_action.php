<?php
session_start();
	include('../../inc/connection.php');
	  if (isset($_POST['reserve'])) {
	  	$book_type=3; 
	  }elseif (isset($_POST['checkin'])) {
	  	$book_type=1; 
	  }

	  $user_id=$_SESSION['staff_id'];

	$in = $_POST['in'];
	$out = $_POST['out']; 
	$pax = $_POST['pax1'];
	$mode = $_POST['mode'];
	$room = $_POST['rooms'];
	$disc = $_POST['disc']; 
	$day = $_POST['day'];
	$tendered = $_POST['tendered'];
	$bed = $_POST['bed'];
	$breaka = $_POST['break'];
	$package = $_POST['package'];
	$ref = $_POST['ref'];
	$break=$breaka*$pax;
	$amount=$day*($bed+$break);
	$total=$amount-$disc;
	$cust_id = $_POST['guest'];
	$new_amount=$day*$amount;
	
	echo $package." Guest Package<br>";
	echo $tendered." amount tendered<br>";
	echo $bed." Bed amount<br>";  
	echo $break." breakfast <br>";
	echo $room." room<br>";
	echo $pax." persons <br>";
	echo $day." days<br>";
	echo $disc." Discount<br>";  
	echo $mode." Payment mode<br>";
	echo $in." Check in date<br>";
	echo $cust_id." Check out date <br>";
	echo $amount." Total amount<br>";

$new_booking = "INSERT INTO booking(cust_id,room_id,pax,bed_amount,break_amount,disc,total,amount_tendered,check_in,check_out,days,transaction_date,book_type,package,user_id,in_time) VALUES('$cust_id','$room','$pax','$bed','$break','$disc','$total','$tendered','$in','$out','$day',CURRENT_DATE,'$book_type','$package','$user_id',CURRENT_TIME)" or die("Error creaeting the customer profile");
	    mysqli_query($connection,$new_booking);

	    $book_id = mysqli_insert_id($connection);
	    $book_track = "INSERT INTO book_track(book_id,trans,user_id,trans_date,remarks) VALUES('$book_id','$book_type','$user_id',CURRENT_DATE,'$ref')" or die("Error creating the customer profile");
	    mysqli_query($connection,$book_track);

	    $edit_room = "UPDATE room SET status='$book_type' WHERE room_id='$room' " or die("Error o 25");
		    $edit_room_r = mysqli_query($connection,$edit_room) or die("Error editing the room");
		    
		    $update_guest = "UPDATE customer SET status='$book_type' WHERE cust_id='$cust_id' " or die("Error o 25");
		    $update_guest_r = mysqli_query($connection,$update_guest) or die("Error editing the room");

	 header("Location:print_receipt.php?id=$book_id");
	?>
	 
	   