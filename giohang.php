<?php
include './admin/db/connect.php';
session_start();
if(isset($_GET['id'])){
    $id = $_GET['id'];
}
$action = (isset($_GET['action'])) ? $_GET['action'] : 'add';
$quantity = (isset($_GET['quantity'])) ? $_GET['quantity']: 1;
if($quantity <=0){
    $quantity = 1;
}
// session_destroy();
// echo $action;
// echo "<br>";
// echo $id;
// die();
// var_dump($action);
// die();
$query = mysqli_query($conn, "SELECT * from sanpham where id ='$id'");
if($query){
    $product = mysqli_fetch_assoc($query);

}


$item =[
    'id' =>$product['id'],
    'name' =>$product['name'],
    'imgae' =>$product['imgae'],
    'gia' =>$product['gia'],
    'quantity' => $quantity,
];
if($action == 'add'){
    if(isset($_SESSION['giohang'][$id])){
        $_SESSION['giohang'][$id]['quantity'] +=$quantity;
    
    }
    else {
        $_SESSION['giohang'][$id]= $item;
    }
}
if($action == 'update'){
    $_SESSION['giohang'][$id]['quantity'] =$quantity;
}
if($action == 'delete'){
    // var_dump("ok");
    // die();
    unset($_SESSION['giohang'][$id]);
}

header('location: xemgiohang.php');
echo"<pre>";
print_r($_SESSION['giohang']);

?>