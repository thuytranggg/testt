<?php 
    include 'header.php';

    if(isset($_GET['id'])){
        $id = $_GET['id'];
        //thực hiện truy vấn lấy ra bản ghi tương ứng với id get đc
        $product = mysqli_query($conn, "select * from sanpham where id= $id");
        
        $pro = mysqli_fetch_assoc($product);
        // var_dump($pro);
    }
    $category = mysqli_query($conn, "select * from nhom_sp");
    if(isset($_POST['name'])){
        $name = $_POST['name'];
        $slug = $_POST['slug'];
        $gia = $_POST['gia'];
        $id_category = $_POST['id_category'];
        $detail = $_POST['detail'];
        $show = $_POST['show'];
        var_dump($_FILES['imgae']);
        if(empty($_FILES['imgae']['name'])){
            $imgae = $pro['imgae'];
        }else{
            //bước 1 chuyển file từ bộ nhớ tmp_name vào thư mục uploads đã tạo 
         $file = $_FILES['imgae'];
         $file_name = $file['name'];
         move_uploaded_file($file['tmp_name'], '../uploads/'.$file_name);
         $imgae = $file_name;
        }
        //bước 2
        $sql = "update sanpham set `name` = '$name',`slug` = '$slug',`gia`= '$gia',`imgae` ='$imgae',`id_category`= '$id_category',`detail`='$detail', `show` = '$show' where id = $id";        
        $query= mysqli_query($conn, $sql);
        
        echo("<script>location.href = 'sanpham.php?msg=$msg';</script>");

    }
?>

<div class="content-wrapper">
    <section class="content">
        <div class="container-fluid">
            <div class="card card-secondary">
                <div class="card-header">
                    <h3 class="card-title">Sửa sản phẩm</h3>
                </div>
                <div class="card-body">

                    <form action="" method="POST" role="form" enctype="multipart/form-data">
                        <legend>Nhập các thông tin</legend>

                        <div class="form-group">
                            <label for="">Tên sản phẩm</label>
                            <input type="text" class="form-control" id="name" placeholder="Nhập tên sản phẩm"
                                name="name" value="<?php echo $pro['name']?>" onchange=" ChangeToSlug()">
                        </div>
                        <div class="form-group">
                            <label for="">Slug</label>
                            <input type="text" class="form-control" id="slug" placeholder="Nhập tên sản phẩm"
                                name="slug" value="<?php echo $pro['slug']?>">
                        </div>
                        <div class="form-group">
                            <label for="">Giá</label>
                            <input type="text" class="form-control" id="" placeholder="Giá" name="gia"
                                value="<?php echo $pro['gia'] ?>">
                        </div>
                        <div class="form-group">
                            <label for="">Hình ảnh</label>
                            <input type="file" class="form-control" id="" placeholder="Input field" name="imgae">
                            <img src="../uploads/<?php echo $pro['imgae'] ?>" alt="" width="100px">
                        </div>
                        <div class="form-group">
                            <label for="">Danh mục</label>
                            <select id="input" class="form-control" name="id_category">
                                <option value="">----Lựa chọn danh mục----</option>
                                <?php foreach($category as $cate) {?>
                                <option value="<?php echo $cate['id']?>"
                                    <?php echo ($cate['id']==$pro['id_category']) ?'selected' : '' ?>>
                                    <?php echo $cate['name']?></option>

                                <?php } ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="">Chi tiết</label>
                            <input type="text" class="form-control" id="" placeholder="Nhập chi tiết" name="detail"
                                value="<?php echo $pro['detail']?>">
                        </div>
                        <div class="form-group">
                            <label for="">Trạng thái</label>

                            <div class="radio">
                                <label>
                                    <input type="radio" name="show" id="input" value="1"
                                        <?php echo($pro['show'] == 1) ?'checked' : '' ?>>
                                    Hiện
                                </label>
                            </div>
                            <div class="radio">
                                <label>
                                    <input type="radio" name="show" id="input" value="0"
                                        <?php echo($pro['show'] == 0) ?'checked' : '' ?>>
                                    Ẩn
                                </label>
                            </div>
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