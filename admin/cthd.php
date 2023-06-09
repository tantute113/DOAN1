<div class="container-right-ad">
    <div class="timkiem-ad">
<form action="" method="GET">
<input type="text" name="timkiem" value="<?php if(isset($_GET['timkiem'])){echo $_GET['timkiem'];}  ?>"> 
<input type="submit" value="Tìm kiếm">
<input type="hidden" name="action" value="cthd">
</form>
</div>
      <div class="table-ad">
    
      
    <table border="1">
 <thead>


  <tr>
  <th>STT</th>
  <th>Số hóa đơn</th>
  <th>Tên sản phẩm</th>
  <th>Tổng tiền</th>
  <th>Số lượng</th>
 <th>&nbsp;</th>
 <th>&nbsp;</th>

 <?php if(isset($_GET['idxoa']))
    {
      tatkn($conn);
      $kp =xoachitiethoadon($_GET['idxoa'],$conn) ;
    }  ?>


 <?php  
    $trang=1 ;
    if(isset($_GET['trang']))
    {
       $trang =$_GET['trang'];
    }
    $timkiem="";
    if(isset($_GET['timkiem'])){
      $timkiem=$_GET['timkiem'];
    }
        $sotintuc="SELECT count(*) FROM sanpham,chitiethoadon,hoadon where  sanpham.SP_MA =chitiethoadon.SP_MA and  hoadon.HD_MA =chitiethoadon.HD_MA and SP_TEN like '%$timkiem%'; ";
         $mangsotintuc=mysqli_query($conn,$sotintuc) ;
         $ketquasotintuc=mysqli_fetch_array($mangsotintuc) ;
         $sotintuc=$ketquasotintuc['count(*)'] ;
         $sotintuctren1trang=12;
         $sotrang =ceil($sotintuc/$sotintuctren1trang) ;
        $boqua=$sotintuctren1trang*($trang-1);
  $sql ="SELECT * FROM sanpham,chitiethoadon,hoadon where sanpham.SP_MA =chitiethoadon.SP_MA and hoadon.HD_MA =chitiethoadon.HD_MA and SP_TEN like '%$timkiem%' limit $sotintuctren1trang offset $boqua;" ;
  
  $ketqua=mysqli_query($conn,$sql);
  
    ?>

 <?php 
 $stt=1;
   while($ktt=mysqli_fetch_array($ketqua))
   {
 ?>
  </tr>

 </thead>
  <tbody>
  <tr>
   <td><?php echo $stt; $stt++;  ?></td>
  
  <td><?php echo $ktt['HD_MA']; ?></td>
  <td><?php echo $ktt['SP_TEN']; ?></td>
 
  <td><span><?php echo number_format( $ktt['CTHD_DONGIA'],'0',",","."); ?> VND</span></td>
  <td><span><?php echo $ktt['CTHD_SOLG'];  ?></span></td>
  <td><a onclick="return del('<?php echo 'chi tiết hóa đơn'; ?>')" class="xoa" href="?idxoa=<?php echo $ktt['HD_MA']; ?>&action=cthd"><i style="color:white;" class="fas fa-trash-alt"></i></a></td>
  </tr>
  <?php }?>

  </tbody>
  
   </table>
   <div class="phantrang">
   <span style="color: white;">Trang</span>
   <?php   for($i=1 ;$i<=$sotrang ;$i++)
       { 
   ?>
 
  <a href="?trang=<?php echo $i;?>&timkiem=<?php echo $timkiem; ?>&action=cthd">
  <?php echo $i ;?>
  </a>
 
 <?php  }?>
 </div>
  </div>
  </div>
  <!-- table -->
 

    </div>
