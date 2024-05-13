<?php
    function themSanPham()
    {
        $conn = connectdb();
    
        if (isset($_POST['themsanpham'])) {
            $tensanpham = $_POST['tensanpham'];
            $giasanpham = $_POST['giasanpham'];
            $giagoc = $_POST['giagoc_sanpham'];
            $mota = $_POST['mota'];
            $danhmuc = $_POST['danhmuc'];
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
                $sql_them = "INSERT INTO food(food_name, cate_id ,original_price, selling_price, small_descr, img) VALUES ('$tensanpham','$danhmuc', '$giagoc', '$giasanpham', '$mota', '$hinhanh')";
                move_uploaded_file($hinhanh_tmp,'../../view/admin/ql_sanpham/uploads/'.$hinhanh); 
    
                if(mysqli_query($conn, $sql_them)) {
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

        if (isset($_GET['idsanpham'])) {
            $id = $_GET['idsanpham'];

            $sql = "SELECT * FROM food WHERE food_id = '$id' LIMIT 1";
            $query = mysqli_query($conn, $sql);

            if (mysqli_num_rows($query) > 0) {
                // Fetch the image filename from the database
                $row = mysqli_fetch_assoc($query);
                $imageName = $row['img'];

                // Delete the image file from the "uploads" folder
                $imagePath = "../../view/admin/ql_sanpham/uploads/" . $imageName;
                if (file_exists($imagePath)) {
                    unlink($imagePath);
                }

                // Delete the record from the database
                $sql_xoa = "DELETE FROM food WHERE food_id = '$id'";
                mysqli_query($conn, $sql_xoa);

                // Update the food_id values
                $sql_capnhat = "SET @count = 0";
                mysqli_query($conn, $sql_capnhat);

                $sql_capnhat = "UPDATE food SET food_id = @count:= @count + 1";
                mysqli_query($conn, $sql_capnhat);

                // Reset the auto-increment value
                $sql_reset_auto_increment = "ALTER TABLE food AUTO_INCREMENT = 1";
                mysqli_query($conn, $sql_reset_auto_increment);

                header('Location: tranghienthi.php?quanly=tatcasp');
                exit();
            } else {
                echo "<script>alert('Sản phẩm không tồn tại.'); window.location='tranghienthi.php?quanly=tatcasp';</script>";
            }
        }
    }
    function suaSanPham()
    {
        $conn = connectdb();
        if(isset($_POST['suaspham'])) 
        {
            $id = $_GET['idsanpham'];
            $tensp = $_POST['tensanpham'];
            $giaban = $_POST['giasanpham'];
            $giagoc = $_POST['giagoc_sanpham'];
            $mota = $_POST['mota'];
            $hinhanh = $_FILES['hinhanh']['name'];
            $hinhanh_tmp = $_FILES['hinhanh']['tmp_name']; 
            $hinhanh = time().'_'.$hinhanh;
            
            if($_FILES['hinhanh'])
            {
                $sql_sua = "UPDATE food SET food_name = '$tensp', selling_price = '$giaban',original_price='$giagoc',small_descr='$mota',img='$hinhanh' WHERE food_id = '$id'";
                move_uploaded_file($hinhanh_tmp,'../../view/admin/ql_sanpham/uploads/'.$hinhanh); 
            }
            else{
                $sql_sua = "UPDATE food SET food_name = '$tensp', selling_price = '$giaban',original_price='$giagoc',small_descr='$mota' WHERE food_id = '$id'";
            }
            if(mysqli_query($conn, $sql_sua)) {
                echo '<div style="text-align: center; margin-top: 50px; font-size: 18px; color: green;">Category updated successfully!</div>';
            } else {
                echo "Error: " . mysqli_error($conn);
            }
        }
    }
?>