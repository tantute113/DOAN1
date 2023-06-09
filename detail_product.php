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
    <title>Document</title>
    <style type="text/css">
        * {
            padding: 0;
            margin: 0;
            font-family: sans-serif;
        }

        body {
            width: 100%;
            height: 100vh;
            background-color: whitesmoke;
        }

        .container {
            background-color: white;
            width: 90%;
            height: 100vh;
            margin: 0 auto;


        }

        .header {

            width: 100%;
            border: 1px solid darkkhaki;
            padding-top: 20px;
            padding-bottom: 20px;
        }

        .header h3 {
            margin-left: 20px;
        }

        .data {
            margin-top: 10px;
            width: 100%;
            border: 1px solid darkkhaki;
            height: auto;
        }

        .data .img {
            margin: auto auto;
            float: left;

            width: 30%;
        }

        .data .img img {
            height: auto;
            max-width: 100%;
            object-fit: cover;
            max-height: 477px;
            border-radius: 2px;
        }

        .data .img1 {
            display: inline;
        }

        .data .img1 p {
            font-size: 16px;
        }

        input[type="submit"] {
            border: none;
            border: 1px solid darkkhaki;
            padding: 7px;
            color: black;
            font-size: 18px;
            transition: 0.3s ease-in-out;
            background-color: white;
            border-radius: 3px;
            background-color: darkkhaki;
        }

        input[type="submit"]:hover {

            color: white;
        }

        input[type="text"] {
            text-align: center;
            outline: none;
            border: none;
            border: 1px solid darkkhaki;
            width: 30px;
            padding: 9px;
            padding-top: 10px;
            border-radius: 3px;
        }

        .img1 {
            width: 70%;
        }

        .img1 h1 {
            margin: 20px;
        }

        .img1 h3 {
            margin: 10px;
        }

        .img1 input {
            margin: 3px;
        }

        .info {
            width: 100%;
        }

        .header {
            background-color: darkkhaki;
        }

        .header h3 {
            color: white;
        }

        .error {
            border: 1px solid darkkhaki;
            margin-top: 21px;
            padding-bottom: 5px;
            padding-top: 5px;
            display: flex;
            justify-content: center;
            width: 100%;
            height: 50px;
            background-color: darkkhaki;

        }

        .error h4 {
            line-height: 50px;
        }

        .h2 {
            margin-top: 10px;
        }

        @media (max-width:938px) {
            .info {
                display: block;
            }
        }

        @media (max-width:530px) {
            .data .img {
                text-align: center;
                width: 100%;
            }

            .img .data {
                height: auto;
            }

            .img1 input {
                margin-left: 15px;
            }

            .img1 h3 {
                margin-left: 15px;
            }
        }
    </style>
</head>

<body>
    <div class="container">
        <?php if(isset($_GET['idsp'])){
            $rt=layspid($_GET['idsp'],$conn);
            $rtt=mysqli_fetch_array($rt);
        } ?>
        <div class="header">
            <h3>Chi tiết sản phẩm</h3>
        </div>
        <div class="data">
            <div class="img">
                <img src="image/<?php echo $rtt['SP_ANH']; ?>" alt="">
            </div>
            <div class="img1">
                <h1><?php echo $rtt['SP_TEN']; ?></h1>
                <h3>Giá : <?php echo number_format($rtt['SP_GIA'],'0',",",".");  ?> VND</h3>
                <form action="./cart.php" method="GET">
                    <input type="text" min="1" name="quantity[<?php echo $rtt['SP_MA']; ?>]" value="1">
                    <input type="submit" value="Thêm vào giỏ hàng">
                </form>
                <div class="info">
                    <div class="h2">
                        <h2>Thông tin sản phẩm:</h2>
                    </div>
                    <div class="p">
                        <?php echo $rtt['SP_MOTA'] ;?>
                    </div>
                </div>
            </div>
        </div>

        <div class="error">
            <h4>*hình ảnh và thông tin chỉ có tính minh họa</h4>
        </div>
    </div>
</body>

</html>