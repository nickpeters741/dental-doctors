<?php

include("../../inc/connection.php");
if(isset($_REQUEST['id']))
{
    $id = $_REQUEST['id'];

    $get_user = mysqli_query($connection,"SELECT * FROM users WHERE staff_id='$id'") or die("Could not get the user details");

    $row = mysqli_fetch_assoc($get_user);
}
?>

<div class="modal-body">
    <div id="results3"></div>
    <div class="alert alert-warning">Confirm UnSuspending User - <?php echo $row['name']; ?></div>

    <input type="hidden" id="staff_id" value="<?php echo $id; ?>"  />

    <div class="modal-footer">
        <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Close</button>
        <button type="button" id="btn_suspend" class="btn btn-danger waves-effect ">UnSuspend</button>
    </div>
</div>
<script type="text/javascript">

    // Add your custom JS code here
    $( document ).ready(function() {
        // Handler for .ready() called.
        document.getElementById('btn_suspend').addEventListener('click', unsuspend);
        function unsuspend()
        {
            $('#btn_suspend').text('');
            $('#btn_suspend').append('<span> Processing... </span>');
            $('#btn_suspend').attr('disabled',true);

            var staff_id = $("#staff_id").val();

            $.ajax(
                {
                    url: 'unsusp_user_action.php',
                    typr: 'POST',
                    data: 'staff_id='+staff_id,
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
