<?php
    require '../conn.php';
    require 'function.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="tintuc.css">
    <title>Document</title>
</head>
<body>
    <div class="header"></div>
    <div class="container-TT">
        <div class="xulyphantrang">
                <?php
                /*
                total_record: tổng số records
                current_page: trang hiện tại
                limit: số records hiển thị trên mỗi trang
                start: record bắt đầu trong câu lệnh SQL
                Thuật toán chung để tính start đó là: start = (current_page - 1) * limit.
                Tổng số records: Ta dùng lệnh count trong MySQL.
                Trang hiện tại: Dựa vào tham số page trên URL.
                Số records trong mỗi trang: Tham số do coder tự truyền vào.
                */
                    // BƯỚC 2: TÌM TỔNG SỐ RECORDS
                    $result = mysqli_query($connec, 'select count(TT_MA) as total from tintuc');
                    $row = mysqli_fetch_assoc($result);
                    $total_records = $row['total'];
                    
                    // BƯỚC 3: TÌM LIMIT VÀ CURRENT_PAGE
                    $current_page = isset($_GET['page']) ? $_GET['page'] : 1;
                    $limit = 3;
                    
                    // BƯỚC 4: TÍNH TOÁN TOTAL_PAGE VÀ START
                    // tổng số trang
                    $total_page = ceil($total_records / $limit);
                    
                    // Giới hạn current_page trong khoảng 1 đến total_page
                    if ($current_page > $total_page){
                        $current_page = $total_page;
                    }
                    else if ($current_page < 1){
                        $current_page = 1;
                    }
                    
                    // Tìm Start
                    $start = ($current_page - 1) * $limit;
                    
                    // BƯỚC 5: TRUY VẤN LẤY DANH SÁCH TIN TỨC
                    // Có limit và start rồi thì truy vấn CSDL lấy danh sách tin tức
                    $result = mysqli_query($connec, "SELECT * FROM tintuc LIMIT $start, $limit");
                ?>
            </div>
        <div class="body">
            <div class="khungtren">
                <h1>TIN TỨC</h1>
            </div>
            <div class="khungduoi">
                <?php
                while($row = mysqli_fetch_assoc($result))
                {
                ?>
                <div class="khung">
                    <div class="anh"><img src="./anh_tin_tuc/<?php echo $row['TT_HINHANH'];?>"></div>
                    <div class="tieude"><?php echo $row['TT_TEN'];?></div>
                    <div class="noidung"><a href="chitiet_tin.php?url=<?php echo $row['TT_MA'];?>">Xem chi tiết</a></div>
                </div>
                <?php 
                }
                ?>
            </div>
            <div class="control-btn">
                <div class="btn">
                    <?php
                    // PHẦN HIỂN THỊ PHÂN TRANG
                    
                    // Hiển thị nút trước
                    if ($current_page > 1 && $total_page > 1){
                        echo '<a href="tintuc.php?page='.($current_page-1).'">&larr;Trước</a>&#10032; ';
                    }
                    
                    // Lặp khoảng giữa
                    for ($i = 1; $i <= $total_page; $i++){
                        // Nếu là trang hiện tại thì hiển thị thẻ span
                        // ngược lại hiển thị thẻ a
                        if ($i == $current_page){
                            echo '<span>'.$i.'</span> 	&#10032; ';
                        }
                        else{
                            echo '<a href="tintuc.php?page='.$i.'">'.$i.'</a> 	&#10032; ';
                        }
                    }
                    
                    // Hiển thị nút sau
                    if ($current_page < $total_page && $total_page > 1){
                        echo '<a href="tintuc.php?page='.($current_page+1).'">Sau &rarr;</a> &#10032; ';
                    }
                ?>
                </div>
                
            </div>
        </div>
    </div>
    <div class="footer"></div>
</body>
</html>