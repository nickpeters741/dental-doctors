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
              <Button href="#modal-apart" class="btn btn-sm btn-lime pull-right " data-toggle="modal" ><i class="fa fa-plus"></i> &nbsp;New Apartment</Button> 
              <h4 class="panel-title">Company Details</h4>
            </div>
            <div class="panel-body">
              <div id="massage"></div>
              <?php
               $get_apartment= mysqli_query($connection ,"SELECT * FROM company") or die(mysqli_error($connection));
               if( mysqli_num_rows($get_apartment) < 1)
               {
                echo "There Are No Categories At The Moment";
               }else
                {?>               

              <table id="data-table" class="table table-striped table-bordered nowrap col-md-12">
                                <thead>
                                    <tr> 
                                        <th>no</th>
                                        <th>Logo</th>
                                        <th>Name</th>
                                        <th>Address</th>
                                        <th>Email</th>
                                        <th>Phone</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                while ($row = mysqli_fetch_assoc($get_apartment)) {
                                  $co_id = $row['company_id'];
                                  $logo = $row['logo']; 
                                  $no=$no+1;                                
                                ?>
                                    <tr>
                                       <td class="count"> </td>
                                       <td width="1%" class="with-img"><img src="<?php echo $logo; ?>" class="img-rounded height-30" /></td>
                                        <td><?php echo $row['name']; ?></td>
                                        <td><?php echo $row['address']; ?></td>
                                        <td><?php echo $row['email']; ?></td>
                                        <td><?php echo $row['phone']; ?></td>
                                        <td>
                                          <a data-toggle="modal" data-target="#edit-modal" data-id="<?php echo $co_id; ?>" id="edit_comp" class="btn btn-xs btn-info"><i class="fas fa-pencil-alt"></i></a>
                                          |&nbsp;
                                          <a data-toggle="modal" data-target="#delete-modal" data-id="<?php echo $co_id; ?>" id="deletecat" class="btn btn-xs btn-danger"><i class="far fa-trash-alt"></i></a>
                                          
                                        </td> 
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
        <!-- end col-12 -->


      </div>
      <!-- end row -->
    </div>
    <!-- end #content -->

    <!-- #modal-dialog -->

    <div class="modal fade" id="modal-apart">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <h4 class="modal-title">Add Company Details</h4>
          </div>
          <div class="modal-body">
            <form action="company_action.php" method="" id="comp" role="form">
            <div id="results"></div>
            <div class="form-group">
                <label >Company Name</label>
                <input type="text" class="form-control" id="name" name="name" placeholder="Enter company name" required />
            </div>
            <div class="form-group">
                <label >Address</label>
                <input type="text" class="form-control" id="add" name="add" placeholder="Enter the address" required />
            </div>
            <div class="form-group">
                <label >Phone</label>
                <input type="text" class="form-control" id="phone" name="phone" placeholder="Enter Phone" required />
            </div>
            <div class="col-md-3">
              <div class="form-group">
                  <label for="exampleInputEmail1">Logo</label>  
                  <input type="file" name="logo" id="logo">
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <a href="javascript:;" class="btn btn-sm btn-danger" data-dismiss="modal">Close</a>
                  <button type="button" id="btn-comp"  name="btn-comp"  class="btn btn-success">Save</button>
          </div>
          </form>
          </div>
        </div>
      </div>
    </div>

             <div  id="edit-modal" class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="display: none;">
              <div class="modal-dialog"> 
                 <div class="modal-content">  
               
                    <div class="modal-header"> 
                       <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button> 
                       <h4 class="modal-title"><i class="fa fa-stats"></i> &nbsp;&nbsp;  Edit Company Details</h4> 
                    </div>
                    <div class="modal-body">
                      <!-- mysql data will be load here -->                          
                    <div id="dynamic-content"></div>
                    </div> 
                                    
                </div> 
              </div>
            </div>

            <div  id="delete-modal" class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="display: none;">
              <div class="modal-dialog"> 
                 <div class="modal-content">  
               
                    <div class="modal-header"> 
                       <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button> 
                       <h4 class="modal-title">
                       <i class="fa fa-stats"></i> &nbsp;&nbsp; Delete Category
                       </h4> 
                    </div> 
                        
                    <div class="modal-body">                     
                       <div id="modal-loader" style="display: none; text-align: center;">
                      
                       </div>
                                        
                       <!-- mysql data will be load here -->                          
                       <div id="dynamic-content1"></div>
                    </div> 
                                    
                </div> 
              </div>
            </div>

   

<?php  
include("../includes/footer.php");
?>
 <script type="text/javascript">
      <?php include("company.js");?>
    </script>
     
</body>
</html>


