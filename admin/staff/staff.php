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
			<!-- begin breadcrumb -->
			<ol class="breadcrumb pull-right" style="margin-top: 10px; margin-bottom: 10px;">

				

			</ol>

			<!-- end breadcrumb -->
			
			<!-- begin row --
			<div class="row">
				<td><a href="#modal-dialog" class="btn btn-sm btn-success pull-right" data-toggle="modal" >Demo</a></td>
			</div> 
			<!-- end row -->
			<!-- begin row -->
			<div class="row">
				<!-- begin col-8 -->
				<div class="col-md-12 col-sm-10">
					<div class="panel panel-inverse" data-sortable-id="index-1">
						<div class="panel-heading">
							
                <Button href="#modal-dialog" class="btn btn-sm btn-lime pull-right" data-toggle="modal" ><i class="fa fa-plus"></i> &nbsp;New staff</Button>
                <h4 class="panel-title">Staff Management</h4>
						</div>
						<div class="panel-body">
							<?php
							 $get_user = mysqli_query($connection ,"SELECT * FROM staff") or die(mysqli_error($connection));
							 if( mysqli_num_rows($get_user) < 1)
							 {
							 	echo "There are no registered suppliers";
							 }else
							  {?>							  

							<table id="data-table-combine" class="table table-striped table-bordered">
                      <thead>
                                    <tr>
                                        <th>Full Name</th>
                                        <th>ID</th>
                                        <th>Phone</th> 
                                        <th>Residence</th>
                                        <th>Marital</th>
                                        <th>Position</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                while ($row = mysqli_fetch_assoc($get_user)) {
                                	$staff_id = $row['staff_id'];
                                	 

                                ?>
                                    <tr>
                                       <td><?php echo $row['name']; ?></td>
                                        <td><?php echo $row['id']; ?></td>
                                        <td><?php echo $row['phone']; ?></td>
                                        <td><?php echo $row['residence']; ?></td>
                                        <td><?php get_marital($row['marital']); ?></td>
                                        <td><?php get_role($row['position']); ?></td>
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
  <div class="modal fade" id="modal-dialog">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
						<h4 class="modal-title">Register Staff</h4>
					</div>
					<div class="modal-body">
						<form action="#" method="POST" id="form-user" role="form" onsubmit="validate();">
							<div id="results"></div>
                <fieldset>
                  <div class="form-group row">
                    <div class="form-group col-md-12">
                        <label >Full Name</label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="Name" required />
                    </div>
                    <div class="form-group col-md-6">
                        <label >Phone</label>
                        <input type="text" class="form-control" id="phone" name="phone" placeholder="Enter Phone"  required />
                    </div>
                    <div class="form-group col-md-6">
                        <label >I.D No.</label>
                        <input type="text" class="form-control" id="id" name="id" placeholder="Enter Phone" required />
                    </div>
                    <div class="form-group col-md-6">
                        <label >Residence:</label>
                        <input type="text" class="form-control" id="resi" name="resi"  placeholder="Enter residence" required />
                    </div>
                    <div class="form-group col-md-6">
                        <label >NHIF No.:</label>
                        <input type="text" class="form-control" id="nhif" name="nhif" placeholder="Enter NHIF number" required />
                    </div>
                    <div class="form-group col-md-6">
                        <label >NSSF No.:</label>
                        <input type="text" class="form-control" id="nssf" name="nssf" placeholder="Enter NHIF number" required />
                    </div>
                    <div class="form-group col-md-6">
                        <label >Date Of Birth:</label>
                        <input type="date" class="form-control" id="dob" name="dob" required />
                    </div>
                    <div class="form-group col-md-8">
                        <label >User Roles</label>
                        <select name="roles" id="role1" class="form-control">
                            <?php
                            $role = mysqli_query($connection,"SELECT * FROM roles") or die(mysql_error());
                            while($fetch_r=mysqli_fetch_assoc($role)) {
                                ?>
                                <option value="<?=$fetch_r['permission']?>"><?=$fetch_r['name']?></option>
                                <?php
                            }
                            ?>
                        </select>
                    </div>
                    <div class="form-group col-md-6">
                        <label >Gender</label>
                        <select name="gender" id="gender" class="form-control">
                          <option value="1">Male</option>
                          <option value="2">Female</option>
                        </select>
                    </div>
                    <div class="form-group col-md-6">
                        <label >Marital Status</label>
                        <select name="marital" id="marital" class="form-control">
                          <option value="1">Single</option>
                          <option value="2">Married</option>
                        </select>
                    </div>
                    <div class="form-group col-md-6">
                        <label >Bank Account Number:</label>
                        <input type="text" class="form-control" id="acc" name="acc" required />
                    </div>
                  </div>
					</div>
					<div class="modal-footer">
						<a href="javascript:;" class="btn btn-sm btn-danger" data-dismiss="modal">Close</a>
            			<button type="button" id="add"  name="save"  class="btn btn-success">Save</button>
					</div>
					</form>
					</div>
				</div>
			</div>
		</div>


            <div  id="edit-modal" class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="display: none;">
              <div class="modal-dialog"> 
                 <div class="modal-content">  
               
                    <div class="modal-header"> 
                       <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button> 
                       <h4 class="modal-title">
                       <i class="fa fa-stats"></i> &nbsp;&nbsp; <!-- Edit User --><span id="edit_name"></span>
                       </h4> 
                    </div> 
                        
                    <div class="modal-body"> 
                                        
                       <!-- mysql data will be load here -->                          
                       <div id="dynamic-content1"></div>
                    </div> 
                                    
                </div> 
              </div>
            </div>

             <div  id="edit-priv" class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="display: none;">
              <div class="modal-dialog"> 
                 <div class="modal-content">  
               
                    <div class="modal-header"> 
                       <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button> 
                       <h4 class="modal-title">
                       <i class="fa fa-stats"></i> &nbsp;&nbsp;  Edit Priviledge <span id="edit_name"></span>
                       </h4> 
                    </div> 
                        
                    <div class="modal-body"> 
                                        
                       <!-- mysql data will be load here -->                          
                       <div id="dynamic-content4"></div>
                    </div> 
                                    
                </div> 
              </div>
            </div>

            <div  id="delete-modal" class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="display: none;">
              <div class="modal-dialog"> 
                 <div class="modal-content">  
               
                    <div class="modal-header"> 
                       <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button> 
                       <h4 class="modal-title">
                       <i class="fa fa-stats"></i> &nbsp;&nbsp; Delete User
                       </h4> 
                    </div> 
                        
                    <div class="modal-body">                     
                       <div id="modal-loader" style="display: none; text-align: center;">
                      
                       </div>
                                        
                       <!-- mysql data will be load here -->                          
                       <div id="dynamic-content2"></div>
                    </div> 
                                    
                </div> 
              </div>
            </div>
 
  <?php  
include("../includes/footer.php");
?>
 <script type="text/javascript">
      <?php include("staff_js.js");?>
      $(document).ready(function(){
          $("#cpass").keyup(function(){
              if ($("#pass").val() != $("#cpass").val()) {
                  $("#msg").html("Passwords entered do not match").css("color","red");
                  $("#btn-user").hide();
              }else{
                  $("#msg").html("Passwords entered matched").css("color","green");
                  $("#btn-user").show();
              }
          });
      });

</script>
</body>
</html>


