<?php
include('../../inc/connection.php');
 include('../includes/header.php'); 

?>


		
		<!-- begin #content -->
		<div id="content" class="content">
			<div class="panel-body" style="background-color: #fff;">
                    <div class="table-responsive">
                    	
                    <table class="datatable table table-valign-middle m-b-0">
						   <thead>
						      <tr>
						      	 <th>Shift</th>
						      	 <th>Opening Time</th>
						      	 <th>Opened By</th>
						      	 <th>Closing Time</th>
						      	 <th>Closed by</th>
						      	 <th>Start order</th>
						         <th>Closing Order</th>
						         <th>Action</th>  
						      </tr>
						   </thead>
						   <tbody>
                          <?php
						   $shifts = mysqli_query($connection,"SELECT * FROM day_shift ORDER BY shift DESC");
						   if (mysqli_num_rows($shifts) < 1) {
						   	?>
						   	<div class="alert alert-warning">
						   		<p>There are no shifts in the system</p>
						   	</div>
						   	<?php
						   }else{
						   	while ($sa = mysqli_fetch_assoc($shifts)) {
						   		$shift = $sa['shift'];
						   		$opening = $sa['opening'];
						   		$closing = $sa['closing'];
						   		$open_by = $sa['open_by'];
						   		$close_by = $sa['close_by'];
						   		$open_ord = $sa['open_ord'];
						   		$close_ord = $sa['close_ord'];
						   	?>
						   		<tr>
						   			<td><?php echo $shift; ?></td>
						   			<td><?php echo $opening; ?></td>
						   			<td><?php get_staff($open_by); ?></td>
						   			<td><?php echo $closing; ?></td>
						   			<td><?php get_staff($close_by);; ?></td>
						   			<td><?php echo $open_ord; ?></td>
						   			<td><?php echo $close_ord; ?></td>
						   			<td class="with-btn-group" nowrap>
                                                <div class="btn-group">
                                                    <a href="#" class="btn btn-white btn-sm width-60">Actions</a>
                                                    <a href="#" class="btn btn-white btn-sm dropdown-toggle width-30 no-caret" data-toggle="dropdown">
                                                        <span class="caret"></span>
                                                    </a>
                                                    <ul class="dropdown-menu pull-right">
                                                        <li><a href="../reports/view_day_orders.php?day=<?php echo $shift;?>">Shift Sales</a></li>
                                                         
                                                </div>
                                            </td> 
						   			
						   		</tr>
						   		<?php	
						   	}
						   }
						   ?>

						
						
							</tbody>
						

					    	</table>
                    </div>
                   
                </div>
                
         
            </div>
			<!-- end invoice -->
		</div>
		<!-- end #content -->
		
		<!-- begin scroll to top btn -->
		<a href="javascript:;" class="btn btn-icon btn-circle btn-success btn-scroll-to-top fade" data-click="scroll-top"><i class="fa fa-angle-up"></i></a>
		<!-- end scroll to top btn -->
	</div>
	<?php  
include("../includes/footer.php");
?>