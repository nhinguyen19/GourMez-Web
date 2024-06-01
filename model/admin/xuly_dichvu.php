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
            
            $hinhanh_banner = $_FILES['bannerdv']['name'];
            $hinhanhBanner_tmp = $_FILES['bannerdv']['tmp_name']; 
            $hinhanh_banner = time().'_'.$hinhanh_banner;



            // Kiểm tra xem tên dịch vụ đã tồn tại hay chưa
            $sql_check = "SELECT COUNT(*) as count FROM service WHERE service_name = '$tendichvu'";
            $result_check = mysqli_query($conn, $sql_check);
            $row_check = mysqli_fetch_assoc($result_check);
            $count = $row_check['count'];
    
            if($count > 0) {
                // Tên danh mục đã tồn tại, hiển thị thông báo bằng JavaScript
                echo "<script>alert('Không thể thêm dịch vụ. Dịch vụ đã tồn tại.'); window.location='tranghienthi.php?quanly=themdichvu';</script>";
            } else {
                // Tên danh mục chưa tồn tại, thực hiện thêm danh mục mới
                $sql_them = "INSERT INTO service(service_name, small_descript, image, banner) VALUES ('$tendichvu', '$mota', '$hinhanh','$hinhanh_banner')";
                move_uploaded_file($hinhanh_tmp,'../../view/admin/ql_dichvu/uploads/'.$hinhanh); 
                move_uploaded_file($hinhanhBanner_tmp,'../../view/admin/ql_dichvu/uploads/'.$hinhanh_banner); 
    
                if(mysqli_query($conn, $sql_them)) {
                    echo "<script>alert('Thêm dịch vụ thành công'); window.location='tranghienthi.php?quanly=tatcadichvu';</script>";
                    exit();
                } else {
                    echo "Lỗi: " . mysqli_error($conn);
                }
            }
        }
    }

    function suaDichVu()
    {
        $conn = connectdb();
        if(isset($_POST['sua'])) 
        {
            $tendichvu = $_POST['tendichvu'];
            $mota = $_POST['mota'];
            $id = $_GET['iddichvu'];
            $hinhanh = $_FILES['logodichvumoi']['name'];
            $hinhanh_tmp = $_FILES['logodichvumoi']['tmp_name']; 
            $hinhanh = time().'_'.$hinhanh;
    
            $hinhanh_banner = $_FILES['bannerdichvumoi']['name'];
            $hinhanhBanner_tmp = $_FILES['bannerdichvumoi']['tmp_name']; 
            $hinhanh_banner = time().'_'.$hinhanh_banner;

             // Kiểm tra xem tên dịch vụ đã tồn tại hay chưa
             $sql_check = "SELECT COUNT(*) as count FROM service WHERE service_name = '$tendichvu'";
             $result_check = mysqli_query($conn, $sql_check);
             $row_check = mysqli_fetch_assoc($result_check);
             $count = $row_check['count'];

             if ($count > 0)
             {
                echo "<script>alert('Không thể sửa dịch vụ. Tên dịch vụ đã tồn tại.'); window.location='tranghienthi.php?quanly=tatcadichvu';</script>";
             }
             else
             {
                if($mota !="")
                {
                    $sql_sua = "UPDATE service 
                                SET small_descript= '$mota' 
                                WHERE id_service = '$id'";
                    if(mysqli_query($conn, $sql_sua)) 
                    {
                        echo "<script>alert('Sửa dịch vụ thành công'); window.location='tranghienthi.php?quanly=tatcadichvu';</script>";
                        exit();
                    } else 
                    {
                        echo "<script>alert('Sửa dịch vụ thất bại'); window.location='tranghienthi.php?quanly=tatcadichvu';</script>";
                        echo mysqli_error($conn);
                    }
                                
                }
                else if($tendichvu != "")
                {
                    $sql_sua = "UPDATE service 
                                SET service_name= '$tendichvu' 
                                WHERE id_service = '$id'";
                    if(mysqli_query($conn, $sql_sua)) 
                    {
                        echo "<script>alert('Sửa dịch vụ thành công'); window.location='tranghienthi.php?quanly=tatcadichvu';</script>";
                        exit();
                    } else 
                    {
                        echo "Lỗi: " . mysqli_error($conn);
                    }
                }
                else if($hinhanh != "")
                {
                    $sql_select_image = "SELECT image FROM service WHERE id_service = '$id' ";
                    $result = mysqli_query($conn, $sql_select_image);
                    $row = mysqli_fetch_assoc($result);
                    $old_image = $row['image'];
                    $old_image_path = "../../view/admin/ql_dichvu/uploads/" . $old_image;

                    if (file_exists($old_image_path)) {
                        unlink($old_image_path);
                    }
                
                    $sql_sua = "UPDATE service 
                                SET  image= '$hinhanh'
                                WHERE id_service = '$id'";
                    move_uploaded_file($hinhanh_tmp,'../../view/admin/ql_dichvu/uploads/'.$hinhanh); 

                    if(mysqli_query($conn, $sql_sua)) 
                    {
                        echo "<script>alert('Sửa dịch vụ thành công'); window.location='tranghienthi.php?quanly=tatcadichvu';</script>";
                    } else 
                    {
                        echo "Lỗi: " . mysqli_error($conn);
                    }
                }
                
                else if($hinhanh_banner != "")
                {
                    $sql_select_image = "SELECT banner FROM service WHERE id_service = '$id' ";
                    $result = mysqli_query($conn, $sql_select_image);
                    $row = mysqli_fetch_assoc($result);
                    $old_image = $row['image'];
                    $old_image_path = "../../view/admin/ql_dichvu/uploads/" . $old_image;

                    if (file_exists($old_image_path)) {
                        unlink($old_image_path);
                    }
                
                    $sql_sua = "UPDATE service 
                                SET  banner= '$hinhanh_banner'
                                WHERE id_service = '$id'";
                    move_uploaded_file($hinhanhBanner_tmp,'../../view/admin/ql_dichvu/uploads/'.$hinhanh_banner); 

                    if(mysqli_query($conn, $sql_sua)) 
                    {
                        echo "<script>alert('Sửa dịch vụ thành công'); window.location='tranghienthi.php?quanly=tatcadichvu';</script>";
                        exit();
                    } else 
                    {
                        echo "Lỗi: " . mysqli_error($conn);
                    }
                }
            }
        }   
    }
    function xoaDichVu()
    {
        $conn = connectdb();
            if (isset($_GET['iddichvu']))
            {
                $iddv = $_GET['iddichvu'];
                $sql = "SELECT * FROM service WHERE id_service = $iddv LIMIT 1";
                $query = mysqli_query($conn, $sql);

                if (mysqli_num_rows($query) > 0) {
                    // Fetch the image filename from the database
                    $row = mysqli_fetch_assoc($query);
                    $imageName = $row['image'];

                    // Delete the image file from the "uploads" folder
                    $imagePath = "../../view/admin/ql_dichvu/uploads/" . $imageName;
                    if (file_exists($imagePath)) {
                        unlink($imagePath);
                    }

                    $banner = $row['banner'];

                    $banner_path = "../../view/admin/ql_dichvu/uploads/" . $banner;

                    if (file_exists($imagePath)) {
                        unlink($imagePath);
                    }
                    // Delete the record from the database
                    $sql_xoa = "DELETE FROM service WHERE id_service = '$iddv'";
                    mysqli_query($conn, $sql_xoa);

                    // Update the food_id values
                    $sql_capnhat = "SET @count = 0";
                    mysqli_query($conn, $sql_capnhat);

                    $sql_capnhat = "UPDATE service SET id_service = @count:= @count + 1";
                    mysqli_query($conn, $sql_capnhat);

                    // Reset the auto-increment value
                    $sql_reset_auto_increment = "ALTER TABLE service AUTO_INCREMENT = 1";
                    mysqli_query($conn, $sql_reset_auto_increment);

                    echo "<script>alert('Xóa dịch vụ thành công.');window.location='tranghienthi.php?quanly=tatcadichvu'</script>";
                    exit();
                }
                // else
                // {
                //     echo "<script>alert('Dịch vụ không tồn tại.');</script>";
                // }
        }
    }

    function themmonanDV()
    {
        $conn = connectdb();
        if(isset($_POST['themmonan']))
        {
            $id = $_POST['IDdichvu'];
            $tenmon_dv = $_POST['tenmon_dv'];
            $giamon_dv = $_POST['giamonan_dv'];
            $hinhanh = $_FILES['hinhanhmondv']['name'];
            $hinhanh_tmp = $_FILES['hinhanhmondv']['tmp_name']; 
            $hinhanh = time().'_'.$hinhanh;

            // Kiểm tra xem tên món đã tồn tại hay chưa
            $sql_check = "SELECT COUNT(*) as count FROM food_for_service WHERE food_combo = '$tenmon_dv'";
            $result_check = mysqli_query($conn, $sql_check);
            $row_check = mysqli_fetch_assoc($result_check);
            $count = $row_check['count'];
    
            if($count > 0) {
                // Tên món ăn đã tồn tại, hiển thị thông báo bằng JavaScript
                echo "<script>alert('Không thể thêm món. Món ăn đã tồn tại.'); window.location='tranghienthi.php?quanly=tatcadichvu';</script>";
            } else {
                // Tên danh mục chưa tồn tại, thực hiện thêm danh mục mới
                $sql_them = "INSERT INTO food_for_service(ID_service, food_combo, price, image) VALUES ('$id', '$tenmon_dv', '$giamon_dv','$hinhanh')";
                move_uploaded_file($hinhanh_tmp,'../../view/admin/ql_dichvu/uploads/'.$hinhanh);
    
                if(mysqli_query($conn, $sql_them)) {
                    echo $hinhanh;
                    echo "<script>alert('Thêm món thành công'); window.location='tranghienthi.php?quanly=suaDichVu&iddichvu=$id';</script>";
                    exit();
                } else {
                    echo "Lỗi: " . mysqli_error($conn);
                }
            }
        }
    }

    function SuaMonAn()
    {
        $conn = connectdb();
        if(isset($_POST['suamonanDV'])) 
        {
            $id = $_GET['idmonan'];
            $tenmonan_DV = $_POST['tenmonandv'];
            $giamonan_DV = $_POST['giamonandv'];
            // $iddichvu = $_POST['iddichvu'];
            $hinhanh = $_FILES['hinhanhmonandvmoi']['name'];
            $hinhanh_tmp = $_FILES['hinhanhmonandvmoi']['tmp_name']; 
            $hinhanh = time().'_'.$hinhanh;

            // Kiểm tra xem tên món đã tồn tại hay chưa
            $sql_check = "SELECT COUNT(*) as count FROM food_for_service WHERE food_combo = '$tenmonan_DV'";
            $result_check = mysqli_query($conn, $sql_check);
            $row_check = mysqli_fetch_assoc($result_check);
            $count = $row_check['count'];

            if ($count > 0)
            {
                // Tên món ăn đã tồn tại, hiển thị thông báo bằng JavaScript
                echo "<script>alert('Không thể sửa món ăn. Món ăn đã tồn tại.'); window.location='tranghienthi.php?quanly=tatcadichvu';</script>";
            }
            else
            {
            if ($tenmonan_DV != "")
            {
                $sql_sua = "UPDATE food_for_service 
                        SET food_combo = '$tenmonan_DV'
                        Where ID_food = '$id'";
                if(mysqli_query($conn, $sql_sua)) 
                    {
                        echo "<script>alert('Sửa món ăn thành công'); window.location='tranghienthi.php?quanly=tatcadichvu' ;</script>";
                    } else 
                    {
                        echo "Lỗi: " . mysqli_error($conn);
                    }
            }

            else if ($giamonan_DV != "")
            {
                $sql_sua = "UPDATE food_for_service 
                        SET price = '$giamonan_DV'
                        Where ID_food = '$id'";
                if(mysqli_query($conn, $sql_sua)) 
                    {
                        echo "<script>alert('Sửa món ăn thành công'); window.location='tranghienthi.php?quanly=tatcadichvu' ;</script>";
                    } else 
                    {
                        echo "Lỗi: " . mysqli_error($conn);
                    }
            }

            else if ($hinhanh != "")
            {
                $sql_select_image = "SELECT image FROM food_for_service WHERE ID_food = '$id' ";
                $result = mysqli_query($conn, $sql_select_image);
                $row = mysqli_fetch_assoc($result);
                $old_image = $row['image'];
                $old_image_path = "../../view/admin/ql_dichvu/uploads/" . $old_image;

                if (file_exists($old_image_path)) {
                    unlink($old_image_path);
                }
               
                $sql_sua = "UPDATE food_for_service
                            SET image = '$hinhanh'
                            WHERE ID_food = '$id'";
                move_uploaded_file($hinhanh_tmp,'../../view/admin/ql_dichvu/uploads/'.$hinhanh); 
                if(mysqli_query($conn, $sql_sua)) 
                {
                    echo "<script>alert('Sửa món ăn thành công'); window.location='tranghienthi.php?quanly=tatcadichvu' ;</script>";
                    exit();
                } else 
                {
                    echo "Lỗi: " . mysqli_error($conn);
                }

            }

        }
    }
    }  

    function xoamonandichvu()
    {
        $conn = connectdb();
       
        if (isset($_GET['idmonan']))
        {
            $idmonandv = $_GET['idmonan'];
            $iddichvu =$_GET['iddichvu'];
            $sql = "SELECT * FROM food_for_service WHERE ID_food = $idmonandv LIMIT 1";
            $query = mysqli_query($conn, $sql);

            if (mysqli_num_rows($query) > 0) {
                // Fetch the image filename from the database
                $row = mysqli_fetch_assoc($query);
                $imageName = $row['image'];

                // Delete the image file from the "uploads" folder
                $imagePath = "../../view/admin/ql_dichvu/uploads/" . $imageName;
                if (file_exists($imagePath)) {
                    unlink($imagePath);
                }

                // Delete the record from the database
                $sql_xoa = "DELETE FROM food_for_service WHERE ID_food = '$idmonandv'";
                mysqli_query($conn, $sql_xoa);

                // Update the food_id values
                $sql_capnhat = "SET @count = 0";
                mysqli_query($conn, $sql_capnhat);

                $sql_capnhat = "UPDATE food_for_service SET ID_food = @count:= @count + 1";
                mysqli_query($conn, $sql_capnhat);

                // Reset the auto-increment value
                $sql_reset_auto_increment = "ALTER TABLE food_for_service AUTO_INCREMENT = 1";
                mysqli_query($conn, $sql_reset_auto_increment);

                echo "<script>alert('Xóa thành công.');window.location='tranghienthi.php?quanly=suaDichVu&iddichvu=$iddichvu'</script>";
                exit();
            }
            else
            {
                echo "<script>alert('Sản phẩm không tồn tại.');</script>";
            }
            
        }
    
    }

   

?>