<?php
    function themDanhMuc()
    {
        $conn = connectdb();
        
        if(isset($_POST['themdanhmuc']))
        {
            $tenloaisp = $_POST['tendanhmuc'];
          
            $sql_check = "SELECT COUNT(*) as count FROM category WHERE cate_name = '$tenloaisp'";
            $result_check = mysqli_query($conn, $sql_check);
            $row_check = mysqli_fetch_assoc($result_check);
            $count = $row_check['count'];
            
            if (empty($tenloaisp)) {
                echo "<script>
                        Swal.fire({
                            icon: 'error',
                            title: 'Lỗi',
                            text: 'Tên danh mục không được để trống.',
                            confirmButtonColor: '#3085d6',
                            confirmButtonText: 'OK'
                        }).then((result) => {
                            if (result.isConfirmed) {
                                window.location.href = 'tranghienthi.php?quanly=themdanhmuc';
                            }
                        });
                      </script>";
                return;
            }
            if ($count > 0) {
                echo "<script>
                        Swal.fire({
                            icon: 'error',
                            title: 'Không thể thêm danh mục',
                            text: 'Tên danh mục đã tồn tại.',
                            confirmButtonColor: '#3085d6',
                            confirmButtonText: 'OK'
                        }).then((result) => {
                            if (result.isConfirmed) {
                                window.location.href = 'tranghienthi.php?quanly=themdanhmuc';
                            }
                        });
                      </script>";
            } else {
                $sql_them = "INSERT INTO category(cate_name) VALUES ('$tenloaisp')";
                
                if (mysqli_query($conn, $sql_them)) {
                    echo "<script>
                            Swal.fire({
                                icon: 'success',
                                title: 'Thêm danh mục thành công!',
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
    function suaDanhMuc()
    {
        $conn = connectdb();
        if (isset($_POST['sua'])) {
            $tenloaisp = $_POST['tendanhmuc'];
            $id = $_GET['id'];

            // Check if the category name already exists
            $sql_check = "SELECT * FROM category WHERE cate_name = '$tenloaisp' AND cate_id != '$id'";
            $result_check = mysqli_query($conn, $sql_check);

            if (empty($tenloaisp)) {
                echo "<script>
                        Swal.fire({
                            icon: 'error',
                            title: 'Lỗi',
                            text: 'Tên danh mục không được để trống.',
                            confirmButtonColor: '#3085d6',
                            confirmButtonText: 'OK'
                        }).then((result) => {
                            if (result.isConfirmed) {
                                window.location.href = 'tranghienthi.php?quanly=themdanhmuc';
                            }
                        });
                      </script>";
                return;
            }
            if (mysqli_num_rows($result_check) > 0) {
                echo "<script>
                        Swal.fire({
                            icon: 'error',
                            title: 'Tên danh mục đã tồn tại!',
                            text: 'Vui lòng chọn tên khác.',
                            showConfirmButton: true
                        });
                    </script>";
            } else {
                $sql_sua = "UPDATE category SET cate_name = '$tenloaisp' WHERE cate_id = '$id'";
                if (mysqli_query($conn, $sql_sua)) {
                    echo "<script>
                            Swal.fire({
                                icon: 'success',
                                title: 'Cập nhật thành công!',
                                showConfirmButton: false,
                                timer: 1500
                            }).then(function() {
                                window.location.href = 'tranghienthi.php?quanly=tatca';
                            });
                        </script>";
                } else {
                    echo "Error: " . mysqli_error($conn);
                }
            }
        }
    }
    function xoaDanhMuc()
    {
        $conn = connectdb();

        if (isset($_GET['iddanhmuc'])) {
            $id = $_GET['iddanhmuc'];

            $sql = "SELECT * FROM category WHERE cate_id = '$id' LIMIT 1";
            $query = mysqli_query($conn, $sql);

            if (mysqli_num_rows($query) > 0) {
                $sql_xoa = "DELETE FROM category WHERE cate_id = '$id'";
                mysqli_query($conn, $sql_xoa);
                
                $sql_capnhat = "SET @count = 0";
                mysqli_query($conn, $sql_capnhat);
                
                $sql_capnhat = "UPDATE category SET cate_id = @count:= @count + 1";
                mysqli_query($conn, $sql_capnhat);
                
                $sql_reset_auto_increment = "ALTER TABLE category AUTO_INCREMENT = 1";
                mysqli_query($conn, $sql_reset_auto_increment);

                echo "<script>
                    Swal.fire({
                        icon: 'success',
                        title: 'Xóa danh mục thành công!',
                        showConfirmButton: false,
                        timer: 1500
                    }).then(function() {
                        window.location.href = 'tranghienthi.php?quanly=tatca'
                    });
                    </script>";
            }
        }
    }
?>