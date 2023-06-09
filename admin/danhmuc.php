<div class="container-right-ad">
    <div class="timkiem-ad">
<form action="" method="GET">


<input type="hidden" name="action" value="hoadon">

</form>
</div>
      <div class="table-ad"> 
    <table border="1">
 <thead>
  <tr>
  <th>STT</th>
  <th>Tên danh mục</th>
  <th>Mô tả</th>
 <th>&nbsp;</th>

 <?php if(isset($_GET['idxoa']))
    {
      $kp =xoadanhmuc($_GET['idxoa'],$conn) ;
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
        $sotintuc="SELECT count(*) FROM danhmuc where  DM_TEN like '%$timkiem%'; ";
         $mangsotintuc=mysqli_query($conn,$sotintuc) ;
         $ketquasotintuc=mysqli_fetch_array($mangsotintuc) ;
         $sotintuc=$ketquasotintuc['count(*)'] ;
         $sotintuctren1trang=8;
         $sotrang =ceil($sotintuc/$sotintuctren1trang) ;
        $boqua=$sotintuctren1trang*($trang-1);
  $sql ="SELECT * FROM danhmuc where  DM_TEN like '%$timkiem%' limit $sotintuctren1trang offset $boqua;" ;
  
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
  
  <td><?php echo $ktt['DM_TEN']; ?></td>
  <td><?php echo $ktt['DM_MOTA']?></td>
  <td><a class="sua" href="./suadanhmuc.php?idsua=<?php echo $ktt['DM_MA']; ?>"><i style="color:white;" class="far fa-edit"></i></a></td>
  </tr>
  <?php }?>

  </tbody>
  
   </table>
  
  </div>
  </div>
  <!-- table -->
 

    </div>
