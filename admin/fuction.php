<?php

function loai($conn)
{
    $sql = "SELECT * FROM danhmuc ;";
    return mysqli_query($conn, $sql);
}
function layspid($idsp, $conn)
{
    $sql = "SELECT * FROM sanpham where SP_MA='$idsp';";
    return mysqli_query($conn, $sql);
}
function them($tensp, $giasp, $hinhanh, $thongsokt, $idloai, $conn)
{
    $sql = "INSERT INTO `sanpham` (`idsp`, `tensp`, `giasp`, `hinhanh`, `thongsokt`, `idloai`) VALUES (NULL, '$tensp', '$giasp', '$hinhanh', '$thongsokt', '$idloai');";
    return mysqli_query($conn, $sql);
}
function update($idsp, $tensp, $giasp, $thongsokt, $conn)
{
    $sql = "UPDATE `sanpham` SET `SP_TEN` = '$tensp', `SP_GIA` = '$giasp',`SP_MOTA` = '$thongsokt' WHERE `SP_MA` = '$idsp';";
    return mysqli_query($conn, $sql);
}
function updateloai($idloai, $idsp, $conn)
{
    $sql = "UPDATE `sanpham` SET `DM_MA` = '$idloai' WHERE `sanpham`.`SP_MA` = $idsp;";
    return mysqli_query($conn, $sql);
}

function xoa($idsp, $conn)
{
    $sql = "DELETE FROM `sanpham` WHERE `sanpham`.`SP_MA` = '$idsp'";
    return mysqli_query($conn, $sql);
}
function laysp($conn)
{
    $sql = "SELECT* FROM sanpham ;";
    return mysqli_query($conn, $sql);
}
function themmk($user, $pass, $conn)
{
    $sql = "INSERT INTO `taikhoan` (`user`, `pass`) VALUES ('$user', '$pass');";
    return mysqli_query($conn, $sql);
}

function laygiohang($key, $conn)
{
    $sql = "SELECT * FROM `sanpham` WHERE `idsp` IN ($key)";
    return mysqli_query($conn, $sql);
}
function timkiem($search, $fullname, $conn)
{
    $sql = "SELECT * FROM `sanpham` WHERE `tensp` LIKE '%$search%'$fullname";
    return mysqli_query($conn, $sql);
    //  UNION SELECT * FROM `sanpham` WHERE `giasp` LIKE '%$search%' OR 'thongsokt' LIKE '%$search%'
}
function layanh($anh, $id, $conn)
{
    $sql = "update sanpham set SP_ANH = '$anh' where SP_MA ='$id'";
    return mysqli_query($conn, $sql);
}
function layanhgg($anh, $id, $conn)
{
    $sql = "UPDATE `magiamgia` SET `GG_ANH` = '$anh' WHERE `magiamgia`.`GG_MA` = '$id';";
    return mysqli_query($conn, $sql);
}
function laytenloai($idsp, $conn)
{
    $sql = "SELECT * FROM sanpham,loaisanpham WHERE sanpham.idloai=loaisanpham.idloai and sanpham.idsp=$idsp;";
    return mysqli_query($conn, $sql);
}
function laykhachhang($conn)
{
    $sql = "SELECT * FROM khachhang ;";
    return mysqli_query($conn, $sql);
}
function xoakhachhang($idkh, $conn)
{
    $sql = "DELETE FROM `khachhang` WHERE `khachhang`.`KH_MA` = $idkh";
    return mysqli_query($conn, $sql);
}
function update_lienhe($diachi, $sodienthoai, $email, $facebook, $dieukhoan, $idlienhe,$bando, $conn)
{
    $sql = "UPDATE `lienhe` SET `LH_DIACHI` = '$diachi', `LH_SDT` = '$sodienthoai', `LH_EMAIL` = '$email', `LH_FACE` = '$facebook', `LH_DIEUKHOAN` = '$dieukhoan', `LH_BANDO` = '$bando' WHERE `lienhe`.`LH_MA` = $idlienhe;";
    return mysqli_query($conn, $sql);
}
function laylienhe($conn)
{
    $sql = "SELECT * FROM lienhe ;";
    return mysqli_query($conn, $sql);
}
function laylienheid($idlh, $conn)
{
    $sql = "SELECT * FROM lienhe where LH_MA =$idlh ;";
    return mysqli_query($conn, $sql);
}
function laytaikhoan($idten, $conn)
{
    $sql = "SELECT * FROM `taikhoan` WHERE `TK_TEN` = '$idten';";
    return mysqli_query($conn, $sql);
}
function layloaitaikhoan($conn)
{
    $sql = "SELECT * FROM `loaitaikhoan`";
    return mysqli_query($conn, $sql);
}
function capnhatphanquyen($idten, $idloaiquyen, $conn)
{
    $sql = "UPDATE `taikhoan` SET `LOAI_MA` = '$idloaiquyen' WHERE `taikhoan`.`TK_TEN` = '$idten';";
    return mysqli_query($conn, $sql);
}
function laytintuc($conn)
{
    $sql = "SELECT * FROM tintuc;";
    return mysqli_query($conn, $sql);
}
function update_tintuc($tieude, $noidung, $idtt, $conn)
{
    $sql = "UPDATE `tintuc` SET `TT_TEN` = '$tieude', `TT_NOIDUNG` = '$noidung' WHERE `tintuc`.`TT_MA` = $idtt;";
    return mysqli_query($conn, $sql);
}

function layanhtintuc($anh, $id, $conn)
{
    $sql = "update tintuc1 set TT_HINHANH = '$anh' where TT_MA ='$id'";
    return mysqli_query($conn, $sql);
}
function laytintuctheoid($idtt, $conn)
{
    $sql = "SELECT * FROM `tintuc` WHERE TT_MA =$idtt;";
    return mysqli_query($conn, $sql);
}
function themtintuc($ten, $anh, $noidung, $conn)
{
    $sql = "INSERT INTO `tintuc` (`TT_MA`, `TT_TEN`, `TT_HINHANH`, `TT_NOIDUNG`) VALUES (NULL, '$ten', '$anh', '$noidung');";
    return mysqli_query($conn, $sql);
}
function xoatintuc($idtt, $conn)
{
    $sql = "DELETE FROM `tintuc` WHERE `tintuc`.`TT_MA` = $idtt";
    return mysqli_query($conn, $sql);
}
function layhoadon($conn)
{
    $sql = "SELECT * FROM `hoadon`";
    return mysqli_query($conn, $sql);
}
function xoahoadon($idhd, $conn)
{
    $sql = "DELETE FROM `hoadon` WHERE `hoadon`.`HD_MA` = $idhd";
    return mysqli_query($conn, $sql);
}
function xoachitiethoadon($idhd, $conn)
{
    $sql = "DELETE FROM `chitiethoadon` WHERE `chitiethoadon`.`HD_MA` = $idhd";
    return mysqli_query($conn, $sql);
}
function themsanpham($ten, $gia, $hinhanh, $noidung, $idloai, $conn)
{
    $sql = "INSERT INTO `sanpham` (`SP_MA`, `SP_TEN`, `SP_GIA`, `SP_ANH`, `SP_MOTA`, `DM_MA`) VALUES (NULL, '$ten', '$gia', '$hinhanh', '$noidung', '$idloai');";
    return mysqli_query($conn, $sql);
}
function themlienhe($diachi, $sodienthoai, $email, $facebook, $dieukhoan,$bando, $conn)
{
    $sql = "INSERT INTO `lienhe` (`LH_MA`, `LH_DIACHI`, `LH_SDT`, `LH_EMAIL`, `LH_FACE`, `LH_DIEUKHOAN`, `LH_BANDO`) VALUES (NULL, '$diachi', '$sodienthoai', '$email', '$facebook', '$dieukhoan', '$bando');";
    return mysqli_query($conn, $sql);
}
function xoalienhe($idhd, $conn)
{
    $sql = "DELETE FROM `lienhe` WHERE `lienhe`.`LH_MA` = $idhd";
    return mysqli_query($conn, $sql);
}
function laytencthd($idsp ,$conn)
{
    $sql="SELECT * FROM sanpham,chitiethoadon WHERE sanpham.SP_MA=chitiethoadon.SP_MA and sanpham.SP_MA=$idsp;";
    return mysqli_query($conn,$sql) ;

}
function tatkn($conn){

    $sql="SET GLOBAL FOREIGN_KEY_CHECKS=0;";
    return mysqli_query($conn,$sql);

}
function batkn($conn){

    $sql="SET GLOBAL FOREIGN_KEY_CHECKS=1;";
    return mysqli_query($conn,$sql);

}
function xoagiamgia($idgg,$conn){
    $sql="DELETE FROM `magiamgia` WHERE `magiamgia`.`GG_MA` = '$idgg'";
    return mysqli_query($conn,$sql);

}
function updateduyet($idduyet,$idtt,$conn){
    $sql="UPDATE `hoadon` SET `TT_MA` = '$idtt' WHERE `hoadon`.`HD_MA` = $idduyet;";
    return mysqli_query($conn,$sql);
}
function xoadanhmuc($iddm,$conn){
    $sql="DELETE FROM `danhmuc` WHERE `danhmuc`.`DM_MA` = $iddm";
    return mysqli_query($conn,$sql);
}
function themdanhmuc($tendm,$noidung,$conn){
    $sql="INSERT INTO `danhmuc` (`DM_MA`, `DM_TEN`, `DM_MOTA`) VALUES (NULL, '$tendm', '$noidung');";
    return mysqli_query($conn,$sql);

}
function suadanhmuc($iddm,$tendm,$motadm,$conn){
    $sql="UPDATE `danhmuc` SET `DM_TEN` = '$tendm', `DM_MOTA` = '$motadm' WHERE `danhmuc`.`DM_MA` = $iddm;";
    return mysqli_query($conn,$sql);

}
function laydanhmuc($iddm,$conn){
    $sql="SELECT * FROM `danhmuc` WHERE DM_MA = $iddm;";
    return mysqli_query($conn,$sql);

}


function hienmagiamgia($conn){
    $sql="SELECT * FROM magiamgia;";
    return mysqli_query($conn,$sql);
}
function ttgg($maGG,$mattGG,$conn)
{
    $sql="UPDATE `magiamgia` SET `TT_MATT` = '$mattGG' WHERE `magiamgia`.`GG_MA` = '$maGG';";
    return mysqli_query($conn,$sql);

}
function themmgg($magg,$tengg,$nbatdau,$nketthuc,$ptgg,$ggghichu,$anh,$conn){
    $sql="INSERT INTO `magiamgia` (`GG_MA`, `GG_TEN`, `GG_BATDAU`, `GG_KETHUC`, `GG_PHANTRAM`, `TT_MATT`, `GG_GHICHU`, `GG_ANH`) VALUES ('$magg', '$tengg', '$nbatdau', '$nketthuc', '$ptgg', '0', '$ggghichu', '$anh');";
    return mysqli_query($conn,$sql);
}
function hienmagiamgiaid($idgg,$conn){
    $sql="SELECT * FROM magiamgia where GG_MA='$idgg';";
    return mysqli_query($conn,$sql);
}
function capnhatmagg($maggc,$maggm,$tengg,$nbatdau,$nketthuc,$ptgg,$ggghichu,$conn){
    $sql="UPDATE `magiamgia` SET `GG_MA` = '$maggm', `GG_TEN` = '$tengg', `GG_BATDAU` = '$nbatdau', `GG_KETHUC` = '$nketthuc', `GG_PHANTRAM` = '$ptgg', `TT_MATT` = '0', `GG_GHICHU` = '$ggghichu' WHERE `magiamgia`.`GG_MA` = '$maggc';";
    return mysqli_query($conn,$sql);
}
