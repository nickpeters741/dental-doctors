<!--begin #header -->
		<div id="header" class="header navbar-default">
			<!-- begin navbar-header -->
			<div class="navbar-header">
				<h1>DENTAL MIS</h1>
			</div>
			<!-- end navbar-header -->
			
			<!-- begin header-nav -->
			<ul class="navbar-nav navbar-right">
				 
				<li class="dropdown">
					<a href="javascript:;" data-toggle="dropdown" class="dropdown-toggle f-s-14">
						<i class="fa fa-bell"></i>
						<span class="label">3</span>
					</a>
					<ul class="dropdown-menu media-list dropdown-menu-right">
						<li class="dropdown-header">NOTIFICATIONS (3)</li>
						  
						<li class="dropdown-footer text-center">
							<a href="javascript:;">View more</a>
						</li>
					</ul>
				</li>
				<li class="dropdown navbar-user">
					<a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown">
						<img src="../assets/img/user/user-13.jpg" alt="" /> 
						<span class="d-none d-md-inline"><?php echo $_SESSION['username'];?></span> <b class="caret"></b>
					</a>
					<div class="dropdown-menu dropdown-menu-right">
						<a href="javascript:;" class="dropdown-item">Edit Profile</a>
						<a href="javascript:;" class="dropdown-item"><span class="badge badge-danger pull-right">2</span> Inbox</a>
						<a href="javascript:;" class="dropdown-item">Calendar</a>
						<a href="javascript:;" class="dropdown-item">Setting</a>
						<div class="dropdown-divider"></div>
						<a href="../../log_out.php" class="dropdown-item">Log Out</a>
					</div>
				</li>
			</ul>
			<!-- end header navigation right -->
		</div>
		<!-- end #header -->
		<!-- begin #sidebar -->
		<div id="sidebar" class="sidebar">
			<!-- begin sidebar scrollbar -->
			<div data-scrollbar="true" data-height="100%">
				 
				<!-- begin sidebar nav -->
				<ul class="nav">
					 
					<li class="active">
						<a href="../dashboard/index.php"> 
						    <i class="fa fa-th-large"></i>
						    <span>Dashboard</span>
					    </a>
						 
					</li> 
					<li class="has-sub">
						<a href="javascript:;">
					        <b class="caret"></b>
						    <i class="fa fa-users"></i>
						    <span>Patient Manager</span> 
						</a>
						<ul class="sub-menu">
							<li class=""><a href="../customer/customers.php">Patients</a></li>
						</ul>
					</li>
					 
					<li class="has-sub">
						<a href="javascript:;">
					        <b class="caret"></b>
						    <i class="fa fa-home "></i>
						    <span>Branch Manager</span> 
						</a>
						<ul class="sub-menu"> 
							<li class=""><a href="../room/branch.php">Branches</a></li>
							
							
						</ul>
					</li> 
					<li class="has-sub">
						<a href="javascript:;">
					        <b class="caret"></b>
						    <i class="fa fa-chart-line"></i> 
						    <span>Reports</span>
						</a>
						<ul class="sub-menu">
							<li class="has-sub">
								<a href="javascript:;"><b class="fa fa-caret-down pull-right"></b>Branch</a>
								<ul class="sub-menu">
									 <li><a href="../reports/branch_customers.php">Branch Customers</a></li>  
								</ul>
								
							</li>
							<li class="has-sub">
								<a href="javascript:;"><b class="fa fa-caret-down pull-right"></b>Patients</a>
								<ul class="sub-menu">
									<!-- <li><a href="../reports/day_credit_report.php">Patient List</a></li>
									<li><a href="../reports/credit_select.php">Credit invoices</a></li>
									<li><a href="../reports/age_analysis.php">Credit Aging Report</a></li> -->
								</ul>
								
							</li>  
							<li class="has-sub"><a href="#"><b class="fa fa-caret-down pull-right"></b>Staff</a>
							 <ul class="sub-menu"> 
									<!-- <li><a href="../reports/inv_per_mkt.php">Invoices Per Marketer</a></li>  -->
								</ul>
							</li>
						</ul>
					</li>
					<li class="has-sub">
						<a href="javascript:;">
					        <b class="caret"></b>
						    <i class="fa fa-cog"></i>
						    <span>System Settings</span> 
						</a>
						<ul class="sub-menu">
							<!-- <li class="sub"><a href="../settings/company.php">Company Details</a></li> -->
							 <li class=""><a href="../users/user_index.php">Users</a></li>
							 <li class=""><a href="../staff/staff.php">Staff</a></li>
							 
						</ul>
					</li>
					 
			        <!-- begin sidebar minify button -->
					<li><a href="javascript:;" class="sidebar-minify-btn" data-click="sidebar-minify"><i class="fa fa-angle-double-left"></i></a></li>
			        <!-- end sidebar minify button -->
				</ul>
				<!-- end sidebar nav -->
			</div>
			<!-- end sidebar scrollbar -->
		</div> 
		<!-- end #sidebar