<?php include 'header.php';
 
$err = [];

 if(isset($_POST['name'])){
     $name = $_POST['name'];
     $email = $_POST['email'];
     $phone = $_POST['phone'];
     $password = $_POST['password'];
     $rPassword = $_POST['rPassword'];

     if(empty($name)){
         $err['name'] = 'Bạn chưa nhập tên';
     }
     if(empty($email)){
        $err['email'] = 'Bạn chưa nhập Email';
    }
    if(empty($phone)){
        $err['phone'] = 'Bạn chưa nhập số điện thoại';
    }
    if(empty($password)){
        $err['password'] = 'Bạn chưa nhập Password';
    }
    if($password != $rPassword){
        $err['rPassword'] = 'Mật khẩu nhập lại không đúng';
    }
     //var_dump(!empty($err));
     if(empty($err)){ 
      $pass = password_hash($password, PASSWORD_DEFAULT);  //hàm mã hóa password_hash, ko dùng md5 vì md5 đã có thể bị giải mã
     $sql = "INSERT INTO users(name, email, password, phone) VALUES('$name', '$email', '$pass', '$phone')";
     $query = mysqli_query($conn, $sql);
     if($query){
         header('location: dangnhap.php'); //để chuyển sang trang dangnhap
     }
     }
     //die();
 }
?>


<div class="content">
    <div class="checkout-are pt-60  pb-30">
        <div class="container">

            <div class="row">
                <div class="infoo col col-half">
                    <form action="#" method="POST" role="form">
                        <h2 class="info">ĐĂNG KÝ TÀI KHOẢN</h2>

                        <div class="">

                            <label for="">Tên người dùng <span class="require">*</span></label>
                            <input type="text" class="form-control" name="name"> <br> <br>
                            <!--show lỗi-->
                            <div class="has-error">
                                <span><?php echo (isset($err['name']))?$err['name']:'' ?></span>
                            </div>
                        </div>

                        <div class="">

                            <label for="">Email <span class="require">*</span></label>
                            <input type="text" class="form-control" name="email"> <br> <br>
                            <!--show lỗi-->
                            <div class="has-error">
                                <span><?php echo (isset($err['email']))?$err['email']:'' ?></span>
                            </div>
                        </div>

                        <div class="">

                            <label for="">Số điện thoại <span class="require">*</span></label>
                            <input type="text" class="form-control" name="phone"> <br> <br>
                            <!--show lỗi-->
                            <div class="has-error">
                                <span><?php echo (isset($err['phone']))?$err['phone']:'' ?></span>
                            </div>
                        </div>

                        <div class="">

                            <label for="">Mật khẩu <span class="require">*</span></label>
                            <input type="password" class="form-control" name="password"> <br> <br>
                            <!--show lỗi-->
                            <div class="has-error">
                                <span><?php echo (isset($err['password']))?$err['password']:'' ?></span>
                            </div>
                        </div>

                        <div class="">

                            <label for="">Nhập lại mật khẩu <span class="require">*</span></label>
                            <br>
                            <input type="password" class="form-control" name="rPassword"> <br> <br>
                            <!--show lỗi-->
                            <div class="has-error">
                                <span><?php echo (isset($err['rPassword']))?$err['rPassword']:'' ?></span>
                            </div>
                        </div>
                        <div class="payment">
                            <input type="submit" value="Đăng ký">
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
</div>

<?php
include 'footer.php'
?>