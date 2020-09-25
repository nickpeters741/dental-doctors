<?php

include('../../inc/connection.php');

include('../includes/functions.php'); 
 if(isset($_REQUEST['id']))
	{
        $id = $_REQUEST['id'];
        $get_customer_details = mysqli_query($connection,"SELECT room_id FROM booking WHERE cust_id='$id'") or die("Could not get the customer details");
        $row = mysqli_fetch_assoc($get_customer_details);
    }
?>

      <div class="modal-body">
        <div id="results3"></div>
        <div class="alert alert-warning">Confirm room - <?php echo get_room($row['room_id']); ?> Checkout.</div>

       <input type="hidden" class="form-control" id="cust_id" value="<?php echo $id; ?>" placeholder="Email..." />
       <input type="hidden" class="form-control" id="rom" value="<?php echo $row['room_id']; ?>"

     <div class="modal-footer">
        <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Close</button>
        <button type="button" id="btn_out" class="btn btn-danger waves-effect ">Check Out</button>
      </div>
    </div>
    <script type="text/javascript">
      
      // Add your custom JS code here
$( document ).ready(function() {
    // Handler for .ready() called.
    document.getElementById('btn_out').addEventListener('click', Delete);
        function Delete()
        {
            $('#btn_out').text('');
            $('#btn_out').append('<span> Processing... </span>');
            $('#btn_out').attr('disabled',true);

            var cust_id = $("#cust_id").val();
            var room = $("#rom").val();
            
            console.log(cust_id);
            console.log(room);
            $.ajax(
                {
                    url: 'check_out.php',
                    typr: 'POST',                           
                    data: 'cust_id='+cust_id+'&room='+room,
                    dataType: 'html'
                })

                .done(function(data)
                 {
                    $('#results3').html(''); // blank before load.
                    $('#results3').html(data);

                })

                .fail(function()
                {
                    $('#results3').html('<div class="alert alert-danger"><a href="#" class="close" data-dismiss="alert">&times;</a><strong>Warning!</strong> Error occured Try Again.</div>');
                    
                });
        }

    });
             
    </script>
