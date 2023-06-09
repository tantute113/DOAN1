
    <div class="container-right-ad">
    <div class="timkiem-ad">
<form action="" method="GET">
<input type="text" name="timkiem" value="<?php if(isset($_GET['timkiem'])){echo $_GET['timkiem'];}  ?>"> 
<input type="submit" value="Tìm kiếm">
<input type="hidden" name="action" value="khachhang">
</form>
</div>
      <div class="table-ad">
    
      
    <table border="1">
 <thead>


  <tr>
  <th>STT</th>
  <th>Tên</th>
  <th>Số điện thoại</th>
  <th>Ngày sinh</th>
 
 <th>&nbsp;</th>
 
  </tr>

 </thead>
  <tbody>
  <?php  

   if(isset($_GET['idxoa']))
   {
     $idxoa =$_GET['idxoa'];
    tatkn($conn);
      $ktt=xoakhachhang($idxoa,$conn) ;
    
     
   }
    $trang=1 ;
    if(isset($_GET['trang']))
    {
       $trang =$_GET['trang'];
    }
    $timkiem="";
    if(isset($_GET['timkiem'])){
      $timkiem=$_GET['timkiem'];
    }
        $sotintuc="SELECT count(*) FROM khachhang where KH_TEN like '%$timkiem%'; ";
         $mangsotintuc=mysqli_query($conn,$sotintuc) ;
         $ketquasotintuc=mysqli_fetch_array($mangsotintuc) ;
         $sotintuc=$ketquasotintuc['count(*)'] ;
         $sotintuctren1trang=10;
         $sotrang =ceil($sotintuc/$sotintuctren1trang) ;
        $boqua=$sotintuctren1trang*($trang-1);
  $sql ="SELECT * FROM khachhang where KH_TEN like '%$timkiem%' limit $sotintuctren1trang offset $boqua;" ;
  
  $ketqua=mysqli_query($conn,$sql);
  
    ?>




    <?php $stt=1; foreach($ketqua as $rt)
         {
           
          ?>
  <tr>
   <td><?php echo $stt;$stt++; ?></td>
   <td><?php echo $rt['KH_TEN'] ; ?></td>
  <td><?php echo $rt['KH_SDT'] ; ?></td>
  <td><?php echo $rt['KH_DCHI'] ; ?></td>
 
  <td><a onclick="return del('<?php echo $rt['KH_TEN']; ?>')" class="xoa" href="?action=khachhang&&idxoa=<?php echo $rt['KH_MA']; ?>"><i style="color:white;" class="fas fa-trash-alt"></i></a></td>
  </tr>
<?php }?>
   

  </tbody>
  
   </table>
   <div class="phantrang">
     <span style="color: white;">Trang</span>
   <?php   for($i=1 ;$i<=$sotrang ;$i++)
       { 
   ?>
 
  <a href="?trang=<?php echo $i;?>&timkiem=<?php echo $timkiem; ?>&action=khachhang">
  <?php echo $i ;?>
  </a>
 
 <?php  }?>
 </div>
  </div>
  </div>
  <!-- table -->
 

    
