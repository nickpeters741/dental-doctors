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
				<div class="col-md-8 col-sm-6">
					<div class="panel panel-inverse" data-sortable-id="index-1">
						<div class="panel-heading">
							
                <Button href="#modal-dialog" class="btn btn-sm btn-lime pull-right" data-toggle="modal" ><i class="fa fa-plus"></i> &nbsp;Add User</Button><h4 class="panel-title">User Management</h4>
						</div>
						<div class="panel-body">
							<?php
							 $get_user = mysqli_query($connection ,"SELECT * FROM users") or die(mysqli_error($connection));
							 if( mysqli_num_rows($get_user) < 1)
							 {
							 	echo "There are no registered suppliers";
							 }else
							  {?>							  

							<table id="data-table" class="table table-striped table-bordered nowrap col-md-8 col-sm-6" width="100%">
                                <thead>
                                    <tr>
                                        <th>Full Name</th>
                                        <th>Username</th>
                                        <th>Department</th> 
                                        <th>Change Password</th>
                                        <th>Edit</th>
                                        <th>Suspend/Unsuspend</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                while ($row = mysqli_fetch_assoc($get_user)) {
                                	$staff_id = $row['staff_id'];
                                	$role=$row['role_id'];
                                    $work_s=$row['work_status'];

                                ?>
                                    <tr>
                                       <td><?php get_staff($staff_id); ?></td>
                                        <td><?php echo $row['username']; ?></td>
                                        <td><?php get_role($role); ?></td>
                                        <td>
                                        	<a data-toggle="modal" data-target="#view-modal" data-id="<?php echo $staff_id; ?>" id="changepass" class="btn btn-xs btn-info"><i  class="fa fa-password"></i>Update Pass</a></td>
                                        <td>
                                          <a data-toggle="modal" data-target="#edit-modal" data-id="<?php echo $staff_id; ?>" id="edituser" class="btn btn-xs btn-info"><i  class="fa fa-edit"></i></a>
                                          |&nbsp;
                                          <a data-toggle="modal" data-target="#delete-modal" data-id="<?php echo $staff_id; ?>" id="deleteuser" class="btn btn-xs btn-danger"><i  class=" fa fa-trash"></i></a>
                                        </td>
                                        <td>
                                            <?php
                                            if($work_s == 1){
                                            ?>
                                            <a data-toggle="modal" data-target="#suspend-modal" data-id="<?php echo $staff_id; ?>" id="suspuser" class="btn btn-xs btn-danger">Suspend <i  class="fa fa-times"> </i></a>
                                            <?php
                                            }
                                            else
                                            {
                                            ?>
                                            <a data-toggle="modal" data-target="#unsuspend-modal" data-id="<?php echo $staff_id; ?>" id="unsuspuser" class="btn btn-xs btn-lime">Unsuspend <i  class="fa fa-check"> </i></a>
                                            <?php
                                            }
                                            ?>
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

				<!-- begin col-8 -->
				<div class="col-md-8">
					<div class="panel panel-inverse" data-sortable-id="index-1">
						<div class="panel-heading">
              <div class="panel-heading-btn">
                       <a href="#modal-priviledge" class="btn btn-sm btn-lime pull-right" data-toggle="modal" ><i class="fa fa-plus"></i> &nbsp;Add Priviledge</a> 
                    </div>


							<h4 class="panel-title">Priviledges </h4>
						</div>
						<div class="panel-body">
							<?php
							 $get_priv = mysqli_query($connection ,"SELECT * FROM roles ") or die(mysqli_error($connection));
							 if( mysqli_num_rows($get_priv) < 1)
							 {
							 	echo "There are no registered suppliers";
							 }else
							  {?>							  

							<table id="data-table" class="table table-striped table-bordered nowrap" width="100%">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Priviledge Id</th>
                                        <th>Priviledge Name</th>
                                        <th>Access Type</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                while ($data = mysqli_fetch_assoc($get_priv)) {
                                	$role_id = $data['role_id'];
                                	$priv_name=$data['name'];
                                ?>
                                    <tr bgcolor="">
                                    	<td>#</td>
                                       <td><?php echo $data['role_id']; ?></td>
                                        <td><?php echo $data['name']; ?></td>
                                        <td><?php echo $data['permission']; ?></td>
                                         <td>
                                          <a data-toggle="modal" data-target="#edit-priv" data-id="<?php echo $role_id; ?>" id="editpriv" class="btn btn-xs btn-info"><i  class="fa fa-edit"></i></a>
                                          |&nbsp;
                                          <a data-toggle="modal" data-target="#del-priv" data-id="<?php echo $role_id; ?>" id="delpriv" class="btn btn-xs btn-danger"><i  class=" fa fa-trash"></i></a>
                                          
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

		<div class="modal fade" id="modal-priviledge">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
						<h4 class="modal-title">Add Priviledge</h4>
					</div>
					<div class="modal-body">
						<form action="#" method="POST" id="form-user" role="form">
							<div id="results"></div> 
                            <div class="form-group col-md-8">
                                <label >Priviledge Name</label>
                                <input type="text" class="form-control" id="priv" name="priv" placeholder="Priviledge" required />
                            </div>
                            <div class="form-group col-md-8">
                                <label >Panel</label>
                                <select name="perm" id="perm" class="form-control">
                                  <option value="1">Admin</option>
                                  <option value="2">Front</option>
                                </select>
                            </div>
					</div>
					<div class="modal-footer">
						<a href="javascript:;" class="btn btn-sm btn-danger" data-dismiss="modal">Close</a>
            			<button type="button" id="btn-priviledge"  name="btn-priviledge"  class="btn btn-success">Save</button>
					</div>
					</form>
					</div>
				</div>
        </div>


		<div class="modal fade" id="modal-dialog">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
						<h4 class="modal-title">Register</h4>
					</div>
					<div class="modal-body">
						<form action="#" method="POST" id="form-user" role="form" onsubmit="validate();">
							<div id="results"></div>
                        <fieldset>
                          <div class="form-group row">
                             
                            <div class="form-group col-md-8">
                                <label >Select Staff</label>
                                <select name="staff" id="staff" class="form-control">
                                    <?php
                                    $staff = mysqli_query($connection,"SELECT * FROM staff WHERE user=2") or die(mysql_error());
                                    while($fetch_r=mysqli_fetch_assoc($staff)) {
                                        ?>
                                        <option value="<?=$fetch_r['staff_id']?>"><?=$fetch_r['name']?></option>
                                        <?php
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="form-group col-md-6">
                                <label >Username</label>
                                <input type="text" class="form-control" id="username" name="username" placeholder="Username" required />
                            </div>
                             
                            <div class="form-group col-md-8">
                                <label >User Roles</label>
                                <select name="roles" id="roles" class="form-control">
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
                             
                            <div class="form-group col-md-7">
                                <label >Password</label>
                                <input type="password" class="form-control" id="pass" name="password" placeholder="Password" required />
                            </div>
                            <div class="form-group col-md-7">
                                <label >Confirm Password</label>
                                <input type="password" class="form-control" id="cpass" name="cpassword" placeholder="Confirm password" required />
                                <div style="font-size: 16px;" id="msg"></div>
                            </div>
                            </div>
					</div>
					<div class="modal-footer">
						<a href="javascript:;" class="btn btn-sm btn-danger" data-dismiss="modal">Close</a>
            			<button type="button" id="btn-user"  name="btn-user"  class="btn btn-success">Save</button>
					</div>
					</form>
					</div>
				</div>
			</div>
		</div>


		  <div  id="view-modal" class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="display: none;">
              <div class="modal-dialog"> 
                 <div class="modal-content">  
               
                    <div class="modal-header"> 
                       <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button> 
                       <h4 class="modal-title">
                       <i class="fa fa-stats"></i> &nbsp;&nbsp; Change Password
                       </h4> 
                    </div> 
                        
                    <div class="modal-body">                     
                       
                                        
                       <!-- mysql data will be load here -->                          
                       <div id="dynamic-content"></div>
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

                <div  id="suspend-modal" class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="display: none;">
                    <div class="modal-dialog">
                        <div class="modal-content">

                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                <h4 class="modal-title">
                                    <i class="fa fa-stats"></i> &nbsp;&nbsp; Suspend User
                                </h4>
                            </div>

                            <div class="modal-body">
                                <div id="modal-loader" style="display: none; text-align: center;">

                                </div>

                                <!-- mysql data will be load here -->
                                <div id="dynamic-content8"></div>
                            </div>

                        </div>
                    </div>
                </div>
<div  id="unsuspend-modal" class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title">
                    <i class="fa fa-stats"></i> &nbsp;&nbsp; Unsuspend User
                </h4>
            </div>

            <div class="modal-body">
                <div id="modal-loader" style="display: none; text-align: center;">

                </div>

                <!-- mysql data will be load here -->
                <div id="dynamic-content9"></div>
            </div>

        </div>
    </div>
</div>

            <div  id="del-priv" class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="display: none;">
              <div class="modal-dialog"> 
                 <div class="modal-content"> 
                  <div class="modal-header"> 
                       <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button> 
                       <h4 class="modal-title">
                       <i class="fa fa-stats"></i> &nbsp;&nbsp; Delete Role
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
      <?php include("user_js.js");?>
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


