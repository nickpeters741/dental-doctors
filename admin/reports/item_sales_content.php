<?php
include('../../inc/connection.php');
include('../includes/functions.php');

$start_date = mysqli_real_escape_string($connection,$_GET['start_date']);
$end_date = mysqli_real_escape_string($connection,$_GET['end_date']);
$sum=0;
?>
<table id="data-table-combine" class="table table-striped table-bordered">

						  
						   <thead>
						   	<tr class="text-center">
						   		<td colspan="4" style="border-top: 2px solid #000;"><h4> <b>ITEM SALE FROM <?PHP echo $start_date;?> TO <?php echo $end_date;?></b></h4></td>
						   	</tr>
						     <tr>
						      	 <th>Receipt No:</th> 
						      	 <th>Served By</th>
						         <th>Amount</th>	
						         <!-- <th>Pay Status</th> -->					         
						         <th class="hidden-print">Action</th>
						      </tr>
						   </thead>
						   <tbody>
                          <?php
						   $bookings = mysqli_query($connection,"SELECT * FROM booking WHERE  transaction_date BETWEEN '" . $start_date . "'"." AND  '" . $end_date . "'") or die("Erro fetching the number of sales.:".mysqli_error($connection));
						   if (mysqli_num_rows($bookings) < 1) {
						   	?>
						   	<div class="alert alert-warning">
						   		<p>There are no recorded sales</p>
						   	</div>
						   	<?php
						   }else{
						   
						   		while ($sa = mysqli_fetch_assoc($bookings)) {
						   		$room_id = $sa['room_id'];
						   		$user_id = $sa['user_id'];
						   		$amount=$sa['amount'];
						   		$sum=$sum+$amount;
						   		?>
						   		<tr>
						   			<td><?php get_room($room_id); ?></td> 						   		
						   			<td><?php get_username($user_id); ?></td>
						   			<td><?php echo $amount; ?></td>
						   			<td class="hidden-print"> <a data-toggle="modal" data-target="#edit_item" data-id="<?php echo $room_id; ?>" id="getItem" ><i class='fa  fa-edit' ></i></a></td>
						   		</tr>
						   		<?php	
						   	}}
						   	?>
						</tbody>
						<tfoot>
							<tr>
								<td class="text-center" colspan="2"><h3>TOTAL</h3></td>
								<td><?php echo $sum; ?></td>
							</tr>
						</tfoot>
						 </table>

