<?php include 'header.php';
  
// echo "<pre>";
// print_r($cart);
?>



<div class="container">
    <div class="row">
        <div class="col-md-2">

        </div>
        <div class="col-md-10">
            <div class="panel panel-info" style="border-color: #ccc">
                <div class="panel-heading" style="background-color:#ffbc0d">
                    <h3 class="panel-title" style="color:black;font-size:21px;text-align:center">Trang giỏ hàng
                    </h3>
                </div>
                <div class="panel-body">

                    <table class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>STT</th>
                                <th>Ảnh</th>
                                <th>Tên</th>
                                <th>Số lượng</th>
                                <th>Đơn giá</th>
                                <th>Thành tiền</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($cart as $key => $value): ?>
                            <tr>
                                <td><?php echo $key ++?></td>
                                <td><img src="uploads/<?php echo $value['imgae']?> " alt="" width="100px"></td>
                                <td><?php echo $value['name']?></td>
                                <td>
                                    <form action="./giohang.php">
                                        <input type="hidden" name="action" value="update">
                                        <input type="hidden" name="id" value="<?php echo $value['id']?>" id="">
                                        <input style="width: 200px " type="number" name="quantity"
                                            value="<?php echo $value['quantity']?>">
                                        <button style="font-size:14px " type="submit" class="btn btn-dark">Cập
                                            nhật</button>
                                    </form>
                                </td>
                                <td><?php echo number_format($value['gia'])?></td>
                                <td><?php echo number_format($value['gia'] *  $value['quantity']) ?></td>
                                <td><a href="./giohang.php?id=<?php echo $value['id']?>&action=delete"
                                        class="btn btn-danger">Xóa</a></td>

                            </tr>
                            <?php endforeach ?>
                            <tr>
                                <td style="font-size:21px">Tổng tiền</td>
                                <td colspan="6" class="text-center bg-info"
                                    style="font-size:21px;background-color:#ffbc0d">
                                    <?php echo number_format(total_price($cart))?> VNĐ
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>



            <div class="panel text-center">
                <div class="panel-heading">
                    <h3 class="panel-title ">
                        <a href="./thanhtoan.php" class="btn btn-secondary text-center" style="font-size:14px; background-color: #ffbc0d;color: black;width: 170px;padding-top: 10px;
    padding-bottom: 10px; font-weight: 600;text-transform: uppercase; ">Đặt
                            hàng</a>
                    </h3>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include 'footer.php' ?>