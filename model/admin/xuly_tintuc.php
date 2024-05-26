<?php
function themTinTuc()
{
    $conn = connectdb();

    if (isset($_POST['themTinTuc'])) {
        $title = $_POST['title'];
        $link = $_POST['link'];
        $description = $_POST['description'];
        $hinhanh = $_FILES['hinhanh']['name'];
        $hinhanh_tmp = $_FILES['hinhanh']['tmp_name'];
        $hinhanh = 'uploads/' . time() . '_' . $hinhanh;

        // Kiểm tra xem tên danh mục đã tồn tại hay chưa
        $sql_check = "SELECT COUNT(*) as count FROM tintuc WHERE title = '$title'";
        $result_check = mysqli_query($conn, $sql_check);
        $row_check = mysqli_fetch_assoc($result_check);
        $count = $row_check['count'];

        if ($count > 0) {
            // Tên danh mục đã tồn tại, hiển thị thông báo bằng JavaScript
            echo "<script>
                        Swal.fire({
                            icon: 'error',
                            title: 'Không thể thêm danh mục',
                            text: 'Tên danh mục đã tồn tại.',
                            confirmButtonColor: '#3085d6',
                            confirmButtonText: 'OK'
                        }).then((result) => {
                            if (result.isConfirmed) {
                                window.location.href = 'tranghienthi.php?quanly=tatcatintuc';
                            }
                        });
                      </script>";
        } else {
            // Tên danh mục chưa tồn tại, thực hiện thêm danh mục mới
            $sql_them = "INSERT INTO tintuc(title, link ,img_title,description) VALUES ('$title','$link', '$hinhanh','$description')";
            move_uploaded_file($hinhanh_tmp, '../../view/admin/ql_tintuc/' . $hinhanh);

            if (mysqli_query($conn, $sql_them)) {
                echo "<script>

                    Swal.fire({
                        icon: 'success',
                        title: 'Thêm danh mục thành công',
                        confirmButtonColor: '#3085d6',
                        confirmButtonText: 'OK'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            window.location.href = 'tranghienthi.php?quanly=tatcatintuc';
                        }
                    });
                  </script>";
            } else {
                echo "Lỗi: " . mysqli_error($conn);
            }
        }
    }
}
function xoaTinTuc()
{
    $conn = connectdb();

    if (isset($_GET['tintucId'])) {
        $tintucId = $_GET['tintucId'];

        $sql = "SELECT * FROM tintuc WHERE tintuc_id = '$tintucId' LIMIT 1";
        $query = mysqli_query($conn, $sql);

        if (mysqli_num_rows($query) > 0) {
            // Fetch the image filename from the database
            $row = mysqli_fetch_assoc($query);
            $imageName = $row['img_title'];

            // Delete the image file from the "uploads" folder
            $imagePath = "../../view/admin/ql_tintuc/" . $imageName;
            if (file_exists($imagePath)) {
                unlink($imagePath);
            }

            $sql_xoa = "DELETE FROM tintuc WHERE tintuc_id = '$tintucId'";
            mysqli_query($conn, $sql_xoa);

            $sql_capnhat = "SET @count = 0";
            mysqli_query($conn, $sql_capnhat);

            $sql_capnhat = "UPDATE tintuc SET tintuc_id = @count:= @count + 1";
            mysqli_query($conn, $sql_capnhat);

            $sql_reset_auto_increment = "ALTER TABLE tintuc AUTO_INCREMENT = 1";
            mysqli_query($conn, $sql_reset_auto_increment);

            echo "<script>
                    Swal.fire({
                        icon: 'success',
                        title: 'Xóa sản phẩm thành công!',
                        showConfirmButton: false,
                        timer: 1500
                    }).then(function() {
                        window.location.href = 'tranghienthi.php?quanly=tatcatintuc'
                    });
                    </script>";
        }
    }
}
function suaTinTuc()
{
    $conn = connectdb();
    if (isset($_POST['suaTinTuc'])) {
        $tintucId = $_GET['tintucId'];
        $title = $_POST['title'];
        $link = $_POST['link'];
        $description = $_POST['description'];
        $hinhanh = $_FILES['hinhanh']['name'];
        $hinhanh_tmp = $_FILES['hinhanh']['tmp_name'];

        if ($hinhanh != "") {

            $hinhanh = 'uploads/' . time() . '_' . $hinhanh;
        } else {
            //lấy hình ảnh với id trên đường dẫn 
            $sql = "SELECT img_title FROM tintuc where tintuc_id = $tintucId";
            $result = $conn->query($sql);
            $currentImage = "";
            if ($result->num_rows > 0) {
                // output data of each row
                while ($row = $result->fetch_assoc()) {
                    $currentImage = $row["img_title"];
                }
            } else {
                echo "0 results";
            }
            $hinhanh = $currentImage;

        }

        if ($_FILES['hinhanh']) {
            $sql_sua = "UPDATE tintuc SET title = '$title', link = '$link',description='$description',img_title='$hinhanh' WHERE tintuc_id = '$tintucId'";
            move_uploaded_file($hinhanh_tmp, '../../view/admin/ql_tintuc/' . $hinhanh);
        } else {
            $sql_sua = "UPDATE tintuc SET title = '$title', link = '$link',description='$description' WHERE tintuc_id = '$tintucId'";
        }
        if (mysqli_query($conn, $sql_sua)) {
            echo "<script>
            Swal.fire({
                icon: 'success',
                title: 'Cập nhật danh mục thành công',
                confirmButtonColor: '#3085d6',
                confirmButtonText: 'OK'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = 'tranghienthi.php?quanly=tatcatintuc';
                }
            });
                  </script>";
        } else {
            echo "Error: " . mysqli_error($conn);
        }
    }
}
?>