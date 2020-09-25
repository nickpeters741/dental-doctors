<?php
include('../../inc/connection.php');
include('../includes/functions.php');
$start_date = mysqli_real_escape_string($connection,$_GET['start_date']);
$end_date = mysqli_real_escape_string($connection,$_GET['end_date']);

?>
<table class="table">
						  
						   <thead>
						   	<tr class="text-center">
						   		<td colspan="4" style="border-top: 2px solid #000;"><h4> <b>ITEM SALE FROM <?PHP echo $start_date;?> TO <?php echo $end_date;?></b></h4></td>
						   	</tr>
						      <tr>
						      	 <th style="width: 150px;">Item Name</th>
						      	 <th style="width: 50px;">Qty</th>
						      	 <th style="width: 50px;">Price</th>
						         <th style="width: 50px;">Amount</th>
						      </tr>
						   </thead>
						   <tbody>
                          <?php
						   $item_sales = mysqli_query($connection,"SELECT * FROM orders WHERE  shift BETWEEN '" . $start_date . "'"." AND  '" . $end_date . "'") or die("Erro fetching the number of sales.:".mysqli_error($connection));
						   if (mysqli_num_rows($item_sales) < 1) {
						   	?>
						   	<div class="alert alert-warning">
						   		<p>There are no recorded sales</p>
						   	</div>
						   	<?php
						   }else{
						   	$sales = mysqli_query($connection,"SELECT * FROM items  ORDER BY name ASC");
						   	while ($sa = mysqli_fetch_assoc($sales)) {
						   		$item_id = $sa['item_id'];
						   		$price = $sa['price'];
						   		$name = $sa['name'];


						   		$qty = mysqli_query($connection,"SELECT SUM(qty) AS qty FROM order_items WHERE item_id='$item_id' AND shift BETWEEN '" . $start_date . "'"." AND  '" . $end_date . "'") or die("Erro fetching the qty ".mysqli_error($connection));
						   		

						   		$qua= mysqli_fetch_assoc($qty);

						   		$quantity=$qua['qty'];

						   		$total_sales= $price * $quantity;
						   		
						   		if ($quantity==0){}else{
						   			?>
						   		<tr>
						   			<td><?php echo $name; ?></td>
						   			<td><?php echo $quantity; ?></td>
						   			<td><?php echo $price; ?></td>					   		
						   			<td><?php echo $total_sales; ?></td>
						   		</tr>
						   		<?php	
						   	}}
						   }
						   ?>

						
						
							</tbody>
						<?php
						   $daily_total = mysqli_query($connection,"SELECT SUM(amount) AS the_daily_total FROM orders WHERE  shift BETWEEN '" . $start_date . "'"." AND  '" . $end_date . "'");
							$day = mysqli_fetch_assoc($daily_total);
						   ?>
						   <thead>
						   	<tr>
						   		<th colspan="3" class="text-center"><h3><b>Total</b></h3></th>
						   		<th><h3><b><?php echo $day['the_daily_total']; ?></b></h3></th>
						   	</tr>
						   </thead>

					    	</table>