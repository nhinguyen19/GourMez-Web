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
    
            $sql_check = "SELECT COUNT(*) as count FROM food WHERE food_name = '$tensanpham'";
            $result_check = mysqli_query($conn, $sql_check);
            $row_check = mysqli_fetch_assoc($result_check);
            $count = $row_check['count'];
    
            if($count > 0) {
                echo "<script>
                        Swal.fire({
                            icon: 'error',
                            title: 'Không thể thêm món ăn',
                            text: 'Tên món ăn đã tồn tại.',
                            confirmButtonColor: '#3085d6',
                            confirmButtonText: 'OK'
                        }).then((result) => {
                            if (result.isConfirmed) {
                                window.location.href = 'tranghienthi.php?quanly=themsanpham';
                            }
                        });
                      </script>";
            } else {
                $sql_them = "INSERT INTO food(food_name, cate_id ,original_price, selling_price, small_descr, img) VALUES ('$tensanpham','$danhmuc', '$giagoc', '$giasanpham', '$mota', '$hinhanh')";
                move_uploaded_file($hinhanh_tmp,'../../view/admin/ql_sanpham/uploads/'.$hinhanh); 
    
                if(mysqli_query($conn, $sql_them)) {
                    echo "<script>
                    Swal.fire({
                        icon: 'success',
                        title: 'Thêm món ăn thành công!',
                        showConfirmButton: false,
                        timer: 1500
                    });
                  </script>";
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

                $sql_xoa = "DELETE FROM food WHERE food_id = '$id'";
                mysqli_query($conn, $sql_xoa);

                $sql_capnhat = "SET @count = 0";
                mysqli_query($conn, $sql_capnhat);

                $sql_capnhat = "UPDATE food SET food_id = @count:= @count + 1";
                mysqli_query($conn, $sql_capnhat);

                $sql_reset_auto_increment = "ALTER TABLE food AUTO_INCREMENT = 1";
                mysqli_query($conn, $sql_reset_auto_increment);

                echo "<script>
                    Swal.fire({
                        icon: 'success',
                        title: 'Xóa sản phẩm thành công!',
                        showConfirmButton: false,
                        timer: 1500
                    }).then(function() {
                        window.location.href = 'tranghienthi.php?quanly=tatcasp'
                    });
                    </script>";
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
                echo "<script>
                    Swal.fire({
                        icon: 'success',
                        title: 'Cập nhật danh mục thành công!',
                        showConfirmButton: false,
                        timer: 1500
                    }).then(function() {
                        window.location.href = 'tranghienthi.php?quanly=tatcasp'
                    });
                  </script>";
            } else {
                echo "Error: " . mysqli_error($conn);
            }
        }
    }
?>