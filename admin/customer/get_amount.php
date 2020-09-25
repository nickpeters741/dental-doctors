<?php

//header('Content-Type: application/json');

include('../../inc/connection.php');
$cat_id=$_GET['id'];

//$connection = mysqli_connect($dbhost ,$dbuser ,$dbpass ,$dbname);

// select box option tag
$selectBoxOption1 = ''; 

// connect mysql server

$sql1 = "SELECT bo FROM room WHERE room_id ='$cat_id'";
//$result1 = mysqli_query($sql1);

$result = mysqli_query($connection , $sql1)
              or die('could not fetch amount');
$row = mysqli_fetch_assoc($result); 
// return options
echo $row['bo'];
//print json_encode($selectBoxOption1);
?>