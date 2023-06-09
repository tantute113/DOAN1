<?php include "./conn.php";
include "./fuction.php"; ?>
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

    .input-ad {
      margin-left: 30px;
      margin-top: 10px;
      display: flex;

      height: auto;
      width: 1000px;
    }

    .input-ad input[type="submit"] {

      border: none;
      padding: 5px;
      background-color: black;
      color: white;
      text-align: right;
    }

    .input-ad input[type="text"] {
      width: 600px;
      height: 30px;

    }

    .input-ad textarea {
      width: 400px;
      height: 500px;
    }

    .label-ad {
      width: 100px;
      height: 30px;
    }

    .name-ed-ad {
      line-height: 50px;
      background-color: purple;
      height: 50px;
      width: 100%;
      text-align: left;
      color: white;
    }

    .ck.ck-editor {
      width: 500px;
    }
  </style>
</head>

<body>



  <div class="container-ad">
    <div class="edit-ad">
      <div class="name-ed-ad">
        <h2>Sửa Khách hàng</h2>
      </div>
      <form role="form" method="POST" enctype="multipart/form-data" action="">

        <div class="input-ad">
          <div class="label-ad">

            <label>Tên khách khàng</label>
          </div>
          <input type="text" name="ten" value="<?php echo $rt['tensp']; ?>">
          <input type="hidden" name="masp" value="<?php echo $rt['idsp']; ?>">
        </div>


        <div class="input-ad">
          <div class="label-ad">

            <label>Tên khách khàng</label>
          </div>
          <input type="text" name="ten" value="<?php echo $rt['tensp']; ?>">
          <input type="hidden" name="masp" value="<?php echo $rt['idsp']; ?>">
        </div>


        <div class="input-ad">
          <div class="label-ad">

            <label>Tên khách khàng</label>
          </div>
          <input type="text" name="ten" value="<?php echo $rt['tensp']; ?>">
          <input type="hidden" name="masp" value="<?php echo $rt['idsp']; ?>">
        </div>



        <div class="input-ad">
          <div class="label-ad">
            <label>Giá</label>
          </div>
          <input type="text" name="gia" value="<?php echo $rt['giasp']; ?>">
        </div>

        <div class="input-ad">
          <div class="label-ad">
            <label>Địa chỉ</label>
          </div>
          <textarea name="message" id="product-content" cols="100" rows="40"><?php echo $rt['thongsokt']; ?></textarea>
        </div>
        <div class="input-ad">

          <input type="submit" value="Cập nhật">
        </div>
      </form>
    </div>




  </div>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="./ckeditor_4.17.1_5bcc501d998e/ckeditor/ckeditor.js"></script>
  <script>
    CKEDITOR.replace('message');
  </script>
</body>

</html>