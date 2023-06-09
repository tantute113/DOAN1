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

 margin:  10px auto;
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
 .ck.ck-editor {width: 500px;}
    </style>
</head>
<body>
<?php 
 if(isset($_POST['submit'])){
  if(isset($_POST['ten'])&&!empty($_POST['ten'])&&isset($_POST['message'])&&!empty($_POST['message'])&&isset($_FILES['image'])&&!empty($_FILES['image']))
  {
     
     $ten=$_POST['ten'];
     $message=$_POST['message'] ;
     $path = "../image/";
     $tmp_name = $_FILES['image']['tmp_name'];
     $anh = $_FILES['image']['name'];
     move_uploaded_file($tmp_name,$path.$anh);
    $rt=themtintuc($ten,$anh,$message,$conn);
 
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
   <div class="name-ed-ad"> <h2><a href="./index-ad.php?action=tintuc"><i style="color: white;" class="fas fa-sign-out-alt"></i></a>Thêm tin tức</h2></div>
       <form role="form" method="POST" enctype="multipart/form-data"  action="">
  <div class="input-ad">
    <div class="label-ad">
       <label >Tiêu đề</label>
       </div>
          <input type="text" name="ten" >
          </div>
           
           <div class="input-ad">
           <div class="label-ad">
       <label >Ảnh</label>
       </div>
             <input type="file" name="image" >
           </div>


        <div class="input-ad">
        <div class="label-ad">
       <label >Nội dung</label>
       </div>
        <textarea name="message" id="product-content" cols="100" rows="40" ></textarea>
        </div>
        <div class="input-ad">
       
        <?php if(isset($_POST['date'])){
      
         echo $t=time();
         echo date("d/m/y H:i:s",$t);
        }
        
        
        
        
        // echo date("d/m/y",$_POST['date']);} else {echo "";}
        
        
      

        
        
        ?>
      
       <input type="submit" name="submit" value="Thêm tin tức">
       <input type="reset" value="xóa">
        </div>
        </form>
   </div>




   </div> 
   <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
   <script src="./ckeditor_4.17.1_5bcc501d998e/ckeditor/ckeditor.js"></script>
   <script>
                    CKEDITOR.replace( 'message');
                </script>
</body>
</html>
        