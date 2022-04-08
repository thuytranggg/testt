//khai báo 2 biến toàn cục lưu vị trí ảnh và mảng chứa tên file ảnh cần hiện thị 
var i=0;// vị trí ảnh đang hiển thị trong mảng
var hinhanh= new Array("vid1.jpg","vid2.jpg","vid3.jpg");//khai báo mảng chứa tên file ảnh cần hiển thị

//xây dựng hàm hiện thị ảnh tại vị trí i và tăng i sau mỗi khoảng thời gian
function SlideShow()
{
    //tham chiếu đến thẻ <img id=anh_slide>
    anh = document.getElementById("anh_slide");
    anh.src = "img/" + hinhanh[i];//thay thuộc tính src để hiển thị ảnh mới
    //tăng biến i lên 1 đơn vị để chuẩn bị hiển thị ảnh kế tiếp
    i++;
    //nếu i bằng lenght là số phần tử của mảng thì gán trở về bằng 0(ảnh đầu)
    if(i >= hinhanh.length)
        i=0;
    //hẹn giờ để gọi lại hàm Slideshow
    window.setTimeout("SlideShow()",2000);
}

