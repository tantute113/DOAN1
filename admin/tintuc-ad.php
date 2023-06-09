<div class="container-right-ad">
  <div class="timkiem-ad">
    <form action="" method="GET">
      <input type="text" name="timkiem" value="<?php if (isset($_GET['timkiem'])) {
                                                  echo $_GET['timkiem'];
                                                }  ?>">
      <input type="submit" value="Tìm kiếm">
      <input type="hidden" name="action" value="tintuc">
      <div class="form-update-ad"><a href="./them-tt-ad.php">Thêm tin tức</a></div>
    </form>
  </div>
  <div class="table-ad">


    <table border="1">
      <thead>


        <tr>
          <th>STT</th>
          <th>Ảnh</th>
          <th>Tiêu đề</th>
          <th>Nội dung</th>
          <th>&nbsp;</th>
          <th>&nbsp;</th>

        </tr>

      </thead>

      <tbody>
        <?php if (isset($_GET['idxoa'])) {
          $kp = xoatintuc($_GET['idxoa'], $conn);
        }  ?>
        <?php
        $trang = 1;
        if (isset($_GET['trang'])) {
          $trang = $_GET['trang'];
        }
        $timkiem = "";
        if (isset($_GET['timkiem'])) {
          $timkiem = $_GET['timkiem'];
        }
        $sotintuc = "SELECT count(*) FROM tintuc where TT_TEN like '%$timkiem%'; ";
        $mangsotintuc = mysqli_query($conn, $sotintuc);
        $ketquasotintuc = mysqli_fetch_array($mangsotintuc);
        $sotintuc = $ketquasotintuc['count(*)'];
        $sotintuctren1trang = 5;
        $sotrang = ceil($sotintuc / $sotintuctren1trang);
        $boqua = $sotintuctren1trang * ($trang - 1);
        $sql = "SELECT * FROM tintuc where TT_TEN like '%$timkiem%' limit $sotintuctren1trang offset $boqua;";

        $kt = mysqli_query($conn, $sql);

        ?>

        <?php
        $stt = 1;
        while ($ktt = mysqli_fetch_array($kt)) { ?>
          <tr>
            <td><?php echo $stt;
                $stt++;  ?></td>
            <td><img style="max-width:50px;" src="../image/<?php echo $ktt['TT_HINHANH'];  ?>" alt=""></td>
            <td><?php echo $ktt['TT_TEN']; ?></td>
            <td><?php echo $ktt['TT_NOIDUNG'];   ?></td>

            <td><a class="sua" href="./sua-tt-ad.php?idsua=<?php echo $ktt['TT_MA']; ?>"><i style="color:white;" class="far fa-edit"></i></a></td>
            <td><a onclick="return del('<?php echo $ktt['TT_TEN']; ?>')" class="xoa" href="?idxoa=<?php echo $ktt['TT_MA']; ?>&action=tintuc"><i style="color:white;" class="fas fa-trash-alt"></i></a></td>
          </tr>
        <?php } ?>


      </tbody>

    </table>
    <div class="phantrang">
      <span style="color: white;">Trang</span>
      <?php for ($i = 1; $i <= $sotrang; $i++) {
      ?>

        <a href="?trang=<?php echo $i; ?>&timkiem=<?php echo $timkiem; ?>&action=tintuc">
          <?php echo $i; ?>
        </a>

      <?php  } ?>
    </div>
  </div>
</div>