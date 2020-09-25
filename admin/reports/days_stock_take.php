<?php 
include("../../inc/connection.php");
include("../includes/functions.php"); 

$start_date = mysqli_real_escape_string($connection,$_GET['start_date']);
$end_date = mysqli_real_escape_string($connection,$_GET['end_date']);

$items = mysqli_query($connection,"SELECT item_id FROM items WHERE del_status=2 AND recipe=2");

						   if (mysqli_num_rows($items) < 1) {
						   	?> 
						   		<p>Stock was not taken this day</p>
						    
						   	<?php
						   }else{
?>

		 
                 <div class="panel">
                     <table class="table" style="margin-left: 5px; margin-right: 10px;">
					   <thead>
				         <tr style="border-top:2px solid #000;">
					      	 <th style="width: 100px;">ITEM</th>
					      	 <th style="width: 50px;">OPENING STOCK</th> 
					      	 <th style="width: 50px;">STOCK IN</th>
					      	 <th style="width: 50px;">TOTAL</th>
					      	 <th style="width: 50px;">STOCK OUT</th>
					      	 <th style="width: 50px;">SYSTEM CLOSING</th>
					      	 <th style="width: 50px;">EXPECTED STOCK</th>
					      	 <th style="width: 50px;">VARIANCE</th>
					      	 <th style="width: 50px;" class="hidden-print" >STATUS</th> 
					     </tr>
					   </thead>
						<tbody style="font-size: 12px;">
                          <?php
						   
						   	while ($sa = mysqli_fetch_assoc($items)) {
						   		$item_id= $sa['item_id'];
						   		$opening = mysqli_query($connection,"SELECT counted_stck FROM stock_take WHERE shift='$start_date' AND item_id='$item_id'");
						   		$op = mysqli_fetch_assoc($opening);
						   		$start_stck= $op['counted_stck'];

						   		$total_out = mysqli_query($connection,"SELECT SUM(qty) AS out_qty FROM stock_track WHERE status='OUT' AND item_id='$item_id' AND shift BETWEEN '" . $start_date . "'"." AND  '" . $end_date . "'") or die("Could not fetch the quantity out");
                            	$rowout = mysqli_fetch_assoc($total_out);
                                    $totalout = $rowout['out_qty'];
                                    if ($totalout==0) {
                                    	$totalout=0;
                                    }else{
                                    	$totalout = $totalout;
                                    }
                            	$total_in = mysqli_query($connection,"SELECT SUM(qty) AS in_qty FROM stock_track WHERE status='IN' AND item_id='$item_id' AND shift BETWEEN '" . $start_date . "'"." AND  '" . $end_date . "'") or die("Could not fetch the total quantity in");
                                    $rowin = mysqli_fetch_assoc($total_in);
                                    $totalin = $rowin['in_qty'];
                                    if ($totalin==0) {
                                    	$totalin=0;
                                    }else{
                                    	$totalin = $rowin['in_qty'];
                                    }

                                    $stock_total=$start_stck+$totalin;

                                $closing = mysqli_query($connection,"SELECT sys_closing FROM stock_take WHERE shift='$end_date' AND item_id='$item_id'");
						   		$clo = mysqli_fetch_assoc($closing);
						   		$closing_stck= $clo['sys_closing'];


						   		$expected=$stock_total-$totalout;


						   		 
						   		$status=1; 
						   		?>
						   		<tr>
				   			<td><?php get_item($item_id); ?></td>
				   			<td style="color: #a82529;"><?php echo $start_stck; ?></td> 
				   			<td style="color: #0b7110;"><?php echo $totalin; ?></td>
				   			<td style="color: #8E07ED;"><?php echo $stock_total ?></td>
				   			<td><?php echo $totalout; ?></td>
				   			<td  style="color:#ff8500; font-weight: bold;"><?php echo $closing_stck; ?></td>
				   			<td  style="color:#020fff;"><?php echo $expected; ?></td>
				   			<td  style="color:red;"><?php echo $closing_stck-$expected; ?></td>  
				   			
				   			<td class="hidden-print" style="background-color: <?php echo $color;?>"></td>
				   		</tr>
						   		<?php	
						   	}
						   }
						   ?>

						
						
							</tbody>
						

					    	</table>
					    </div>
					    
