<?php
    function themDichVu()
{
        $conn = connectdb();
    
        if (isset($_POST['themdichvu'])) {
            $tendichvu = $_POST['tendichvu'];
            $mota = $_POST['motadichvu'];
            $hinhanh = $_FILES['hinhanhdv']['name'];
            $hinhanh_tmp = $_FILES['hinhanhdv']['tmp_name']; 
            $hinhanh = time().'_'.$hinhanh;
    
            // Kiểm tra xem tên danh mục đã tồn tại hay chưa
            $sql_check = "SELECT COUNT(*) as count FROM service WHERE service_name = '$tendichvu'";
            $result_check = mysqli_query($conn, $sql_check);
            $row_check = mysqli_fetch_assoc($result_check);
            $count = $row_check['count'];
    
            if($count > 0) {
                // Tên danh mục đã tồn tại, hiển thị thông báo bằng JavaScript
                echo "<script>alert('Không thể thêm dịch vụ. Dịch vụ đã tồn tại.'); window.location='tranghienthi.php?quanly=themdichvu';</script>";
            } else {
                // Tên danh mục chưa tồn tại, thực hiện thêm danh mục mới
                $sql_them = "INSERT INTO service(service_name, small_descript, image) VALUES ('$tendichvu', '$mota', '$hinhanh')";
                move_uploaded_file($hinhanh_tmp,'../../view/admin/ql_dichvu/image_dv/'.$hinhanh); 
    
                if(mysqli_query($conn, $sql_them)) {
                    echo "<script>alert('Thêm dịch vụ thành công'); window.location='tranghienthi.php?quanly=themdichvu';</script>";
                    exit();
                } else {
                    echo "Lỗi: " . mysqli_error($conn);
                }
            }
        }
    }

    function xoaDichVu()
    {
        
    }