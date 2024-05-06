<?php
    function themDanhMuc()
    {
        $conn = connectdb();
        
        if(isset($_POST['themdanhmuc']))
        {
            $tenloaisp = $_POST['tendanhmuc'];
            
            // Kiểm tra xem tên danh mục đã tồn tại hay chưa
            $sql_check = "SELECT COUNT(*) as count FROM category WHERE cate_name = '$tenloaisp'";
            $result_check = mysqli_query($conn, $sql_check);
            $row_check = mysqli_fetch_assoc($result_check);
            $count = $row_check['count'];
            
            if($count > 0) {
                // Tên danh mục đã tồn tại, hiển thị thông báo bằng JavaScript
                echo "<script>alert('Không thể thêm danh mục. Tên danh mục đã tồn tại.'); window.location='tranghienthi.php?quanly=themdanhmuc';</script>";
            } else {
                // Tên danh mục chưa tồn tại, thực hiện thêm danh mục mới
                $sql_them = "INSERT INTO category(cate_id, cate_name) VALUES ('$id', '$tenloaisp')";
                
                if(mysqli_query($conn, $sql_them)) {
                    header('Location: tranghienthi.php?quanly=themdanhmuc');
                    exit();
                } else {
                    echo "Lỗi: " . mysqli_error($conn);
                }
            }
        }
    }
    function suaDanhMuc()
    {
        $conn = connectdb();
        if(isset($_POST['sua'])) 
        {
            $tenloaisp = $_POST['tendanhmuc'];
            $id = $_GET['id'];
            
            $sql_sua = "UPDATE category SET cate_name = '$tenloaisp' WHERE cate_id = '$id'";
            
            if(mysqli_query($conn, $sql_sua)) {
                header('Location: tranghienthi.php?quanly=tatca');
                exit();
            } else {
                echo "Lỗi: " . mysqli_error($conn);
            }
        }
    }
    function xoaDanhMuc($id)
    {
        $conn = connectdb();
        
        // Xóa danh mục khỏi bảng danh mục
        $sql_xoa = "DELETE FROM category WHERE cate_id = '$id'";
        mysqli_query($conn, $sql_xoa);
        
        // Cập nhật lại các giá trị ID của danh mục còn lại
        $sql_capnhat = "SET @count = 0";
        mysqli_query($conn, $sql_capnhat);
        
        $sql_capnhat = "UPDATE category SET cate_id = @count:= @count + 1";
        mysqli_query($conn, $sql_capnhat);
        
        // Thiết lập lại giá trị auto-increment cho trường ID
        $sql_reset_auto_increment = "ALTER TABLE category AUTO_INCREMENT = 1";
        mysqli_query($conn, $sql_reset_auto_increment);
    }

    if(isset($_GET['quanly']) && $_GET['quanly'] == 'xoa' && isset($_GET['iddanhmuc'])) {
        $id = $_GET['iddanhmuc'];
        xoaDanhMuc($id);
        header('Location: tranghienthi.php?quanly=tatca');
        exit();
    }
?>