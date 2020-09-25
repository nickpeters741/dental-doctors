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
        <div class="col-md-12">
          <div class="panel panel-inverse" data-sortable-id="index-1">
            <div class="panel-heading">
              <Button href="#modal-apart" class="btn btn-sm btn-lime pull-right " data-toggle="modal" ><i class="fa fa-plus"></i> &nbsp;Add a Room</Button> 
              <h4 class="panel-title">Rooms List</h4>
            </div>
            <div class="panel-body">
              <div id="massage"></div>
              <?php
               $get_apartment= mysqli_query($connection ,"SELECT * FROM room where del_status=2 ORDER BY room_no ASC") or die(mysqli_error($connection));
               if( mysqli_num_rows($get_apartment) < 1)
               {
                echo "There Are No house At The Moment";
               }else
                {?>               

              <table id="data-table-combine" class="table table-striped table-bordered">
                      <thead>
                                    <tr>
                                        <th>No:</th>
                                        <th>Room NO</th>
                                        <th>Floor</th>
                                        <th>Category</th>
                                        <th>Bed only</th>
                                        <th>Bed and Breakfast</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                while ($row = mysqli_fetch_assoc($get_apartment)) {
                                  $room_id = $row['room_id'];                                 
                                ?>
                                    <tr>
                                       <td class="count"></td>
                                        <td><?php echo $row['room_no']; ?></td>
                                        <td><?php echo $row['floor']; ?></td>
                                        <td><?php get_cat($row['cat_id']); ?></td>
                                        <td><?php echo $row['bo']; ?></td>
                                        <td><?php echo $row['bb']; ?></td>
                                        <td>
                                          <?php if ($row['status']==1) {
                                            ?>
                                             <a class="btn btn-sm btn-lime" data-target="#view-modal" data-toggle="modal" data-id="<?php echo $row['room_id']; ?>" id="checked">Checked</a> 
                                            <?php
                                          }elseif ($row['status']==2) {
                                            ?>
                                            <Button class="btn btn-sm btn-danger">&nbsp;Free</Button>
                                            <?php
                                          }else{
                                             ?>
                                            <a class="btn btn-sm btn-warning" data-target="#view-modal" data-toggle="modal" data-id="<?php echo $row['room_id']; ?>" id="checked">Reserved</a>
                                            <?php

                                          } ; ?>
                                          
                                        </td> 
                                        <td class="with-btn-group" nowrap>
                                                <div class="btn-group">
                                                    <a href="#" class="btn btn-lime btn-sm width-60">Actions</a>
                                                    <a href="#" class="btn btn-lime btn-sm dropdown-toggle width-30 no-caret" data-toggle="dropdown">
                                                        <span class="caret"></span>
                                                    </a>
                                                    <ul class="dropdown-menu pull-right">
                                                        <li><a data-toggle="modal" data-target="#view-modal" data-id="<?php echo $room_id; ?>" id="edit">Edit</a></li>
                                                        <li><a data-toggle="modal" data-target="#view-modal" data-id="<?php echo $room_id; ?>" id="del">Delete</a></li>
                                                         
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
        <!-- end col-12 -->


      </div>
      <!-- end row -->
    </div>
    <!-- end #content -->

    <!-- #modal-dialog -->

    <div class="modal fade" id="modal-apart">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <h4 class="modal-title">Add a Room</h4>
          </div>
          <div class="modal-body">
            <form action="#" method="" id="form-user" role="form">
            <div id="results"></div>
            <!-- <div class="form-group">
                <label >House Name</label>
                <input type="text" class="form-control" id="name" name="name" placeholder="Enter Apartment name" required />
            </div> -->
            <div class="form-group">
                <label >Room Number</label>
                <input type="text" class="form-control" id="no" name="no" placeholder="Enter house number" required />
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
                <input type="text" class="form-control" id="bo" name="bo" placeholder="Enter bed only amount" required />
            </div>
            <div class="form-group">
                <label >Bed and Breakfast Amount</label>
                <input type="text" class="form-control" id="bb" name="bb" placeholder="Enter bed and breakfast" required />
            </div>
             
            
          </div>
          <div class="modal-footer">
            <a href="javascript:;" class="btn btn-sm btn-danger" data-dismiss="modal">Close</a>
                  <button type="button" id="btn-house"  name="btn-house"  class="btn btn-success">Save</button>
          </div>
          </form>
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
   

<?php  
include("../includes/footer.php");
?>
 <script type="text/javascript">
      <?php include("room.js");?>
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

            $(document).on('click','#checked', function(e){
              e.preventDefault();
              var uid = $(this).data('id'); // get id of clicked row
              console.log(uid);
              $('#dynamic-content').html(''); // leave this diff blank
              $('#modal-loader').show(); // load ajax loader button cliked
              $.ajax({
                url: 'guest_modal.php',
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
                url: 'room_edit.php',
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
           
            $(document).on('click','#del', function(e){
              e.preventDefault();
              var uid = $(this).data('id'); // get id of clicked row
              console.log(uid);
              $('#dynamic-content').html(''); // leave this diff blank
              $('#modal-loader').show(); // load ajax loader button cliked
              $.ajax({
                url: 'room_delete.php',
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


