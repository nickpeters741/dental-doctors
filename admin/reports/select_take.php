<?php  
include("../includes/header.php");

?>
<!-- begin #content -->
		<div id="content" class="content">
			 <div class="panel panel-default hidden-print col-md-12" style="margin-bottom: 10px;">
		               <div class="panel-body">
			                <form role="form" class="form-inline" method="get" action="staff_time_report.php">
			                	 <div class="form-group row">
		                  			<div class="form-group col-lg-6">
							        <label class="sr-only" for="pick">Date</label>
							        <input type="" data-provide="datepicker" data-date-format="yyyy-mm-dd" id="pick"  name="start_time" class="form-control">
							      </div> 
                                </div>

                               <button style="margin-left: 30px; " type="button" onclick="filter_report()" name="filter" class="btn btn-warning"><i class="fa fa-search"></i></button>
                            
                            </form>
                        </div>

			</div>
			<div class="panel  col-md-12">
				<div class="panel-body">
				<div id="filter_result" class="col-md-12"></div>
			</div>
			</div>
			
		 
	</div> 
 
	<script type="text/javascript">
		function filter_report(){
		  start_date = document.getElementById('pick').value;
		  xmlhttp = new XMLHttpRequest();
		  xmlhttp.open("GET","stock_take.php?start_date="+start_date,false);
		  xmlhttp.send(null);
		  document.getElementById("filter_result").innerHTML = xmlhttp.responseText;
		  document.getElementById("filter_result").style.visibility = "visible";
		}
	</script>
	

	<?php
		include('../includes/footer.php');
	?>
 