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
                        </ul>
                    </li>
                    <?php } ?>
                </ul>
            </nav>
        </header>
        <!-- end HEADER -->

        <!-- BEGIN CONTENT -->
        <div id="content">
            <div class="content-section">
                <h1 style="text-align: center; font-size:54px;font-family: speedee-bold">Happy Holidays from McDonald’s
                </h1>
                <div class="img1">
                    <img src="./img/1.jpg" alt="">
                    <div class="text-content">
                        <h2 style="font-weight: bold;">Get Free Daily Deals, Only in the App</h2>
                        <p style="padding: 0 20px 40px 0;">When you're the queen of the holidays, you get more than a
                            meal. The Mariah Menu is coming
                            soon—get daily deals free with $1 minimum purchase, only in the app.</p>
                        <a href="" class="btn-dowapp" style="color:#292929; text-decoration: none">Dowload the App</a>

                    </div>
                </div>
                <div class="row img2">
                    <div class="col col-md-7">
                        <img src="./img/2.jpg" alt="" class="img22">
                    </div>
                    <div class="col colmd3">
                        <div>
                            <h2 style="font-weight: bold;">What’s Free on The Mariah Menu Today?*</h2>
                            <p style="padding: 20px 0 20px 0;">Every day is another deal from December 13th-24th. Get a
                                free Big Mac®, McChicken® and
                                lots of other free faves, only in the app with $1 minimum purchase.</p>
                            <p style="font-size: 10px; padding:0 0 40px 0">*At participating McDonald’s. Valid 1x/day
                                with $1 minimum
                                purchase (excluding tax) from
                                December 13-24. Refer to app for details.</p>
                            <a href="" class="btn-dowapp" style="color:#292929; text-decoration: none">Check the
                                Calendar</a>

                        </div>
                    </div>
                </div>
                <div class="row img2">
                    <div class="col col-md-7">
                        <img src="./img/3.jpg" alt="" class="img22">
                    </div>
                    <div class="col colmd3">
                        <div>
                            <h2 style="font-weight: bold;">Free Fries Now. Free McDonald’s Later.*</h2>
                            <p style="padding: 20px 0 20px 0;">Every day is another deal from December 13th-24th. Get a
                                free Big Mac®, McChicken® and
                                lots of other free faves, only in the app with $1 minimum purchase.</p>
                            <p style="font-size: 10px; padding:0 0 40px 0">*At participating McDonald’s. Valid 1x/day
                                with $1 minimum
                                purchase (excluding tax) from
                                December 13-24. Refer to app for details.</p>
                            <a href="" class="btn-dowapp" style="color:#292929; text-decoration: none">Check the
                                Calendar</a>

                        </div>
                    </div>
                </div>
                <div class="row img2">
                    <div class="col col-md-7">
                        <img src="./img/4.jpg" alt="" class="img22">
                    </div>
                    <div class="col colmd3">
                        <div>
                            <h2 style="font-weight: bold;">What’s Free on The Mariah Menu Today?*</h2>
                            <p style="padding: 20px 0 20px 0;">Every day is another deal from December 13th-24th. Get a
                                free Big Mac®, McChicken® and
                                lots of other free faves, only in the app with $1 minimum purchase.</p>
                            <p style="font-size: 10px; padding:0 0 40px 0">*At participating McDonald’s. Valid 1x/day
                                with $1 minimum
                                purchase (excluding tax) from
                                December 13-24. Refer to app for details.</p>
                            <a href="" class="btn-dowapp" style="color:#292929; text-decoration: none">Check the
                                Calendar</a>

                        </div>
                    </div>
                </div>
                <div class="row img2">
                    <div class="col col-md-7">
                        <img src="./img/5.jpg" alt="" class="img22">
                    </div>
                    <div class="col colmd3">
                        <div>
                            <h2 style="font-weight: bold;">What’s Free on The Mariah Menu Today?*</h2>
                            <p style="padding: 20px 0 20px 0;">Every day is another deal from December 13th-24th. Get a
                                free Big Mac®, McChicken® and
                                lots of other free faves, only in the app with $1 minimum purchase.</p>
                            <p style="font-size: 10px; padding:0 0 40px 0">*At participating McDonald’s. Valid 1x/day
                                with $1 minimum
                                purchase (excluding tax) from
                                December 13-24. Refer to app for details.</p>
                            <a href="" class="btn-dowapp" style="color:#292929; text-decoration: none">Check the
                                Calendar</a>

                        </div>
                    </div>
                </div>
                <div class="row img2">
                    <div class="col col-md-7">
                        <img src="./img/6.jpg" alt="" class="img22">
                    </div>
                    <div class="col colmd3">
                        <div>
                            <h2 style="font-weight: bold;">What’s Free on The Mariah Menu Today?*</h2>
                            <p style="padding: 20px 0 20px 0;">Every day is another deal from December 13th-24th. Get a
                                free Big Mac®, McChicken® and
                                lots of other free faves, only in the app with $1 minimum purchase.</p>
                            <p style="font-size: 10px; padding:0 0 40px 0">*At participating McDonald’s. Valid 1x/day
                                with $1 minimum
                                purchase (excluding tax) from
                                December 13-24. Refer to app for details.</p>
                            <a href="" class="btn-dowapp" style="color:#292929; text-decoration: none">Check the
                                Calendar</a>

                        </div>
                    </div>
                </div>
                <div class="row img2">
                    <div class="col col-md-7">
                        <img src="./img/7.jpg" alt="" class="img22">
                    </div>
                    <div class="col colmd3">
                        <div>
                            <h2 style="font-weight: bold;">What’s Free on The Mariah Menu Today?*</h2>
                            <p style="padding: 20px 0 20px 0;">Every day is another deal from December 13th-24th. Get a
                                free Big Mac®, McChicken® and
                                lots of other free faves, only in the app with $1 minimum purchase.</p>
                            <p style="font-size: 10px; padding:0 0 40px 0">*At participating McDonald’s. Valid 1x/day
                                with $1 minimum
                                purchase (excluding tax) from
                                December 13-24. Refer to app for details.</p>
                            <a href="" class="btn-dowapp" style="color:#292929; text-decoration: none">Check the
                                Calendar</a>

                        </div>
                    </div>
                </div>
                <div class="row img2">
                    <div class="col col-md-7">
                        <img src="./img/8.jpg" alt="" class="img22">
                    </div>
                    <div class="col colmd3">
                        <div>
                            <h2 style="font-weight: bold;">What’s Free on The Mariah Menu Today?*</h2>
                            <p style="padding: 20px 0 20px 0;">Every day is another deal from December 13th-24th. Get a
                                free Big Mac®, McChicken® and
                                lots of other free faves, only in the app with $1 minimum purchase.</p>
                            <p style="font-size: 10px; padding:0 0 40px 0">*At participating McDonald’s. Valid 1x/day
                                with $1 minimum
                                purchase (excluding tax) from
                                December 13-24. Refer to app for details.</p>
                            <a href="" class="btn-dowapp" style="color:#292929; text-decoration: none">Check the
                                Calendar</a>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- begin footer -->
    <div id="footer">
        <div class="content-section3">
            <div class="row">
                <div class="line"></div>
                <!-- <hr> -->
                <div class="col col-md-3">
                    <ul>
                        <li class="parent">Tìm hiểu</li>
                        <li><a href="">Lịch sử McDonald's</a></li>
                        <li><a href="">Giới thiệu McDonald's Việt Nam</a></li>
                        <li><a href="">Xuất xứ</a></li>
                        <li><a href="">Nhà cung cấp</a></li>
                        <li><a href="">Dịch vụ</a></li>
                        <li><a href="">An toàn thực phẩm</a></li>
                    </ul>
                </div>
                <div class="col col-md-3">
                    <ul>
                        <li class="parent">Cơ hội nghề nghiệp</li>
                        <li><a href="">Thông tin tuyển dụng</a></li>
                        <li><a href="">Khu vực TP.HCM</a></li>
                        <li><a href="">Khu vực Hà Nội</a></li>
                    </ul>
                </div>
                <div class="col col-md-3">
                    <ul>
                        <li class="parent">Chính sách</li>
                        <li><a href="">Các câu hỏi thường gặp</a></li>
                        <li><a href="">Điều khoản và Điều kiện</a></li>
                        <li><a href="">Chính sách về quyền riêng tư</a></li>
                        <li>Ngôn ngữ
                            <ul>
                                <li><a href="en/"></a></li>
                                <li><a href="vi/"></a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
                <div class="col col-md-3">
                    <ul>
                        <li class="parent">Liên hệ với chúng tôi</li>
                        <li><a href="">Liên hệ</a></li>
                        <li><a href="">Phản hồi chất lượng dịch vụ</a></li>
                        <a href=""><img class="social" src="./img/facebook.png" alt=""></a>
                        <a href=""><img class="social" src="./img/instagram.png" alt=""></a>
                        <a href=""><img class="social" src="./img/youtube.png" alt=""></a>
                    </ul>
                </div>
                <div class="clear"></div>
            </div>
        </div>
        <div class="footer1">
            <p>©2017-2018 McDonald's. All Rights Reserved.</p>
        </div>
    </div>

    <!-- jQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Bootstrap JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</body>

</html>