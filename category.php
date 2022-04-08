<?php
include 'header.php';
if(isset($_GET['san-pham'])){
    $slug = $_GET['san-pham'];
    $category = mysqli_query($conn, "SELECT * FROM `nhom_sp` WHERE `slug` = '$slug'");
    $cate = mysqli_fetch_assoc($category);
    $id_cate = $cate['id'];
    $product = mysqli_query($conn, "SELECT * FROM sanpham WHERE `id_category` = '$id_cate'");
    $categoryy = mysqli_query($conn, "SELECT * from nhom_sp where `show` = 1");

    // var_dump($product);
}
    
?>

<div class="container">
    <div class="row">
        <div class="col-md-3">
            <div class="panel panel-info"  style="border-color: #ccc;">
                <div class="panel-heading" style="background-color:#ffbc0d">
                    <h3 class="panel-title" style="color:black;font-size:21px ;text-align:center">Danh mục</h3>
                </div>
                <div class="panel-body">

                    <div class="list-group">
                        <?php foreach($categoryy as $key => $value): ?>
                        <a href="category.php?san-pham=<?php echo $value['slug']?>" style="color: black;"
                            class="list-group-item"><?php echo $value['name']?></a>
                        <?php endforeach ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-9">
            <div class="panel panel-info" style="border-color: #ccc;">
                <div class="panel-heading" style="background-color:#ffbc0d">
                    <h3 class="panel-title" style="color:black;font-size:21px;text-align:center ">Sản phẩm theo danh mục:
                        <?php echo $cate['name']?>
                        <span class="badge badge-primary badge-pill" ><?php echo mysqli_num_rows($product)?></span>
                    </h3>
                </div>
                <div class="panel-body">
                    <?php foreach($product as $value) {?>
                    <div class="col-md-4">
                        <div class="thumbnail">
                            <img style="height: 150px" src="uploads/<?php echo $value['imgae']?>" alt="">
                            <div class="caption">
                                <h3><?php echo $value['name'] ?></h3>
                                <p>
                                    <span><?php echo number_format($value['gia'])?></span>VNĐ
                                </p>
                                <p class="">
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
                    <?php } ?>

                </div>
            </div>
        </div>
    </div>
</div>

<?php
include 'footer.php'
?>