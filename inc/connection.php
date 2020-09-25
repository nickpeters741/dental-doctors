<?php 

$dbhost = "localhost";
$dbuser = "root";
$dbpass = "";
$dbname = "dental";

$connection = mysqli_connect($dbhost,$dbuser,$dbpass,$dbname);
//Test if connection error occured
if(mysqli_connect_errno()){
	die("Database conncetion faied:" .mysqli_connect_error(). "(". mysqli_connect_errno().")" );
}

?>