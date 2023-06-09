<?php
$host="localhost";
$username="root";
$password="";
$database="doan3";
$conn= mysqli_connect($host, $username,$password,$database);
mysqli_query($conn,"SET NAMES 'utf8'");
if(!$conn){
        echo 'Khong ket noi duoc!';
}
?>