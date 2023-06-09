
    <div class="container-right-ad">
    <div class="timkiem-ad">
<form action="" method="GET">
<input type="text" name="timkiem" value="<?php if(isset($_GET['timkiem'])){echo $_GET['timkiem'];}  ?>"> 
<input type="submit" value="Tìm kiếm">
<input type="hidden" name="action" value="hoadon">
</form>
</div>
      <div class="table-ad">
    <table border="1">
 <thead>
  <tr>
  <th>STT</th>
  <th>Số hóa đơn</th>
  <th>Tên khách hàng</th>
  <th>Mã giảm giá</th>
  <th>Tổng tiền</th>
  <th>Ghi chú</th>
  <th>Trạng thái</th>
 <th>Duyệt</th>
 <th>&nbsp;</th>

 <?php
 if(isset($_GET['idduyet'])){
   $abz=tatkn($conn);
   if($_GET['idtt']==1)
   {
     $_GET['idtt']=0;
   $abxx=updateduyet($_GET['idduyet'],$_GET['idtt'],$conn);
   
   $zsd=batkn($conn);
   
   }else{
    $_GET['idtt']=1;
    $abxx=updateduyet($_GET['idduyet'],$_GET['idtt'],$conn);
    $zsd=batkn($conn);
   }

   
 }
 if(isset($_GET['idxoa']))
    {
      tatkn($conn);
      $kp =xoahoadon($_GET['idxoa'],$conn) ;
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
    $sotintuc="SELECT count(*) FROM khachhang,hoadon,trangthai where  khachhang.KH_MA =hoadon.KH_MA and trangthai.TT_MA=hoadon.TT_MA  and KH_TEN like '%$timkiem%'; ";
    $mangsotintuc=mysqli_query($conn,$sotintuc) ;
    $ketquasotintuc=mysqli_fetch_array($mangsotintuc) ;
    $sotintuc=$ketquasotintuc['count(*)'] ;
    $sotintuctren1trang=6;
    $sotrang =ceil($sotintuc/$sotintuctren1trang) ;
   $boqua=$sotintuctren1trang*($trang-1);
$sql ="SELECT * FROM khachhang,hoadon,trangthai where khachhang.KH_MA =hoadon.KH_MA and trangthai.TT_MA=hoadon.TT_MA and KH_TEN like '%$timkiem%' limit $sotintuctren1trang offset $boqua;" ;
  
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
  <td><?php echo $ktt['KH_TEN']; ?></td>
  <td><?php echo $ktt['GG_MA']; ?></td>
 
  <td><span><?php echo number_format( $ktt['HD_THANHTIEN'],'0',",","."); ?> VND</span></td>
  <td><?php echo $ktt['HD_GHICHU']; ?></td>
  <td><span><?php echo $ktt['TT_TEN'];  ?></span></td>
  <td><a onclick="return del('<?php echo 'duyệt đơn hàng'; ?>')" class="duyet" href="?idduyet=<?php echo $ktt['HD_MA'];?>&action=hoadon&idtt=<?php echo$ktt['TT_MA'] ;?>"><i <?php if($ktt['TT_MA']==0){echo "style='color: rgb(0,169,158);'";}else{echo "style='background: rgb(0,169,158);color: white;border-radius: 50%; padding: 1px;'";} ?> class="far fa-check-circle"></i></a></td>
  <td><a onclick="return del('<?php echo 'xóa hóa đơn'; ?>')" class="xoa" href="?idxoa=<?php echo $ktt['HD_MA']; ?>&action=hoadon"><i style="color:white;" class="fas fa-trash-alt"></i></a></td>
  </tr>
  <?php }?>

  </tbody>
  
   </table>
   <div class="phantrang">
   <span style="color: white;">Trang</span>
   <?php   for($i=1 ;$i<=$sotrang ;$i++)
       { 
   ?>
 
  <a href="?trang=<?php echo $i;?>&timkiem=<?php echo $timkiem; ?>&action=hoadon">
  <?php echo $i ;?>
  </a>
 
 <?php  }?>
 </div>
  </div>
  </div>
  <!-- table -->

    </div>
