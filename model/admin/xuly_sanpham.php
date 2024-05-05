<?php
    function themSanPham()
    {
        $conn = connectdb();
    
        if (isset($_POST['themsanpham'])) {
            $tensanpham = $_POST['tensanpham'];
            $giasanpham = $_POST['giasanpham'];
            $giagoc = $_POST['giagoc_sanpham'];
            $mota = $_POST['mota'];
            $hinhanh = $_FILES['hinhanh']['name'];
            $hinhanh_tmp = $_FILES['hinhanh']['tmp_name']; 
            $hinhanh = time().'_'.$hinhanh;
    
            // Kiểm tra xem tên danh mục đã tồn tại hay chưa
            $sql_check = "SELECT COUNT(*) as count FROM food WHERE food_name = '$tensanpham'";
            $result_check = mysqli_query($conn, $sql_check);
            $row_check = mysqli_fetch_assoc($result_check);
            $count = $row_check['count'];
    
            if($count > 0) {
                // Tên danh mục đã tồn tại, hiển thị thông báo bằng JavaScript
                echo "<script>alert('Không thể thêm sản phẩm. Sản phẩm đã tồn tại.'); window.location='tranghienthi.php?quanly=themsanpham';</script>";
            } else {
                // Tên danh mục chưa tồn tại, thực hiện thêm danh mục mới
                $sql_them = "INSERT INTO food(food_name, original_price, selling_price, small_descr, img) VALUES ('$tensanpham', '$giagoc', '$giasanpham', '$mota', '$hinhanh')";
                move_uploaded_file($hinhanh_tmp,'../../view/admin/ql_sanpham/uploads/'.$hinhanh); 
    
                if(mysqli_query($conn, $sql_them)) {
                    header('Location: tranghienthi.php?quanly=themsanpham');
                    exit();
                } else {
                    echo "Lỗi: " . mysqli_error($conn);
                }
            }
        }
    }
    function xoaSanPham()
    {
        $conn = connectdb();

        // Kiểm tra xem ID sản phẩm có được truyền vào không
        if (isset($_GET['idsanpham'])) {
            $id = $_GET['idsanpham'];

            // Lấy thông tin sản phẩm cần xóa
            $sql = "SELECT * FROM food WHERE food_id = '$id' LIMIT 1";
            $query = mysqli_query($conn, $sql);
            
            // Kiểm tra xem sản phẩm có tồn tại hay không
            if (mysqli_num_rows($query) > 0) {
                // Xóa sản phẩm
                $sql_xoa = "DELETE FROM food WHERE food_id = '$id'";
                mysqli_query($conn, $sql_xoa);

                // Cập nhật lại các giá trị ID của danh mục còn lại
                $sql_capnhat = "SET @count = 0";
                mysqli_query($conn, $sql_capnhat);

                $sql_capnhat = "UPDATE food SET food_id = @count:= @count + 1";
                mysqli_query($conn, $sql_capnhat);

                // Thiết lập lại giá trị tự động tăng cho trường ID
                $sql_reset_auto_increment = "ALTER TABLE food AUTO_INCREMENT = 1";
                mysqli_query($conn, $sql_reset_auto_increment);

                // Chuyển hướng về trang hiển thị danh sách sản phẩm sau khi xóa thành công
                header('Location: tranghienthi.php?quanly=tatcasp');
                exit();
            } else {
                // Sản phẩm không tồn tại, hiển thị thông báo bằng JavaScript
                echo "<script>alert('Sản phẩm không tồn tại.'); window.location='tranghienthi.php?quanly=tatcasp';</script>";
            }
        }
    }
?>