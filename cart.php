<?php 
session_start();
require "./conn.php";
require "./funtion.php";
?>

<?php
if(!isset($_SESSION['cart']))
{
    $_SESSION['cart']=array() ;
}
if(isset($_GET['quantity']))
{
foreach($_GET['quantity'] as $id =>$quantity)

if(key_exists($id,$_SESSION['cart']))
{
    $_SESSION['cart'][$id]+=$quantity ;
    header("Location:cart.php");
       
}
else{
    if($quantity<1)
    {
        unset($_SESSION['cart']['id']);
    }
    else{
  $_SESSION['cart'][$id]=$quantity ;
    }
}
}

if($_SESSION['cart']==null)
{
    header("Location:sanpham.php");
}

?>

<?php 
   
  if(isset($_GET['url']))
  {
       switch($_GET['url'])
       {
           case "delete":   
               $id= $_GET['idxoa'];
               unset($_SESSION['cart'][$id]) ;
           header("Location:cart.php");
             break ;
             case "submit":
              if(isset($_POST['update']))
              { 

                foreach($_POST['quantity'] as $id =>$quantity)
                 
        
                    if($quantity<=0)
                    {
                      unset($_SESSION['cart'][$id]) ;
                    }  
                    $_SESSION['cart'][$id]=$quantity ;   
                    break;

              }elseif(isset($_POST['order'])){
 $error=null;
                if (empty($_POST['hoten'])) {
                    $error = "<script type='text/javascript'>alert('thông tin nhâp chưa đủ vui lòng nhập lại');</script>";
                    echo $error;
                } elseif (empty($_POST['sodienthoai'])) {
                    $error = "<script type='text/javascript'>alert('Thông tin nhập chưa đủ vui lòng nhập lại');</script>";
                    echo $error;
                } elseif (empty($_POST['diachi'])) {
                    $error = "<script type='text/javascript'>alert('thông tin chưa đủ vui lòng nhập lại');</script>";
                    echo $error;
                } 
                if($error==null)
                {
                $products = mysqli_query($conn,"SELECT * FROM `sanpham` WHERE `SP_MA` IN (".implode(",",array_keys($_POST['quantity'])).")");
                $total = 0;
                $orderProducts = array();
                while ($row = mysqli_fetch_array($products)) {
                    $orderProducts[] = $row;
                    $total += $row['SP_GIA'] * $_POST['quantity'][$row['SP_MA']];
                }
                  $tkn=tatkhoangoai($conn);
                $insertKH=mysqli_query($conn,"INSERT INTO `khachhang` (`KH_MA`, `KH_TEN`, `KH_SDT`, `KH_DCHI`, `LOAI_MA`) VALUES (NULL,'". $_POST['hoten']."', '".$_POST['sodienthoai']."','".$_POST['diachi']."', '2');");
                $idkh=$conn->insert_id;
               
if(isset($_SESSION['giamgia'])){$total=$_SESSION['giamgia'];}
if(isset($_SESSION['magiamgia'])){$magiamgia=$_SESSION['magiamgia'];}else{$magiamgia=" ";}
$time=date("Y-m-d");
                $insertOrder = mysqli_query($conn, "INSERT INTO `hoadon` (`HD_MA`,`HD_THANHTIEN`,`HD_NGLAP`,`KH_MA`,`GG_MA`,`HD_GHICHU`) VALUES (NULL, '".$total."', '".$time."', '".$idkh."','".$magiamgia."','".$_POST['ghichu']."');");
                $orderID = $conn->insert_id;
              
                $insertString = "";
                foreach ($orderProducts as $key => $product) { 
                  $insertString .= "(NULL,'" . $orderID. "', '".$product['SP_MA']. "', '" . $total. "','" . $_POST['quantity'][$product['SP_MA']] . "')";
                  if ($key != count($orderProducts) - 1) {
                    $insertString .= ",";
                }
              }
                $inserttOrder = mysqli_query($conn,"INSERT INTO `chitiethoadon` (`CTHD_MA`,`HD_MA`,`SP_MA`,`CTHD_DONGIA`,`CTHD_SOLG`) VALUES ".$insertString.";");
            
               echo "<script type='text/javascript'>alert('đặt hàng thành công');</script>";
               unset($_SESSION['giamgia']);
               unset($_SESSION['magiamgia']);
               header( "refresh:2;index.php" );

            }
        
        }
        break;
            
  }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://kit.fontawesome.com/3cf6918e55.js" crossorigin="anonymous"></script>
    <style type="text/css">

    *{
        padding: 0;
        margin: 0 ;
        font-family: sans-serif;
    }
 .container{
     background-color: whitesmoke;
     width: 100%;
     height: 700px;
 }
 .menu{
    
     background-color: darkkhaki;
     width: 100%;
     height: 50px;
     line-height: 50px;
 }
 .menu h1{
     float: left;
     color: white;
     margin-left: 10px;
 }
 .menu img{
     float: left;
 }
 thead th{
     width: auto;
    
 }



 .table{
     margin-top: 40px;
   margin-left: 40px;
     float: left;
     width: 60%;
     height:300px;
 }
 .table table{
     border: none;
    border-collapse: collapse;
     width: 100%;
 }
 .table table td{
     text-align: center;
 }
 .table table td img{
    
     max-width: 50px;
 }
 
 th, td {
     border: white;
  text-align: center;
  padding: 8px;
  background-color:white;
}
tbody tr:hover td{
    background-color: whitesmoke;
}
td input{
    border: none;
    border: 1px solid darkkhaki;
    width: 30px;
    text-align: center;
}
th {
  color:black;
  border-bottom: 1px solid darkkhaki;
}




.total{
   
    margin-top: 40px;
   margin-right: 40px;
    float: right;
    width: 32%;
    background-color:white;
    max-height: 400px;
}
.total .total1{
   margin-left: 15px;
}
.mini-total{
    margin-top: 10px;
    display: flex
}


.coupon input[type="text"]{
    padding: 10px;
    margin: 15px;
    border: none;
    outline: none;
    border:1px solid darkkhaki;
    color: dark;
   
}
.coupon input[type="submit"]{
    font-size: 20px;
    background-color: darkkhaki;
    padding: 6px;
    padding-top: 4px;
    padding-bottom: 8px;
    border: none;
    border: 1px solid darkkhaki;
    color: white;
    font-size: 12;
    transition: 0.3s ease-in-out;
}
.coupon input[type="submit"]:hover{
  color: black;
}
.total2{
    background-color: white;
   
    width: 100%;
    height: 380px;
  
}
.dathang{
    text-align: right;
    width: 100%;
    
}
.total2>.dathang>input[type="submit"]{
    margin-right: 25px;
    width: 100px;
    height: 30px;
    border: none;
    border: 1px solid darkkhaki;
    background-color: darkkhaki;
    color: white;
}
.table2 .label{
    border: 1px solid red;
    width: 50px;
    height: 50px;
}
.label label{
    margin-left: 20px;
    margin-top: 5px;
    margin-bottom: 5px;
    width: 100px;
    display: block;
}
#thanhtoan{
    border-top: 1px solid black;
    width: auto;
    border-top: 1px  solid darkkhaki;
    color: black;
     font-weight: 700;
}

.total2>.total3 textarea{
   height: 80px;
  padding-left: 4px;
    width: 89%;
    outline: none;
    border: none;
    border: 1px solid darkkhaki;
    margin-left: 15px;
    
}
.total2>.total3 input{
   
  outline-color: red;
    margin-left: 15px;
    outline: none;
    border: none;
    border: 1px solid darkkhaki;
    padding-top: 10px;
    padding-bottom: 10px;
    width: 90%;
}
.total2>.dathang>input{
    margin-top: 20px;
    background-color: darkkhaki;
    color: white;
    font-size: 20px;
    transition: 0.3s ease-in-out;
}
.total2>.dathang>input:hover{
   
    color: black;
    
}.form-update {
    text-align: right;
}
.form-update input{
    color: white;
    font-size: 20px;
    padding: 5px;
border: none;
border: 1px solid darkkhaki;
background-color: darkkhaki;
transition: 0.3s ease-in-out;
}
.form-update input:hover{
    color: black;
   
}
.form-update input:active{
    color: red;
}
.content{
    width: 100%;
    height: auto;
}
 @media (max-width:1024px){
     body{
         width: 100%;
     }
     .table{
         margin-right: 0px;
         margin-left: 0px;
         width: 100%;
         height: auto;
         margin-bottom: 50px;
         display: block;
     }
     .total{
         float: none;
         width: 100%;
     }
     .coupon input[type="text"]{
         margin: 0px;
     }
     .coupon{
        
        display: inline-table;
     }

 }
 @media (max-width:400px)
 {
    .coupon{
        margin-bottom: 5px;
    }
     th ,td{
         padding: 2px;
     }
 }
    </style>
</head>
<body>

    <div class="container">
      <div class="menu"><h1>Giỏ hàng </h1> <a href="./sanpham.php"><img style="width:50px;height:50px;" src="./image/shopping-cart.png" alt=""></a></div>
      <div style="clear: both;"></div>
      <div class="content">
      <form action="cart.php?url=submit" method="POST">
  <div class="table">
 
   <table border="1">
 <thead>


  <tr>
  <th>STT</th>
  <th>Ảnh</th>
  <th>Tên</th>
  <th>Giá</th>
 <th>Số lượng</th>
 <th>&nbsp;</th>
  </tr>

 </thead>
  <tbody>
  
<?php 
   $num =1;
   $total=0;
   $stt=1;
   $kp=laygiohang(implode(",",array_keys($_SESSION['cart'])),$conn);
   if($kp==null){
     header("Location:sanpham.php");
   }
   while($rt=mysqli_fetch_array($kp))
   {  
    ?>
  <tr>
   <td><?php echo $stt;$stt++; ?></td>
   <td><img  src="./image/<?php echo $rt['SP_ANH'];  ?>" alt=""></td>
  <td><?php echo $rt['SP_TEN']; ?> </td>
  <td><?php echo number_format($rt['SP_GIA']*$_SESSION['cart'][$rt['SP_MA']],'0',",",".");  ?> VND</td>
  <td><input type="text" value="<?php echo $_SESSION['cart'][$rt['SP_MA']];  ?>" name="quantity[<?php echo $rt['SP_MA']; ?>]"></td>
  <td><a href="cart.php?url=delete&idxoa=<?php echo $rt['SP_MA']; ?>"><i class="far fa-trash-alt"></i></a></td>
  </tr>
 
<?php
     $total+=$rt['SP_GIA']*$_SESSION['cart'][$rt['SP_MA']];  }?>
  </tbody>
  
   </table>
  

 <div class="form-update"><input type="submit" name="update" value="Cập nhật"></div>
  
  </div>
  <!-- table -->
  <?php if(isset($_POST['coupon'])){
      $magiamgia= addslashes($_POST['giamgia']) ;
      $rr=giamgia($magiamgia,$conn);
      $hel=mysqli_num_rows($rr);
      $rrr=mysqli_fetch_array($rr);
      if($hel==1)
      {
          $tong=0;
         $tong=$total*(100-$rrr['GG_PHANTRAM'])/100;
         $_SESSION['giamgia']=$tong;
         $_SESSION['magiamgia']=$magiamgia;
      }
        } ?>
<div class="total">
    <div class="coupon">
        <form action="" method="post">
         <input type="text" name="giamgia" placeholder="nhập mã giảm giá tại đây" value="<?php if(isset($_POST['giamgia'])){echo $_POST['giamgia'];}else{unset($_SESSION['giamgia']);} ?>">
         <input type="submit" value="Áp dụng" name="coupon">
         </form>
    </div>  
    <div class="total1">
  
<div class="mini-total"> <p>Tổng tiền hàng:</p> <span><?php echo number_format($total,'0',",","."); ?> VND</span></div>
<?php if(isset($tong)){
    
    $rrrr=$rrr["GG_PHANTRAM"];
    
    echo "<div class='mini-total'> <p>Giảm giá:</p> <span>$rrrr%</span></div>";
    }else{  echo "<div class='mini-total'> <p>Không có mã giảm giá</p> </div>";} ?>


<div class="mini-total" id="thanhtoan"> <p >Tổng thanh toán:</p> <span><?php if(isset($tong)){ echo number_format($tong,'0',",",".");}else{ echo number_format($total,'0',",",".");} ?> VND</span></div>  
    </div> 
<div style="clear:both;"></div>
    <div class="total2">
       
        <div class="total3">
            <?php if(isset($_SESSION['user'])){

                          function laythongtin($key,$conn){
                         $sql="SELECT * FROM `taikhoan` WHERE TK_TEN ='$key';";
                         return mysqli_query($conn,$sql);
                          }
                          $key=$_SESSION['user'];
                         $keytt= laythongtin($key,$conn);
                         $keyt=mysqli_fetch_array($keytt);

            }  ?>
        <div class="label"><label for="name">Người nhận :</label><input type="text" name="hoten" id="name" value="<?php if(isset($_SESSION['user'])){echo $keyt['TK_TEN'];} ?>"></div>
       
        
        </div>
       <div class="total3">
           <div class="label"> <label for="tel">Số điện thoại:</label><input type="text" placeholder="Nhập đủ 10 chữ số" name="sodienthoai" id="tel" pattern="(0)\d{9}" value="<?php if(isset($_SESSION['user'])){echo $keyt['TK_SDT'];} ?>"></div>
       
        
        </div>

        <div class="total3">
            <div class="label"> <label for="address" >Địa chỉ:</label><input type="text" name="diachi" id="address"  value="<?php if(isset($_SESSION['user'])){echo $keyt['TK_DIAC'];} ?>"></div>
        </div>

        <div class="total3">
            <div class="label"> <label for="note">Ghi chú:</label>
   <textarea name="ghichu" id="note" cols="50" rows="7"> </textarea>
        </div>
    </div>
    <div class="dathang"><input type="submit" name="order" value="Đặt hàng"> </div>
   
</div>
      </div>     
        </form>
</div>
</body>
</html>