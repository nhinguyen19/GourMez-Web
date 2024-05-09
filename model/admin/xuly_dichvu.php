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
                $sql_them = "INSERT INTO service(service_name, small_descript, image) VALUES ('$tendichvu', '$mota', '$hinhanh')";
                move_uploaded_file($hinhanh_tmp,'../../view/admin/ql_dichvu/uploads/'.$hinhanh); 
    
                if(mysqli_query($conn, $sql_them)) {
                    echo "<script>alert('Thêm dịch vụ thành công'); window.location='tranghienthi.php?quanly=themdichvu';</script>";
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
            

            if($tendichvu == "" && $mota !="")
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
                    echo "Lỗi: " . mysqli_error($conn);
                }
                            
            }
            else if($tendichvu != ""&& $mota == "")
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
            else
            {
                $sql_sua = "UPDATE service 
                            SET service_name= '$tendichvu', small_descript = '$mota'
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
            
        }    
    }
    function xoaDichVu($id)
    {
        $conn = connectdb();
        
        // Xóa danh mục khỏi bảng dịch vụ
        $sql_xoa = "DELETE FROM service WHERE id_service = '$id'";
        mysqli_query($conn, $sql_xoa);
    
    }

    if(isset($_GET['quanly']) && $_GET['quanly'] == 'xoaDichVu' && isset($_GET['iddichvu'])) {
        $id = $_GET['iddichvu'];
        xoaDichVu($id);
        header('Location: tranghienthi.php?quanly=tatcadichvu');
        exit();
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
            $iddichvu = $_POST['iddichvu'];
            $hinhanh = $_FILES['hinhanhmonandv']['name'];
            $hinhanh_tmp = $_FILES['hinhanhmonandv']['tmp_name']; 
            $hinhanh = time().'_'.$hinhanh;


            if ($tenmonan_DV != " ")
            {
                $sql_sua = "UPDATE food_for_service 
                        SET food_combo = '$tenmonan_DV'
                        Where ID_food = '$id'";
                if(mysqli_query($conn, $sql_sua)) 
                    {
                        echo "<script>alert('Sửa món ăn thành công'); window.location='tranghienthi.php?quanly=suamonandichvu&idmonan=$id' ;</script>";
                    } else 
                    {
                        echo "Lỗi: " . mysqli_error($conn);
                    }
            }

            if ($giamonan_DV != " ")
            {
                $sql_sua = "UPDATE food_for_service 
                        SET price = '$giamonan_DV'
                        Where ID_food = '$id'";
                if(mysqli_query($conn, $sql_sua)) 
                    {
                        echo "<script>alert('Sửa món ăn thành công'); window.location='tranghienthi.php?quanly=suamonandichvu&idmonan=$id' ;</script>";
                        exit();
                    } else 
                    {
                        echo "Lỗi: " . mysqli_error($conn);
                    }
            }

            if ($hinhanh != " ")
            {
                $sql_sua = "UPDATE food_for_service
                            SET image = '$hinhanh'
                            WHERE ID_food = '$id'";
                if(mysqli_query($conn, $sql_sua)) 
                {
                    echo "<script>alert('Sửa món ăn thành công'); window.location='tranghienthi.php?quanly=suamonandichvu&idmonan=$id' ;</script>";
                    exit();
                } else 
                {
                    echo "Lỗi: " . mysqli_error($conn);
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
            $sql_xoa = "SELECT * FROM food_for_service WHERE ID_food = $idmonandv";
            $query = mysqli_query($conn, $sql_xoa);
            

            if (mysqli_num_rows($query) > 0)
            {
                $sql_xoa = "DELETE FROM food_for_service WHERE ID_food = $idmonandv";
                $query = mysqli_query($conn, $sql_xoa);
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