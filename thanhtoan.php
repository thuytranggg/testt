<?php include 'header.php';
//$user = $_SESSION['user'];
$user = (isset($_SESSION['user']))? $_SESSION['user'] :[];


if(isset($_POST['name'])){
    //var_dump($_POST);
    $id_user = $user['id'];
    $diachi = $_POST['diachi'];
    $phone = $_POST['phone'];
    $note = $_POST['note'];
    date_default_timezone_set("Asia/Ho_Chi_Minh");

    $created_at =  date("Y-m-d H:i:s");
    $total = total_price($cart);


 
    
     $query = mysqli_query($conn, "INSERT INTO donhang(id_kh, tongtien, diachi, phone, note, ngaytao) VALUES ('$id_user', '$total'
     ,'$diachi', '$phone', '$note', '$created_at') ");
  

     if($query){
         $id_dh= mysqli_insert_id($conn);//lấy id vừa insert
         
             foreach($cart as $value){
             mysqli_query($conn, "INSERT INTO donhang_ct(id_dh, id_sp, gia, quantity) VALUES ('$id_dh', '$value[id]', 
            '$value[gia]' ,'$value[quantity] ')");
         }

         unset( $_SESSION['giohang']);
         header('location:index.php');
     }
}
?>



<?php if(isset($_SESSION['user'])) {?>
<form method="POST">
    <div class="container" style="margin-top: 50px;">
        <div class="row">
            <div class="col col-half">
                <!--thông tin checkout-->
                <h3 class="info">THÔNG TIN CÁ NHÂN</h3>
                <form>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Tên </label>
                        <!--hiển thị tên-->
                        <input type="text" class="form-control" id="exampleInputEmail1"
                            value="<?php echo $user['name'] ?>" name="name">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Email</label>
                        <input type="text" class="form-control" id="exampleInputPassword1 "
                            value="<?php echo $user['email'] ?>" name="email">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Số điện thoại</label>
                        <input type="text" class="form-control" id="exampleInputPassword1"
                            value="<?php echo $user['phone'] ?>" name="phone">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Địa chỉ <span class="require">*</span></label>
                        <input type="text" class="form-control" id="exampleInputPassword1" name="diachi">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Ghi chú <span class="require">*</span></label>

                        <textarea name="note" id="input" class="form-control" rows="3"></textarea>

                    </div>
                </form>
            </div>

            <div class="col col-half">
                <div class="your-order">
                    <h2 style="text-align: center;">Thông tin đơn hàng</h2>
                    <table>
                        <thead>
                            <tr>
                                <th>STT</th>
                                <th>Tên</th>
                                <th>Số lượng</th>
                                <th>Đơn giá</th>
                                <th>Thành tiền</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($cart as $key => $value): ?>
                            <tr>
                                <td><?php echo $key +1?></td>
                                <td><?php echo $value['name']?></td>
                                <td>
                                    <?php echo $value['quantity']?>
                                </td>
                                <td><?php echo number_format($value['gia'])?></td>
                                <td><?php echo number_format($value['gia'] *  $value['quantity']) ?></td>


                            </tr>
                            <?php endforeach ?>
                        </tbody>
                        <tfoot class="Tong">
                            <tr>
                                <td>Tổng tiền</td>
                                <td colspan="6" class="bg-info">
                                    <?php echo number_format(total_price($cart))?> VNĐ
                                </td>
                            </tr>
                        </tfoot>
                    </table>
                    <div class="payment">
                        <input type="submit" value="Đặt hàng">
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
<?php }else {?>

<div class="alert alert-danger">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
    <strong>Vui lòng đăng nhập mua hàng</strong> <a href="dangnhap.php?action=thanhtoan." title="">Đăng nhập</a>
</div>

<?php } ?>
<!-- <div class="ft" style="height:250px"> -->

</div>
<?php
include 'footer.php'
?>