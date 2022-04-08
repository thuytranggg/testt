<?php include 'header.php';
  if(isset($_GET['sp']))
        $slug = $_GET['sp'];
  $product = mysqli_query($conn, "SELECT * from sanpham WHERE `slug` = '$slug'");
    $data = mysqli_fetch_assoc($product);
?>



<div class="container">
    <div class="row">
        <div class="col-md-2">

        </div>
        <div class="col-md-10">
            <div class="panel panel-info" style="border-color: #ccc">
                <div class=" panel-heading" style="background-color:#ffbc0d">
                    <h3 class="panel-title" style="color:black;font-size:21px ;text-align:center">Chi tiết sản phẩm
                    </h3>
                </div>
                <div class="panel-body">

                    <div class="media">
                        <a class="pull-left" href="#">
                            <img style="width:400px" class="media-object" src="uploads/<?php echo $data['imgae']?>"
                                alt="Image">
                        </a>
                        <div class="media-body " style="padding-left:20px">
                            <h4 style=" font-size: 24px; font-weight: 700;
                                padding-top: 16px;  text-transform: uppercase;" class="media-heading">
                                <?php echo $data['name']?></h4>
                            <form action="./giohang.php" method="get">
                                <p style="color: red; font-size: 28px; margin-bottom: 18px;
                                padding-top: 16px;"> <?php echo number_format( $data['gia']) ?>
                                    <span></span> VNĐ
                                </p>
                                <p style="font-size: 15px; border-top: 1px dashed #c4c4c4; margin-bottom: 18px;
                                padding-top: 16px;"> <?php echo $data['detail']?>
                                </p>
                                <input type="number" value="1" name="quantity">
                                <input type="hidden" name="id" value="<?php echo $data['id']?>">
                                <p></p>
                                <p>
                                    <button style="width:100px; font-size: 15px;background-color:#ffbc0d; color:black"
                                        type="submit" class="btn btn-warning btn-lg">Mua</button>
                                </p>
                            </form>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

<?php include 'footer.php' ?>