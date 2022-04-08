<?php 
    include 'header.php';
    if(isset($_GET['id'])){
        $id = $_GET['id'];
        //thực hiện truy vấn lấy ra bản ghi tương ứng với id get đc
        $product = mysqli_query($conn, "select * from member where id= $id");
        $pro = mysqli_fetch_assoc($product);
        // var_dump($pro);
    }
    if(isset($_POST['ten'])){
        $email= $_POST['email'];
        $password = $_POST['password'];
        $ten = $_POST['ten'];
        $diachi = $_POST['diachi'];
        $sdt = $_POST['sdt'];
        $chucvu = $_POST['chucvu'];
        //buoc 2 lưu tên của file vô database
        $sql = "update `member` set `email` = '$email',`password` = '$password' , `ten` = '$ten', `diachi` = '$diachi', `sdt` = '$sdt', `chucvu` = '$chucvu'  where id = $id";
        // echo "<p>$sql</p>";
        $query = mysqli_query($conn, $sql);
        
        echo("<script>location.href = 'nguoidung.php?msg=$msg';</script>");

    }    
?>

<div class="content-wrapper">
    <section class="content">
        <div class="container-fluid">
            <div class="card card-secondary">
                <div class="card-header">
                    <h3 class="card-title">Sửa người dùng</h3>
                </div>
                <div class="card-body">

                    <form action="" method="POST" role="form" enctype="multipart/form-data">
                        <legend>Sửa các thông tin</legend>

                        <div class="form-group">
                            <label for="">Email</label>
                            <input type="text" class="form-control" id="name" placeholder="Nhập email" name="email"
                                value=" <?php echo $pro['email']?>">
                        </div>
                        <div class="form-group">
                            <label for="">Password</label>
                            <input type="text" class="form-control" id="slug" placeholder="Nhập password"
                                name="password" value=" <?php echo $pro['password']?>">
                        </div>
                        <div class="form-group">
                            <label for="">Tên người dùng</label>
                            <input type="text" class="form-control" id="slug" placeholder="Nhập tên người dùng"
                                name="ten" value=" <?php echo $pro['ten']?>">
                        </div>
                        <div class="form-group">
                            <label for="">Địa chỉ</label>
                            <input type="text" class="form-control" id="slug" placeholder="Nhập địa chỉ" name="diachi"
                                value=" <?php echo $pro['diachi']?>">
                        </div>
                        <div class="form-group">
                            <label for="">Số điện thoại</label>
                            <input type="text" class="form-control" id="slug" placeholder="Nhập số điện thoại"
                                name="sdt" value=" <?php echo $pro['sdt']?>">
                        </div>
                        <div class="form-group">
                            <label for="">Chức vụ</label>
                            <input type="text" class="form-control" id="slug" placeholder="Nhập chức vụ" name="chucvu"
                                value=" <?php echo $pro['chucvu']?>">
                        </div>
                        <button type="submit" name="them" class="btn btn-primary">Sửa</button>
                    </form>
                </div>
            </div>
        </div>
    </section>
</div>

<?php
    include 'footer.php'
?>