<?php

include("../../inc/connection.php");
 if(isset($_REQUEST['id']))
	{
		$id = $_REQUEST['id'];
		//echo $id;

        $get_house_details = mysqli_query($connection,"SELECT * FROM house WHERE house_id='$id'") or die("Could not get the product details");

        $row = mysqli_fetch_assoc($get_house_details);
    }
?>


        <div class="panel panel-success" data-sortable-id="index-1">
            <div class="panel-heading">
                <div class="panel-heading-btn">
                    
                </div>
                <h4 class="panel-title">Edit house details</h4>
            </div>
            <div class="panel-body">
              <div id="results3"></div>

               <form action="#" method="" role="form">
                <div class="form-group col-md-12">
                    <label >House No.:</label>
                    <input type="text" class="form-control"  id="no" value="<?php echo $row['house_no']; ?>" name="no" />

                    <input type="hidden" class="form-control"  id="hse_id" value="<?php echo $id; ?>" name="apart_id"/>
                </div>  
                    <div class="modal-footer">
                        <a href="javascript:;" class="btn btn-sm btn-danger" data-dismiss="modal">Close</a>
                        <button type="button" name="edit_apart" id="edit_btn" class="btn btn-success">Save</button>
                    </div>
        </form>
            </div>
        </div>
     <script type="text/javascript">
        
// Add your custom JS code here
$( document ).ready(function() {
    // Handler for .ready() called.
    document.getElementById('edit_btn').addEventListener('click', edit_apart);
        function edit_apart()
        {
            $('#edit_btn').text('');
            $('#edit_btn').append('<span> Processing... </span>');
            $('#edit_btn').attr('disabled',true);
            var hse = $("#no").val();
            var id = $("#hse_id").val();
            console.log(hse);
            console.log(id);
            $.ajax(
                {
                    url: 'house_edit_action.php',
                    typr: 'POST',                           
                    data: 'hse='+hse+'&id='+id,
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