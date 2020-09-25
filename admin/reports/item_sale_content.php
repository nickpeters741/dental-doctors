<?php
include('../../inc/connection.php');
include('../includes/functions.php');
$start_date = mysqli_real_escape_string($connection,$_GET['start_date']);
$end_date = mysqli_real_escape_string($connection,$_GET['end_date']);

?>
<div>
<table id="data-table-combine" class="table table-striped table-bordered">
						  
<thead>
	<tr class="text-center">
		<td colspan="5" style="border-top: 2px solid #000;"><h4> <b>ITEM SALE FROM <?PHP echo $start_date;?> TO <?php echo $end_date;?></b></h4></td>
	</tr>
  <tr>
  	 <th style="width: 30px;">Receipt No:</th>
  	 <th style="width: 100px;">Customer</th>
  	 <th style="width: 100px;">Served By:</th>
     <th style="width: 50px;">Amount</th>
     <th style="width: 50px;">View</th>
  </tr>
</thead>
<tbody>
<?php

$item_sales = mysqli_query($connection,"SELECT * FROM orders WHERE  day BETWEEN '" . $start_date . "'"." AND  '" . $end_date . "'") or die("Erro fetching the number of sales.:".mysqli_error($connection));
if (mysqli_num_rows($item_sales) < 1) {
	?>
	<div class="alert alert-warning">
		<p>There are no recorded sales</p>
	</div>
	<?php
}else{

	while ($sa = mysqli_fetch_assoc($item_sales)) {
		$sale_id = $sa['sale_id'];
		$sale_amount = $sa['sale_amount'];
		$cust_id = $sa['cust_id'];
		$staff_id=$sa['staff_id'];
		?>
		<tr>
			<td><?php echo $sale_id; ?></td>
			<td><?php get_customer($cust_id)?></td>
			<td><?php get_staff($staff_id)?></td>
			<td><?php echo $sale_amount; ?></td>
			<td class="hidden-print"> <button data-toggle="modal" data-target="#edit_item" data-id="<?php echo $sale_id; ?>" id="getItem" ><i class='fa  fa-edit' ></i></button>|</td>					   		
			
		</tr>
		<?php	
	}
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