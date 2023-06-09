<?php
require 'conn.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div>
        <?php
        session_start();
        if (!isset($_SESSION['user_admin'])) {
            header("Location:../admin/admin.php");
        }echo "Xin chào ".$_SESSION['user_admin'];
        ?>   
        <a href="dangxuat.php">ĐĂNG XUẤT</a>
    </div>
    
</body>
</html>