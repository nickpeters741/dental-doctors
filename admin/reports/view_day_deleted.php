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
				<div class="col-md-12 col-sm-12">
                	<div class="panel panel-success" data-sortable-id="index-1">
						<div class="panel-heading"><strong style="font-size: 18px; font-weight: 600;"><b><?php echo $day  ?>  Deleted Orders Report</strong>
						</div>
                <div class="panel-body">
                     <table class="datatable table table-valign-middle m-b-0">
						   <thead>
						      <tr>
						      	 <th>Order Number</th>
						      	 <th>Served By</th>
						      	  <th>Approved By</th>
						         <th>Amount</th>
						         <th class="hidden-print">Action</th>
						      </tr>
						   </thead>
						   <tbody>
                          <?php
						   $sales = mysqli_query($connection,"SELECT * FROM del_orders WHERE shift='$day' GROUP BY order_no");
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
					   			$del_by = $sa['appr_by']; 
					   			$total = $sa['amount'];
					   			$sum=$sum+$total;
					   			?>
						   		<tr>
						   			<td><?php echo $order_no; ?></td>
						   			<td><?php get_staff($staff_id); ?></td>
						   			<td><?php get_staff($del_by); ?></td>
						   			<td><?php echo $total; ?></td>
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
  <div class="modal-dialog"> 
     <div class="modal-content">  
   
        <div class="modal-header"> 
           <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button> 
           <h4 class="modal-title">

           <i class="glyphicon glyphicon-user"></i> Order Items
           </h4> 
        </div> 
        <br>
        <div id="results"></div>
            
        <div class="modal-body">                     
           <div id="modal-loader" style="display: none; text-align: center;">
           <!-- ajax loader -->
           </div>
                            
           <!-- mysql data will be load here -->                          
           <div id="dynamic-content"></div>
        </div> 
                        
      
                        
    </div> 
  </div>
</div>
	<?php
		include('../includes/footer.php');
	?>
<?php
}
?><script type="text/javascript">
   
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
            url: 'del_items.php',
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

