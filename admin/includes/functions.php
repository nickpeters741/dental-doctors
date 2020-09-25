 <?php

  function page_restrict(){
	if (empty($_SESSION['staff_id']) OR empty($_SESSION['username'])) {
		header("Location:../log_out.php");
	}
}
  
function get_branch($branch_id){
	global $connection; 
 $get_branch = "SELECT name FROM branches WHERE branch_id='$branch_id'";
 $get_branch_r = mysqli_query($connection,$get_branch) or die("Could not get the total orders today");
 $bra = mysqli_fetch_assoc($get_branch_r);
 $name=$bra['name'];
 echo $name;
}
function today_amount(){
	global $connection;
	$today = date('Y-m-d'); 
 $get_total_houses = "SELECT SUM(total) as total FROM booking WHERE transaction_date='$today'";
 $get_total_houses_r = mysqli_query($connection,$get_total_houses) or die("Could not get the total apartment");
 $row = mysqli_fetch_assoc($get_total_houses_r);
 return $row['total'];
}
function get_reserved(){
	global $connection; 
 $get_reserved= "SELECT status FROM room WHERE status=3";
 $get_reserved_r = mysqli_query($connection,$get_reserved) or die("Could not get the total orders today");
 $checked = mysqli_num_rows($get_reserved_r);
 echo $checked;
}
function get_cheked(){
	global $connection; 
 $get_checked = "SELECT status FROM room WHERE status=1";
 $get_checked_r = mysqli_query($connection,$get_checked) or die("Could not get the total orders today");
 $checked = mysqli_num_rows($get_checked_r);
 echo $checked;
}
function get_package($cust_id) {
		global $connection;
		$user = mysqli_query($connection,"SELECT package FROM booking WHERE cust_id='$cust_id' AND status=2");
		$u = mysqli_fetch_assoc($user);
		$type = $u['package'];
		echo strtoupper($type);
	}
function get_cust_room($cust_id) {
		global $connection;
		$user = mysqli_query($connection,"SELECT room_id FROM booking WHERE cust_id='$cust_id' AND status=2");
		$u = mysqli_fetch_assoc($user);
		$room_id = $u['room_id'];
		get_room($room_id);
	}
function get_room($room_id) {
		global $connection;
		$user = mysqli_query($connection,"SELECT room_no FROM room WHERE room_id='$room_id'");
		$u = mysqli_fetch_assoc($user);
		$room = $u['room_no'];
		echo $room;
	}
function get_apartment($apart_id) {
		global $connection;
		$user = mysqli_query($connection,"SELECT name FROM apartment WHERE apartment_id='$apart_id'");
		$u = mysqli_fetch_assoc($user);
		$name = $u['name'];
		echo $name;
	}
function today(){

date_default_timezone_set("Africa/Nairobi");
$today=date("l h:i:sa d-m-Y ");
echo $today;
}

function upload($name)
	{
$file_name = basename($_FILES["logo"]["name"]);
$tmp_name = $_FILES["logo"]["tmp_name"];
$ext = strtolower(pathinfo($file_name,PATHINFO_EXTENSION));
$imagename = $name.".".$ext;
$target_path = "../uploads/company/".$imagename;
$uploadOk = 1; 
// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["logo"]["tmp_name"]);
    if($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }
}
// Check if file already exists
if (file_exists($target_path)) {
    echo "Sorry, file already exists.";
    $uploadOk = 0;
}
// Check file size
if ($_FILES["logo"]["size"] > 5000000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
}
// Allow certain file formats
if($ext != "jpg" && $ext != "png" && $ext != "jpeg"
&& $ext != "gif" ) {
    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($tmp_name,$target_path)) {
     
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}
return $target_path;	
}

function get_role($role_id){
	global $connection;

	$role = mysqli_query($connection,"SELECT name FROM roles WHERE role_id='$role_id'");
	$ret = mysqli_fetch_assoc($role);
	$name = $ret['name'];
	echo $name;

}
function get_cat($cat_id)
	{
		global $connection;
		$cat = mysqli_query($connection,"SELECT name FROM category WHERE cat_id='$cat_id'");
		$cet = mysqli_fetch_assoc($cat);
		$name = $cet['name'];
		echo $name;
	}
function get_gender($gender)
	{
		if ($gender==1) {
			echo "MALE";
		}elseif($gender==2){
			echo "FEMALE";
		}
	}

function get_marital($marital)
	{
		if ($marital==1) {
			echo "Single";
		}elseif($marital==2){
			echo "Married";
		}
	}

function get_status($status)
	{
		if ($status==1) {
			echo "CHECKED IN";
		}elseif($status==2){
			echo "NOT CHECKED IN";
		}elseif($status==3){
			echo "RESERVED";
		}
		
	}
	
function get_cust($cust_id)
	{
		global $connection;
		$user = mysqli_query($connection,"SELECT name FROM customer WHERE cust_id='$cust_id'");
		$u = mysqli_fetch_assoc($user);
		$name = $u['name'];
		echo strtoupper($name);
	}	

function get_supplier($sup_id)
	{
		global $connection;
		$supplier = mysqli_query($connection,"SELECT name FROM suppliers WHERE sup_id='$sup_id'");
		$s = mysqli_fetch_assoc($supplier);
		$name = $s['name'];
		echo strtoupper($name);
	}

function get_staff($staff_id)
	{
		global $connection;
		$user = mysqli_query($connection,"SELECT name FROM staff WHERE staff_id='$staff_id'");
		$u = mysqli_fetch_assoc($user);
		$name = $u['name'];
		echo $name;
	} 
function booking_staff($user_id)
	{
		global $connection;
		$user = mysqli_query($connection,"SELECT staff_id FROM users WHERE user_id='$user_id'");
		$u = mysqli_fetch_assoc($user);
		$staff_id = $u['staff_id'];
		get_staff($staff_id);
	} 

function get_username($user_id)
	{
		global $connection;
		$user = mysqli_query($connection,"SELECT username FROM users WHERE user_id='$user_id'");
		$u = mysqli_fetch_assoc($user);
		$name = $u['username'];
		echo $name;
	}
 


/*
function get_staff($staff_id)
	{
		global $connection;
		$user = mysqli_query($connection,"SELECT name FROM users WHERE staff_id='$staff_id'");
		$u = mysqli_fetch_assoc($user);
		$name = $u['name'];
		echo $name;
	}

function get_item($item_id)
	{
	global $connection;
	$ite = mysqli_query($connection,"SELECT name FROM items WHERE item_id='$item_id'");
	$i = mysqli_fetch_assoc($ite);
	$name = $i['name'];
	echo $name;
	}

function get_sub($sub_id)
	{
		global $connection;
		$sub= mysqli_query($connection,"SELECT name FROM sub_cat WHERE sub_id='$sub_id'");
		$set = mysqli_fetch_assoc($sub);
		$name = $set['name'];
		echo $name;
	}

function check_password($password)
	{
		global $connection;
		$pas= mysqli_query($connection,"SELECT password FROM users WHERE password='$password'");
		$set = mysqli_num_rows($pas);
		 
		echo $set;
	}
function Update_recipe_status($item_id)
	{
		global $connection;
		$rec= mysqli_query($connection,"SELECT recipe FROM items WHERE item_id='$item_id'");
		$ren = mysqli_num_rows($rec);
		 if ($ren==1) {
		 	$recipe= mysqli_query($connection,"SELECT raw_id FROM recipe WHERE item_id='$item_id'");
			$recn = mysqli_num_rows($recipe);
			if ($recn<1) {
				$edit_item = mysqli_query($connection,"UPDATE items SET  recipe=2 WHERE item_id='$item_id'") or die("Error updating the items.:".mysqli_error($connection));
			}else{}
		 }else{}
	 
	}
function re_noti()
	{
		global $connection;
		$get_stock= mysqli_query($connection,"SELECT item_id FROM store WHERE qty<=reorder");
		$set = mysqli_num_rows($get_stock);
		 
		echo $set;
	}
	

function get_today_orders(){
	global $connection; 
 $get_total_orders = "SELECT order_no FROM orders WHERE shift=CURRENT_DATE";
 $get_total_orders_r = mysqli_query($connection,$get_total_orders) or die("Could not get the total orders today");
 $orders = mysqli_num_rows($get_total_orders_r);
 echo $orders;
}
function get_today_amount(){
	global $connection; 
 $total_amount = "SELECT SUM(amount) as tqty FROM orders WHERE shift=CURRENT_DATE";
 $total_amount_r = mysqli_query($connection,$total_amount) or die("Could not get the total orders today");
 $orders = mysqli_fetch_assoc($total_amount_r);
 echo $orders['tqty'];
}*/

?>  