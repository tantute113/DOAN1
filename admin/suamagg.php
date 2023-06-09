<?php include "./conn.php";
include "./xacthuc.php";
include "./fuction.php";

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/3cf6918e55.js" crossorigin="anonymous"></script>
    <title>Document</title>
      
    <style type="text/css">
 *{
   
   padding: 0;
   margin: 0;
   font-family: sans-serif;
}
.edit-ad{
 border: 1px solid black;
 width: 100%;
height: auto;
 display: block;
}
form{
   width: 80%;
   margin: 0 auto;

}

.input-ad{

 margin: 10px auto;
 display: flex;

 height:auto;
 width: 1000px;
 
}
.input-ad input[type="submit"]
{

 border: none;
 padding: 10px;
 background-color:black ; 
 color: white;

}
.input-ad input[type="text"]{
 border: none;
 outline: none;
 border: 1px solid rgb(18,16,29);

 width: 85%;
 height: 28px;

}
.input-ad textarea{
 width: 400px;
 height: 500px;
}
    .label-ad{
      background-color: rgb(18,16,29);
      color: white;
      text-align: center;
     margin-left: 50px;
      width: 150px;
      height: 30px;
      line-height: 30px;
    }
.name-ed-ad {
line-height: 50px;
background-color: rgb(18,16,29);
height: 50px;
width: 100%;
text-align: left;
color: white;
}
.name-ed-ad h2 {
margin-left: 32px;
}
#text2{
   margin-left: 20px;
}
 .ck.ck-editor {width: 500px;height: 100px;}
 #reset{
    text-align: left;
 }
    </style>
</head>
<body>
<?php 
 if(isset($_POST['submit'])){
  if(isset($_POST['magg'])&&!empty($_POST['magg'])&&isset($_POST['tengg'])&&!empty($_POST['tengg'])&&isset($_POST['ptgg'])&&!empty($_POST['ptgg'])&&isset($_POST['ghichugg'])&&!empty($_POST['ghichugg']))
  {
     
     $magg=$_POST['magg'];
     $tengg=$_POST['tengg'] ;
     $ptgg=$_POST['ptgg'] ;
     $ngaybatdau=$_POST['ngaybatdau'] ;
     $ngayketthuc=$_POST['ngayketthuc'] ;
     $ghichugg=$_POST['ghichugg'] ;
     $path = "../image/";
     $tmp_name = $_FILES['image']['tmp_name'];
     $anh = $_FILES['image']['name'];
     $id=$_GET['idgg'];
     if($anh!=null)
 {
  $path = "../image/";
  $tmp_name = $_FILES['image']['tmp_name'];
  $anh = $_FILES['image']['name'];
  move_uploaded_file($tmp_name,$path.$anh);
					$ktt=layanhgg($anh,$id,$conn);
 }
 $rtttt=tatkn($conn);
    $rt=capnhatmagg($id,$magg,$tengg,$ngaybatdau,$ngayketthuc,$ptgg,$ghichugg,$conn);
    header("Location:index-ad.php?action=giamgia");
    
  }
  else{
   echo '<script language="javascript">';
   echo 'alert("bạn chưa nhập đủ thông tin !")';
   echo '</script>';

  }
}
 ?>
<?php if(isset($_GET['idgg'])){
    $kt=hienmagiamgiaid($_GET['idgg'],$conn);
    $inra=mysqli_fetch_array($kt);
   

}else{} ?>
   <div class="container-ad">
   <div class="edit-ad">
   <div class="name-ed-ad"> <h2><h2><a href="./index-ad.php?action=giamgia"><i style="color: white;" class="fas fa-sign-out-alt"></i></a>Sửa mã giảm giá</h2></div>
       <form role="form" method="POST" enctype="multipart/form-data"  action="">
       <div class="input-ad">
          <div class="label-ad">
       <label >Ảnh hiện tại </label>
       </div>
          <img style="max-width:100px ;" src="../image/<?php echo $inra['GG_ANH']; ?>" alt="">
          </div> 
       <div class="input-ad">
          <div class="label-ad">
            <label>Ảnh</label>
          </div>
          <input type="file" name="image">
        </div>

  <div class="input-ad">
    <div class="label-ad">
       <label >Mã giảm giá</label>
       </div>
       
          <input type="text" name="magg" pattern="[A-Za-z1-9]{5}" placeholder="vui lòng nhập 5 kí tự" value="<?php echo $inra['GG_MA']; ?>">
          </div>


          <div class="input-ad">
    <div class="label-ad">
       <label >Tên mã giảm giá</label>
       </div>
          <input type="text" name="tengg" value="<?php echo $inra['GG_TEN']; ?>" >
          </div>

          <div class="input-ad">
    <div class="label-ad">
       <label >Phần trăm giảm giá</label>
       </div>
          <input type="text" name="ptgg" value="<?php echo $inra['GG_PHANTRAM']; ?>">
          </div>
           
          <div class="input-ad">
    <div class="label-ad">
       <label >Ngày bắt đầu</label>
       </div>
          <input type="date" name="ngaybatdau" value="<?php echo $inra['GG_BATDAU']; ?>">
          </div>
          <div class="input-ad">
    <div class="label-ad">
       <label > Ngày kết thúc</label>
       </div>
          <input type="date" name="ngayketthuc" value="<?php echo $inra['GG_KETHUC']; ?>">
          </div>
           
          <div class="input-ad">
        <div class="label-ad">
       <label >Ghi chú</label>
       </div>
        <textarea name="ghichugg" id="product-content" cols="100" rows="40" ><?php echo $inra['GG_GHICHU']; ?></textarea>
       
        </div>

        
        <div id="reset" class="input-ad">
        
       <input type="submit" name="submit" value="cập nhật mã giảm giá">
      
        </div>
        </form>
   </div>




   </div> 
   <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
   <script src="./ckeditor_4.17.1_5bcc501d998e/ckeditor/ckeditor.js"></script>
   <script>
                    CKEDITOR.replace( 'ghichugg');
                  
                    
       
                </script>
</body>
</html>
        