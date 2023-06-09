<?php
include "./fuction.php";
include "./conn.php";
include "./xacthuc.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <title>Document</title>

  <style type="text/css">
    * {

      padding: 0;
      margin: 0;
      font-family: sans-serif;
    }

    .edit-ad {
      border: 1px solid black;
      width: 100%;
      height: auto;
      display: block;
    }
form{
  width: 80%;
  margin: 0 auto;
}
    .input-ad {

    margin: 10px auto;
      display: flex;

      height: auto;
      width: 1000px;

    }

    .input-ad input[type="submit"] {

      border: none;
      padding: 10px;
      background-color: black;
      color: white;

    }

    .input-ad input[type="text"] {
      border: none;
      outline: none;
      border: 1px solid rgb(18, 16, 29);

      width: 85%;
      height: 28px;

    }

    .input-ad textarea {
      width: 400px;
      height: 500px;
    }

    .label-ad {
      background-color: rgb(18, 16, 29);
      color: white;
      text-align: center;

      width: 150px;
      height: 30px;
      line-height: 30px;
    }

    .name-ed-ad {
      line-height: 50px;
      background-color: rgb(18, 16, 29);
      height: 50px;
      width: 100%;
      text-align: left;
      color: white;
    }

    .name-ed-ad h2 {
      margin-left: 32px;
    }

    .ck.ck-editor {
      width: 500px;
    }
  </style>
</head>

<body>
  <?php
  if (isset($_POST['submit'])) {
    if (isset($_POST['idlh']) && !empty($_POST['idlh']) && isset($_POST['facebook']) && !empty($_POST['facebook']) && isset($_POST['sodienthoai']) && !empty($_POST['sodienthoai']) && isset($_POST['email']) && !empty($_POST['email']) && isset($_POST['diachi']) && !empty($_POST['diachi']) && isset($_POST['dieukhoan']) && !empty($_POST['dieukhoan'])&& isset($_POST['bando']) && !empty($_POST['bando'])) {
      $idlh = $_POST['idlh'];
      $facebook = $_POST['facebook'];
      $sodienthoai = $_POST['sodienthoai'];
      $email = $_POST['email'];
      $diachi = $_POST['diachi'];
      $dieukhoan = $_POST['dieukhoan'];
      $bando = $_POST['bando'];
      $kkk = update_lienhe($diachi, $sodienthoai, $email, $facebook, $dieukhoan, $idlh,$bando,$conn);
      header("Location:index-ad.php?action=lienhe");
    } else {
      echo '<script language="javascript">';
      echo 'alert("bạn chưa nhập đủ thông tin !")';
      echo '</script>';
    }
  }
  ?>



  <?php

  if (isset($_GET['idlh'])) {
    $idlh = $_GET['idlh'];
    $kp = laylienheid($idlh, $conn);
    $rt = mysqli_fetch_array($kp);
  } else {
    header("Location:index-ad.php?action=lienhe");
  }


  ?>
  <div class="container-ad">
    <div class="edit-ad">
      <div class="name-ed-ad">
        <h2>Sửa liên hệ</h2>
      </div>
      <form action="" method="POST">
        <div class="input-ad">
          <div class="label-ad">
            <input type="hidden" name="idlh" value="<?php echo $rt['LH_MA']; ?>">
            <label>Facebook</label>
          </div>
          <input type="text" name="facebook" value="<?php echo $rt['LH_FACE']; ?>">

        </div>
        <div class="input-ad">
          <div class="label-ad">
            <label>số điện thoại</label>
          </div>
          <input type="text" name="sodienthoai" value="<?php echo $rt['LH_SDT']; ?>">

        </div>

        <div class="input-ad">
          <div class="label-ad">
            <label>Email</label>
          </div>
          <input type="text" name="email" value="<?php echo $rt["LH_EMAIL"]; ?>">
        </div>


        <div class="input-ad">
          <div class="label-ad">
            <label>Địa chỉ</label>
          </div>
          <textarea name="diachi" id="product-content" cols="100" rows="40"><?php echo $rt["LH_DIACHI"]; ?></textarea>
          <div class="label-ad">
            <label>Điều khoản</label>
          </div>
          <textarea name="dieukhoan" id="product-content" cols="100" rows="40"><?php echo $rt['LH_DIEUKHOAN']; ?></textarea>
          <div class="label-ad">
            <label>Bản đồ</label>
          </div>
          <textarea name="bando" id="product-content" cols="100" rows="40"><?php echo $rt['LH_BANDO']; ?></textarea>
        </div>
        <div class="input-ad">
          <input type="submit" name="submit" value="Cập nhật">
        </div>
      </form>
    </div>


  </div>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="./ckeditor_4.17.1_5bcc501d998e/ckeditor/ckeditor.js"></script>
  <script>
    CKEDITOR.replace('diachi');
    CKEDITOR.replace('dieukhoan');
    CKEDITOR.replace('bando');
    CKEDITOR.config.autoParagraph = false;
  </script>
</body>

</html>