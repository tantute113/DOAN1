<!DOCTYPE html>
<html>
<head>
    <title>ĐĂNG XUẤT</title>
</head>
<body>
    <?php
    session_start();
    unset($_SESSION['user_admin']);
    unset($_SESSION['user']);
    header("location:dangnhap.php");
    ?>
</body>
</html>
