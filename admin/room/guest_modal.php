<?php

include('../../inc/connection.php');
include('../includes/functions.php'); 
 if(isset($_REQUEST['id']))
  {
    $id = $_REQUEST['id'];
    
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
        <!-- <tr>
          <td>CUSTOMER PHONE</td>
          <td>1000</td>
        </tr>
        <tr>
          <td>CUSTOMER ID</td>
          <td>1000</td>
        </tr> -->
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
          <td><?php echo $row['total']; ?></td>
        </tr>
      </tbody>
    </table>    
          

 