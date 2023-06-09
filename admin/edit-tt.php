<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   
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
    object-fit: cover;
  }
  
  .input-ad{
    margin-left: 30px;
    margin-top: 10px;
    display: flex;
  
    height:auto;
    width: 600px;
  }
  .input-ad input[type="text"]{
    width: 400px;
    height: 50px;

  }
  .input-ad textarea{
    width: 400px;
    height: 500px;
  }
       .label-ad{
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
 .ck.ck-editor {width: 500px;}
    </style>
</head>
<body>
   <div class="container-ad">
   <div class="edit-ad">
       <div class="name-ed-ad"> <h2>Thêm sản phẩm</h2></div>
  <div class="input-ad">
    <div class="label-ad">
       <label >Tiêu đề</label>
       </div>
          <input type="text" >
          </div>
          <div class="input-ad">
          <div class="label-ad">
       <label >Ảnh hiện tai</label>
       </div>
          <img style="max-width:100px ;" src="./image/hinh2.jpg" alt="">
       
          </div>
          
           <div class="input-ad">
           <div class="label-ad">
       <label >Hình Ảnh</label>
       </div>
             <input type="file" >
           </div>

       
        <div class="input-ad">
        <div class="label-ad">
       <label >Nội dung</label>
       </div>
        <textarea name="content-ad" id="product-content" cols="100" rows="40"></textarea>
        </div>

   </div>


   </div> 
   <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
   <script src="./ckeditor_4.17.1_5bcc501d998e/ckeditor/ckeditor.js"></script>
   <script>
                    CKEDITOR.replace( 'content-ad');
                    
       
                </script>
</body>
</html>