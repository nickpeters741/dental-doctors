<?php

include("../../inc/connection.php");
 if(isset($_REQUEST['id']))
	{
		$id = $_REQUEST['id'];
        $get_cat_details = mysqli_query($connection,"SELECT * FROM company WHERE company_id='$id'") or die("Could not get the product details");
        $row = mysqli_fetch_assoc($get_cat_details);
    }
?>

    <div class="panel panel-success" data-sortable-id="index-1">
        <div class="panel-heading">
            <div class="panel-heading-btn"></div>
                <h4 class="panel-title">Edit Company details</h4>
            </div>
            <div class="panel-body">
              <div id="results3"></div>
              <form action="#" method="" role="form">
                <div class="form-group col-md-12">
                    <label >Company Name</label>
                    <input type="text" class="form-control"  id="comp_name" value="<?php echo $row['name']; ?>" placeholder="Category Name" required />

                     <input type="hidden" class="form-control"  id="co_id" value="<?php echo $id; ?>" name="apart_id" placeholder="Category Name" required />
                </div>  
                    <div class="modal-footer">
                        <a href="javascript:;" class="btn btn-sm btn-danger" data-dismiss="modal">Close</a>
                        <button type="button" id="edit_btn" class="btn btn-success">Save</button>
                    </div>
        </form>
            </div>
        </div>
     <script type="text/javascript">
        
// Add your custom JS code here
$( document ).ready(function() {
    // Handler for .ready() called.
    document.getElementById('edit_btn').addEventListener('click', edit_comp);
        function edit_comp()
        {
            $('#edit_btn').text('');
            $('#edit_btn').append('<span> Processing... </span>');
            $('#edit_btn').attr('disabled',true);
            var name = $("#comp_name").val();
            var id = $("#co_id").val();
            console.log(name);
            console.log(id);
            $.ajax(
                {
                    url: 'company_edit_action.php',
                    typr: 'POST',                           
                    data: 'name='+name+'&id='+id,
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