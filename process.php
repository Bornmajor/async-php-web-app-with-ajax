<?php

include 'connection.php';

if(isset($_POST['id'])){

 $id = mysqli_real_escape_string($connection,$_POST['id']);

$query ="SELECT * FROM cars WHERE id = {$id}";
$query_car_info = mysqli_query($connection,$query);
if(!$query_car_info){
    die("Query failed".mysqli_error($connection));
}
while($row = mysqli_fetch_array($query_car_info)){
    

    echo "<input rel='".$row['id']."' type='text' class='form-control title-input' value='".$row['cars']."'>";
    echo "<input type='button' class='btn btn-success update' value='Update'>";
    echo "<input type='button' class='btn btn-danger delete' value='Delete'>";

}

}
if(isset($_POST['updatethis'])){
    $id = $_POST['id'];
    $title = $_POST['title'];


    $query = "UPDATE cars SET cars = '$title' WHERE id = $id ";
    $result_set = mysqli_query($connection,$query);

    if(!$result_set){
        die("Query failed". mysqli_error($connection));

    }

}
if(isset($_POST['deletethis'])){
    $id = $_POST['id'];
  


    $query = "DELETE FROM cars  WHERE id = $id ";
    $delete_result = mysqli_query($connection,$query);

    if(!$delete_result){
        die("Query failed". mysqli_error($connection));

    }

}
?>
<script>
        $(document).ready(function(){

         var id;
         var title;
         var updatethis = "update";
         var deletethis = "delete";

         $(".title-input").on('input',function(){
            id = $(this).attr('rel');
            title = $(this).val();


          
            

         });
  $(".update").on('click',function(){
            $.post("process.php",{id:id,title:title, updatethis:updatethis},function(data){
                 $("#feedback").text("Record updated successfuly");
                
            });


             
                
            });

            $(".delete").on('click',function(){
                id = $(".title-link").attr('rel');
            $.post("process.php",{id:id,title:title, deletethis:deletethis},function(data){
                 $("#feedback").text("Record delete successfuly");
                     $("#action-container").hide();
                
            });


             
                
            });



        });//ready
</script>