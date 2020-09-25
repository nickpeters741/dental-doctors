<?php
include('../includes/header.php'); 
?>
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
		 
			<!-- begin row -->
			<div class="row">
				<!-- begin col-8 -->
				<div class="col-md-8">
					<div class="panel panel-inverse" data-sortable-id="index-1">
						<div class="panel-heading">
              <Button href="#modal-priviledge" class="btn btn-sm btn-lime pull-right " data-toggle="modal" ><i class="fa fa-plus"></i> &nbsp;New</Button> 
              <h4 class="panel-title">Room Reservation</h4>
						</div>
						<div class="panel-body">
               <form class="form-horizontal" method="post" action="room_reserve_action.php"  data-parsley-validate="true" >
                                <div class="form-group row">
                                  
                                  <div class="form-group  col-md-4">
                                    <label>Check in</label>
                                    <input type="date" class="form-control" name="in" />
                                  </div>
                                  <div class="form-group col-md-4">
                                    <label>Check Out</label>
                                    <input type="date" class="form-control"  name="out"/>
                                  </div>
                                    
                                  <div class="form-group col-md-6">
                                          <label>Guest</label>
                                          <select class="form-control" id="guest" name="guest" class="select2" data-parsley-required="true">
                                                 <option selected="selected">--Select Guest--</option>
                                                 <?php
                                                  $cat = "SELECT * FROM Customer";
                                                  $cat_r = mysqli_query($connection,$cat) or die("Error getting customer");
                                                  while ($ct = mysqli_fetch_assoc($cat_r)) {
                                                      $name = $ct['name'];
                                                      $cust_id = $ct['cust_id'];
                                                      ?>
                                                      <option  value="<?php echo $cust_id; ?>"><?php echo $name; ?></option>
                                                      <?php
                                                  }
                                                  ?>
                                          </select>

                                  </div> 
                                  <div class="form-group col-md-4">
                                    <label>No:</label>
                                    <input type="number" class="form-control"  name="pax"/>
                                  </div>

                                  <div class="form-group col-md-6">
                                          <label>Room</label>
                                          <select class="form-control" id="room" name="room" >
                                                  
                                                 <?php
                                                  $cat = "SELECT * FROM room";
                                                  $cat_r = mysqli_query($connection,$cat) or die("Error getting room");
                                                  while ($ct = mysqli_fetch_assoc($cat_r)) {
                                                      $room_no = $ct['room_no'];
                                                      $room_id = $ct['room_id'];
                                                      ?>
                                                      <option  value="<?php echo $room_id; ?>"><?php echo $room_no; ?></option>
                                                      <?php
                                                  }
                                                  ?>
                                          </select>

                                  </div> 
                                <div class="form-group col-md-7 col-sm-7">
                                    <label>Amount Paid:</label>
                                    <input class="form-control" type="text" id="amount" name="amount" placeholder="Required" data-parsley-required="true" />
                                </div>
                                <div class="form-group  col-md-7 col-sm-7">
                                    <label>Mode Of Payment</label>
                                    <select class="form-control" id="mode" name="mode" data-parsley-required="true">
                                            <option value="1">Cash</option>
                                            <option value="2">Mpesa</option>
                                            <option value="2">Bank Deposit</option>
                                    </select>
                                </div>
                                <div class="form-group col-md-6 col-sm-6">
                                    <label>Ref:</label>
                                    <input class="form-control" type="text" id="ref" name="ref" placeholder="Enter MPESA CODE/RECEIPT NO" data-parsley-required="true" />
                                </div>
                                 </div>
                             
                             
                               
                                <div class="form-group row m-b-0 pull-right"> 
                                    <div class="col-md-8 col-sm-8">
                                        <button type="submit" class="btn btn-lime" name="new">Submit</button>
                                    </div>
                                </div>
                            </form>
						</div>
					</div>                   
					
				</div>
				<!-- end col-12 -->


			</div>
			<!-- end row -->
		</div>
		<!-- end #content -->
 



		   
<?php  
include("../includes/footer.php");
?>
  <script>
    $(document).ready(function() {
      $("#apart").change(function(event){
          // You just get the value of selected input
          // You don't need to find anything because you've already selected it
          var selected = $(this).val();

          console.log(selected);
          $('#hse').removeAttr('disabled');
          $('#hse').empty();
          $.ajax({ 
                  type: "GET",
                  url: 'house_no.php',
                  // Your creation of the data object is incorrect
                  data: { id: selected },
                  success:  function(data) {
                      console.log(data);
                      // Here just append the straight data
                      $('#hse').append(data);
                  }
          });
      });
});
</script>
</body>
</html>


