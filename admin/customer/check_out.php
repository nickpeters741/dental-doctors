<?php

include('../../inc/connection.php');
$cust_id = $_REQUEST['cust_id'];
$room = $_REQUEST['room'];
 
 $get_book_details = mysqli_query($connection,"SELECT book_id FROM booking WHERE cust_id='$cust_id' AND room_id='$room'") or die("Could not get the customer details");
$row = mysqli_fetch_assoc($get_book_details); 
        $book_id=$row['book_id'];

    $book_track = "INSERT INTO book_track(book_id,trans,trans_date) VALUES('$book_id',2,CURRENT_DATE)" or die("Error creating the customer profile");
    mysqli_query($connection,$book_track);

    $edit_book = "UPDATE booking SET status=1 WHERE room_id='$room' AND cust_id='$cust_id' " or die("Error o 25");
	$edit_room_r = mysqli_query($connection,$edit_book) or die("Error editing the room");
	  

    $edit_room = "UPDATE room SET status=2 WHERE room_id='$room'" or die("Error o 25");
	    $edit_room_r = mysqli_query($connection,$edit_room) or die("Error editing the room");
	    
	    $update_guest = "UPDATE customer SET status=2 WHERE cust_id='$cust_id' " or die("Error o 25");
	    $update_guest_r = mysqli_query($connection,$update_guest) or die("Error editing the room");
		 
	
		
		 ?>
 <script type="text/javascript">
 	window.setTimeout(function(){
 		window.location.href = 'customers.php';
 	}, 200);
 </script>  
   