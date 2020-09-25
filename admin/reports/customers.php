  <?php
  include('../includes/header.php'); 
  if ($_GET['u']==2) {
   $filter="";
   $title="RESERVED ROOMS LIST";
  }elseif ($_GET['u']==1) {
   $filter="WHERE status=1";
   $title="CHECKED IN ROOMS GUEST LIST";

  }if ($_GET['u']==3) {
   $filter="WHERE status=3";
   $title="RESERVED ROOMS GUEST LIST";
  }

  echo $filter
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
  <!-- begin #content -->
  		<div id="content" class="content">
  			 
  			<!-- end row -->
  			<!-- begin row -->
  			<div class="row">
  				<!-- begin col-8 -->
  				<div class="col-md-12">
  					<div class="panel panel-inverse" data-sortable-id="index-1">
  						<div class="panel-heading"> 
                  <h4 class="panel-title"><?PHP echo $title;?></h4>
               	</div>
  						<div class="panel-body">
  							 <?php
                    $get_customers = mysqli_query($connection,"SELECT * FROM customer $filter") or die("Could not get any suppliers");
                    if (mysqli_num_rows($get_customers) < 1) {
                      echo "There are no registered suppliers";
                    }else{
                  ?>

                  <table id="data-table-combine" class="table table-striped table-bordered">
                    <thead>
                      <tr>
                        <th>No:</th>
                        <th>Name</th> 
                        <th>Id:</th>
                        <th>Phone</th>
                        <th>Gender</th>
                        <th>Check in Date</th>
                        <th>Check out Date</th>
                        <th>Served by</th>
                         
                      </tr>
                    </thead>
                    <tbody>
                      <?php 
                     while ($row = mysqli_fetch_assoc($get_customers)) {
                        ?>
                          <tr>
                            <td class="count"> </td> 
                            <td><?php echo $row['name']; ?></td> 
                            <td><?php echo $row['nid']; ?></td> 
                            <td><?php echo $row['phone']; ?></td>
                            <td><?php get_gender($row['gender']); ?></td>  
                            <td><?php get_status($row['status']); ?></td> 
                            <td><?php get_gender($row['gender']); ?></td>  
                            <td><?php get_status($row['status']); ?></td> 
                            <td><?php get_status($row['status']); ?></td>
                             
                          </tr>
                      <?php
                        }
                      ?>
                      </tbody>
                  </table>
                  <?php
                  }

                  ?>
  					</div>
          </div>
        </div>
  			<!-- end row -->
  		</div>
  		<!-- end #content -->

  		 
    <?php  
  include("../includes/footer.php");
  ?>


   
 
  </body>
  </html>


