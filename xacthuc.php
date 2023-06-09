<?php

session_start();
if(!isset($_SESSION['user_admin'])){
    header("Location:../form/dangnhap.php");
}
?>