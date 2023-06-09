<?php
require '../conn.php';
session_start();
if(!isset($_SESSION['user'])){
    header("Location:../form/dangnhap.php");
}
if(isset($_SESSION['user_admin'])){
    header("Location:../admin/index-ad.php");
}else{
    if(isset($_SESSION['user'])){
        header("Location:demo.html");
    }
}
?>
