<?php
    require "conn.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ĐĂNG KÝ</title>
    <link rel="stylesheet" href="./sigup.css">
    <script src="https://kit.fontawesome.com/3cf6918e55.js" crossorigin="anonymous"></script>

</head>

<body>

    <div class="from">
        <form method="POST" class="label">
            <h1>Đăng Ký <a href="./index.php"><i style="color: white;" class="fas fa-sign-out-alt"></i></a></h1>
            <label for="user">Tên người dùng:</label>
            <input type="text" name="user" id="user" placeholder="vui lòng nhập tên" value="<?php if(!empty($_POST['user'])){echo $_POST['user']; } ?>">
            <label for="telephone">Số điện thoại:</label>
            <input type="text" pattern="(0)\d{9}" name="tel" id="telephone" placeholder="nhập đủ 10 chữ số" value="<?php if(!empty($_POST['tel'])){echo $_POST['tel']; } ?>">
            <label for="date">Ngày sinh:</label>
            <input name="date" id="date" type="date" min="1980-01-01" max="2010-01-01" value="<?php if(!empty($_POST['date'])){echo $_POST['date']; } ?>">
            <label for="text">Địa chỉ:</label>
            <textarea name="address" id="text" cols="30" rows="5"><?php if(!empty($_POST['address'])){echo $_POST['address']; } ?></textarea>
            <label for="password">Mật khẩu:</label>
            <input type="password" name="pass" id="password" placeholder="vui lòng nhập....."value="<?php if(!empty($_POST['pass'])){echo $_POST['pass']; } ?>">
            <label for="password1">Nhập lại mật khẩu:</label>
            <input type="password" name="pass-repeat" id="password1" placeholder="vui lòng nhập."value="<?php if(!empty($_POST['pass-repeat'])){echo $_POST['pass-repeat']; } ?>">
            <input type="hidden" name="loai" value="0">
            <input id="reset" type="reset" value="Reset">
            <input type="submit" name="submit" value="Đăng kí">
            <p><?php if(!empty($error)){echo $error ;} ?></p>
        </form>
    </div>
    <div class="box">
        <?php
        function xacthuc($user,$conn){
            $sql="select * from taikhoan where TK_TEN='$user'";
            return mysqli_query($conn,$sql);
        }

            if (isset($_POST['submit'])){   
                if (isset($_POST['user'])&&!empty($_POST['user'])&&isset($_POST['tel'])&&!empty($_POST['tel'])&&isset($_POST['tel'])&&!empty($_POST['tel'])&&isset($_POST['pass'])&&!empty($_POST['pass'])&&isset($_POST['pass-repeat'])&&!empty($_POST['pass-repeat'])) {
                    $username= addslashes($_POST['user']);
                    $l=xacthuc($username,$conn);
                    $k=mysqli_num_rows($l);
                    $tel=addslashes($_POST['tel']);
                    $address= addslashes($_POST['address']);
                    $password = $_POST['pass']; 
                    $rpassword = $_POST['pass-repeat'];
                    $loai_tk = $_POST['loai'];
                    $date=$_POST['date'];
                    $hashed_password = password_hash( $password, PASSWORD_DEFAULT);
                    if($password != $rpassword){
                        echo '<script>alert("mật khẩu nhập lại không đúng")</script>';
                        exit();
                    }
                    else if($k > 0){
                        echo '<script>alert("Tên người dùng đã tồn tại vui lòng nhập lại !")</script>';
                        exit();
                    }else{
                        $sqll="SET FOREIGN_KEY_CHECKS=0;";
                        $t=mysqli_query($conn,$sqll);
                        $sql = "INSERT INTO `taikhoan` (`TK_TEN`, `TK_MATKHAU`, `LOAI_MA`, `TK_DATE`, `TK_DIAC`, `TK_SDT`) VALUES ('$username', '$hashed_password', '2', '$date', '$address', '$tel');";
                        $themnew= mysqli_query($conn,$sql);
                        echo '<script>alert("Đăng ký thành công !")</script>';
                        header( "refresh:2;url=loginform.php" );
                      exit();

                        



                    }
                } else{
           echo '<script>alert("bạn chưa nhập đủ thông tin !")</script>';
                }
                
            }
            

        
    
                
            
        ?>    
    </div>
    
</body>

</html>