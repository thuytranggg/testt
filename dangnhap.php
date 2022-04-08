<?php include 'header.php';
 
 if(isset($_POST['email'])){
     $email = $_POST['email'];
     $password = $_POST['password'];

     $sql = "select * from users WHERE email = '$email'";
     $query = mysqli_query($conn, $sql);
     $data = mysqli_fetch_assoc($query);
     $checkEmail = mysqli_num_rows($query);
     if($checkEmail == 1)
     {
         $checkPass = password_verify($password, $data['password']);
        // var_dump($checkPass);

         if( $checkPass){
             //lưu vào session
             $_SESSION['user'] = $data;
             //đến trang thanh toán hoặc index
             if(isset($_GET['action'])){
                 $action = $_GET['action'];
                 header('location:' .$action.'php');
             }else{
                header('location: index.php');
             }
         }else{
             echo "Sai mật khẩu";
         }

     } else{
         echo "Email không tồn tại";
     }
 }

?>
<div class="content">
    <div class="checkout-are pt-60  pb-30">
        <div class="container">

            <div class="row">
                <div class="infoo col col-half">
                    <form action="#" method="POST" role="form">
                        <h2 class="info">ĐĂNG NHẬP</h2>
                        <div class="form-group">
                            <label for="">Email </label>
                            <input type="text" class="form-control" name="email"> <br> <br>
                        </div>
                        <div class="form-group">
                            <label for="">Mật khẩu </label>
                            <input type="password" class="form-control" name="password"> <br> <br>
                        </div>
                        <div class="payment">
                            <input type="submit" value="Đăng nhập">
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