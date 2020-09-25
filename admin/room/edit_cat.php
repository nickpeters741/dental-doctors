<?php

include("../../inc/connection.php");
 if(isset($_REQUEST['id']))
	{
		$id = $_REQUEST['id'];
		//echo $id;

        $get_cat_details = mysqli_query($connection,"SELECT * FROM category WHERE cat_id='$id'") or die("Could not get the product details");

        $row = mysqli_fetch_assoc($get_cat_details);
    }
?>


        <div class="panel panel-success" data-sortable-id="index-1">
            <div class="panel-heading">
                <div class="panel-heading-btn">
                    
                </div>
                <h4 class="panel-title">Edit Category details</h4>
            </div>
            <div class="panel-body">
              <div id="results3"></div>

               <form action="#" method="" role="form">
            

                 <div class="form-group col-md-12">
                    <label >Category Name</label>
                    <input type="text" class="form-control"  id="cat_name2" value="<?php echo $row['name']; ?>" name="item_name" placeholder="Category Name" required />

                     <input type="hidden" class="form-control"  id="cat_id" value="<?php echo $id; ?>" name="item_name" placeholder="Category Name" required />
                </div>  
                    <div class="modal-footer">
                        <a href="javascript:;" class="btn btn-sm btn-danger" data-dismiss="modal">Close</a>
                        <button type="button" name="edit_cat" id="cat_btn" class="btn btn-success">Save</button>
                    </div>
        </form>
            </div>
        </div>
     <script type="text/javascript">
        
// Add your custom JS code here
$( document ).ready(function() {
    // Handler for .ready() called.
    document.getElementById('cat_btn').addEventListener('click', edit_cat);
        function edit_cat()
        {
            $('#cat_btn').text('');
            $('#cat_btn').append('<span> Processing... </span>');
            $('#cat_btn').attr('disabled',true);

            var cat_name1 = $("#cat_name2").val();
            var cat_id = $("#cat_id").val();

            console.log(cat_name1);
            console.log(cat_id);

            $.ajax(
                {
                    url: 'edit_category_action.php',
                    typr: 'POST',                           
                    data: 'cat_name='+cat_name1+'&cat_id='+cat_id,
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