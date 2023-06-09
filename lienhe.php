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
        .content{
            background-image: url('image/hinh7.jpg');
            background-size: cover;
            background-repeat: no-repeat;
            z-index: 1;
            height: auto;
        }
        .khung{
            height: auto;
            width: 100%;
            opacity:0.5;
            background-color:black;
            border:5px;
        }
        article {
            height:auto;
            width:95%;
            margin: 0 auto;
            z-index: 2;
        }
       
        h1.thongtin {
            height: 100%;
            width:auto;
            font-weight:lighter;
            background-color:rgb(66,57,48);
            padding-top:120px;
            color:white;
        }
        .diachi{
            height: 40%;
            width:70%;
           
            margin: 0 auto;
            text-align:center;
        }
        .diachi h2{
         background-color: darkkhaki;
            line-height:50px;
            color:white;
        }
        #lienhe{
           
            background-color:rgb(131, 88, 47)
        }

        .icon_mobile {
            margin-top: 10px;
            margin-left: 10px;
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
 @media (max-width:1068px){
     .icon_mobile{
         display: block;
     }
     .pc{
         display: none;
     }
     

 }


        @media screen and (max-width: 480px) {
            .thongtin{
                height: 1200px;
                width: 110%;
                font-size: medium;
            }
            .content{
                width: 100%;
            }
            .diachi iframe{
                height: 20%;
                width: 70%;
            }
            .diachi h2{
                font-size: medium;
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
                height: 30%;
                width: 50%;
                margin: 0 auto;
                float: none;
            }
            .btn-ontop a{
                padding-left: 24px;
                font-size: smaller;
            }  
        }
        @media screen and (max-width: 736px) {
            .btn-ontop{
                height: 50px;
                width: 140px;
                margin: 0 auto;
                float: none;
            }
            .btn-ontop a{
                padding-left: 15px;
                font-size: smaller;
            } 
            .content{
                height: auto;
                width: 100%;
            }
            .diachi iframe{
                height: 50%;
                width: 100%;
            }
        }
        @media screen and (min-width: 746px) {
            .diachi iframe{
                height: 50%;
                width: 100%;
            }
            .content{
                height: auto;
                width: 100%;
            }
            .footer{
                height: 50%;
                width: 100%;
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
                <li><a href="index.php">TRANG CHỦ</a> </li>
                <li><a href="sanpham.php">SẢN PHẨM</a></li>
                <li><a href="gthieu.php">CÂU CHUYỆN</a></li>
                <li><a href="uudai.php">ƯU ĐÃI</a></li>
                <li id="lienhe"><a href="lienhe.php">LIÊN HỆ</a></li>
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
            <?php $rt=lienhe($conn);
            $rtt=mysqli_fetch_array($rt) ;?>
            <div class="khung">
                <article>
                    <h1 class="thongtin">
                        <?php echo $rtt['LH_DIEUKHOAN']; ?>
                    <br><br><br><br>
                        LIÊN HỆ VỚI CHÚNG TÔI THÔNG QUA:
                        <br>
                        Địa Chỉ: <?php echo $rtt['LH_DIACHI'] ;?>
                        <br>
                        SĐT: <?php echo $rtt['LH_SDT'] ; ?>
                        <br>
                        Email:<?php echo $rtt['LH_EMAIL']; ?>
                        <br>
                        Facebook:<?php echo $rtt['LH_FACE']; ?>
                        
                    </h1>

                </article>
            </div>
            <div class="diachi">
                <div>
                    <h2>HƯỚNG DẪN ĐI ĐƯỜNG</h2>
                </div><br>
                <iframe <?php echo $rtt['LH_BANDO']; ?> width="800" height="800" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
            </div>
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