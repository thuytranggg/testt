<?php 
include 'header.php';
$category = mysqli_query($conn, "SELECT * from nhom_sp where `show` = 1");
$new_product = mysqli_query($conn, "SELECT * from sanpham where `show` = 1 ORDER BY `id` DESC LiMIT 9");//sắp xếp sản phẩm mới nhất
?>


<div class="container">
    <div class="row">
        <div class="col-md-3">

            <div class="panel panel-info" style="border-color: #ccc;">
                <div class="panel-heading" style="background-color:#ffbc0d">
                    <h3 class="panel-title" style="color:black;font-size:21px ;text-align:center">Danh mục</h3>
                </div>
                <div class="panel-body">

                    <div class="list-group">
                        <?php foreach($category as $key => $value): ?>
                        <a href="category.php?san-pham=<?php echo $value['slug']?>" class="list-group-item"
                            style="color: black;"><?php echo $value['name']?></a>
                        <?php endforeach ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-9">

            <div class="panel panel-info" style="border-color: #ccc;">
                <div class="panel-heading" style="background-color:#ffbc0d">
                    <h3 class="panel-title" style="color:black;font-size:21px;text-align:center ">Sản phẩm mới
                        nhất</h3>
                </div>
                <div class="panel-body">
                    <?php foreach($new_product as $key => $value): ?>


                    <div class="col-md-4">
                        <div class="thumbnail">
                            <img style="height: 150px" src="uploads/<?php echo $value['imgae']?>" alt="">
                            <div class="caption">
                                <h3><?php echo $value['name'] ?></h3>
                                <p>
                                    <span><?php echo number_format($value['gia'])?></span>VNĐ
                                </p>
                                <p class="text-center">
                                    <a style="width:100px; font-size: 15px;background-color:#ffbc0d; border-color:#ccc; color:black"
                                        href="giohang.php?id=<?php echo $value['id']?> "
                                        class="btn btn-primary btn-lg">Mua</a>
                                    <a style="width:100px; font-size: 15px"
                                        href="chitietsp.php?sp=<?php echo $value['slug']?>"
                                        class="btn btn-secondary ">Xem</a>
                                </p>
                            </div>
                        </div>
                    </div>
                    <?php endforeach ?>
                </div>
            </div>

        </div>
    </div>
</div>


<?php 
   include 'footer.php'
   ?>