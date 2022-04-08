<?php
include './db/connect.php';
if(isset($_GET["id"])){
    $id = $_GET["id"];

   $query= mysqli_query($conn, "delete from sanpham where id=$id");
   if($query){
       header('location: donhang.php');
   }else{
       echo ' loi r';
   }
}
?>