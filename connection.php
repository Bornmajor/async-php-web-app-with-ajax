<?php
ob_start();

$connection = mysqli_connect("localhost","root","","ajax");
if(!$connection){
   die("Database connection failed".mysqli_connect_error());
}

?>