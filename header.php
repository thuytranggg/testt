<?php
include './admin/db/connect.php';
include 'cart-function.php';

session_start();
$cart = (isset($_SESSION['giohang']))? $_SESSION['giohang'] :[];


//hiện tên người dùng lên menu
//$user = [];
$user = (isset ($_SESSION['user'])) ?  $_SESSION['user']: [];
//$user = ($_SESSION['user']); 

?>

<!DOCTYPE html>
<html lang="">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Title Page</title>
    <link rel="stylesheet" href="./assets/css/thanhtoan.css">


    <!-- Bootstrap CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet" href="./assets/css/HomePage.css">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="icon" type="image/png" href="./">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"
        integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">

    <!--Hiện lỗi đỏ-->
    <style>
    .has-error {
        color: red;
    }
    </style>
</head>

<body>
    <div id="main">
        <!-- BEGIN HEADER -->
        <header>
            <nav>
                <div class="img-nav">
                    <img src="./img/logo-mcdonalds.png" alt="" />
                </div>
                <div class="content-nav">
                    <ul>
                        <li><a href="./HomePage.php">Trang Chủ</a></li>
                        <li><a href="./index.php">Sản Phẩm</a></li>
                        <li><a href="#">Liên Hệ</a></li>
                        <li><a href="#">Giới Thiệu</a></li>

                    </ul>
                    <!--tìm kiếm-->
                    <!-- <p>
                    <form>
                        <input type="text" name="search" placeholder="Tìm kiếm sản phẩm..." />

                    </form>
                    <p> -->



                </div>
                <!-- The Modal -->
                <button id="cart" onclick="window.location.href='xemgiohang.php'">
                    <i class="fa fa-shopping-basket" aria-hidden="true"></i>
                    Giỏ hàng
                    <span class="badge badge-primary badge-pill"><?php echo count($cart)?></span>


                </button>

                <ul class="nav navbar-nav navbar-right">
                    <?php if(isset($user['email'])){?>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"
                            style="color: white; background-color:black; position: relative">
                            <?php echo $user['email']?>
                            <b class="caret"></b></a>
                        <!--hiển thị ['']-->
                        <ul class="dropdown-menu" style="position: absolute; top:36px;left:0">
                            <li><a href="dangxuat.php">Đăng xuất</a></li>
                        </ul>
                    </li>
                    <?php }else {?>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle"
                            style="color: white; background-color:black; position: relative" data-toggle="dropdown">Tài
                            khoản
                            <b class="caret"></b></a>
                        <!--hiển thị ['']-->
                        <ul class="dropdown-menu" style="position: absolute; top:36px;left:0">
                            <li><a href="dangky.php">Đăng ký</a></li>
                            <li><a href="dangnhap.php">Đăng nhập</a></li>
                            <li><a href="admin/login.php">Admin</a></li>

                            <!-- <li><a href="#">Đăng xuất</a></li> -->
                        </ul>
                    </li>
                    <?php } ?>
                </ul>
            </nav>


        </header>
        <!-- end HEADER -->