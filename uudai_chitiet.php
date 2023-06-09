<?php
    if(isset($_GET['url'])){
        $GG_MA=$_GET['url'];
    }
?>
    <?php
    require 'conn.php';
        $sql= "SELECT *FROM magiamgia WHERE GG_MA='$GG_MA'";
        $xem= mysqli_query($conn,$sql);
        $r=mysqli_fetch_array($xem);
    ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="chitiet.css">
    <title>CHI TIẾT MÃ GIẢM GIÁ</title>
    <style>
        .frame_chung{
            height: 650px;
            width: 800px;
            margin: 0 auto;
            font-family: 'Segoe UI';
            box-shadow: 10px 10px darkkhaki;
            border-top: solid 1px darkkhaki;
            border-left: solid 1px darkkhaki;
        }
        .frame_chung img{
            height: 200px;
            width: auto;
        }
        .frame_a{
            height: 100px;
            width: auto;
            text-align: center;
            font-size: larger;
            font-weight: bolder;
            background-color: darkkhaki;
        }
        .frame_b{
            height: 100px;
            width: auto;
        }
        .frame_c{
            height: 100px;
            width: auto;
            text-align: justify;
            background-color: darkkhaki;
        }
        .ctrl{
            height: 50px;
            width: 180px;
        }
        .ctrl a{
            color: darkkhaki;
            font-weight: bold;
            text-decoration: none;
            box-shadow: 4px 4px darkkhaki;
            border-top: solid 1px darkkhaki;
        }
        @media screen and (max-width: 480px) {
            .frame_chung{
                height: 700px;
                width: 420px;
            }
            .frame_chung img{
                height: 200px;
                width: auto;
            }
        }
        @media screen and (max-width: 741px) {
            .frame_chung{
                height: 700px;
                width: 420px;
            }
            .frame_chung img{
                height: 200px;
                width: auto;
            }
        }
    </style>
</head>
<body>
    <div class="container-CT">
        <div class="body-CT">
            <div class="frame_chung">
            <div class="ctrl"><a href="uudai.php">&larr;Trở lại</a></div>
                <img src="./image/<?php echo $r['GG_ANH'];?>">
                <div class="mini">
                    <div class="frame_a"><?php echo $r['GG_TEN'] ;echo " "; echo $r['GG_PHANTRAM'];?> %</div>
                    <div class="frame_b">
                        <?php
                            echo "NGÀY BẮT ĐẦU:";
                        ?>
                        <?php
                            echo $r['GG_BATDAU'];
                            
                        ?>
                        <?php
                            echo "<br>";
                            echo "NGÀY KẾT THÚC:";
                        ?>
                        <?php
                            echo $r['GG_KETHUC'];
                        ?>
                    </div>
                    <div class="frame_c"><?php echo $r['GG_GHICHU'];?></div>
                </div>
                
            </div>
            
        </div>
    </div>
</body>
</html>