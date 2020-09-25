 <?php
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
        $day = $_GET['day'];
$tcash=0;
$tmpesa=0;
$sum=0;
?> 
        <!-- end #header -->


		<!-- begin #content -->
		<div id="content" class="content">
		<div class="row">
               <div class="col-md-10">
                	<div class="panel panel-success" data-sortable-id="index-1">
					<div class="panel-body">
						<table id="data-table-combine" class="table table-striped table-bordered">
						   <thead>
						   	<tr><th colspan="4"><h1><b><?php echo $day;?> SALES REPORT</b></h1></th> </tr>
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
						   $sales = mysqli_query($connection,"SELECT * FROM booking WHERE transaction_date='$day' ORDER BY book_id");
						   if (mysqli_num_rows($sales) < 1) {
						   	?>
						   	<div class="alert alert-warning">
						   		<p>There are no recorded sales</p>
						   	</div>
						   	<?php
						   }else{
						   	while ($sa = mysqli_fetch_assoc($sales)) {
						   		$room_id = $sa['room_id'];
						   		$user_id = $sa['user_id'];
						   		$amount=$sa['total'];
						   		$sum=$sum+$amount;
						   		?>
						   		<tr>
						   			<td><?php get_room($room_id); ?></td> 						   		
						   			<td><?php get_username($user_id); ?></td>
						   			<td><?php echo $amount; ?></td>
						   			<td class="hidden-print"> <a data-toggle="modal" data-target="#edit_item" data-id="<?php echo $room_id; ?>" id="getItem" ><i class='fa  fa-edit' ></i></a></td>
						   		</tr>
						   		<?php	
						   	}
						   	?>
						   	<tfoot>
						   		<tr>
						   			<th colspan="2" class="text-center">Total Amount</th>
						   			 
						   			<th><?php echo $sum; ?></th>
						   		</tr>
						   	</tfoot>
						   	<?php
						   }
						   ?>

						
						
							</tbody>
						

					    	</table>
                    </div>

		<div id="edit_item" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
			<div class="modal-dialog">
				<div id="dynamic-content"></div>
			</div>
		</div>


	</div>
</div>
			<!-- end invoice -->
		</div>
			
	</div>
	

	<!-- end page container -->
	
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
         $('#modal-loader').show(); // load ajax loader button cliked

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
</body>
    </html>