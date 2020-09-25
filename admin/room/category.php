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
              <Button href="#modal-priviledge" class="btn btn-sm btn-lime pull-right " data-toggle="modal" ><i class="fa fa-plus"></i> &nbsp;New</Button> 
              <h4 class="panel-title">Room Categories</h4>
						</div>
						<div class="panel-body">
              <div id="massage"></div>
							<?php
							 $get_category = mysqli_query($connection ,"SELECT * FROM category ") or die(mysqli_error($connection));
							 if( mysqli_num_rows($get_category) < 1)
							 {
							 	echo "There Are No Categories At The Moment";
							 }else
							  {?>							  

							<table id="data-table" class="table table-striped table-bordered nowrap" width="100%">
                                <thead>
                                    <tr>
                                        <th>No:</th>
                                        <th>Category Name</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                while ($row = mysqli_fetch_assoc($get_category)) {
                                	$cat_id = $row['cat_id'];
                                	$cat_name=$row['name'];                                
                                ?>
                                    <tr>
                                       <td class="count"> </td>
                                        <td><?php echo $row['name']; ?></td>
                                        <td>
                                          <a data-toggle="modal" data-target="#edit-modal" data-id="<?php echo $cat_id; ?>" id="editcat" class="btn btn-xs btn-info"><i class="fa fa-lg fa-edit" ></i></a>
                                          |&nbsp;
                                          <a data-toggle="modal" data-target="#delete-modal" data-id="<?php echo $cat_id; ?>" id="deletecat" class="btn btn-xs btn-danger"><i class="fa fa-lg fa-trash" ></i></a>
                                          
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
						<h4 class="modal-title">Add Category</h4>
					</div>
					<div class="modal-body">
						<form action="#" method="" id="form-user" role="form">
						<div id="results"></div>
            <div class="form-group">
                <label >Category Name</label>
                <input type="text" class="form-control" id="category" name="category" placeholder="category" required />
            </div>
					</div>
					<div class="modal-footer">
						<a href="javascript:;" class="btn btn-sm btn-danger" data-dismiss="modal">Close</a>
            			<button type="button" id="btn-category"  name="btn-category"  class="btn btn-success">Save</button>
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
                       <i class="fa fa-stats"></i> &nbsp;&nbsp;  Edit Category 
                       </h4> 
                    </div> 
                        
                    <div class="modal-body"> 
                                        
                       <!-- mysql data will be load here -->                          
                       <div id="dynamic-content"></div>
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
                       <i class="fa fa-stats"></i> &nbsp;&nbsp; Delete Category
                       </h4> 
                    </div> 
                        
                    <div class="modal-body">                     
                       <div id="modal-loader" style="display: none; text-align: center;">
                      
                       </div>
                                        
                       <!-- mysql data will be load here -->                          
                       <div id="dynamic-content1"></div>
                    </div> 
                                    
                </div> 
              </div>
            </div>

   

<?php  
include("../includes/footer.php");
?>
 <script type="text/javascript">
      <?php include("category.js");?>
    </script>
      
</body>
</html>


