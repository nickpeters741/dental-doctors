<?php
session_start();
include('../../inc/connection.php');
include('../includes/functions.php');
 
$staff_id = $_SESSION['staff_id'];
$staff_name = $_SESSION['username'];
$id = $_GET['id']; 

$get_order_r = mysqli_query($connection,"SELECT * FROM booking WHERE book_id='$id'")or die("Could not fetch the order");
 if (mysqli_num_rows($get_order_r) < 1) {
    echo $id;
 }else{
  $row = mysqli_fetch_assoc($get_order_r);
  $cust_id=$row['cust_id'];
  $cust_det=mysqli_query($connection,"SELECT * FROM customer WHERE cust_id='$cust_id'");
  $cet=mysqli_fetch_assoc($cust_det);
  $nid= $cet['nid'];
  $phone =$cet['phone'];
  ?>
<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
  <head>
    <meta http-equiv="content-type" content="text/html; charset=<charset>" />
    <title>Receipt</title>
  </head>
  <script src="scripts.js"></script>
 <style type="text/css">
*{
  font-family: Arial, Helvetica Neue, Helvetica, sans-serif;

}
 #receipt{ 
  padding:2mm;
  margin: 0 auto;
  width: 78mm;
  background: #25e25e;
}

 table{ 
  padding:2mm;
  margin: 0 auto;
  width: 78mm;
  background: #25e25e;
   border-collapse: collapse;
}
td,th{
  font-size: 11px;
  border: 1px solid #000 !important
}
th{
  font-size: 11px;
  padding: 2px;
  margin: 2px;
}

.text-center {
  text-align:center!important
}
.text-left {
  text-align:left!important
}
.text-right {
  text-align:right!important
}
.pull-left {
  float:left!important
}
.pull-right {
  float:right!important
}
h1.title{
  font-size: 26px;
  margin-bottom: 0px; 
}
p{
  font-size: 11px;
}
span{
  font-size: 11px;
}
@media print {
    p.break {
      page-break-after: always;
    }
    body{
      margin: 0px;
    }
     #receipt{ 
  padding:0PX;
  margin: 0 auto;
  width: 78mm;
  background: #25e25e;
}
table{ 
  padding:0PX;
  margin: 0 auto;
  width: 78mm;
  background: #25e25e;
   border-collapse: collapse;
}
.break {
  page-break-after: always;
} 
}
 </style> 
 <script type="text/javascript">
   function closeord(){
  window.location = 'customers.php';
}
 </script>
<!-- -->
 <body  onload="closeord();window.print()">
<!-- START RECEIPT -->
   <div id="receipt">
    <div id="receipt-header" class="text-center">
      <h1 class="title">ROYAL PALM HOTEL</h1>
      <p style="font-size: 18px;margin: 0px 0px 0px 0px;">()</p>
      <p style="margin: 0px 0px 0px 0px;">***************************************************************************</p>
      <p style="margin: 0px 0px 0px 0px; ">P.O BOX 214-Nakuru,<BR> Cell: 0700000 | 0700000<BR></P>
     
      <span><b>Booking No: <?php echo $id; ?></b></span></br>
      <span> Served By: </strong><?php echo $staff_name; ?></br>
      <span><b><?php  today(); ?></b></span> 
      <p style="margin: 0px 0px 0px 0px;">***************************************************************************</p>
   </div>
    <div id="receipt-body">
      <table class="table">
      <thead>
        
      </thead>
      <tbody>
        <tr>
          <td>CUSTOMER NAME</td>
          <td><?php get_cust($row['cust_id']); ?></td>
        </tr>
         <tr>
          <td>NATIONAL ID</td>
          <td><?php echo $nid; ?></td>
        </tr>
        <tr>
          <td>PHONE</td>
          <td><?php echo $phone; ?></td>
        </tr>
        <tr>
          <td>ROOM NO.</td>
          <td><?php get_room($row['room_id']); ?></td>
        </tr>  
        <tr>
          <td>CHECK IN DATE</td>
          <td><?php echo $row['check_in']." ".$row['in_time']; ?></td>
        </tr><tr>
          <td>CHECK OUT DATE</td>
          <td><?php echo $row['check_out']." ".$row['out_time']; ?></td>
        </tr>
        <tr>
          <td>Persons </td>
          <td><?php echo $row['pax']; ?></td>
        </tr>
         <tr>
          <td>Package</td>
          <td><?php  
           if ($row['package']=="bo"){
            echo "BED ONLY";}else{echo "BED AND BREAKFAST";} ?></td>
        </tr>
        <tr>
          <td>AMOUNT PAID</td>
          <td><?php echo $row['total']; ?></td>
        </tr>
      </tbody>
    </table>    
    </div>
    <div id="receipt-footer">
      <p style="margin: 0px 0px 0px 0px;">***************************************************************************</p>
      <p style="margin: 0px 0px 0px 0px;">***************************************************************************</p>
              <p class="text-center" style="margin: 0px 0px 0px 0px;"><b>THANK YOU</b></p>
              <p class="text-center" style="margin: 0px 0px 0px 0px;"> </p>
              <p class="text-center" style="margin: 0px 0px 0px 0px;"> This is not an ETR.</p>
                
             <p style="margin: 0px 0px 0px 0px;">***************************************************************************</p>
              <p class="text-center" style="margin: 0px 0px 0px 0px;font-size: 14px;font-family: 'Helvetica LT W01 Black Cond';letter-spacing: 2px;"> <b >TILL NO: 975576</b></p>
              <p class="text-center" style="margin: 0px 0px 0px 0px;"> K-Hotel Designed & Sold by K-SYSTEMS </BR> +254716100335 | +254735100335.</p> 
    </div>

    </div>
<?php 
          if ($row['package']=="bo"){}else{
            ?>
<p class="page"></p>
    <div id="receipt">
    <div id="receipt-header" class="text-center">
      <h1 class="title">BREAKFAST TICKET</h1> 
      <p style="margin: 0px 0px 0px 0px;">***************************************************************************</p>
      <p style="margin: 0px 0px 0px 0px; ">P.O BOX 214-Nakuru,<BR> Cell: 0700000 | 0700000<BR></P>
     
      <span><b>Booking No: <?php echo $id; ?></b></span></br>
      <span> Served By: </strong><?php echo $staff_name; ?></br>
      <span><b><?php  today(); ?></b></span> 
      <p style="margin: 0px 0px 0px 0px;">***************************************************************************</p>
   </div>
    <div id="receipt-body">
      <table class="table">
      <thead>
        
      </thead>
      <tbody>
        <tr>
          <td>CUSTOMER NAME</td>
          <td><?php get_cust($row['cust_id']); ?></td>
        </tr>
        <tr>
          <td>ROOM NO.</td>
          <td><?php get_room($row['room_id']); ?></td>
        </tr>  
        <tr>
          <td>CHECK IN DATE</td>
          <td><?php echo $row['check_in']." ".$row['in_time']; ?></td>
        </tr><tr>
          <td>CHECK OUT DATE</td>
          <td><?php echo $row['check_out']." ".$row['out_time']; ?></td>
        </tr>
        <tr>
          <td>Persons</td>
          <td><?php echo $row['pax']; ?></td>
        </tr>
         <tr>
          <td>Package</td>
          <td><?php  
           if ($row['package']=="bo"){
            echo "BED ONLY";}else{echo "BED AND BREAKFAST";} ?></td>
        </tr>
        <tr>
          <td>Breakfast</td>
          <td><?php echo $row['break_amount']; ?></td>
        </tr>
      </tbody>
    </table>    
    </div> 

    </div>
     <?php
          } 
            ?>

  </body>
</html>
<?php
 
}
?>