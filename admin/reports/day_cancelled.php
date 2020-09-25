<?php
include("../../inc/connection.php"); 
include("../includes/header.php");

?>

		
		<!-- begin #content -->
		<div id="content" class="content">
			<div class="row">
               <div class="col-md-12">
                	<div class="panel panel-success" data-sortable-id="index-1">
						<div class="panel-heading"><strong style="font-size: 24px; font-weight: 600;"><b>CANCELLED ORDERS REPORT</strong>
						</div>
                <div class="panel-body">
                	<table class="table table-bordered">
						   <thead>
						      <tr>
						      	 <th>Day</th>
						      	
						         
						         <th class="hidden-print">Action</th>
						      </tr>
						   </thead>
						   <tbody>
                          <?php
						   $sales = mysqli_query($connection,"SELECT shift FROM cancelled  GROUP BY shift");
						   if (mysqli_num_rows($sales) < 1) {
						   	?>
						   	<div class="alert alert-warning">
						   		<p>There are no recorded sales</p>
						   	</div>
						   	<?php
						   }else{
						   	while ($sa = mysqli_fetch_assoc($sales)) {
						   		
						   		$day = $sa['shift'];
								?>
						   		<tr>
						   			<td><?php echo $day; ?></td>
						   			
						   			<td class="hidden-print"><a href="view_day_cancelled.php?day=<?php echo $day; ?>&return=daily_report.php">View</a></td>
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
        </div>
		 </div>
	
	<?php
		include('../includes/footer.php');
	?>