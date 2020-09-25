n    <?php
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
			<div class="panel-body" style="background-color: #fff;">
                    <div class="table-responsive">
                    	
                    <table class="datatable table table-valign-middle m-b-0">
						   <thead>
						      <tr>
						      	 <th>Day</th>
						      	 <th>Sales Total</th>
						         <!-- <th>Time</th> -->
						         <th class="hidden-print">Action</th>
						      </tr>
						   </thead>
						   <tbody>
                          <?php
						   $sales = mysqli_query($connection,"SELECT * FROM booking GROUP BY transaction_date ORDER BY transaction_date DESC");
						   if (mysqli_num_rows($sales) < 1) {
						   	?>
						   	<div class="alert alert-warning">
						   		<p>There are no recorded room sales</p>
						   	</div>
						   	<?php
						   }else{
						   	while ($sa = mysqli_fetch_assoc($sales)) {
						   		 
						   		$day = $sa['transaction_date'];

						   	$days_total = mysqli_query($connection,"SELECT SUM(total) AS days_sum FROM booking WHERE transaction_date='$day'");
						   	$total = mysqli_fetch_assoc($days_total);
							
						   		?>
						   		<tr>
						   			<td><?php echo $day; ?></td>
						   			<td><?php  echo $total['days_sum']; ?></td>
						   			 <td class="hidden-print"><a href="view_day_orders.php?day=<?php echo $day; ?>&return=daily_report.php">View</a></td>  
						   			
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
</body>
    </html>