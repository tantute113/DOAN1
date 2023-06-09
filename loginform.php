<?php
require "conn.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ĐĂNG NHẬP</title>
    <link rel="stylesheet" href="./loginform.css">
    <script src="https://kit.fontawesome.com/3cf6918e55.js" crossorigin="anonymous"></script>
</head>

<body>

    <div class="from">
        <form method="POST" class="label">
            <h1>Đăng Nhập <a href="./index.php"><i style="color: white;" class="fas fa-sign-out-alt"></i></a></h1>
            <label for="user">Tên người dùng:</label>
            <input type="text" name="user" id="user" placeholder="vui lòng nhập tên" value="<?php if(isset($_POST['user'])){echo $_POST['user'];}?>">

            <label for="telephone">Mật khẩu:</label>
            <input type="password" name="pass" id="telephone" placeholder="vui lòng nhập mật khẩu">
            <input type="submit" name="submit" value="Đăng Nhập">
            <br>
            <div class="why"><a href="./signup.php">Bạn chưa có tài khoản</a></div>
        </form>


    </div>
    <div class="box">
        <?php
        function xacthuc($user, $conn)
        {
            $sql = "select * from taikhoan where TK_TEN='$user';";
            return mysqli_query($conn, $sql);
        }
        if (isset($_POST['submit'])) {
            if(isset($_POST['pass']) && !empty($_POST['pass'])&&isset($_POST['user']) && !empty($_POST['user']))
            {
            $username = addslashes($_POST['user']);
            $password = $_POST['pass'];
            $hashed_password = password_hash($password, PASSWORD_DEFAULT);
            $XT = xacthuc($username, $conn);
            if (mysqli_num_rows($XT) == 1) {
                $KQ = mysqli_fetch_array($XT);
                if (password_verify($password, $KQ['TK_MATKHAU'])) {
                    if ($KQ['LOAI_MA'] =='1') {
                        session_start();
                        $_SESSION['user_admin'] = $username;
                        header("Location:admin/index-ad.php");
                    } elseif ($KQ['LOAI_MA'] =='2'){
                        session_start();
                        $_SESSION['user'] = $username;
                        header("Location:index.php");
                    }
                }else{
                    echo "<script type='text/javascript'>alert('nhập không đúng mật khẩu');</script>";
                }
                
                
            }else{
                echo "<script type='text/javascript'>alert('chưa nhập đúng tên người dùng');</script>";
            }
        }else{
            echo "<script type='text/javascript'>alert('Nhập chưa đủ thông tin ');</script>";
        }
       
    }
        ?>
    </div>
</body>

</html>