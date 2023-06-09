<?php include "./conn.php" ;
 include "./fuction.php";
 include "./define.php";
 include "./xacthuc.php";
?>
<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./index-ad.css">
    <script src="https://kit.fontawesome.com/3cf6918e55.js" crossorigin="anonymous"></script>
</head>
<style type="text/css">
  body{
      
      padding: 0;
      margin: 0;
      font-family: sans-serif;
      background-color: whitesmoke;
  }
  .content-ad{
      margin: 0 auto;
      width:76%;
      height: auto;
      float: right;
  }

</style>
<body>
    <?php include "./menu-ad.php"; 
    
     include "./left-container.php";
    
    ?>
     <div class="content-ad">
       <?php
        if(isset($_GET['action']))
        {

             switch($_GET['action'])
         {

            case 'product':
                 include "./product-ad.php" ;
                 break ;
                case 'khachhang':
                    include "./khachhang-ad.php" ;
                    break ;
                    case 'tintuc':
                        include "./tintuc-ad.php" ;
                        break ; 
                        case 'hoadon':
                            include "./hoadon-ad.php" ;
                            break ;
                            case 'lienhe':
                                include "./lienhe-ad.php" ;
                                break ;
                                case 'phanquyen':
                                     include "./phanquyen-ad.php" ;
                                     break ;
                                     case 'danhmuc':
                                        include "./danhmuc.php";
                                        break;
                                     case 'dangxuat':
                                       header("Location:./dangxuatad.php");
                                        break;
                                        case 'cthd':
                                            include "./cthd.php";
                                            break ;
                                            case 'giamgia':
                                                include "./giamgia.php";
                                                break ;
                                     default:
                                     include "./product-ad.php" ;
                                     
                                     break  ;
         }
        }
        else{
            include "./product-ad.php" ;

        }
       
       ?>
     </div>
     <script src="./index.js"></script>
</body>
</html>