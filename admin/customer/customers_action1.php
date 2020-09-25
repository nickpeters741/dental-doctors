<?php
session_start();
include('../../inc/connection.php');
if (isset($_POST['reserve'])) {
	  	$book_type=3; 
	  }elseif (isset($_POST['checkin'])) {
	  	$book_type=1; 
	  }
if (isset($_POST['name'])) {
	$user_id=$_SESSION['staff_id'];

	$name = $_POST['name']; 
	$phone = $_POST['phone'];
	$nid = $_POST['nid'];
	$gender = $_POST['gender'];

	$in = $_POST['in'];
	$out = $_POST['out']; 
	$pax = $_POST['pax'];
	$mode = $_POST['mode'];
	$room = $_POST['rooms'];
	$disc = $_POST['disc'];
	$package = $_POST['package'];
	$new_data = explode("|", $package);
	$package = $new_data[1];

	$amount = $_POST['amount']-$disc;
	$ref = $_POST['ref'];

	$checkin = new DateTime($in);
	$checkout = new DateTime($out);
	$day = $checkout->diff($checkin)->format("%a");
	if ($day==0) {
			$days=1;
		}else{
			$days=$day;
		}
	$new_amount=$days*$amount; 


	

	if (empty($name) OR empty($room) OR empty($user_id) ) {
		 
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
		$new_customer = "INSERT INTO customer(name,nid,phone,gender) VALUES('$name','$nid','$phone','$gender')" or die("Error creaeting the customer profile");
		/*$new_customer_r = mysqli_query($connection,$new_customer) or die("Error");*/

		 
		
			 
	if (mysqli_query($connection,$new_customer)) {
	    $cust_id = mysqli_insert_id($connection);

	    $new_booking = "INSERT INTO booking(cust_id,room_id,pax,amount,disc,check_in,check_out,days,transaction_date,book_type,type,user_id,in_time) VALUES('$cust_id','$room','$pax','$new_amount','$disc','$in','$out','$days',CURRENT_DATE,'$book_type','$package','$user_id',CURRENT_TIME)" or die("Error creaeting the customer profile");
	    mysqli_query($connection,$new_booking);
	    $book_id = mysqli_insert_id($connection);
	    $book_track = "INSERT INTO book_track(book_id,trans,user_id,trans_date,remarks) VALUES('$book_id','$book_type','$user_id',CURRENT_DATE,'$ref')" or die("Error creating the customer profile");
	    mysqli_query($connection,$book_track);

	    $edit_room = "UPDATE room SET status='$book_type' WHERE room_id='$room' " or die("Error o 25");
		    $edit_room_r = mysqli_query($connection,$edit_room) or die("Error editing the room");
		    
		    $update_guest = "UPDATE customer SET status='$book_type' WHERE cust_id='$cust_id' " or die("Error o 25");
		    $update_guest_r = mysqli_query($connection,$update_guest) or die("Error editing the room");
			 
	} else {
	    echo "Error: ";
	}



 
		if (!$update_guest_r) {?>
		<div class="alert alert-danger">
		<a href="#" class="close" data-dismiss="alert">&times;</a><strong>Warning!</strong> Failed to upload Try again...</div>
		<?php
			 
		}else{?>
		<div class="alert alert-success">
		<a href="#" class="close" data-dismiss="alert">&times;</a><strong>Success!</strong>Customer Succesfully Added.
	</div> 
 <script type="text/javascript">

			window.setTimeout(function(){

                            window.location.href = 'print_receipt.php?id=<?php echo $book_id; ?>';

                        }, 200);
		</script> 
		<?php 
		}
	}
}
?>