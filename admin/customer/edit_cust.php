<?php

include('../../inc/connection.php');
 if(isset($_REQUEST['id']))
	{
		$id = $_REQUEST['id'];
		
        $get_customer_details = mysqli_query($connection,"SELECT * FROM customer WHERE cust_id='$id'") or die("Could not get the customer details");

        $row = mysqli_fetch_assoc($get_customer_details);
    echo $id;}else{}
?>

					<div class="panel panel-success" data-sortable-id="index-1">
						<div class="panel-heading">
							<div class="panel-heading-btn">
								
							</div>
							<h1 class="panel-title">Edit Guest Details</h1>
						</div>
						<div class="panel-body">

						<form action="#" method="#" role="form">
                       <div id="results2"></div>
                       <div class="form-group row">
                        <div class="form-group col-md-6">
                                <label>Guest Name</label>
                                <input type="text" class="form-control"  id="name1" value="<?php echo $row['name']; ?>" placeholder="Business Name..." required style="text-transform: uppercase" />
                            </div>

                            

                            <div class="form-group col-md-6">
                                <label>Phone Number</label>
                                <input type="text" class="form-control" id="phone1" value="<?php echo $row['phone']; ?>" placeholder="Phone Number..." required />
                            </div>

                            <div class="form-group col-md-6">
                                <label>National Id</label>
                                <input type="email" class="form-control" id="nid1" value="<?php echo $row['nid']; ?>"  placeholder="Address..." required />
                            </div>
                            <div class="form-group col-md-6">
                              <label>Gender</label> 
                                 <select id="gender1" class="form-control">
                                  <option value="1" selected="<?php if ($row['gender']==1) { echo "selected"; }else{ echo "";} ?>">Male</option>
                                  <option value="2" selected="<?php if ($row['gender']==2) { echo "selected"; }else{ echo "";} ?>">Female</option>
                                </select>
                            </div>
 
                             <input type="hidden" class="form-control"  id="cust_id1" value="<?php echo $row['cust_id']; ?>" />

                            </div>
					
							<div class="modal-footer">
								<a href="javascript:;" class="btn btn-sm btn-danger" data-dismiss="modal">Close</a>
								<button type="button" name="edit_customer" id="edit_customer" class="btn btn-success">Save</button>
							</div>
					 </form>
						</div>
					</div>
                    <script type="text/javascript">                       

// Add your custom JS code here
$( document ).ready(function() {
    // Handler for .ready() called.
    document.getElementById('edit_customer').addEventListener('click', edit_customer);
        function edit_customer()
        {
            $('#edit_customer').text('');
            $('#edit_customer').append('<span> Please wait... </span>');
            $('#edit_customer').attr('disabled',true);

            var name = $("#name1").val();
            var phone = $("#phone1").val();
            var gender = $("#gender1").val();
            var nid = $("#nid1").val();
            var cust_id = $("#cust_id1").val();

            console.log(name);
            console.log(phone) ;

            $.ajax(
                {
                    url: 'edit_cust_action.php',
                    typr: 'POST',                           
                    data: 'name='+name+'&phone='+phone+'&gender='+gender+'&nid='+nid+'&cust_id='+cust_id,
                    dataType: 'html'
                })

                .done(function(data)
                 {
                    $('#results2').html(''); // blank before load.
                    $('#results2').html(data);

                })

                .fail(function()
                {
                    $('#results2').html('<div class="alert alert-danger"><a href="#" class="close" data-dismiss="alert">&times;</a><strong>Warning!</strong> Error occured Try Again.</div>');
                    
                });
        }

    });
                    </script>
					

 