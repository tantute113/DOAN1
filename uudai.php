<?php
    require "conn.php";
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
        .banner {
            height: 50px;
            width: 100%;
            background-color: whitesmoke;
        }

        p {
            line-height: 50px;
            float: left;
            padding-left: 250px;
        }

        .free {
            height: 750px;
            width: 100%;
        }

        .free img {
            height: 750px;
            width: 100%;
            object-fit: cover;
        }

        .khungbu {
            height: 750px;
            width: 80%;
            margin: 0 auto;
            margin-top: 100px;
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
        }

        .khung1 {
            height: 50px;
            width: auto;
            background-color: darkkhaki;
            text-align: center;
            color: white;
        }

        .khung2 {
            height: 700px;
            width: auto;
            background-color: white;
        }

        .khung2_1 {
            height: 550px;
            margin-top: 50px;
            margin-left: 40px;
            width: 28%;
            float: left;
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
            background-color: white;
        }

        .khung2_2 {
            height: 550px;
            margin-top: 50px;
            margin-left: 20px;
            width: 30%;
            float: left;
            background-color: white;
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
        }

        .khung2_3 {
            height: 550px;
            margin-top: 50px;
            margin-left: 20px;
            width: 30%;
            float: left;
            background-color: white;
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
        }

        .hinhanh {
            height: 400px;
            width: 85%;
            margin: 20px auto;
        }

        .hinhanh img {
            height: 400px;
            width: 100%;
            object-fit: cover;
        }

        .chung {
            margin: 0 auto;
            height: 100px;
            width: 85%;
            background-color: darkkhaki;
        }

        #uudai {
            background-color: rgb(131, 88, 47);

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
        @media (max-width:1076px) {
             .icon_mobile{
                 margin-top: 10px;
                 margin-left: 10px;
                 display: block ; 

             }
              .pc {
                  display: none;
              }
        }

        @media screen and (max-width: 480px) {
            .content {
                height: 3500px;
                width: 100%;
            }

            .hinhanh {
                height: 400px;
                width: 85%;
            }

            .khungbu {
                height: 2500px;
            }

            .khung1 h1 {
                line-height: 50px;
                font-size: medium;
            }

            .khung2 {
                height: 2400px;
            }

            .khung2_1 {
                height: 25%;
                width: 90%;
                margin-top: 25px;
                margin-left: 15px;
            }

            .khung2_2 {
                height: 25%;
                width: 90%;
                margin-top: 25px;
                margin-left: 15px;
            }

            .khung2_3 {
                height: 25%;
                width: 90%;
                margin-top: 25px;
                margin-left: 15px;
            }

            .banner {
                height: 150px;
                width: 100%;
                background-color: whitesmoke;
            }

            .footer {
                height: 50%;
                width: 100%;
            }

            .slogan {
                margin: 0 auto;
            }

            .main-slogan h1 {
                font-size: medium;
            }

            .footer-con {
                height: 50%;
                width: 90%;
                margin: 0 auto;
            }

            .footer-con h4 {
                font-size: small;
                margin: 0 auto;
            }

            .btn-ontop {
                height: 30%;
                width: 50%;
                margin: 0 auto;
                float: none;
            }

            .btn-ontop a {
                padding-left: 24px;
                font-size: smaller;
            }
        }

        @media screen and (max-width: 741px) {
            .btn-ontop {
                height: 50px;
                width: 150px;
                margin: 0 auto;
                float: none;
            }

            .btn-ontop a {
                padding-left: 15px;
                font-size: smaller;
            }

            .content {
                height: 3500px;
                width: 100%;
            }

            .khungbu {
                height: 2000px;
            }

            .khung2_1 {
                width: 99%;
                float: none;
                margin-top: 50px;
                margin-left: 0px;
            }

            .khung2_2 {
                width: 99%;
                float: none;
                margin-top: 50px;
                margin-left: 0px;
            }

            .khung2_3 {
                width: 99%;
                float: none;
                margin-top: 50px;
                margin-left: 0px;
            }

            .banner {
                height: 150px;
                width: 100%;
                background-color: whitesmoke;
            }

        }

        @media screen and (min-width: 746px) {
            .khungbu {
                width: 780px;
            }

            .banner {
                height: 150px;
                width: 100%;
                background-color: whitesmoke;
            }
            .khung2 {
                margin: 0 auto;
            }

            .khung2_1 {
                margin-left: 30px;
            }

            .khung2_2 {
                margin-left: 5px;
            }

            .khung2_3 {
                margin-left: 5px;
            }
        }
        .control-btn{
            height: 50px;
            width: 200px;
            margin-top: 20px;
            float: right;
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
                <li><a href="gthieu.php">CÂU CHUYỆN</a></li>
                <li id="uudai"><a href="uudai.php">ƯU ĐÃI</a></li>
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

            <div class="free">
                <img src="image/background.jpg">
            </div>
            <div class="banner">
                <div>
                  
                    <marquee behavior="scroll" Loop=1000 ScrollDelay=0.1 ScrollAmount=15>
                    <?php
                    $sta=1; $lim=1;
                    $r = mysqli_query($conn, "SELECT * FROM magiamgia where TT_MATT ='1' ");
                    while($rows = mysqli_fetch_array($r))
                   {
                    ?>
                        <p><?php echo $rows['GG_MA'];echo " giảm ";echo $rows['GG_PHANTRAM'];echo" %";?></p>
                        <?php 
                    }
                    ?> 
                    </marquee>
                   
                </div>
            </div>
            <div class="xulyphantrang">
                <?php
                /*
                total_record: tổng số records
                current_page: trang hiện tại
                limit: số records hiển thị trên mỗi trang
                start: record bắt đầu trong câu lệnh SQL
                Thuật toán chung để tính start đó là: start = (current_page - 1) * limit.
                Tổng số records: Ta dùng lệnh count trong MySQL.
                Trang hiện tại: Dựa vào tham số page trên URL.
                Số records trong mỗi trang: Tham số tự truyền vào.
                */
                    // BƯỚC 2: TÌM TỔNG SỐ RECORDS
                    $result = mysqli_query($conn, 'select count(GG_MA) as total from magiamgia');
                    $row = mysqli_fetch_assoc($result);
                    $total_records = $row['total'];
                    
                    // BƯỚC 3: TÌM LIMIT VÀ CURRENT_PAGE
                    $current_page = isset($_GET['page']) ? $_GET['page'] : 1;
                    $limit = 3;
                    
                    // BƯỚC 4: TÍNH TOÁN TOTAL_PAGE VÀ START
                    // tổng số trang
                    $total_page = ceil($total_records / $limit);
                    
                    // Giới hạn current_page trong khoảng 1 đến total_page
                    if ($current_page > $total_page){
                        $current_page = $total_page;
                    }
                    else if ($current_page < 1){
                        $current_page = 1;
                    }
                    
                    // Tìm Start
                    $start = ($current_page - 1) * $limit;
                    
                    // BƯỚC 5: TRUY VẤN LẤY DANH SÁCH TIN TỨC
                    // Có limit và start rồi thì truy vấn CSDL lấy danh sách mã giảm giá
                    $result = mysqli_query($conn, "SELECT * FROM magiamgia where TT_MATT ='1' LIMIT $start, $limit");
                ?>
            </div>
            <div class="khungbu">
                <div class="khung1">
                    <h1>MÃ GIẢM GIÁ</h1>
                </div>
                <div class="khung2">
                        <?php
                        while($row = mysqli_fetch_assoc($result))
                        {
                        ?>
                        <div class="khung2_1">
                            <div class="hinhanh"><img src="./image/<?php echo $row['GG_ANH']; ?>" alt="Không có ảnh"></div>
                            <div class="chung">
                                <div class="thongtin"><?php echo $row['GG_TEN'];?></div>
                                <div class="ng_batdau"><?php echo "BẮT ĐẦU: "; echo $row['GG_BATDAU'];?></div>
                                <div class="ng_ketthuc"><?php echo "KẾT THÚC: "; echo $row['GG_KETHUC'];?></div><a href="uudai_chitiet.php?url=<?php echo $row['GG_MA'];?>">Xem chi tiết</a>
                            </div>
                        </div>
                        <?php 
                        }
                        ?> 
                    <div class="control-btn">
                        <div class="btn">
                            <?php
                            // PHẦN HIỂN THỊ PHÂN TRANG
                            
                            // Hiển thị nút trước
                            if ($current_page > 1 && $total_page > 1){
                                echo '<a href="uudai.php?page='.($current_page-1).'">&larr;  Trước</a> ';
                            }
                            
                            // Lặp khoảng giữa
                            for ($i = 1; $i <= $total_page; $i++){
                                // Nếu là trang hiện tại thì hiển thị thẻ span
                                // ngược lại hiển thị thẻ a
                                if ($i == $current_page){
                                    echo '<span>'.$i.'</span>';
                                }
                                else{
                                    echo '<a href="uudai.php?page='.$i.'">'.$i.'</a>     ';
                                }
                            }
                            
                            // Hiển thị nút sau
                            if ($current_page < $total_page && $total_page > 1){
                                echo '<a href="uudai.php?page='.($current_page+1).'">Sau   &rarr;</a>  ';
                            }
                        ?>
                        </div>
                
                    </div>    
                </div>
            
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
    <script src="index.js"> </script>
</body>

</html>