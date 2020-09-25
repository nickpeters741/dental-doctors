<?php  
include('../includes/header.php');
?>

<!-- begin #content -->
		<div id="content" class="content">
		

			<!-- begin row -->
			<div class="row">
				<!-- begin col-8 -->
				<div class="col-md-12">
                <?php
                        if (isset($_GET['msg'])) {
                            if ($_GET['msg'] == 1) {
                                ?>
                                <div class="row">
                                    <div class="alert alert-warning">        
                                       <p><i class="fa fa-lg fa-warning"></i>&nbsp;New user added.</p>
                                    </div>
                                </div>
                                <?php
                            }elseif ($_GET['msg'] ==2) {
                                ?>
                                <div class="row">
                                    <div class="alert alert-warning">        
                                       <p><i class="fa fa-lg fa-warning"></i>&nbsp;User details updated.</p>
                                    </div>
                                </div>
                                <?php
                            }elseif ($_GET['msg'] ==3) {
                                ?>
                                <div class="row">
                                    <div class="alert alert-warning">        
                                       <p><i class="fa fa-lg fa-warning"></i>&nbsp;User Profile Deleted.</p>
                                    </div>
                                </div>
                                <?php
                            }elseif ($_GET['msg'] ==4) {
                                ?>
                                <div class="row">
                                    <div class="alert alert-warning">        
                                       <p><i class="fa fa-lg fa-warning"></i>&nbsp;<strong>WARNING!!!</strong>Username already exists.</p>
                                    </div>
                                </div>
                                <?php
                            }elseif ($_GET['msg'] ==5) {
                                ?>
                                <div class="row">
                                    <div class="alert alert-warning">        
                                       <p><i class="fa fa-lg fa-warning"></i>&nbsp;<strong>WARNING!!!</strong>Please fill all the required fields.</p>
                                    </div>
                                </div>
                                <?php
                            }elseif ($_GET['msg'] ==6) {
                                ?>
                                <div class="row">
                                    <div class="alert alert-warning">        
                                       <p><i class="fa fa-lg fa-warning"></i>&nbsp;<strong>WARNING!!!</strong>Passwords do not match .</p>
                                    </div>
                                </div>
                                <?php
                            }
                        }
                        ?>
					<div class="panel panel-success" data-sortable-id="index-1" style="margin-top: 10px;">
						<div class="panel-heading">
							<div class="panel-heading-btn">
								
							</div>
							<h4 class="panel-title">System Users</h4>
						</div>
						<div class="panel-body">

			<div class="col-md-4 pull-right" >
				<a href="#modal-dialog" class="btn btn-sm btn-success" data-toggle="modal" > <i class="fa fa-plus"></i>&nbsp; Add user</a>
			</div>
            <div id="d1">
 				<?php
                $get_users = mysqli_query($connection,"SELECT * FROM users") or die("Could not fetch all the users");
                if (mysqli_num_rows($get_users) < 1) {
                	echo "You have no users on your database";
                }else{
                ?>
			 <table class="table table-striped table-bordered table-condensed" id="dataTables-example">

                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Name</th>
                                        <th>Username</th>
                                        <th>Privilege</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php
                                while ($row = mysqli_fetch_assoc($get_users)) {
                                	$staff_id = $row['staff_id'];
                                  $role_id = $row['role_id'];

                                  $get_prev_name = mysqli_query($connection,"SELECT * FROM roles WHERE role_id = '$role_id'");
                                  $pr = mysqli_fetch_assoc($get_prev_name);
                                

                                ?>
                                    <tr>
                                        <td>#</td>
                                        <td><?php echo $row['name']; ?></td>
                                        <td><?php echo $row['username']; ?></td>
                                        <td><?php echo $pr['name']; ?></td>
                                         <td>
                                         <a href="edit_user.php?id=<?php echo $staff_id; ?>" class="btn-success btn btn-sm"> <i  class="fa fa-edit"></i> </a>
                                          |&nbsp;
                                         <a type="button" class="btn btn-danger btn-sm" href="#<?php echo''.$staff_id.'';?>" data-toggle="modal" > <i  class="fa fa-remove"></i> </a>
                                        </td>
                                    </tr>
                                  <!--  <?php include("includes/modals/add_users.php");?> -->
                                 <?php
                                 		}
                                 	}
                                 ?>
                                </tbody>
                            </table>
							</div>
						</div>
					</div>
					
					
				</div>
				<!-- end col-12-->
			</div>
			<!-- end row -->
		</div>
		<!-- end #content -->


		<!--modal add-->
		<div class="modal fade" id="modal-dialog">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
						<h4 class="modal-title">Add User</h4>
					</div>
					<div class="modal-body">

					 <form action="user_action.php" method="POST" role="form">
                        <fieldset>
                            <div class="form-group">
                                <label >Name</label>
                                <input type="text" class="form-control" id="reg" name="staff_name" placeholder="Name" />
                            </div>
                            <div class="form-group">
                                <label >Username</label>
                                <input type="text" class="form-control" id="reg" name="username" placeholder="Username" />
                            </div>
                            <div class="form-group">
                                <label >Privilege</label>
                                <select type="text" class="form-control" name="prev_id">
                                <?php 
                                $get_privileges = mysqli_query($connection,"SELECT * FROM roles");
                                while ($pr = mysqli_fetch_assoc($get_privileges)) {
                                  ?>
                                   <option value="<?php echo $pr['role_id']; ?>"><?php echo $pr['name']; ?></option>
                                  <?php
                                }
                                ?>
                                 
                                </select>
                            </div>
                            <div class="form-group">
                                <label >Password</label>
                                <input type="password" class="form-control" id="reg" name="password" placeholder="Password" />
                            </div>
                            <div class="form-group">
                                <label >Confirm Password</label>
                                <input type="password" class="form-control" id="reg" name="cpassword" placeholder="Confirm password" />
                            </div>
					</div>
					<div class="modal-footer">
						<a href="javascript:;" class="btn btn-sm btn-danger" data-dismiss="modal">Close</a>
						<button type="submit" name="new_user" class="btn btn-success">Save</button>
					</div>
					</form>
				</div>
			</div>
		</div>
<script type="text/javascript">
var input = document.getElementById('reg');

input.onkeyup = function(){
    this.value = this.value.toUpperCase();
}
</script>
<script type="text/javascript">
	$('.datepicker').datepicker({
    format: 'yyyy-mm-dd',
    startDate: '-3d'
});
	</script>
		<script type="text/javascript">
      function aa()
      {


        xmlhttp = new XMLHttpRequest();
        xmlhttp.open("GET","items_search.php?nm="+document.getElementById('t1').value,false);
         xmlhttp.send(null);
         document.getElementById("d1").innerHTML = xmlhttp.responseText;
         document.getElementById("d1").style.visibility = "visible";
      }
      </script>

		<?php include('../includes/footer.php') ?>