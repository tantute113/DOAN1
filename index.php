<?php 
session_start() ;
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
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"> </script>
    <script src="jquery-2.1.4.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.10.0/css/all.css" />
    <title>HOA YÊN TEA</title>
    <style>
        h1 a {
            padding-left: 20px;
            padding-right: 64px;
            float: left;
            color: white;
            text-decoration: none;
            line-height: 68px;
            font-family: "Dancing Script";
        }

        #trangchu {
            background-color: rgb(131, 88, 47);
        }

        .item2 {
            padding-top: 20px;
        }

        aside {
            height: 500px;
            width: 800px;
            border: 1px solid white;
            border-radius: 10px;
            padding: 0;
            margin: 0 auto;
            overflow: hidden;
        }

        .slides {
            width: 500%;
            height: 500px;
            display: flex;
        }

        .slides>input {
            display: none;
        }

        .slide {
            width: 20%;
            transition: 2s;
        }

        .slide>img {
            width: 100%;
            height: 500px;

        }

        .navi_manual {

            position: absolute;
            width: 800px;
            top: 450px;
            display: flex;
            justify-content: center;

        }

        .manual_btn {
            border: 2px solid white;
            padding: 5px;
            border-radius: 10px;
            cursor: pointer;
            transition: 1s;
        }

        .manual_btn:not(:last-child) {
            margin-right: 40px;
        }

        .manual_btn:hover {
            background: white;
        }

        #radio1:checked~.slide:nth-of-type(1) {
            margin-left: 0;
        }

        #radio2:checked~.slide:nth-of-type(1){
            margin-left: -20%;
        }

        #radio3:checked~.slide:nth-of-type(1) {
            margin-left: -40%;
        }

        #radio4:checked~.slide:nth-of-type(1){
            margin-left: -60%;
        }

        .navi_auto {
            position: absolute;
            display: flex;
            width: 800px;
            justify-content: center;
            top: 450px;

        }

        .navi_auto>div {
            border: 2px solid white;
            padding: 5px;
            border-radius: 10px;
            transition: 1s;
        }

        .navi_auto>div:not(:last-child) {
            margin-right: 40px;
        }

        #radio1:checked~.navi_auto .auto_btn1 {
            background: white;
        }

        #radio2:checked~.navi_auto .auto_btn2 {
            background: white;
        }

        #radio3:checked~.navi_auto .auto_btn3 {
            background: white;
        }

        #radio4:checked~.navi_auto .auto_btn4 {
            background: white;
        }

        .product {
            width: 100%;
            height: 1000px;
            margin-top: 20px;
            margin-bottom: 1px;
        }

        .items {

            height: 700px;
            margin: 0 auto;
            width: 80%;
            display: grid;
            grid-template-columns: 25% 25% 25% 25%;
            grid-row-gap: 40px;
        }

        .item {
            width: 90%;
        }

        .item img {
            transition: 0.5s ease-in-out;
            border-radius: 10px 10px 0 0;
            object-fit: cover;
            max-width: 100%;
            margin-bottom: 14px;

        }

        .item img:hover {

            transform: scale(1.1);
        }

        .cart-a {
            margin-top: 5px;
            text-align: center;
            height: 75px;
            background-color: darkkhaki;
            border-radius: 0 0 10px 10px;
        }

        #status {
            width: 200px;
            height: 200px;
            position: fixed;
            left: 50%;
            z-index: 100;
            top: 50%;
            background-image: url('./image/loading.gif');
            background-repeat: no-repeat;
            background-position: center;
            margin: -100px 0 0 -100px;
            z-index: 1001
        }

        #loader {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            width: 100%;
            height: 100%;
            background-color: #FFF;
            z-index: 1000
        }
 /* mobile */
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

        @media (max-width:1355px) {
            .login-register {
                display: none;
            }
        }

        /*====responsive width 1024====*/
        @media screen and (max-width: 1024px) {


            .login-register {
                display: none;
            }

            .icon_mobile {
                margin-top: 10px;
                margin-left: 10px;
                display: block;
            }

            ul.pc {
                display: none;
            }

            .container {
                max-width: 1024px;
            }

            .menu {
                max-width: 100%;
            }

            .content {
                max-width: 100%;
            }

            .product {
                max-height: 850px;
            }

            .btn-xem {
                width: 150px;
            }

            .footer {
                max-width: 100%;
                height: 150px;
            }

            .footer-con {
                max-width: 100%;
            }
        }

        /*=====reposnsive width 768=====*/
        #iconbar {
            display: none;
        }

        @media screen and (max-width: 768px) {
            .container {
                max-width: 768px;
                align-items: center;
            }

            .menu {
                max-width: 768px;
            }

            #iconbar {
                display: block;
                color: white;
                float: left;
                font-size: 55px;
                margin: 10px 40px;
                cursor: pointer;

            }



           

            /*===slide====*/
            .content {
                width: 100%;
                align-items: center;
            }

            aside {
                max-width: 80%;
            }

            .slides {
                width: 500%;
                overflow: hidden;
            }

            .slide {
                width: 20%;
            }

            .slides img {
                width: 100%;
                font-size: 100%;
            }

            .navi_manual {
                width: 100%;
                display: flex;
                justify-content: center;
            }

            .navi_auto {
                width: 100%;
                display: flex;
                justify-content: center;
            }

            /*====sanpham====*/
            .tieude {
                max-width: 100%;
            }

            .product {
                height: auto;
                width: 100%;
            }

            .items {
                width: 100%;
            }

            .item {
                width: 90%;
                margin-left: 10px;
            }

            .item img {
                width: 100%;
                font-size: 100%;
            }

            .cart-a {
                max-height: 60px;
                line-height: 30px;
            }

            /*====nut xem tat ca===*/
            .button {
                margin-top: 20px;
                padding: 10px;
            }

            .btn-xem {
                width: 30%;
            }

            /*====footer tren====*/
            .footer {
                max-width: 100%;
                max-height: 150px;
            }

            .footer-con {
                max-width: 768px;
            }

            .footer-con h4 {
                padding-right: 30px;
                margin-left: 0px;
            }

            /*===responsive width 414===*/
            @media screen and (max-width: 415px) {
                .container {
                    max-width: 415px;
                    height: 2300px;
                }


                .content {
                    width: 100%;
                    height: 2000px;

                }

                /*=====slide====*/
                aside {
                    width: 320px;
                    height: 200px;
                }

                .slides {
                    width: 500%;
                    height: 200px;
                    overflow: hidden;
                }

                .slide {
                    width: 20%;
                    max-height: 200px;
                }

                .slides img {
                    width: 320px;
                    height: 200px;
                    font-size: 100%;
                }

                .navi_manual {
                    top: 180px;
                }

                .navi_auto {
                    top: 180px;
                }

                /*=====sanpham====*/
                .product {
                    max-height: 2000px;
                }

                .items {
                    width: 100%;
                    height: 1600px;
                    display: grid;
                    grid-template-columns: 50% 50%;
                    align-items: center;
                    grid-row-gap: 0px;


                }

                .item {
                    width: 90%;
                }

                .item img {
                    font-size: 100%;
                }

                .btn-ontop {
                    margin-right: 20px;
                }


            }
        }
    </style>
    <script>
        $(window).bind("load", function() {
            jQuery("#status").delay(2000).fadeOut('fast');
            jQuery("#loader").delay(2000).fadeOut('fast');
        });
    </script>

</head>

<body>
    <div id='status'></div>
    <div id='loader'></div>
    <div class="container">
        <div class="menu">
            <label for="nav_input" class="icon_mobile"><img style="max-width:40px;" src="./icons/menu-button-of-three-horizontal-lines.png" alt=""></label>
            <h1>Hoa Yên</h1>
            <ul class="pc">
                <li id="trangchu"><a href="index.php">TRANG CHỦ</a></li>
                <li ><a href="sanpham.php">SẢN PHẨM</a></li>
                <li><a href="gthieu.php">CÂU CHUYỆN</a></li>
                <li><a href="uudai.php">ƯU ĐÃI</a></li>
                <li><a href="lienhe.php">LIÊN HỆ</a></li>
            </ul>
            <div class="login-register">
            <?php if(isset($_SESSION['user']))
                    {
                        
                        echo "<a href='./dangxuat.php'>ĐĂNG XUẤT</a>";

                    }
                    else{
                        echo " <a href='./loginform.php'>ĐĂNG NHẬP</a>
                        <a href='./signup.php'>ĐĂNG KÍ</a> ";
 
                    }
                    ?>
            </div>


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
                    <?php if(isset($_SESSION['user']))
                    {
                        
                        echo "<li><a href='./loginform.php'>ĐĂNG XUẤT</a></li>";

                    }
                    else{
                        echo " <li><a href='./loginform.php'>ĐĂNG NHẬP</a></li>
                        <li><a href='./signup.php'>ĐĂNG KÍ</a></li> ";
 
                    }
                    ?>
                   
                </ul>
            </nav>
        </div>
        <div style="clear:both"></div>
        <a name="menu"></a>
        <div class="content">
            <div class="item2">
                <aside>
                    <div class="slides">
                        <input type="radio" name="radio_btn" id="radio1">
                        <input type="radio" name="radio_btn" id="radio2">
                        <input type="radio" name="radio_btn" id="radio3">
                        <input type="radio" name="radio_btn" id="radio4">

                        <div class="slide">
                            <img src="./image/hinh1.jpg">
                        </div>
                        <div class="slide">
                            <img src="./image/hinhslide2.jpg">
                        </div>
                        <div class="slide">
                            <img src="./image/hinhslide3.jpg">
                        </div>
                        <div class="slide">
                            <img src="./image/hinhslide4.jpg">
                        </div>
                        <div class="navi_auto">
                            <div class="auto_btn1"></div>
                            <div class="auto_btn2"></div>
                            <div class="auto_btn3"></div>
                            <div class="auto_btn4"></div>
                        </div>
                        <div class="navi_manual">
                            <label for="radio1" class="manual_btn"></label>
                            <label for="radio2" class="manual_btn"></label>
                            <label for="radio3" class="manual_btn"></label>
                            <label for="radio4" class="manual_btn"></label>
                        </div>
                    </div>

                </aside>

            </div>
            <div class="tieude">
                <h1>SẢN PHẨM NỔI BẬT</h1>
            </div>

           
            <div class="product">
                <div class="items">
<?php 
             $rt=sanphamnoibat($conn);
            while($rtt=mysqli_fetch_array($rt))
            {
            ?>
                    <div class="item">
                        <img src="image/<?php echo $rtt['SP_ANH'] ; ?>">
                        <div class="cart-a">
                            <p><?php echo $rtt['SP_TEN'];  ?></p>
                            <?php echo number_format($rtt['SP_GIA'],'0',",",".");  ?> VND
                        </div>
                    </div>

                   
<?php } ?>

                </div>
            </div>
            <!-----------------------------LAM NUT XEM ALL----------------------------------------->
            <div class="button">
                <a href="sanpham.php"><input type="button" class="btn-xem" name="xem" value="XEM TẤT CẢ"></a>
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
        <!-----------------------------LAM NUT XEM ALL----------------------------------------->
        <script src="index.js"> </script>
        <script type="text/javascript">
            var counter = 1;
            setInterval(function() {
                document.getElementById('radio' + counter).checked = true;
                counter++;
                if (counter > 4) {
                    counter = 1;
                }
            }, 2800);
        </script>
</body>

</html>