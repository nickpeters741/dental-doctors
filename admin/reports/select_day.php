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
        ?>
        <!-- end #header -->

		<div id="content" class="content">
			 <div class="panel panel-default hidden-print col-md-12" style="margin-bottom: 10px;">
		                <div class="panel-body">
		                <form role="form" class="form-inline" method="get" action="staff_time_report.php">
		                	 <div class="col-md-12 form-group">
		                  		<div class="form-group row">
		                  			<div class="form-group col-lg-6">
							        <label class="sr-only" for="pick">Date</label>
							        <input  data-provide="datepicker" data-date-format="yyyy-mm-dd" name="day1" class="form-control" id="pick" >
							      </div>
							      <div class="form-group col-lg-6">
							        <label class="sr-only" for="pick2">Date</label>
							        <input  data-provide="datepicker" data-date-format="yyyy-mm-dd" name="day2" class="form-control" id="pick2" >
							      </div>
                                </div>
                                 <button style="margin-left: 30px; " type="button" onclick="filter_report()" name="filter" class="btn btn-warning"><i class="fa fa-search"></i></button>
                             </div>
                         </form>

			    </div>

			</div>
			<div class="panel  col-md-12">
				<div class="panel-body">
				<div id="filter_result" class="col-md-12"></div>
			</div>
			</div>
			
		 
	</div> 
		 
     				<script>
			           $(function() {
			              $('#pick').datepicker({
			                  dateFormat:'yy-mm-dd',
			              });

			                 $('#pick2').datepicker({
			                 	dateFormat:'yy-mm-dd',
			                 });

			                
			             });
			        </script>
 
<script type="text/javascript">
		function filter_report(){
		  start_date = document.getElementById('pick').value;
		  end_date = document.getElementById('pick2').value;
		  xmlhttp = new XMLHttpRequest();
		  xmlhttp.open("GET","item_sales_content.php?start_date="+start_date+"&end_date="+end_date,false);
		  xmlhttp.send(null);
		  document.getElementById("filter_result").innerHTML = xmlhttp.responseText;
		  document.getElementById("filter_result").style.visibility = "visible";
		}
	</script>
	
	<!-- end page container -->
	<?php  
include("../includes/footer.php");
?>
</body>
</html>