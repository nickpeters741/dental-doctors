<?php

include("../../inc/connection.php");
 if(isset($_REQUEST['id']))
	{
		$id = $_REQUEST['id'];
		
        $get_category_details = mysqli_query($connection,"SELECT * FROM room WHERE room_id='$id'") or die("Could not get the item details");

        $row = mysqli_fetch_assoc($get_category_details);
    }
?>
      <div class="modal-body">
        <div class="alert alert-warning">Confirm Delete Room Number - <?php echo $row['room_no']; ?>.</div>
        <div class="modal-footer">
        <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Close</button>
        <a href="room_del.php?id=<?php echo $id; ?>" class="btn btn-danger waves-effect waves-light">DELETE</a>
      </div>
    </div>
