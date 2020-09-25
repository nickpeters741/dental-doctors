<?php
include('../../inc/connection.php');
if (isset($_REQUEST['no'])) {
	$id = $_REQUEST['rm'];
	$no = $_REQUEST['no']; 
	$floor = $_REQUEST['floor']; 
	$cat = $_REQUEST['cat'];
	$bo = $_REQUEST['bo'];
	$bb = $_REQUEST['bb']; 
	if ( empty($no)) {
		?>
 <div class="alert alert-danger"><a href="#" class="close" data-dismiss="alert">&times;</a><strong>Warning!</strong> Please Fill All The Fields.</div>
		 <script type="text/javascript">
			 window.setTimeout(function(){

                            window.location.href = 'room.php';

                        }, 200);
		</script> 
		<?php
	}else{

		$edit_apart = "UPDATE room SET room_no='$no',bo='$bo',bb='$bb',cat_id='$cat',floor='$floor' WHERE room_id='$id' " or die("Error edition the file");
		$edit_apart_r = mysqli_query($connection,$edit_apart) or die("error on 18");
		if (!$edit_apart_r) {
			?>

		<div class="alert alert-danger"><a href="#" class="close" data-dismiss="alert">&times;</a><strong>Failed!</strong> Failed To Edited.</div>
		<script type="text/javascript">
			 window.setTimeout(function(){

                            window.location.href = 'roomm.php';

                        }, 200);
		</script> 

		<?php
		}else{
			?>

		<div class="alert alert-success"><a href="#" class="close" data-dismiss="alert">&times;</a><strong>Success!</strong> Success Edited.</div>
			 <script type="text/javascript">
			 window.setTimeout(function(){

                            window.location.href = 'room.php';

                        }, 200);
		</script> 
		

		<?php
		}
	}

}
?>