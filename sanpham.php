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
    <link rel="stylesheet" type="text/css" href="sanpham.css">
    <link rel="stylesheet" type="text/css" href="sanpham1.css">

    <title>HOA YÊN TEA</title>
    <style type="text/css">
       
    </style>
</head>

<body>
    <div class="container">
        <div class="menu">
            <h1>Hoa Yên</h1>
            <ul class="pc">
                <li><a href="index.php">TRANG CHỦ</a></li>
                <li id="sanpham"><a href="sanpham.php">SẢN PHẨM</a></li>
                <li><a href="gthieu.php">CÂU CHUYỆN</a></li>
                <li><a href="uudai.php">ƯU ĐÃI</a></li>
                <li><a href="lienhe.php">LIÊN HỆ</a></li>
            </ul>
            <div class="danhmuc2">
                <ul>
  <?php $tnt=danhmucdau($conn) ;
  
  $tnn=mysqli_fetch_array($tnt);
  
  
  ?>
                    <li class="active"><a href="<?php echo $tnn['DM_LINK']; ?>"><?php echo $tnn['DM_TEN']; ?></a></li>

                    <?php $tha= danhmuctatca($conn) ;
                    
                    while($rs=mysqli_fetch_array($tha))
                    {
                    
                    
                    ?>
                    <li><a href="<?php echo $rs['DM_LINK'] ;?>"><?php echo $rs['DM_TEN'] ; ?></a></li>
                   
                    <?php  }?>
                </ul>
            </div>
            <label for="nav_input" class="icon_mobile"><img style="max-width:40px;" src="./icons/menu-button-of-three-horizontal-lines.png" alt=""></label>
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
                </ul>
            </nav>
        </div>
        <div></div>
        <div style="clear:both"></div>
        <a name="menu"></a>
        <div class="content">
            <div class="content1">
                <div class="danhmuc">
                    <ul>
                        <li>
                            <h2>DANH MỤC</h2>
                        </li>
                        <?php $tnt=danhmucdau($conn) ;
  
  $tnn=mysqli_fetch_array($tnt);
  
  
  ?>
                    <li class="active"><a href="<?php echo $tnn['DM_LINK']; ?>"><?php echo $tnn['DM_TEN']; ?></a></li>

                    <?php $tha= danhmuctatca($conn) ;
                    
                    while($rs=mysqli_fetch_array($tha))
                    {
                    
                    
                    ?>
                    <li><a href="<?php echo $rs['DM_LINK'] ;?>"><?php echo $rs['DM_TEN'] ; ?></a></li>
                   
                    <?php  }?>
                    </ul>
                </div>
            </div>

            <div class="product">

                <div class="title">
                    <a href="#" name="TRA"></a>
                    <H1><?php $xy =danhmucten(1,$conn);
                    $rtt=mysqli_fetch_array($xy);
                    echo $rtt['DM_TEN']; ?></H1>
                </div>
                <div class="items">
                    <?php $rt=tra($conn) ;
                    
                    while($rtt=mysqli_fetch_array($rt)){
                    ?>
                    <div class="item">

                        <img src="image/<?php echo $rtt['SP_ANH']; ?>">
                        <div class="cart-a">
                            <p><a href="./detail_product.php?idsp=<?php echo $rtt['SP_MA']; ?>"><?php echo $rtt['SP_TEN']; ?></a></p>
                            <?php echo number_format($rtt['SP_GIA'],'0',",",".");  ?> VND
                            <form action="./cart.php" method="GET">
                                <input type="submit" value="Mua ngay">
                                <input type="text" value="1" name="quantity[<?php echo $rtt['SP_MA']; ?>]">
                            </form>
                        </div>
                    </div>
                    <?php }?>

                  
                   

                    <!-- ------------------------------------------------ -->

                   





                </div>
                <!-- ----------------------------------------------------------------- -->

                <div class="title">
                    <a href="#" name="DETOX"></a>
                    <H1><?php $xy =danhmucten(2,$conn);
                    $rtt=mysqli_fetch_array($xy);
                    echo $rtt['DM_TEN']; ?></H1>
                </div>
                <div class="items">

                <?php $rt=detox($conn);
while($rtt=mysqli_fetch_array($rt))

{
?>
                <div class="item">

<img src="image/<?php echo $rtt['SP_ANH']; ?>">
<div class="cart-a">
    <p><a  href="./detail_product.php?idsp=<?php echo $rtt['SP_MA']; ?>"><?php echo $rtt['SP_TEN']; ?></a></p>
    <?php echo number_format($rtt['SP_GIA'],'0',",",".");  ?> VND
    <form action="./cart.php">
        <input type="submit" value="Mua ngay">
        <input type="text" value="1" name="quantity[<?php echo $rtt['SP_MA']; ?>]"> 
    </form>
</div>
</div>
<?php }?>

                    
                </div>

                <!-- ------------------------------------------------------------ -->
                <div class="title">
                    <a href="#" name="THUCDUONG"></a>
                    <H1><?php $xy =danhmucten(3,$conn);
                    $rtt=mysqli_fetch_array($xy);
                    echo $rtt['DM_TEN']; ?></H1>
                </div>
                <div class="items">
<?php $rt=thucduong($conn);


while($rtt=mysqli_fetch_array($rt))
{

?>
                   <div class="item">

<img src="image/<?php echo $rtt['SP_ANH']; ?>">
<div class="cart-a">
    <p><a href="./detail_product.php?idsp=<?php echo $rtt['SP_MA']; ?>"><?php echo $rtt['SP_TEN']; ?></a></p>
 <?php echo number_format($rtt['SP_GIA'],'0',",",".");  ?> VND
    <form action="./cart.php">
        <input type="submit" value="Mua ngay">
        <input type="text" value="1" name="quantity[<?php echo $rtt['SP_MA'] ;?>]"> 
    </form>
</div>
</div>
                    <?php  }?>

                    






                </div>

                <div class="title">
                    <a href="#" name="NUOCUONGKHAC"></a>
                    <H1><?php $xy =danhmucten(4,$conn);
                    $rtt=mysqli_fetch_array($xy);
                    echo $rtt['DM_TEN']; ?></H1>
                </div>
                <div class="items">
<?php $rt=nuocuongkhac($conn);
while($rtt=mysqli_fetch_array($rt))

{
?>
                <div class="item">

<img src="image/<?php echo $rtt['SP_ANH']; ?>">
<div class="cart-a">
    <p><a  href="./detail_product.php?idsp=<?php echo $rtt['SP_MA']; ?>"><?php echo $rtt['SP_TEN']; ?></a></p>
    <?php echo number_format($rtt['SP_GIA'],'0',",",".");  ?> VND
    <form action="./cart.php">
        <input type="submit" value="Mua ngay">
        <input type="text" value="1" name="quantity[<?php echo $rtt['SP_MA']; ?>]"> 
    </form>
</div>
</div>
<?php }?>
                    <!-- ------------------------------------------------- -->


                </div>

                <div class="title">
                    <a href="#" name="MONANVAT"></a>
                    <H1><?php $xy =danhmucten(5,$conn);
                    $rtt=mysqli_fetch_array($xy);
                    echo $rtt['DM_TEN']; ?></H1>
                </div>
                <div class="items">

                <?php $rt=monanvat($conn);
while($rtt=mysqli_fetch_array($rt))

{
?>
                <div class="item">

<img src="image/<?php echo $rtt['SP_ANH']; ?>">
<div class="cart-a">
    <p><a href="./detail_product.php?idsp=<?php echo $rtt['SP_MA']; ?>"><?php echo $rtt['SP_TEN']; ?></a></p>
    <?php echo number_format($rtt['SP_GIA'],'0',",",".");  ?> VND
    <form action="./cart.php">
        <input type="submit" value="Mua ngay">
        <input type="text" value="1" name="quantity[<?php echo $rtt['SP_MA']; ?>]"> 
    </form>
</div>
</div>
<?php }?>
            </div>

            <div style="clear:right"></div>
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
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.js">
    </script>
    <script type="text/javascript">
        $(document).on('click', 'ul li', function() {
            $(this).addClass('active').siblings().removeClass('active')
        })
    </script>
</body>

</html>