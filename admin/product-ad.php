<div class="container-right-ad">
    <div class="timkiem-ad">
<form action="" method="GET">
<input type="text" name="timkiem"  value="<?php if(isset($_GET['timkiem'])){echo $_GET['timkiem'];}  ?>"> 
<input type="submit" value="Tìm kiếm" >
<div class="form-update-ad"><a href="./edit-ad.php">Thêm sản phẩm</a></div>
</form>

</div>
      <div class="table-ad">
    <table border="1">
 <thead>
  <tr>
  <th>STT</th>
  <th>Ảnh</th>
  <th>Tên</th>
  <th>Giá</th>

 <th>&nbsp;</th>
 <th>&nbsp;</th>
  </tr>
 </thead>
  <tbody>
    <?php if(isset($_GET['idxoa']))
    {
      $kp =xoa($_GET['idxoa'],$conn) ;

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
        $sotintuc="SELECT count(*) FROM sanpham where SP_TEN like '%$timkiem%'; ";
         $mangsotintuc=mysqli_query($conn,$sotintuc) ;
         $ketquasotintuc=mysqli_fetch_array($mangsotintuc) ;
         $sotintuc=$ketquasotintuc['count(*)'] ;
         $sotintuctren1trang=5;
      /*  return */   $sotrang =ceil($sotintuc/$sotintuctren1trang) ;
        $boqua=$sotintuctren1trang*($trang-1);
  $sql ="SELECT * FROM sanpham where SP_TEN like '%$timkiem%' limit $sotintuctren1trang offset $boqua;" ;
  
  $ketqua=mysqli_query($conn,$sql);
  
    ?>
    <?php
    $stt=1;
     foreach($ketqua as $return ) 
     { 
    ?>
  <tr>
   <td><?php echo $stt;$stt++; ?></td>
   <td><img style="max-width:50px;" src="../image/<?php echo $return['SP_ANH'];?>" alt=""></td>
  <td><?php echo $return['SP_TEN']; ?></td>
  <td><?php echo number_format( $return['SP_GIA'],'0',",","."); ?> VND</td>
  
  <td><a class="sua" href="./suasp-ad.php?idsua=<?php echo $return['SP_MA']; ?>"><i style="color:white;" class="far fa-edit"></i></a></td>
   <td><a onclick="return del('<?php echo $return['SP_TEN']; ?>')" class="xoa" href="?idxoa=<?php echo $return['SP_MA']; ?>"><i style="color:white;" class="fas fa-trash-alt"></i></a></td> 
  </tr>

   <?php }?>


  </tbody>
  
   </table>
   <div class="phantrang">
    <span style="color: white;">Trang</span>
   <?php   for($i=1 ;$i<=$sotrang ;$i++)
       { 
   ?>
 
  <a href="?trang=<?php echo $i;?>&timkiem=<?php echo $timkiem; ?>">
   <?php echo $i ;?>
  </a>
 
 <?php  }?>
 </div>
  </div>
  </div>
  <!-- table -->
 

    </div>