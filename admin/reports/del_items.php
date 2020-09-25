<?php include("../../inc/connection.php");?>
<?php include("../includes/functions.php");?>

<div class="table-responsive">

<?php 
if(isset($_REQUEST['id']))
  {
$order = $_REQUEST['id'];
    ?>
    <table class="table table-bordered">
               <thead>
                  <tr>
                     <th>Name</th>
                     <th>Quantity</th>
                     <th>Price</th>
                  </tr>
               </thead>
               <tbody>

            <?php
            $get_order = "SELECT * FROM del_items WHERE order_no='$order' GROUP BY item_id";
            $get_order_r = mysqli_query($connection,$get_order)
                   or die("Could not fetch the order");
                   ?>
                   <?php
            while ($o = mysqli_fetch_assoc($get_order_r)) {
              
              $item_id = $o['item_id'];
              $price = $o['price'];
             
              $get_quantity = "SELECT SUM(qty) AS qt FROM del_items WHERE item_id='$item_id' AND order_no='$order' ";
              $get_quantity_r = mysqli_query($connection,$get_quantity) or die("Could not get the quantity");
              $q = mysqli_fetch_assoc($get_quantity_r);
              $quantity=$q['qt']; 
              ?>
              <tr>
                       <td><?php get_item($item_id); ?></td>
                       <td><?php echo $quantity; ?></td>
                       <td id="myStyle"><?php echo $quantity * $price; ?></td>
                    </tr>
              <?php
            }
                               
                                ?>
            
            <thead>
                  <tr>
                     <th colspan="2">Total</th>
                     <th><?php
                     $get_del_total = mysqli_query($connection,"SELECT SUM(price) AS del_total FROM del_items WHERE order_no='$order'");
                $tdd = mysqli_fetch_assoc($get_del_total);
                $order_total = $tdd['del_total'];
                     echo $order_total ; ?></th>
                  </tr>
               </thead>
            </tbody>
    <?php
  
}?>
  
</div>