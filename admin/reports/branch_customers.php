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
		                  			<select type="text" class="chosen-select input-md form-control" name="branch" id="branch">
                                            <?php
                                              $get_branch= mysqli_query($connection,"SELECT * FROM branches ORDER BY name ASC") or die("Could not get the customers");
                                              while ($bra = mysqli_fetch_assoc($get_branch)) {
                                            ?>
                                            <option value="<?php echo $bra['branch_id']; ?>"><?php echo strtoupper($bra['name']); ?></option>
                                                
                                            <?php
                                              }
                                            ?>
                                    </select> 
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
		  branch = document.getElementById('branch').value; 
		  xmlhttp = new XMLHttpRequest();
		  xmlhttp.open("GET","branch_report.php?branch="+branch,false);
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