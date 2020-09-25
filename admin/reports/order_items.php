<?php 
include('../../inc/connection.php');
include('../includes/functions.php');if(isset($_REQUEST['id']))
  {

    $id = $_REQUEST['id'];
    $total=0;
?>

     <div class="modal-content">
      <div class="modal-header"> 
           <h4 class="modal-title"> <i class="glyphicon glyphicon-user"></i>Guest Details</h4> 
        </div> 
        <div class="modal-body">                     
           <div id="modal-loader" style="display: none; text-align: center;">
           <!-- ajax loader -->
           </div>
           <div class="table-responsive">
              <?php 
              $get_customer_details = mysqli_query($connection,"SELECT * FROM booking WHERE room_id='$id' AND status=2") or die("Could not get the customer details");
              $row = mysqli_fetch_assoc($get_customer_details);
            }else{}
            ?>

    <table class="table">
      <thead>
        
      </thead>
      <tbody>
        <tr>
          <td>CUSTOMER NAME</td>
          <td><?php get_cust($row['cust_id']); ?></td>
        </tr> 
        <tr>
          <td>CHECK IN DATE</td>
          <td><?php echo $row['check_in']; ?></td>
        </tr><tr>
          <td>CHECK OUT DATE</td>
          <td><?php echo $row['check_out']; ?></td>
        </tr>
        <tr>
          <td>Capacity</td>
          <td><?php echo $row['pax']; ?></td>
        </tr>
         <tr>
          <td>Package</td>
          <td><?php echo strtoupper($row['package']); ?></td>
        </tr>
        <tr>
          <td>AMOUNT PAID</td>
          <td><?php echo $row['break_amount']; ?></td>
        </tr>
      </tbody>
    </table>    
          

 
  
</div></div>
        </div> 
                        
      
                        
 








