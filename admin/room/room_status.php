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
        <!-- begin col-8 -->
        <div class="col-md-12">
          <div class="panel panel-inverse" data-sortable-id="index-1">
            <div class="panel-heading">
              <Button href="#modal-apart" class="btn btn-sm btn-lime pull-right " data-toggle="modal" ><i class="fa fa-plus"></i> &nbsp;Add a Room</Button> 
              <h4 class="panel-title">Rooms List</h4>
            </div>
            <div class="panel-body">
              <div id="massage"></div>
              <?php
               $get_apartment= mysqli_query($connection ,"SELECT floor FROM room where del_status=2 GROUP BY floor") or die(mysqli_error($connection));
                ?>               

              <table id="" class="table">
                    <tbody class="text-center">
                      <thead>
                        <tr class="text-center">
                          <th>FLOORS</th>
                          <th colspan="8">ROOMS</th>
                        </tr>
                      </thead>
                      <?php
                      while ($row = mysqli_fetch_assoc($get_apartment)) {
                        $floor = $row['floor'];                                 
                                ?>
                                <tr>
                                  <td><?php echo $floor;?></td>
                                 <?php
               $get_room= mysqli_query($connection ,"SELECT room_no,status FROM room where del_status=2 AND floor='$floor' ORDER BY room_no") or die(mysqli_error($connection));
                  while ($now = mysqli_fetch_assoc($get_room)) {
                    $room_no=$now['room_no'];
                    $status=$now['status'];
                    if ($status==1) {
                      ?>
                        <td style="padding: 1px 1px 1px 1px; margin: 1px 1px 1px 1px; ">
                          <button  
                          class="btn btn-inverse m-r-5 m-b-5" 
                          style="font-family: 'comic sans ms';
                            font-weight: bold;
                            color: #FFFFFF !important;
                            font-size: 13px; 
                            word-wrap:break-word; 
                            width: 70px; 
                            white-space:normal;  
                            font-size: auto; 
                            height:70px; 
                            background: green; 
                            border: 4px solid  green;  
                            padding-left: 0px; 
                            padding-right: 0px; 
                            margin: 2px 2px 2px 2px; 
                            border-radius: 5px; "> <?php echo $room_no; ?> 
                          </button>
                        </td>
                      <?php 
                    }elseif ($status==2) {
                    ?>
                        <td style="padding: 1px 1px 1px 1px; margin: 1px 1px 1px 1px; ">
                          <button  
                          class="btn btn-inverse m-r-5 m-b-5" 
                          style="font-family: 'comic sans ms';
                            font-weight: bold;
                            color: #FFFFFF !important;
                            font-size: 13px; 
                            word-wrap:break-word; 
                            width: 70px; 
                            white-space:normal;  
                            font-size: auto; 
                            height:70px; 
                            background: red; 
                            border: 4px solid  red;  
                            padding-left: 0px; 
                            padding-right: 0px; 
                            margin: 2px 2px 2px 2px; 
                            border-radius: 5px; "> <?php echo $room_no; ?> 
                          </button>
                        </td>
                      <?php 
                    }
                    ?>   
                    <?php
                    }
                    ?>
                  </tr>
                                    
                                    <?php
                                      }
                                    ?>
                                </tbody>
                            </table>
                          
            </div>
          </div>                   
          
        </div>
        <!-- end col-12 -->


      </div>
      <!-- end row -->
    </div>
    <!-- end #content -->

   

           
   

<?php  
include("../includes/footer.php");
?> 
    
</body>
</html>


