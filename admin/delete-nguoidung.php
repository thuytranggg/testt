<?php
include './db/connect.php';
if(isset($_GET["id"])){
    $id = $_GET["id"];
   $query= mysqli_query($conn, "delete from member where id=$id");
   if($query){
       header('location: nguoidung.php');
   }else{
       echo ' loi r';
   }
}
?>