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
  if(isset($_POST['facebook'])&&!empty($_POST['facebook'])&&isset($_POST['sodienthoai'])&&!empty($_POST['sodienthoai'])&&isset($_POST['email'])&&!empty($_POST['email'])&&isset($_POST['diachi'])&&!empty($_POST['diachi'])&&isset($_POST['dieukhoan'])&&!empty($_POST['dieukhoan'])&&isset($_POST['bando'])&&!empty($_POST['bando']))
  {
     $facebook=$_POST['facebook'];
     $sodienthoai=$_POST['sodienthoai'] ;
     $email=$_POST['email'] ;
     $diachi=$_POST['diachi'] ;
     $dieukhoan=$_POST['dieukhoan'] ;
     $bando=$_POST['bando'] ;
    $rt=themlienhe($diachi,$sodienthoai,$email,$facebook,$dieukhoan,$bando,$conn); 
    
  
  }
  else{
   echo '<script language="javascript">';
   echo 'alert("bạn chưa nhập đủ thông tin !")';
   echo '</script>';

  }
}
 ?>

   <div class="container-ad">
   <div class="edit-ad">
   <div class="name-ed-ad"> <h2><h2><a href="./index-ad.php?action=lienhe"><i style="color: white;" class="fas fa-sign-out-alt"></i></a>Thêm liên hệ</h2></div>
       <form role="form" method="POST" enctype="multipart/form-data"  action="">
        
  <div class="input-ad">
    <div class="label-ad">
       <label >Facebook</label>
       </div>
          <input type="text" name="facebook" >
          </div>
           
          <div class="input-ad">
    <div class="label-ad">
       <label >Số điện thoại</label>
       </div>
          <input type="text" name="sodienthoai" >
          </div>
          <div class="input-ad">
    <div class="label-ad">
       <label >Email</label>
       </div>
          <input type="text" name="email" >
          </div>
           

          <div class="input-ad">
        <div class="label-ad">
       <label >Địa chỉ</label>
       </div>
        <textarea name="diachi" id="product-content" cols="100" rows="40" ></textarea>
        <div class="label-ad">
       <label  >Điều khoản</label>
       </div>
        <textarea id="text2" name="dieukhoan" id="product-content" cols="100" rows="40" ></textarea>

        <div class="label-ad">
       <label  >Bản đồ</label>
       </div>
        <textarea id="text2" name="bando" id="product-content" cols="100" rows="40" ></textarea>
        </div>
        <div id="reset" class="input-ad">
        
       <input type="submit" name="submit" value="Thêm liên hệ">
       <input type="reset" value="Reset">
        </div>
        </form>
   </div>




   </div> 
   <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
   <script src="./ckeditor_4.17.1_5bcc501d998e/ckeditor/ckeditor.js"></script>
   <script>
                    CKEDITOR.replace( 'diachi');
                    CKEDITOR.replace( 'dieukhoan');
                    CKEDITOR.replace( 'bando');
                    
       
                </script>
</body>
</html>
        