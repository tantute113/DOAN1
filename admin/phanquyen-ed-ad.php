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
 width: 85%;
 
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

 width: 600px;
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
   <div class="container-ad">
   <div class="edit-ad">
       <div class="name-ed-ad"> <h2><a href="./index-ad.php?action=phanquyen"><i style="color: white;" class="fas fa-sign-out-alt"></i></a>Phân quyền</h2></div>
       <?php
         if(isset($_GET['idquyen'])){
               $ten_tk=$_GET['idquyen']; 
               $rtp=laytaikhoan($ten_tk,$conn);
                  $kpp=mysqli_fetch_array($rtp) ;

               }
               if(isset($_POST['quyen'])){
                   $kttp=$_POST['quyen'] ;
                   $kttppp=$_POST['tentaikhoan'];
                  $kquyen=capnhatphanquyen($kttppp,$kttp,$conn) ;
                  header("location:index-ad.php?action=phanquyen");
               }
         ?>
         <form action="" method="POST"> 
  <div class="input-ad">
    <div class="label-ad">
       <label >Tên tài khoản</label>
       </div>
       
          <input type="text" name="tentaikhoan" value="<?php echo $kpp['TK_TEN']; ?>" >
          </div>    
           <div class="input-ad">
           <div class="label-ad">
       <label >Loại quyền</label>
       </div>
      
          <select name="quyen">
             
            <?php $ktl=layloaitaikhoan($conn) ;
            foreach($ktl as $ktll){ ?>
              <option value="<?php echo $ktll['LOAI_MA'] ;?>"><?php echo $ktll['LOAI_TEN']; ?></option>
              <?php }
              
               var_dump($ktll) ;
              
              
              ?>
          </select>
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
                    CKEDITOR.replace( 'content-ad');
                    CKEDITOR.replace( 'content-ad1');
                    
       
                </script>
</body>
</html>