<?php
include('../../inc/connection.php');
 include('../includes/header.php'); 
$samount=0;
$svat=0;
$sctl=0;
$stot=0;
?>


		
		<!-- begin #content -->
		<div id="content" class="content">
			<div class="panel-body" style="background-color: #fff;">
                    <div class="table-responsive">
                    	
                    <table class="datatable table table-valign-middle m-b-0">
						   <thead>
						      <tr>
						      	 <th>Day</th>
						      	 <th>Sales Total</th>
						      	 <th>V.A.T </th>
						      	 <th>CTL LEVY </th>
						      	 <th>Total Tax </th>
						      </tr>
						   </thead>
						   <tbody>
                          <?php
						   $sales = mysqli_query($connection,"SELECT * FROM orders GROUP BY shift ORDER BY shift DESC LIMIT 7");
						   if (mysqli_num_rows($sales) < 1) {
						   	?>
						   	<div class="alert alert-warning">
						   		<p>There are no recorded sales</p>
						   	</div>
						   	<?php
						   }else{
						   	while ($sa = mysqli_fetch_assoc($sales)) {
					   		$order_no = $sa['order_no'];
					   		$day = $sa['shift'];

						   	$days_total = mysqli_query($connection,"SELECT SUM(amount) AS days_sum FROM orders WHERE shift='$day'");
						   	$total = mysqli_fetch_assoc($days_total);

						   	$amount=$total['days_sum']/2;
						   	$vat=round((16/116)*$amount,2,PHP_ROUND_HALF_UP);
                            $ctl=round((2/102)*$amount,2,PHP_ROUND_HALF_UP);
                            $tot=$vat+$ctl

						   ?>
						   		<tr>
						   			<td><?php echo $day; ?></td>
						   			<td><?php  echo $amount; ?></td>
						   			<td><?php  echo $vat; ?></td>
						   			<td><?php  echo $ctl; ?></td>
						   			<td><?php  echo $tot; ?></td>
						   		</tr>
						   		<?php

                            $samount=$samount+$amount;
							$svat=$svat+$vat;
							$sctl=$sctl+$ctl;
							$stot=$stot+$tot;	
						   	}
						   }
						   ?>
						</tbody>
						<tfoot>
							<tr>
								<td>Total</td>
								<td><?php echo $samount; ?></td>
								<td><?php echo $svat; ?></td>
								<td><?php echo $sctl; ?></td>
								<td><?php echo $stot; ?></td>
							</tr>
						</tfoot>

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