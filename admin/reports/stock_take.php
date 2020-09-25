<?php 
include("../../inc/connection.php");
include("../includes/functions.php"); 

$day = mysqli_real_escape_string($connection,$_GET['start_date']);

$sales = mysqli_query($connection,"SELECT * FROM stock_take WHERE shift='$day'");

						   if (mysqli_num_rows($sales) < 1) {
						   	?> 
						   		<p>Stock was not taken this day</p>
						    
						   	<?php
						   }else{
?>

		 
                 <div class="panel">
                     <table class="table" style="margin-left: 5px; margin-right: 10px;">
					   <thead>
				         <tr style="border-top:2px solid #000;">
					      	 <th style="width: 100px;">Items</th>
					      	 <th style="width: 50px;">system Opening</th>
					      	 <th style="width: 50px;">Counted Stock</th>
					      	 <th style="width: 50px;">Variance</th>
					      	 <th style="width: 50px;">Stock In</th>
					      	 <th style="width: 50px;">Total</th>
					      	 <th style="width: 50px;">Items Out</th>
					      	 <th style="width: 50px;">System Closing</th>
					      	 <th style="width: 50px;" class="hidden-print" >Status</th> 
					     </tr>
					   </thead>
						<tbody style="font-size: 10px;">
                          <?php
						   
						   	while ($sa = mysqli_fetch_assoc($sales)) {
						   		$item_id= $sa['item_id'];
						   		$yester_closing= $sa['yester_closing'];
						   		$counted_stck = $sa['counted_stck'];
						   		$sys_closing=$sa['sys_closing'];
						   		$shift = $sa['shift']; 
						   		$status=1;
 

						   		$variance=  $counted_stck- $yester_closing;
						   		if ($variance==0) {
						   			$color="#63bf7b";
						   		}else {
						   			$color="red;";
						   		}
 
						   	$total_out = mysqli_query($connection,"SELECT SUM(qty) AS out_qty FROM stock_track WHERE status='OUT' AND item_id='$item_id' AND shift='$day'") or die("Could not fetch the quantity out");
                            $rowout = mysqli_fetch_assoc($total_out);
                                    $totalout = $rowout['out_qty'];
                                    if ($totalout==0) {
                                    	$totalout=0;
                                    }else{
                                    	$totalout = $totalout;
                                    }
                            $total_in = mysqli_query($connection,"SELECT SUM(qty) AS in_qty FROM stock_track WHERE status='IN' AND item_id='$item_id' AND shift='$day'") or die("Could not fetch the total quantity in");
                                    $rowin = mysqli_fetch_assoc($total_in);
                                    $totalin = $rowin['in_qty'];
                                    if ($totalin==0) {
                                    	$totalin=0;
                                    }else{
                                    	$totalin = $rowin['in_qty'];
                                    }

                                    $stock_total=$counted_stck+$totalin;

                                  


						   		?>
						   		<tr>
				   			<td><?php get_item($item_id); ?></td>
				   			<td style="color: #a82529;"><?php echo $yester_closing; ?></td>
				   			<td style="color: #a82529;"><?php echo $counted_stck; ?></td>
				   			<td style="color: red; width: 50px;"><?php echo $variance; ?></td>
				   			<td><?php echo $totalin; ?></td>
				   			<td><?php echo $stock_total ?></td>
				   			<td><?php echo $totalout; ?></td>
				   			<td  style="color:#f9a64b;"><?php echo $sys_closing; ?></td> 
				   			
				   			<td class="hidden-print" style="background-color: <?php echo $color;?>"></td>
				   		</tr>
						   		<?php	
						   	}
						   }
						   ?>

						
						
							</tbody>
						

					    	</table>
					    </div>
					    
