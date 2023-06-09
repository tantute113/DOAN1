<?php 
$host="localhost";
$user="root";
$pass="";
$db="doan3";
$conn=mysqli_connect($host,$user,$pass,$db)  ;
if(!$conn)
{
    echo "kết nối nối bị lỗi" ; 
}
?>