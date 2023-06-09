
    <?php 
    if(isset($_GET['idgg'])){
        if($_GET['idtt']==1){
            $_GET['idtt']=0;
            $rt=ttgg($_GET['idgg'],$_GET['idtt'],$conn);
 
        }else{
            $_GET['idtt']=1;
            $rt=ttgg($_GET['idgg'],$_GET['idtt'],$conn);
        }
    }
   
    ?>
  <div class="container-right-ad">
    <form action="" method="GET">
      <div class="timkiem-ad">
       
        <div class="form-update-ad"><a href="./themmagg.php">Thêm mã giảm giá</a></div>
      </div>
    </form>
    <div class="table-ad">

      <table border="1">
        <thead>
          <?php if (isset($_GET['idxoa'])) {
            tatkn($conn);
            $rt = xoagiamgia($_GET['idxoa'], $conn);
          
          } ?>
          <tr>
            <th>STT</th>
            <th>Ảnh</th>
            <th>Mã giảm giá</th>
            <th>Tên mã giảm giá</th>
            <th>Phần trăm giảm giá</th>
            <th>Ngày bắt đầu</th>
            <th>Ngày kết thúc</th>
            <th>Ghi chú</th>
            <th>Trạng thái</th>
            <th>&nbsp;</th>
            <th>&nbsp;</th>

          </tr>

        </thead>
        <tbody>
          <?php $kp = hienmagiamgia($conn);

          while ($kt = mysqli_fetch_array($kp)) {
            $stt = 1;
          ?>
            <tr>
              <td><?php echo $stt;
                  $stt++; ?></td>
                  <td><img style="max-width:50px;" src="../image/<?php echo $kt['GG_ANH'];?>" alt=""></td>
              <td><?php echo $kt['GG_MA']; ?></td>
              <td><?php echo $kt['GG_TEN']; ?></td>
              <td><?php echo $kt['GG_PHANTRAM']; ?>%</td>
              <td><?php echo $kt['GG_BATDAU'];  ?></td>
              <td><?php echo $kt['GG_KETHUC'];  ?></td>
              <td><?php echo $kt['GG_GHICHU']; ?></td>
              <td><a href="?idtt=<?php echo $kt['TT_MATT']; ?>&action=giamgia&idgg=<?php echo $kt['GG_MA']; ?>"><?php  if($kt['TT_MATT']=='1'){echo "<i class='fas fa-eye'></i>";}else{echo "<i class='fas fa-eye-slash'></i>";} ?>     </a></td>
              <td><a class="sua" href="./suamagg.php?idgg=<?php echo $kt['GG_MA']; ?>"><i style="color:white;" class="far fa-edit"></i></a></td>
              <td><a onclick="return del('<?php echo 'liên hệ'; ?>')" class="xoa" href="?idxoa=<?php echo $kt['GG_MA']; ?>&action=giamgia"><i style="color:white;" class="fas fa-trash-alt"></i></a></td>
            </tr>
          <?php } ?>


        </tbody>

      </table>

    </div>
  </div>
