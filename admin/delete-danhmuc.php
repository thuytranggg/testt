<?php
include './db/connect.php';
if(isset($_GET["id"])){
    $id = $_GET["id"];

   $query= mysqli_query($conn, "delete from nhom_sp where id=$id");
   if($query){
       header('location: danhmuc.php');
   }else{
       echo ' loi r';
   }
}
?>