<?php 
include('../includes/header.php');  
?>
<style type="text/css">
	.table thead th,.table>thead>tr>th>td {
 color:#242a30;
 font-weight:600;
 border-bottom:1px solid #000 !important;
 border-right:1px solid #000 !important;
 border-left:1px solid #000 !important;
 border-top:1px solid #000 !important;
}
.table>tbody>tr>td,.table>tbody>tr>th,.table>tfoot>tr>td,.table>tfoot>tr>th,.table>thead>tr>td,.table>thead>tr>th {
border-bottom:1px solid #000 !important;
 border-right:1px solid #000 !important;
 border-left:1px solid #000 !important;
 border-top:1px solid #000 !important;
 padding:3px 3px 3px 3px;
}
</style>
		<!-- begin #content -->
		<div id="content" class="content">
			 <div class="panel panel-default hidden-print col-md-12" style="margin-bottom: 10px;">
		               <div class="panel-body">
			                <form role="form" class="form-inline" method="get" action="staff_time_report.php">
			                	 <div class="form-group row">
		                  			<div class="form-group col-lg-6">
							        <label class="sr-only" for="pick">Date</label>
							        <input type="" data-provide="datepicker" data-date-format="yyyy-mm-dd" name="day1" class="form-control" id="pick" >
							      </div>
							      <div class="form-group col-lg-6">
							        <label class="sr-only" for="pick2">Date</label>
							        <input type="" data-provide="datepicker" data-date-format="yyyy-mm-dd" name="day2" class="form-control" id="pick2" >
							      </div>
                                </div>

                               <button style="margin-left: 30px; " type="button" onclick="filter_report()" name="filter" class="btn btn-warning"><i class="fa fa-search"></i></button>
                            
                            </form>
                        </div>

			</div>
			<div class="panel  col-md-12">
				<div class="panel-body">
				<div id="filter_result" class="col-md-112"></div>
			</div>
			</div>
			
		 
	</div> 

	<div id="edit_item" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
		<div class="modal-dialog"> 
			<div id="dynamic-content"></div>
		</div>
	</div>

	<!-- end page container -->
	 <script type="text/javascript">
		function filter_report(){
		  
		  start_date = document.getElementById('pick').value;
		  end_date = document.getElementById('pick2').value; 
		  xmlhttp = new XMLHttpRequest();
		  xmlhttp.open("GET","days_stock_take.php?start_date="+start_date+"&end_date="+end_date,false);
		  xmlhttp.send(null);
		  document.getElementById("filter_result").innerHTML = xmlhttp.responseText;
		  document.getElementById("filter_result").style.visibility = "visible";
		}
	</script>
	
	<!-- end page container -->
	<?php  
include("../includes/footer.php");
?>