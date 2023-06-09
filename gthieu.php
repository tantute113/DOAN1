<?php  
require "./conn.php";
require "./funtion.php";


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="index.css">
    <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Dancing+Script" />
    <link rel="icon" type="image/x-icon" href="icons/tea-icon.jpg" />
    <title>HOA YÊN TEA</title>
    <style>
        .slide-auto-gioithieu{
            padding-top: 100px;
            padding-bottom: 20px;
            text-align: center;
            background-color: whitesmoke;
            width: 100%;
        }
        .slide-auto-gioithieu img{
            height: 600px;
            width: 80%;
            border-radius: 10px;
            object-fit: cover;
        }
        .nametag{
            height: 40px;
            width:100%;
        }
        .nametag h1{
            text-align: center;
            line-height: 50px;
            font-family: "Dancing Script";
        }
        .gioithieu1{
            margin-top: 20px;
          height: auto;
            width:100%;
            margin-bottom: 20px;
            display: flex;
            justify-content:center;
        }
        .hinh1{
            float:left;
            width:40%;
        }
        .hinh1 img{
            height: 400px;
            border-radius: 10px;
            width:99%;
            object-fit: cover;
        }
        .vanban1{
            margin-top:60px ;
            margin-left:40px ;
            text-align: justify;
            width:40%;
        }
        h3{
            font-weight:200;
        }
        .gioithieu2{
            margin-top: 20px;
            height: auto;
            width:100%;
            margin-bottom: 20px;
            display: flex;
            justify-content:center;
        }
        .hinh2{
            float:left;
            width:40%;
        }
        .hinh2 img{
            height: 400px;
            border-radius: 10px;
            width:99%;
            object-fit: cover;
        }
        .vanban2{
            margin-top:60px ;
            margin-right:40px ;
            text-align: justify;
            width:40%;
        }
        #cauchuyen{
        background-color:rgb(131, 88, 47) ;
        }
        @media screen and (max-width: 480px) {
            .container{
                width: 100%;
            }
            .menu{
                width: 100%;
            }
            .content{
               height: auto;
                width: 100%;
            }
            .nametag h1{
                font-size: larger;
            }
            .footer{
                height: 50%;
                width: 100%;
            }
            .slogan{
                margin: 0 auto;
            }
            .main-slogan h1{
                font-size: medium;
            }
            .footer-con{
                height: 50%;
                width: 90%;
                margin: 0 auto;
            }
            .footer-con h4{
                font-size: small;
                margin: 0 auto;
            }
            .btn-ontop{
                height: 40%;
                width: 90%;
                margin: 0 auto;
                float: none;
            }
            .btn-ontop a{
                padding-left: 24px;
                font-size: smaller;
            } 
            .slide-auto-gioithieu{
                height: 250px;
                width: 100%;
            }
            .slide-auto-gioithieu img{
                height: 90%;
                width: 99%;
            }
            .gioithieu1{
                height: 400px;
                width: 100%;
                display: block;
            }
            .hinh1{
                height: 300px;
                width:99%;
            }
            .hinh1 img{
                height: 80%;
                width: 100%;
                float: left;
            }
            .vanban1{
                height: 320px;
                width: 90%;
                float: left;
                margin-top: 0px;
                margin-left: 5px;
                font-size: small;
            }
            .gioithieu2{
                height: 400px;
                width: 100%;
                display: block;
            }
            .hinh2{
                height: 300px;
                width:99%;
            }
            .hinh2 img{
                height: 80%;
                width: 100%;
                float: left;
            }
            .vanban2{
                height: 320px;
                width: 90%;
                float: left;
                margin-top: 5px;
                margin-left: 5px;
                font-size: small;
            }
        }
        @media screen and (max-width: 736px) {
            .btn-ontop{
                height: 30%;
                width: 48%;
                margin: 0 auto;
                float: none;
            }
            .btn-ontop a{
                padding-left: 15px;
                font-size: smaller;
            } 
            .gioithieu1{
                margin-bottom: 180px;
            }
            .gioithieu2{
                margin-top: 50px;
            }
            .content{
                width: 100%;
                height: auto;
            }
        }
        @media screen and (min-width: 768px) {
            .content{
                width: auto;
            }
            .slide-auto-gioithieu{
                width: 100%;
            }
            .footer{
                width: 100%;
            }
            .slogan{
                margin: 0 auto;
            }
            .gioithieu1{
              height: auto;
                margin-bottom: 25px;
            }
            .vanban2{
                margin-top: 25px;
            }
        }

        .icon_mobile {
            display: none;
        }

        .close {
            display: none;
        }

        .over_lay {
            position: fixed;
            top: 0;
            right: 0;
            bottom: 0;
            left: 0;
            background-color: rgba(0, 0, 0, 0.3);
            display: none;

        }

        .close {
            display: block;
        }

        .mobile_nav {
            transform: translateX(-100%);
            z-index: 9999999999;
            position: fixed;
            top: 0;
            bottom: 0;
            left: 0;
            background-color: darkkhaki;
            width: 320px;
            max-width: 100%;
            height: auto;
            transition: transform linear 0.3s;

        }

        ul.mobile_ul {
            text-align: center;
            z-index: 9999999999999999;
            margin: 0 auto;
            width: 320px;
            max-width: 100%;
            display: block;
            color: black;
            text-decoration: none;
        }

        .mobile_ul li {
            height: 60px;
            padding-left: 0px;
            margin-left: 0px;
            width: 100%;

        }

        .mobile_ul li a {
            color: white;
        }

        .nav_input:checked~.over_lay {
            display: block;

        }

        .icon_mobile {

            float: left;
        }

        .nav_input:checked~.mobile_nav {
            transform: translateX(0%);
        }
        @media (max-width:1019px) {
            .icon_mobile {
                margin-top: 10px;
                margin-left: 10px;
                display: block;
            }
            .pc {
    display: none;
            }

            
        }

        
    </style>

</head>

<body>
    <div class="container">
        <div class="menu">
        <label for="nav_input" class="icon_mobile"><img style="max-width:40px;" src="./icons/menu-button-of-three-horizontal-lines.png" alt=""></label>
            <h1>Hoa Yên</h1>
            <ul class="pc">
                <li><a href="index.php">TRANG CHỦ</a></li>
                <li><a href="sanpham.php">SẢN PHẨM</a></li>
                <li id="cauchuyen"><a href="gthieu.php">CÂU CHUYỆN</a></li>
                <li><a href="uudai.php">ƯU ĐÃI</a></li>
                <li><a href="lienhe.php">LIÊN HỆ</a></li>
            </ul>
            <input type="checkbox" hidden id="nav_input" class="nav_input">
            <label for="nav_input" class="over_lay">
            </label>
            <nav class="mobile_nav">
                <label for="nav_input" class="close">
                    <img style="width:15%;" src="./icons/close-button.png" alt="">
                </label>
                <ul class="mobile_ul">
                    <li><a href="index.php">TRANG CHỦ</a></li>
                    <li><a href="sanpham.php">SẢN PHẨM</a></li>
                    <li><a href="gthieu.php">CÂU CHUYỆN</a></li>
                    <li><a href="uudai.php">ƯU ĐÃI</a></li>
                    <li><a href="lienhe.php">LIÊN HỆ</a></li>
                    <li><a href="">ĐĂNG NHẬP</a></li>
                    <li><a href="">ĐĂNG KÍ</a></li>

                </ul>
            </nav>
        </div>
        <div style="clear:both"></div>
        <a name="menu"></a>
        <div class="content">
            <div class="slide-auto-gioithieu">
                <img src="image/hinh3.jpg">
            </div>
            <div class="nametag">
                <h1>Giới Thiệu về Hoa Yên Tea</h1>
            </div>
            <?php $rt=gioithieu($conn);  
             while($rtt=mysqli_fetch_array($rt))
             {
            
            ?>

            <div class="gioithieu1">
                <div class="hinh1"><img src="image/<?php echo $rtt['TT_HINHANH']; ?>"></div>
                <div class="vanban1">
                    <div>
                        <h3>
                           <?php echo $rtt['TT_NOIDUNG'];  ?>
                        </h3>
                    </div>
                </div>
            </div>
          <?php  }?>
        </div>
        <div class="footer">
            <div class="slogan">
                <div class="main-slogan">
                    <h1>Hoa của An Yên</h1>
                </div>
                <div class="main-slogan">
                    <h1>Trà-Cà phê-Ăn chay</h1>
                </div>
            </div>
        </div>
        <div class="footer-con">
            <h4>Đây là trang web thử nghiệm của nhóm sinh viên thuộc Trường ĐH Kỹ Thuật-Công Nghệ Cần Thơ</h4>
            <!-----------------------------btn-ontop----------------------------------------->
            <div class="btn-ontop">
                <a href="#menu">VỀ ĐẦU TRANG</a>
            </div>
        </div>
    </div>
</body>

</html>