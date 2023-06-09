<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

<style type="text/css">
*{
    padding: 0;
    margin: 0;
    font-family: sans-serif;
}
.left-ad{
    
    margin-left: 30px;
    background-color: rgb(18,16,29);
    border-radius: 10px;
   border: 5px solid white;
    float: left;
    width: 200px;
    text-align: left;
height: auto;
    
}

.left-ad ul li{
  width: 100%;
    height: 30px;
   color: white;
    list-style-type: none;
    padding-top: 15px;
    transition: all 0.2s ease-in-out;
}
.left-ad ul li:hover{
background-color: black;
}
.left-ad ul li a{
    margin-left: 20px;
     color: white;
    text-decoration: none;
}
#title{
    line-height: 30px ;
    text-align: center;
    border-radius: 10px;
   
}

</style>
</head>
<body>
    <div class="container-lc">
     <div class="left-ad">
     <ul>
     
  <li><a href="?action=product">Quản lí sản phẩm</a></li>
  <li><a href="?action=khachhang">Quản lí Khách hàng</a></li>
  <li><a href="?action=tintuc">Quản lí tin tức</a></li>
  <li><a href="?action=hoadon">Quản lí hóa đơn</a></li>
  <li><a href="?action=cthd">Chi tiết hóa đơn</a></li>
  <li><a href="?action=lienhe">Quản lí liên hệ</a></li>
  <li><a href="?action=phanquyen">Phân quyền</a></li>
  <li><a href="?action=danhmuc">Quản lí Danh mục</a></li>
  <li><a href="?action=giamgia">Quản lí mã giảm giá</a></li>

  
  <li><a href="?action=''">Trang chủ</a></li>
  <li><a onclick=" return dangxuat() " href="?action=dangxuat">Đăng xuất</a></li>
     </ul>
   </div>
    </div>
</body>
</html>