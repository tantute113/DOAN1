<?php
function xacthuc($user,$connec){
    $sql="select * from taikhoan where TK_TEN='$user' and ( LOAI_MA='1' or LOAI_MA='0');";
    return mysqli_query($connec,$sql);
}
/*=========================================================================================================*/
?>