<?php
function sanphamnoibat($conn) 
{
    $sql="SELECT * FROM `sanpham`ORDER BY SP_MA ASC LIMIT 8;";
    return mysqli_query($conn,$sql);
}
function tra($conn) 
{
    $sql="SELECT * FROM `sanpham` WHERE DM_MA ='1';";
    return mysqli_query($conn,$sql);
}
function danhmucten($id,$conn) 
{
    $sql="SELECT * FROM `danhmuc` WHERE DM_MA = $id;";
    return mysqli_query($conn,$sql);
}
function thucduong($conn) 
{
    $sql="SELECT * FROM `sanpham` WHERE DM_MA ='3';";
    return mysqli_query($conn,$sql);
}
function nuocuongkhac($conn) 
{
    $sql="SELECT * FROM `sanpham` WHERE DM_MA ='4';";
    return mysqli_query($conn,$sql);
}
function monanvat($conn) 
{
    $sql="SELECT * FROM `sanpham` WHERE DM_MA ='5';";
    return mysqli_query($conn,$sql);
}
function detox($conn) 
{
    $sql="SELECT * FROM `sanpham` WHERE DM_MA ='2';";
    return mysqli_query($conn,$sql);
}
function layspid($spma,$conn)
{
    $sql ="SELECT * FROM `sanpham` WHERE SP_MA ='$spma';";
    return mysqli_query($conn,$sql);
}
function laygiohang($key,$conn)
{
   $sql= "SELECT * FROM `sanpham` WHERE `SP_MA` IN ($key)";
   return mysqli_query($conn,$sql) ;
}
function giamgia($key,$conn){
    $sql= "SELECT * FROM `magiamgia` WHERE `GG_MA` = '$key'AND TT_MATT ='1'; ";
    return mysqli_query($conn,$sql) ;
}
function tatkhoangoai($conn)
{
    $sql="SET GLOBAL FOREIGN_KEY_CHECKS=0;";
    return mysqli_query($conn,$sql);
}
function batkhoangoai($conn)
{
    $sql="SET GLOBAL FOREIGN_KEY_CHECKS=1;";
    return mysqli_query($conn,$sql);
}
function lienhe($conn)
{
    $sql="SELECT * FROM `lienhe`;";
    return mysqli_query($conn,$sql);
}
function gioithieu($conn)
{
    $sql ="SELECT * FROM `tintuc` ";
    return mysqli_query($conn,$sql);

}
function danhmucdau($conn)
{
    $sql ="SELECT * FROM danhmuc LIMIT 0,1; ";
    return mysqli_query($conn,$sql);


}
function danhmuctatca($conn)
{
    $sql ="SELECT * FROM danhmuc LIMIT 1,20; ";
    return mysqli_query($conn,$sql);


}
?>