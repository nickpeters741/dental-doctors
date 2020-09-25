<?php
 
include("../../inc/connection.php"); 
include("../includes/header.php"); 
if (!isset($_GET['day'])) {
	header("Location:daily_reports.php");
}else{
	$day = $_GET['day'];

$sum=0

?>

		<!-- begin #content -->
		<div id="content" class="content">
			
			<!-- begin invoice -->
			<div class="row">
				<div class="col-md-8">
                	<div class="panel panel-success" data-sortable-id="index-1">
						<div class="panel-heading"><strong style="font-size: 28px; font-weight: 600;"><b><?php echo $day  ?>  Cancelled Orders Report</strong>
						</div>
                <div class="panel-body">
                     <table class="datatable table table-valign-middle m-b-0">
						   <thead>
						      <tr>
						      	 <th>Order Number</th>
						      	 <th>Served By</th> 
						         <th>Amount</th> 
						      </tr>
						   </thead>
						   <tbody>
                          <?php
						   $sales = mysqli_query($connection,"SELECT * FROM cancelled WHERE shift='$day' GROUP BY order_no");
						   if (mysqli_num_rows($sales) < 1) {
						   	?>
						   	<div class="alert alert-warning">
						   		<p>There are no recorded sales</p>
						   	</div>
						   	<?php
						   }else{
						   	while ($sa = mysqli_fetch_assoc($sales)) {
						   		$order_no = $sa['order_no'];
						   		$staff_id = $sa['staff_id'];
						   		$amount = $sa['amount'];
						   		$sum=$sum+$amount;
						   		 ?>
						   		<tr>
						   			<td><?php echo $order_no; ?></td>
						   			<td><?php get_staff($staff_id); ?></td> 
						   			<td><?php echo $amount; ?></td>
						   			 
						   		</tr>
						   		<?php
						   	}
						   }
						   	 ?>
						   	<tfoot>
						   		<tr>
						   			<th colspan="2" class="text-center" style="font-size: 20px; font-weight: bold;">Total Amount</th>
						   			<th style="font-size: 20px; font-weight: bold;"><?php echo $sum; ?></th>
						   		</tr>
						   	</tfoot>
						   	<?php
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
		
	</div>
	<!-- end page container -->
 
	<?php
		include('../includes/footer.php');
	?>
 

