<?php
    require './conn.php';
    require 'function.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="form.css">
    <title>ĐĂNG KÝ</title>
</head>
<body>
<div class="container-LG">
    <div class="control">
            <a href="#">&larr;Trở lại Trang Chủ</a>
    </div>
    <div class="box">
        <?php
        if (isset($_POST['pass'])){
            $username=$_POST['user'];
            $password = $_POST['pass']; 
            $loai_tk = $_POST['loai'];
            $hashed_password = password_hash( $password, PASSWORD_DEFAULT);
        } 
        if (isset($_POST['submit'])){   
            if ($username == "" || $password == "") {
                echo "<i>Vui lòng nhập đầy đủ thông tin! </i>";
            }else{
                $sql = "INSERT INTO taikhoan (TK_TEN,TK_MATKHAU,LOAI_MA) VALUES ('$username','$hashed_password','$loai_tk')";
                $themtk= mysqli_query($conn,$sql);
                if ($themtk){
                        echo "<i>Bạn đã Đăng ký thành công!</i>";
                        echo "<a href='dangnhap.php'> Click để Đăng nhập vào hệ thống!</a>";
                        exit();
                }else{
                    echo "thất bại!";
                }   
            }
            $l=xacthuc($username,$conn);
            $k=mysqli_num_rows($l);
            if($k > 0){
                echo "<i>Tên đăng nhập này đã có người dùng. Vui lòng chọn tên đăng nhập khác!</i>";
            }
            
        }
        ?>    
    </div>    
    <div class="body">
        
        <div class="form">
            <form method="POST" action="<?php $_SERVER['PHP_SELF']?>">
                <h1>ĐĂNG KÝ</h1><h2>TÊN CỬA HÀNG</h2>  

                <label>Tên đăng ký</label><br>
                <div class="text_group">
                    <input type="text" name="user" placeholder="Nhập vào tên đăng nhập"><br>
                </div>

                <label>Mật khẩu</label><br>
                <div class="text_group">
                    <input type="password" name="pass" placeholder="Nhập vào mật khẩu"><br>
                </div>
                <input type="hidden" name="loai" value="0">
                
                <input type="submit" name="submit" value="Đăng Ký" class="btn">
                <div class="hint">Bạn đã có tài khoản?<a href="dangnhap.php">Đăng nhập</a></div>
            </form>
        </div>    
    </div> 
     
</div>     
</body>
</html>