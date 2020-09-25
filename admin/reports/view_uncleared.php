<?php  
include("../includes/header.php"); 
 

$sum=0

?>

		<!-- begin #content -->
		<div id="content" class="content">
			
			<!-- begin invoice -->
			<div class="row">
				<div class="col-md-8">
                	<div class="panel panel-success" data-sortable-id="index-1">
						<div class="panel-heading"><strong style="font-size: 28px; font-weight: 600;"><b>ALL UNCLEARED ORDERS</strong>
						</div>
                <div class="panel-body">
                     <table class="datatable table table-valign-middle m-b-0">
						   <thead>
						      <tr>
						      	 <th>Receipt No:</th>
						      	 <th>Served By</th> 
						         <th>Amount</th>
						         <th>Shift</th>
						         <th class="hidden-print">Action</th>
						      </tr>
						   </thead>
						   <tbody>
                          <?php
						   $sales = mysqli_query($connection,"SELECT * FROM orders WHERE pay_status=2 ORDER BY order_no DESC");
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
						   		$shift = $sa['shift'];
						   		$sum=$sum+$amount;
						   		 ?>
						   		<tr>
						   			<td><?php echo $order_no; ?></td>
						   			<td><?php get_staff($staff_id); ?></td> 
						   			<td><?php echo $amount; ?></td>
						   			<td><?php echo $shift; ?></td>
						   			<td class="hidden-print">
						   				<button data-toggle="modal" data-target="#edit_item" data-id="<?php echo $order_no; ?>" id="getItem" >
						   					<i class='fa  fa-edit' ></i>
						   				</button>
						   			</td>
						   		</tr>
						   		<?php
						   	}
						    
						   	 ?>
						   	<tfoot>
						   		<tr>
						   			<th colspan="3" class="text-center" style="font-size: 20px; font-weight: bold;">Total Amount</th>
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
<div id="edit_item" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
  <div class="modal-dialog" id="dynamic-content"> 
      
  </div>
</div>
	<?php
		include('../includes/footer.php');
	?>
 <script type="text/javascript">
   
   $(document).ready(function()
   {
      $(document).on('click','#getItem', function(e)
      {
         e.preventDefault();

         var uid = $(this).data('id'); // get id of clicked row
      

         $('#dynamic-content').html(''); // leave this diff blank

         $.ajax(
         {
            url: 'order_items.php',
            typr: 'POST',
            data: 'id='+uid,
            dataType: 'html'
         })
         .done(function(data)
         {
            console.log(data);
            $('#dynamic-content').html(''); // blank before load.
            $('#dynamic-content').html(data);

         })

         .fail(function()
         {
            $('#dynamic-content').html('<i class="fa  fa-info-sign"></i> Something went wrong, Please try again...');
            $('#modal-loader').hide();
         });
      });

   });
</script>

