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
  if(isset($_POST['tendanhmuc'])&&!empty($_POST['tendanhmuc']))
  {
     
     $tendanhmuc=$_POST['tendanhmuc'];
     $id=$_POST['id'];
     $noidungdm=$_POST['noidungdanhmuc'];
   $rrrt=suadanhmuc($id,$tendanhmuc,$noidungdm,$conn);
   header("Location:index-ad.php?action=danhmuc");
  }
  else{
   echo '<script language="javascript">';
   echo 'alert("bạn chưa nhập đủ thông tin !")';
   echo '</script>';

  }
}
 ?>
<?php 
if(isset($_GET['idsua']))
{
    $iddm=$_GET['idsua'];
$rrrt= laydanhmuc($_GET['idsua'],$conn);
$rt=mysqli_fetch_array($rrrt);

}
?>
   <div class="container-ad">
   <div class="edit-ad">
   <div class="name-ed-ad"> <h2><h2><a href="./index-ad.php?action=danhmuc"><i style="color: white;" class="fas fa-sign-out-alt"></i></a>Sửa danh mục</h2></div>
       <form role="form" method="POST" enctype="multipart/form-data"  action="">
        
  <div class="input-ad">
    <div class="label-ad">
       <label >Tên danh mục</label>
       </div>
          <input type="text" name="tendanhmuc" value="<?php echo $rt['DM_TEN']; ?>" >
          <input type="hidden" name="id" value="<?php echo $rt['DM_MA']; ?>" >
          </div>
           
        
           

          <div class="input-ad">
       
        <div class="label-ad">
       <label  >Nội dung danh mục</label>
       </div>
        <textarea id="text2" name="noidungdanhmuc" id="product-content" cols="100" rows="40" ><?php echo $rt['DM_MOTA']; ?></textarea>
        </div>
        <div id="reset" class="input-ad">
        
       <input type="submit" name="submit" value="Cập nhật">
       <input type="reset" value="Reset">
        </div>
        </form>
   </div>




   </div> 
   <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
   <script src="./ckeditor_4.17.1_5bcc501d998e/ckeditor/ckeditor.js"></script>
   <script>
                   
                    CKEDITOR.replace( 'noidungdanhmuc');
                    
       
                </script>
</body>
</html>
        