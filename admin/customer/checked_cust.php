    <?php
    include('../includes/header.php'); 
    ?>
    <style type="text/css">
     
    </style>
    <body>
      <!-- begin #page-loader -->
      <div id="page-loader" class="fade show"><span class="spinner"></span></div>
      <!-- end #page-loader -->
      
      <!-- begin #page-container -->
      <div id="page-container" class="fade page-sidebar-fixed page-header-fixed">
        <!-- begin #header -->
        <?php
        include('../includes/header_nav.php'); 
        ?>
        <!-- end #header -->
    <!-- begin #content -->
    		<div id="content" class="content">
    			 
    			<!-- end row -->
    			<!-- begin row -->
    			<div class="row">
    				<!-- begin col-8 -->
    				<div class="col-md-12">
    					<div class="panel panel-inverse" data-sortable-id="index-1">
    						<div class="panel-heading"> 
                  <div class="pull-right">
                    <Button href="#modal-priviledge" class="btn btn-sm btn-lime pull-right" data-toggle="modal" ><i class="fa fa-plus"></i> &nbsp;Add Guest</Button> &nbsp; &nbsp; &nbsp; &nbsp;
              
                   </div>
                  
    							<h4 class="panel-title">Guest List</h4>
                 	</div>
    						<div class="panel-body">
    							 <?php
                      $get_customers = mysqli_query($connection,"SELECT * FROM customer WHERE status=1") or die("Could not get any suppliers");
                      if (mysqli_num_rows($get_customers) < 1) {
                        echo "There are no registered suppliers";
                      }else{
                    ?>

                    <table id="data-table-combine" class="table table-striped table-bordered">
                      <thead>
                        <tr>
                          <th>No:</th>
                          <th>Name</th> 
                          <th>Id:</th>
                          <th>Phone</th>
                          <th>Gender</th>
                          <th>Status</th>
                          <th>Package</th>
                          <th>Room</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php 
                       while ($row = mysqli_fetch_assoc($get_customers)) {
                        $cust_id=$row['cust_id'];
                          ?>
                            <tr>
                              <td class="count"> </td> 
                              <td><?php echo strtoupper($row['name']); ?></td> 
                              <td><?php echo $row['nid']; ?></td> 
                              <td><?php echo $row['phone']; ?></td>
                              <td><?php get_gender($row['gender']); ?></td>  
                              <td><?php get_status($row['status']); ?></td> 
                              <td><?php get_package($cust_id); ?></td>
                               <td><?php get_cust_room($cust_id); ?></td> 
<td class="with-btn-group" nowrap>
<div class="btn-group">
    <a href="#" class="btn btn-lime btn-sm width-60">Actions</a>
    <a href="#" class="btn btn-lime btn-sm dropdown-toggle width-30 no-caret" data-toggle="dropdown">
        <span class="caret"></span>
    </a>
    <ul class="dropdown-menu pull-right">
        <li><a data-toggle="modal" data-target="#view-modal" data-id="<?php echo $row['cust_id']; ?>" id="edit">Edit</a></li> 
       <li><a data-target="#view-modal" data-toggle="modal" data-id="<?php echo $row['cust_id']; ?>" id="trans">Check in Room</a></li>
        <li><a href="#view-modal" data-id="<?php echo $row['cust_id']; ?>" data-toggle="modal" id="reserve">Reserve Room</a></li>
        <li><a href="#view-modal"  data-toggle="modal"  data-id="<?php echo $row['cust_id']; ?>" id="checkout">Check Out</a></li>
        <!-- <li><a href="#view-modal"  data-toggle="modal"  data-id="<?php echo $row['cust_id']; ?>" id="cancel">Cancel Reservation</a></li> -->
    </ul>
</div>
</td> 
                            </tr>
                        <?php
                          }
                        ?>
                        </tbody>
                    </table>
                    <?php
                    }

                    ?>
    					</div>
            </div>
          </div>
    			<!-- end row -->
    		</div>
    		<!-- end #content -->

    		<!-- #modal-dialog -->
        <div class="modal fade" id="modal-priviledge">
    			<div class="modal-dialog">
    				<div class="modal-content">
    					<div class="modal-header">
    						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
    						<h4 class="modal-title">Add Guest</h4>
    					</div>
    					<div class="modal-body">
    						
               <form action="customers_action.php" method="POST" role="form">
                <div id="results"></div>
                  <fieldset>
                    <div class="form-group row">
                      <div class="form-group col-md-6">
                          <label>Guest Name</label>
                          <input type="text" class="form-control" name="name" id="name"  required style="text-transform: uppercase">
                      </div>
                      <div class="form-group col-md-6">
                          <label>ID Number</label>
                          <input type="text" class="form-control" name="nid" id="nid" required>
                      </div> 
                      <div class="form-group col-md-6">
                          <label>Phone Number</label>
                          <input type="text" class="form-control" name="phone" id="phone" placeholder="Tenant Phone Number..." / required>
                      </div>

                      <div class="form-group col-md-6">
                      <label>Gender</label> 
                         <select name="gender" id="gender" class="form-control">
                          <option value="1" selected="selected">Male</option>
                          <option value="2" selected="selected">Female</option>
                        </select>
                      </div>
               </div>
             </fieldset>
             <fieldset>
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
                            <select class="form-control" id="room" name="rooms">
                                  
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
                            <select class="form-control" id="package" name="package" data-parsley-required="true">
                            </select>
                        </div>
                        <div class="form-group col-md-4 col-sm-4">
                            <label>Rate:</label>
                            <input class="form-control" type="text" id="amount" name="amount" placeholder="Required" data-parsley-required="true" />
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
                        <div class="form-group col-md-6 col-sm-6">
                            <label>Remarks:</label>
                           <!--  <input class="form-control" type="text" id="ref" name="ref" data-parsley-required="true" /> -->
                            <textarea  class="form-control" type="text" id="ref" name="ref" data-parsley-required="true" ></textarea>
                        </div>
                    </div>
                    
             </fieldset>
             <div class="modal-footer">
                <a href="javascript:;" class="btn btn-sm btn-danger" data-dismiss="modal">Close</a>
                <button type="submit" class="btn btn-warning" name="reserve">Reserve</button>
                <button type="submit" class="btn btn-lime" name="checkin">Issue</button><!-- 
                 <button type="submit" class="btn btn-lime" name="reserve">Reserve</button> -->
              </div>
          </form>
                          </div>
                  					</div>
                  				</div>
                  			</div>
                  		</div>

<div  id="view-modal" class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="display: none;">
  <div class="modal-dialog"> 
     <div class="modal-content">
       
      <div class="modal-body">
        <div id="modal-loader" style="display: none; text-align: center;">
        </div>
        <div id="dynamic-content"></div>
      </div>
    </div> 
  </div>
</div>

                
   <div id="checkout" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="gridModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-body"> 
            <div class="row">
              <div class="alert alert-warning">
                <h3>Are you sure you want to check out.</h3>
              </div>
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">NO</button>
          <a class="btn btn-danger" href="check_out.php">YES</a>
        </div>
      </div>
    </div>
  </div>

                <div  id="reserve" class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="display: none;">
                  <div class="modal-dialog"> 
                     <div class="modal-content" id="dynamic">
                        <div class="modal-body">
                          
                        </div>
                    </div> 
                  </div>
                </div>

                <div  id="delete-modal" class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="display: none;">
                  <div class="modal-dialog"> 
                    <div class="modal-content">
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        <h4 class="modal-title"><i class="fa fa-stats"></i> &nbsp;&nbsp; Delete Customer</h4> 
                      </div>
                      <div class="modal-body">
                      <div id="modal-loader" style="display: none; text-align: center;"> </div>
                      <div id="dynamic-content1"></div>
                      </div>
                    </div>
                  </div>
                </div>
      <?php  
    include("../includes/footer.php");
    ?>


    <script>
        $(document).ready(function() {
        $("#room").change(function(event){
            // You just get the value of selected input
            // You don't need to find anything because you've already selected it
            var selected = $(this).val();
            console.log(selected);
            $('#package').removeAttr('disabled');
            $('#package').empty();
            $.ajax({ 
                    type: "GET",
                    url: 'get_amount.php',
                    // Your creation of the data object is incorrect
                    data: { id: selected },
                    success:  function(data) {
                        $('#package').append(data);
                    }
            });
        });

       $("#package").change(function(event){
        var selected = $(this).val();
        console.log(selected);
    document.getElementById('amount').value = selected;

        });
    });
    </script>

<script type="text/javascript">
        
     
          $(document).ready(function(){
            $(document).on('click','#trans', function(e){
              e.preventDefault();
              var uid = $(this).data('id'); // get id of clicked row
              console.log(uid);
              $('#dynamic-content').html(''); // leave this diff blank
              $('#modal-loader').show(); // load ajax loader button cliked
              $.ajax({
                url: 'room_transaction.php',
                typr: 'POST',
                data: 'id='+uid,
                dataType: 'html'
              })
              .done(function(data){
                console.log(data);
                $('#dynamic-content').html(''); // blank before load.
                $('#dynamic-content').html(data);
              })
              .fail(function(){
                $('#dynamic-content').html('<i class="fa  fa-info-sign"></i> Something went wrong, Please try again...');
                $('#modal-loader').hide();
              });
            });
            $(document).on('click','#reserve', function(e){
              e.preventDefault();
              var uid = $(this).data('id'); // get id of clicked row
              console.log(uid);
              $('#dynamic-content').html(''); // leave this diff blank
              $('#modal-loader').show(); // load ajax loader button cliked
              $.ajax({
                url: 'room_reserve.php',
                typr: 'POST',
                data: 'id='+uid,
                dataType: 'html'
              })
              .done(function(data){
                console.log(data);
                $('#dynamic-content').html(''); // blank before load.
                $('#dynamic-content').html(data);
              })
              .fail(function(){
                $('#dynamic-content').html('<i class="fa  fa-info-sign"></i> Something went wrong, Please try again...');
                $('#modal-loader').hide();
              });
            });
            $(document).on('click','#edit', function(e){
              e.preventDefault();
              var uid = $(this).data('id'); // get id of clicked row
              console.log(uid);
              $('#dynamic-content').html(''); // leave this diff blank
              $('#modal-loader').show(); // load ajax loader button cliked
              $.ajax({
                url: 'edit_cust.php',
                typr: 'POST',
                data: 'id='+uid,
                dataType: 'html'
              })
              .done(function(data){
                console.log(data);
                $('#dynamic-content').html(''); // blank before load.
                $('#dynamic-content').html(data);
              }).fail(function(){
                $('#dynamic-content').html('<i class="fa  fa-info-sign"></i> Something went wrong, Please try again...');
                $('#modal-loader').hide();
              });
            });
            $(document).on('click','#deletecustomer', function(e){
              e.preventDefault();
              var uid = $(this).data('id'); // get id of clicked row
              console.log(uid);
              $('#dynamic-content1').html(''); // leave this diff blank
              $('#modal-loader').show(); // load ajax loader button cliked
              $.ajax({
                url: 'del_cust.php',
                typr: 'POST',
                data: 'id='+uid,
                dataType: 'html'
              })
              .done(function(data){
                console.log(data);
                $('#dynamic-content1').html(''); // blank before load.
                $('#dynamic-content1').html(data);
              }).fail(function(){
                $('#dynamic-content1').html('<i class="fa  fa-info-sign"></i> Something went wrong, Please try again...');
                $('#modal-loader').hide();
              });
            });
            $(document).on('click','#checkout', function(e){
                e.preventDefault();
                var uid = $(this).data('id'); // get id of clicked row
                console.log(uid);
                $('#dynamic-content').html(''); // leave this diff blank
                $('#modal-loader').show(); // load ajax loader button cliked
                $.ajax({
                  url: 'checkout.php',
                  typr: 'POST',
                  data: 'id='+uid,
                  dataType: 'html'
                })
                .done(function(data){
                  console.log(data);
                  $('#dynamic-content').html(''); // blank before load.
                  $('#dynamic-content').html(data);
                }).fail(function(){
                  $('#dynamic-content').html('<i class="fa  fa-info-sign"></i> Something went wrong, Please try again...');
                  $('#modal-loader').hide();
                });
              });
                });
        </script>
            
    </body>
    </html>


