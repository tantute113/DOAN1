<?php
    if(isset($_GET['url'])){
        $TT_MA=$_GET['url'];
    }
?>
    <?php
    require '../conn.php';
        $sql= "SELECT *FROM tintuc WHERE TT_MA='$TT_MA'";
        $xem= mysqli_query($connec,$sql);
        $r=mysqli_fetch_array($xem);
    ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="chitiet.css">
    <title>Document</title>
</head>
<body>
    <div class="container-CT">
        <div class="ctrl"><a href="tintuc.php">&larr;Trở lại&#10032;</a></div>
        <div class="body-CT">
            <div class="frame_chung">
                <img src="./anh_tin_tuc/<?php echo $r['TT_HINHANH'];?>">
                <div class="mini">
                    <div class="frame_a"><?php echo $r['TT_TEN'];?></div>
                    <div class="frame_b"><?php echo $r['TT_NOIDUNG'];?></div>
                </div>
                
            </div>
            
        </div>
    </div>
</body>
</html>