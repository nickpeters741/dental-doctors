    <?php

    include('../../inc/connection.php');
    include('../includes/functions.php'); 
     if(isset($_REQUEST['id']))
    	{
    		$id = $_REQUEST['id'];
    		
        }
    ?>
    <div class="panel panel-success" data-sortable-id="index-1">
        <div class="panel-heading">
            <div class="panel-heading-btn">
            </div><h1 class="panel-title">Reserve room</h1></div>
            <div class="panel-body">
                <form class="form-horizontal" method="post" action="checkin_action.php"  data-parsley-validate="true" >
                    <div class="form-group row">
                        <div class="form-group  col-md-4">
                            <label>Check in</label>
                            <input type="date" class="form-control" name="in" />
                        </div>
                        <div class="form-group col-md-4">
                            <label>Check Out</label>
                            <input type="date" class="form-control"  name="out"/>
                        </div>
                        <div class="form-group col-md-4">
                            <label>Capacity:</label>
                            <input type="number" class="form-control"  name="pax"/>
                            <input type="hidden" id="guest" name="guest" value="<?php echo $id?>">
                        </div>
                        
                        <div class="form-group col-md-4">
                            <label>Room</label>
                            <select class="form-control" id="room2" name="room" >
                                  
                                 <?php
                                  $cat = "SELECT * FROM room WHERE status=2";
                                  $cat_r = mysqli_query($connection,$cat) or die("Error getting room");
                                  while ($ct = mysqli_fetch_assoc($cat_r)) {
                                      $room_no = $ct['room_no'];
                                      $room_id = $ct['room_id'];
                                      $cat_id = $ct['cat_id'];
                                      ?>
                                      <option  value="<?php echo $room_id; ?>"><?php echo get_cat($cat_id)." ".$room_no ;?></option>
                                      <?php
                                  }
                                  ?>
                            </select>
                        </div>
                        <div class="form-group col-md-4">
                            <label>Package</label>
                            <select class="form-control" id="type2" name="type" data-parsley-required="true">
                            </select>
                        </div>
                        <div class="form-group col-md-4 col-sm-4">
                            <label>Rate:</label>
                            <input class="form-control" type="text" id="amount2" name="amount" placeholder="Required" data-parsley-required="true" />
                        </div>
                        <div class="form-group  col-md-4 col-sm-4">
                            <label>Mode Of Payment</label>
                            <select class="form-control" id="mode" name="mode" data-parsley-required="true">
                                <option value="1">Cash</option>
                                <option value="2">Mpesa</option>
                                <option value="2">Visa</option>
                            </select>
                        </div>
                        <div class="form-group col-md-4 col-sm-4">
                            <label>Disc:</label>
                            <input class="form-control" type="text" id="disc" name="disc" placeholder="Give discount" data-parsley-required="true"/>
                        </div>
                        <div class="form-group col-md-4 col-sm-4">
                            <label>Ref:</label>
                            <input class="form-control" type="text" id="ref" name="ref" placeholder="ENTER MPESA CODE/RECEIPT NO" data-parsley-required="true" />
                        </div>
                    </div>
                    <div class="form-group row m-b-0 pull-right"> 
                        <div class="col-md-8 col-sm-8">
                            <button type="submit" class="btn btn-lime" name="reserve">Reserve</button>
                        </div>
                    </div>
                </form>
    		</div>
    	</div>

    <script>
        $(document).ready(function() {
        $("#room2").change(function(event){
            // You just get the value of selected input
            // You don't need to find anything because you've already selected it
            var selected = $(this).val();

            console.log(selected);
            $('#type2').removeAttr('disabled');
            $('#type2').empty();
            $.ajax({ 
                    type: "GET",
                    url: 'get_amount.php',
                    // Your creation of the data object is incorrect
                    data: { id: selected },
                    success:  function(data) {
                        console.log(data);
                        // Here just append the straight data
                        $('#type2').append(data);
                    }
            });
        });

       $("#type2").change(function(event){
        var selected = $(this).val();
    document.getElementById('amount2').value = selected;

        });
    });
    </script>
   <!--  <script type="text/javascript">                       

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
                        </script> -->
    					

     