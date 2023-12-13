<?php
include 'connection.php';

if(isset($_POST['car_name'])){
  $car =   $_POST['car_name'];

   $query = "INSERT INTO cars(cars)VALUES('$car')";
   $query_car_name = mysqli_query($connection,$query);
   if(!$query_car_name){
    die("Query failed".mysqli_error($connection));
   }
//    header("Location: index.html");
}

?>