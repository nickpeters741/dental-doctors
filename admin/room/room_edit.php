<?php

include("../../inc/connection.php");
 if(isset($_REQUEST['id']))
	{
		$id = $_REQUEST['id'];
		//echo $id;

        $get_house_details = mysqli_query($connection,"SELECT * FROM room WHERE room_id='$id'") or die("Could not get the product details");

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
                  <input type="hidden" class="form-control"  id="rmid" value="<?php echo $id; ?>" name="rm"/>
                <div class="form-group">
                <label >Room Number</label>
                <input type="text" class="form-control" id="rno" value="<?php echo $row['room_no']; ?>" placeholder="Enter house number" required />
            </div>
            <div class="form-group">
                <label>Floor</label>
                <select class="form-control" id="floor" name="floor" >
                  <option  value="3">Third Floor</option>
                  <option  value="4">Fourth Floor</option>
                  <option  value="5">Fifth Floor</option> 
                  <option  value="6">sixth Floor</option> 
                  <option  value="7">Seventh Floor</option> 
                  <option  value="8">Eighth Floor</option> 

                </select>
            </div> 
            <div class="form-group">
                <label>Room Category</label>
                <select class="form-control" id="cat" name="cat" data-parsley-required="true">
                       <?php
                $cat = "SELECT * FROM category";
                $cat_r = mysqli_query($connection,$cat) or die("Error getting categories");
                while ($ct = mysqli_fetch_assoc($cat_r)) {
                    $name = $ct['name'];
                    $cat_id = $ct['cat_id'];
                    ?>
                    <option  value="<?php echo $cat_id; ?>"><?php echo $name; ?></option>
                    <?php
                }
                ?>
                </select>
            </div>  
            <div class="form-group">
                <label >Bed Only Amount</label>
                <input type="text" class="form-control" id="bonly" value="<?php echo $row['bo']; ?>"  name="bo" placeholder="Enter bed only amount" required />
            </div>
            <div class="form-group">
                <label >Bed and Breakfast Amount</label>
                <input type="text" class="form-control" id="bedb" value="<?php echo $row['bb']; ?>"  name="bb" placeholder="Enter bed and breakfast" required />
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
            var no = $("#no").val(); 
            var rm = $("#rmid").val(); 
            var floor = $("#floor").val();
            var no = $("#rno").val();
            var cat = $("#cat").val();
            var bo = $("#bonly").val();
            var bb = $("#bedb").val();
            console.log(bo);
            console.log(bb); 

            $.ajax(
                {
                    url: 'room_edit_action.php',
                    typr: 'POST',                           
                    data: 'floor='+floor+'&no='+no+'&cat='+cat+'&bo='+bo+'&bb='+bb+'&rm='+rm,
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