<?php
include('../includes/header.php'); 
?>
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
		
		
		<!-- begin #content -->
		<div id="content" class="content">
			 <!-- begin row -->
			<div class="row">
				<!-- begin col-3 -->
				<div class="col-lg-3 col-md-6">
					<div class="widget widget-stats bg-red">
						<div class="stats-icon"><i class="fa fa-desktop"></i></div>
						<div class="stats-info">
							<h3>BRANCHES</h3>
							<p><?php /*get_cheked()*/;?></p>	
						</div>
						<div class="stats-link">
							<a href="javascript:;">View Detail <i class="fa fa-arrow-alt-circle-right"></i></a>
						</div>
					</div>
				</div>
				<!-- end col-3 -->
				<!-- begin col-3 -->
				<div class="col-lg-3 col-md-6">
					<div class="widget widget-stats bg-orange">
						<div class="stats-icon"><i class="fa fa-link"></i></div>
						<div class="stats-info">
							<h3>SERVED CUSTOMERS</h3>
							<p><?php ?></p>	
						</div>
						<div class="stats-link">
							<a href="javascript:;">View Detail <i class="fa fa-arrow-alt-circle-right"></i></a>
						</div>
					</div>
				</div>
				<!-- end col-3 -->
				<!-- begin col-3 -->
				<div class="col-lg-3 col-md-6">
					<div class="widget widget-stats bg-grey-darker">
						<div class="stats-icon"><i class="fa fa-users"></i></div>
						<div class="stats-info">
							<h3>COMING SOON!!!!!</h3>
							<p><?php  ?></p>	
						</div>
						<div class="stats-link">
							<a href="javascript:;">View Detail <i class="fa fa-arrow-alt-circle-right"></i></a>
						</div>
					</div>
				</div>
				<!-- end col-3 -->
				<!-- begin col-3 -->
				 <div class="col-lg-3 col-md-6">
					<div class="widget widget-stats bg-black-lighter">
						<div class="stats-icon"><i class="fa fa-clock"></i></div>
						<div class="stats-info">
							<h3>COMING SOON !!!</h3>
							<p><?php  ?></p>	
						</div>
						<div class="stats-link">
							<a href="javascript:;">View Detail <i class="fa fa-arrow-alt-circle-right"></i></a>
						</div>
					</div>
				</div> 
				<!-- end col-3 -->
			</div>
			<!-- end row -->
			<!-- begin row -->
			<div class="row">
				<!-- begin col-8 -->
			<div class="col-md-8">
					<div class="panel panel-inverse" data-sortable-id="index-1">
						
						<div class="panel-body">
							<div id="curve_chart" class="height-sm"></div>
						</div>
					</div>

				</div> 
					<!-- end panel -->
				 	 
				
				<!-- end col-8 -->
				<!-- begin col-4 -->
				<div class="col-lg-4">
					<!-- begin panel -->
					<div class="panel panel-inverse" data-sortable-id="index-6">
						 
						<div class="panel-body p-t-0">
							<div class="panel" id="piechart">
						</div>
						</div>
					</div>
					<!-- end panel -->
					 </div>
				</div>
				<!-- end col-4 -->
			</div>
			<!-- end row -->
		</div>
		<!-- end #content -->
		 <!-- begin scroll to top btn -->
		<a href="javascript:;" class="btn btn-icon btn-circle btn-success btn-scroll-to-top fade" data-click="scroll-top"><i class="fa fa-angle-up"></i></a>
		<!-- end scroll to top btn -->
	</div>
	<!-- end page container -->
	<script type="text/javascript" src="gstatic/loader.js"></script>
    <!--   -->
	<?PHP
	include('../includes/footer.php'); 
	?>

	<!-- <script type="text/javascript">
	      google.charts.load('current', {'packages':['corechart']});
	      google.charts.setOnLoadCallback(drawChart1);

	      function drawChart1() {

	        var data = google.visualization.arrayToDataTable([
	          ['Room', 'Total sales'],
	          <?php
	          $get = mysqli_query($connection,"
	              SELECT room_id, SUM(amount) AS total FROM booking  GROUP BY room_id ORDER BY SUM(amount) DESC LIMIT 10"); 
	            while ($row = mysqli_fetch_assoc($get)) {
	            $room_id = $row['room_id'];
	            $room_details = mysqli_query($connection,"SELECT room_no,cat_id FROM room WHERE room_id='$room_id'");
	            $det = mysqli_fetch_assoc($room_details);
	            $cat = $det['cat_id'];
	            $category = mysqli_query($connection,"SELECT name FROM category WHERE cat_id='$cat'");
	            $cet = mysqli_fetch_assoc($category);
	            $name = $cet['name'];
	            $room = $det['room_no'].$name;
	            $total = $row['total'];
	            echo "['".$room."', ".$total."],";
	          }
	          ?>
	          ]);
	        var options = {
	          title: 'Top 10 rooms'
	        };
	        var chart = new google.visualization.PieChart(document.getElementById('piechart'));
	        chart.draw(data, options);
	      }
	 
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Year','Cash Sales'],
          <?php
          $get_stock = mysqli_query($connection,"SELECT transaction_date FROM booking GROUP BY transaction_date ORDER BY transaction_date DESC LIMIT 7") or die("Error fetching sales.:".mysqli_error($connection));
          while ($row = mysqli_fetch_assoc($get_stock)) {
          		$day = $row['transaction_date'];

          		$out_items = mysqli_query($connection,"SELECT SUM(amount) AS total FROM booking WHERE transaction_date='$day'") or die(mysqli_error($connection));
          		$tout = mysqli_fetch_assoc($out_items);
          		$out_total = $tout['total'];

          		if ($out_total < 1) {
          			$out_total = 0;
          		}else{
          			$out_total = $out_total;
          		}

          		 

          		$your_date = date("d M Y", strtotime($day));

          		echo "['".$your_date."', ".$out_total."],";
          }
          ?>
          
        ]);

        var options = {
          title: 'Weekly Daily Sale',
          curveType: 'function',
          legend: { position: 'bottom' }
        };

        var charts = new google.visualization.LineChart(document.getElementById('curve_chart'));

        charts.draw(data, options);
      }
    </script> -->
		
</body>
</html>
