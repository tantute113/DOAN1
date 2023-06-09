<?php
    include "./conn.php";
    require 'function.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="form.css">
    <title>ĐĂNG NHẬP</title>
</head>
<body>
    <div class="container-LG">
        <div class="control">
            <a href="#">&larr;Trở lại Trang Chủ</a>
        </div>
        
        <div class="body">
            <div class="form">
                <form method="POST" action="<?php $_SERVER['PHP_SELF']?>">
                    <h1>ĐĂNG NHẬP</h1><h2>TÊN CỬA HÀNG</h2>
                    <label>Tên đăng nhập</label><br>
                    <div class="text_group">
                        <input type="text" name="user" placeholder="Nhập vào tên đăng nhập"><br>
                    </div>

                    <label>Mật khẩu</label><br>
                    <div class="text_group">
                        <input type="password" name="pass" placeholder="Nhập vào mật khẩu" ><br>
                    </div>

                    <input type="submit" name="submit" value="Đăng nhập" class="btn">
                    <div class="hint">Bạn chưa có tài khoản?<a href="dangky.php">Đăng ký</a></div>
                </form>
            </div>    
        </div>
        <div class="box">
            <?php
            if(isset($_POST['submit'])){
                $username =$_POST['user'];
                $password = $_POST['pass']; 
                $hashed_password = password_hash( $password, PASSWORD_DEFAULT);
                $XT=xacthuc($username ,$conn);
                if(mysqli_num_rows($XT)==1){
                    $KQ=mysqli_fetch_array($XT);
                    if(password_verify($password,$KQ['TK_MATKHAU'])){
                        if($KQ['LOAI_MA']== '1'){
                            session_start();
                            $_SESSION['user_admin']=$username;
                            if(isset($_SESSION['user_admin'])){
                                header("Location:../admin/index-ad.php");
                            }
                        }else{
                            session_start();
                            $_SESSION['user']=$username;
                            if(isset($_SESSION['user'])){
                                header("Location:../product/index.php");
                            }
                        }
                    }else{
                        echo 'Đăng nhập không thành công!';
                    }
                }    
            }
            
            ?>   
        </div>
        
    </div>
    

</body>
</html>