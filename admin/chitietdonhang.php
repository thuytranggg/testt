<?php
include 'header.php';

include '../cart-function.php';
if(isset($_GET['id'])){
    $id_order = $_GET['id'];
    $order_query = mysqli_query($conn, "SELECT * from donhang where id= $id_order");
    $order = mysqli_fetch_assoc($order_query);
    $id_users = $order['id_kh'];
    $users_query = mysqli_query($conn, "SELECT * from users where id = $id_users ");
    
    //lấy ra danh sách sản phẩm trong đơn hàng
    $sanpham = mysqli_query($conn, "SELECT donhang_ct.id_dh, donhang_ct.gia, donhang_ct.quantity, sanpham.imgae, sanpham.name FROM donhang_ct JOIN sanpham on donhang_ct.id_sp = sanpham.id WHERE donhang_ct.id_dh = $id_order");
    $users = mysqli_fetch_assoc($users_query);
}
if(isset($_POST['show'])){
    $show = $_POST['show'];

    mysqli_query($conn, "UPDATE donhang SET `show` = '$show' WHERE id = $id_order");
    // header('location: donhang.php');
    echo("<script>location.href = 'donhang.php';</script>");

}
?>
<div class="content-wrapper">
    <section class="content">
        <div class="container-fluid">

            <div class="card card-secondary ">
                <div class="card-header">
                    <h3 class="card-title">Thông tin khách hàng</h3>
                </div>
                <div class="card-body ">
                    <p>Tên khách hang: <?php echo $users['name']?></p>
                    <p>Số điện thoại: <?php echo $users['phone']?></p>
                    <p>Địa chỉ: <?php echo $order['diachi']?></p>
                    <p>Ghi chú: <?php echo $order['note']?></p>
                    <p>Ngày đặt hàng: <?php echo $order['ngaytao']?> </p>
                    <p>Trạng thái đơn hàng:
                        <?php if($order['show'] == 0) {?>
                        Chưa xử lý
                        <?php }elseif($order['show'] == 1) { ?>
                        Đang xứ lý


                        <?php }?>
                    <form action="" method="post">
                        <div class="form-group">
                            <label class="sr-only" for="">Trạng thái</label>
                            <select name="show" id="input" class="form-control" required="required">
                                <option value="0">Chưa xử lý</option>
                                <option value="1">Đã xử lý</option>

                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary">Cập nhật</button>
                    </form>
                    </h3>
                </div>
            </div>
            <div class="card card-secondary ">
                <div class="card-header">
                    <h3 class="card-title">Danh sách đơn hàng</h3>
                </div>
                <div class="card-body ">
                    <table class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>STT</th>
                                <th>Tên sản phẩm</th>
                                <th>Ảnh</th>
                                <th>Số lượng</th>
                                <th>Giá</th>
                                <th>Thành tiền</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($sanpham as $key => $value): ?>
                            <tr>
                                <td><?php echo $key+1?></td>
                                <td><?php echo $value['name']?></td>
                                <td><img src="../uploads/<?php echo $value['imgae']?>" alt="" width="50px"></td>
                                <td><?php echo $value['quantity']?></td>
                                <td><?php echo number_format($value['gia']) ?></td>
                                <td><?php echo number_format($value['gia'] * $value['quantity'])?></td>


                            </tr>
                            <?php endforeach ?>
                            <tr>
                                <td>Tổng tiền</td>
                                <td colspan="5" class="text-center bg-info">
                                    <?php echo number_format(total_price($sanpham))?></td>
                            </tr>
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </section>
</div>



<?php include 'footer.php';?>