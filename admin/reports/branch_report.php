<?php
include('../../inc/connection.php');
include('../includes/functions.php');

$branch = mysqli_real_escape_string($connection,$_GET['branch']); 
$sum=0;
?>
<table id="data-table-combine" class="table table-striped table-bordered">

						  
						   <thead>
						   	<tr class="text-center">
						   		<td colspan="4" style="border-top: 2px solid #000;"><h4> <b>Branch Customers</b></h4></td>
						   	</tr>
						     <tr>
						      	 <th>Customers:</th> 
						      	 <th>Phone</th> 	<!-- 				         
						         <th class="hidden-print">Action</th> -->
						      </tr>
						   </thead>
						   <tbody>
                          <?php
						   $bookings = mysqli_query($connection,"SELECT * FROM customer WHERE  branch_id='$branch'") or die("Erro fetching the number of sales.:".mysqli_error($connection));
						   if (mysqli_num_rows($bookings) < 1) {
						   	?>
						   	<div class="alert alert-warning">
						   		<p>There are no recorded sales</p>
						   	</div>
						   	<?php
						   }else{
						   
						   		while ($sa = mysqli_fetch_assoc($bookings)) {
						   		$name = $sa['name'];
						   		$phone = $sa['phone']; 
						   		?>
						   		<tr>
						   			<td><?php echo $name; ?></td> 						   		
						   			<td><?php echo $phone; ?></td> <!-- 
						   			<td class="hidden-print"> <a data-toggle="modal" data-target="#edit_item" data-id="<?php echo $room_id; ?>" id="getItem" ><i class='fa  fa-edit' ></i></a></td> -->
						   		</tr>
						   		<?php	
						   	}}
						   	?>
						</tbody> 
						 </table>

