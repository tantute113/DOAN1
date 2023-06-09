<div class="container-right-ad">
    <div class="timkiem-ad">
<form action="" method="GET">
<input type="text" name="timkiem" value="<?php if(isset($_GET['timkiem'])){echo $_GET['timkiem'];}  ?>"> 
<input type="hidden" name="action" value="phanquyen">
<input type="submit" value="Tìm kiếm">
</form>
</div>
      <div class="table-ad">
    <table border="1">
 <thead>
  <tr>
  <th>STT</th>
  <th>Tên tài khoản</th>
  <th>Mật khẩu</th>
  <th>Loại quyền</th>
 <th>&nbsp;</th>
 
  </tr>

 </thead>
  <tbody>

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
        $sotintuc="SELECT count(*) FROM taikhoan,loaitaikhoan where taikhoan.LOAI_MA=loaitaikhoan.LOAI_MA and TK_TEN like '%$timkiem%'; ";
         $mangsotintuc=mysqli_query($conn,$sotintuc) ;
         $ketquasotintuc=mysqli_fetch_array($mangsotintuc) ;
         $sotintuc=$ketquasotintuc['count(*)'] ;
         $sotintuctren1trang=6;
         $sotrang =ceil($sotintuc/$sotintuctren1trang) ;
        $boqua=$sotintuctren1trang*($trang-1);
  $sql ="SELECT * FROM taikhoan,loaitaikhoan where taikhoan.LOAI_MA=loaitaikhoan.LOAI_MA and TK_TEN like '%$timkiem%' limit $sotintuctren1trang offset $boqua;" ;
  
  $ketqua=mysqli_query($conn,$sql);
  
    ?>

    <?php $stt=1; foreach($ketqua as $att){ ?>
  <tr>
   <td><?php echo $stt;$stt++; ?></td>
   <td><?php echo $att['TK_TEN'];?></td>
  <td><?php echo $att['TK_MATKHAU'];  ?></td>
  <td><?php echo $att['LOAI_TEN'] ?></td>
  <?php if($att['TK_TEN']=='admin') {echo '<td></td>';}else{  ?>
  <td><a class="sua" href="./phanquyen-ed-ad.php?idquyen=<?php echo $att['TK_TEN']; ?>"><i style="color:white;" class="far fa-edit"></i></a></td>

  <?php } ?>
  </tr>
<?php }?>
  
  </tbody>
  
   </table>
   <div class="phantrang">
    <span style="color:white;" >Trang</span>
   <?php   for($i=1 ;$i<=$sotrang ;$i++)
       { 
   ?>
 
  <a href="?trang=<?php echo $i;?>&timkiem=<?php echo $timkiem; ?>&action=phanquyen">
   <?php echo $i ;?>
  </a>
 
 <?php  }?>
 </div>
  </div>
  </div>
  <!-- table -->
 

    </div>
