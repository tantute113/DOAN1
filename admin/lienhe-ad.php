
  <div class="container-right-ad">
    <form action="" method="GET">
      <div class="timkiem-ad">
      </div>
    </form>
    <div class="table-ad">

      <table border="1">
        <thead>
          <?php if (isset($_GET['idxoa'])) {
            $rt = xoalienhe($_GET['idxoa'], $conn);
          } ?>
          <tr>
            <th>STT</th>
            <th>Facebook</th>
            <th>Số điện thoại</th>
            <th>Email</th>
            <th>Địa chỉ</th>
            <th>Điều khoản</th>
            <th>&nbsp;</th>
            

          </tr>

        </thead>
        <tbody>
          <?php $kp = laylienhe($conn);

          while ($kt = mysqli_fetch_array($kp)) {
            $stt = 1;
          ?>
            <tr>
              <td><?php echo $stt;
                  $stt++; ?></td>
              <td><?php echo $kt['LH_FACE']; ?></td>
              <td><?php echo $kt['LH_SDT']; ?></td>
              <td><?php echo $kt['LH_EMAIL'];  ?></td>
              <td><?php echo $kt['LH_DIACHI'];  ?></td>
              <td><?php echo $kt['LH_DIEUKHOAN']; ?></td>
              <td><a class="sua" href="./lienhe-ed-ad.php?idlh=<?php echo $kt['LH_MA']; ?>"><i style="color:white;" class="far fa-edit"></i></a></td>
            </tr>
          <?php } ?>


        </tbody>

      </table>

    </div>
  </div>

