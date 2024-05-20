<link rel="stylesheet" href="sua_tt.css">
<link href='https://fonts.googleapis.com/css?family=Lalezar' rel='stylesheet'>
<?php
// Kết nối đến cơ sở dữ liệu
include "../../../model/connect.php";
$conn = connectdb();
?>
<div id="container">
    <h2>Sửa tin tức</h2>

    <form action="sua_tt.php" method="POST" enctype="multipart/form-data">
        <table>
            <tr>
                <td>
                    <div id="imageDiv">
                        <div id="innerDiv">
                            <b>Ảnh title</b>
                        </div>
                    </div>
                    <div class="upload-btn-wrapper">
                        <button class="btn">Thêm ảnh</button>
                        <input type="file" name="fileToUpload" id="fileToUpload" />
                    </div>

                </td>
                <td id="secondTd">
                    <div class="textbox">
                        <label for="title">Title</label> <br>
                        <input type="text" value="<?php
                        // Truy vấn SQL để lấy ảnh từ bảng tintuc
                        $sql = "SELECT * FROM tintuc ORDER BY tintuc_id DESC LIMIT 1"; // Chọn top 1 bản ghi, sắp xếp theo id giảm dần
                        $result = $conn->query($sql);

                        if ($result->num_rows > 0) {
                            // Lặp qua các hàng dữ liệu
                            while ($row = $result->fetch_assoc()) {
                                // Hiển thị ảnh trong imageDiv
                                echo isset($row["title"]) ? $row["title"] : "";
                            }
                        } else {
                            echo "Không có dữ liệu.";
                        }
                        ?>" name="title" size="30"><br><br>
                    </div>
                    <div class="textbox">
                        <label for="link">Link</label> <br>
                        <input type="url" value="<?php
                        // Truy vấn SQL để lấy ảnh từ bảng tintuc
                        $sql = "SELECT * FROM tintuc ORDER BY tintuc_id DESC LIMIT 1"; // Chọn top 1 bản ghi, sắp xếp theo id giảm dần
                        $result = $conn->query($sql);

                        if ($result->num_rows > 0) {
                            // Lặp qua các hàng dữ liệu
                            while ($row = $result->fetch_assoc()) {
                                // Hiển thị ảnh trong imageDiv
                                echo isset($row["link"]) ? $row["link"] : "";
                            }
                        } else {
                            echo "Không có dữ liệu.";
                        }
                        ?>" name="link" size="30"><br><br>
                    </div>

                    <button id="sua" name="submit" type="submit" value="CSS">Thay đổi</button>
                    <button id="xoa" name="delete" type="delete" value="CSS">Xóa</button>

                </td>
            </tr>

        </table>
    </form>
</div>

<?php
// Kiểm tra kết nối
if ($conn->connect_error) {
    die("Kết nối không thành công: " . $conn->connect_error);
}

// Xoá hình ảnh
if ((isset($_POST['delete']) && $_POST['delete'] == true)) {
    $sql = "DELETE FROM tintuc WHERE tintuc_id = (SELECT MAX(tintuc_id) FROM tintuc)";
    if ($conn->query($sql) === TRUE) {
        echo "Record deleted successfully";
    } else {
        echo "Error deleting record: " . $conn->error;
    }
    echo '<script>alert("Xoá thành công");window.location = "trangtintuc.php"</script>';
}

// // Sửa hình ảnh
if ((isset($_POST['submit']) && $_POST['submit'] == true)) {
    // ;window.location = "trangtintuc.php"
    // Suppressing errors for undefined array keys
    $fileToUpload = isset($_FILES["fileToUpload"]) ? $_FILES["fileToUpload"] : null;
    $title = isset($_POST['title']) ? $_POST['title'] : null;

    if ($fileToUpload !== null) {
        $target_dir = "uploads/";
        $target_file = $target_dir . basename($fileToUpload["name"]);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

        // Check if image file is a actual image or fake image
        if (isset($_POST["submit"])) {
            if ($fileToUpload["error"] === 0) {
                $check = getimagesize($fileToUpload["tmp_name"]);
                if ($check !== false) {
                    $uploadOk = 1;
                } else {
                    $uploadOk = 0;
                }
            } else {
                $uploadOk = 0;
            }
        }

        // Check if file already exists
        if (file_exists($target_file)) {
            $uploadOk = 0;
        }

        // Allow certain file formats
        if (
            $imageFileType != "jpg" && $imageFileType != "png"
            && $imageFileType != "jpeg" && $imageFileType != "gif"
        ) {
            $uploadOk = 0;
        }

        // Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {
            echo "Sorry, your file was not uploaded.";
        } else {
            $result = move_uploaded_file($fileToUpload["tmp_name"], $target_file);
            if ($result) {
                $title = isset($_POST['title']) ? $_POST['title'] : null;
                $link = isset($_POST['link']) ? $_POST['link'] : null;
                $sql = "UPDATE tintuc SET title = ?, link = ?, img_title= ? WHERE tintuc_id = (SELECT MAX(tintuc_id) FROM tintuc)";
                $stmt = $conn->prepare($sql);
                $stmt->bind_param("sss", $title, $link, $target_file);

                if ($stmt->execute()) {
                    // echo "Cập nhật thành công!";
                    // Điều hướng hoặc thông báo cập nhật thành công
                    echo '<script>alert("Cập nhật thành công");window.location = "trangtintuc.php"</script>';
                } else {
                    echo "Lỗi: " . $stmt->error;
                }
            }
        }
    }

    // echo '<script>alert("Thay đổi thành công")</script>';
}

// Truy vấn SQL để lấy ảnh từ bảng tintuc
$sql = "SELECT * FROM tintuc ORDER BY tintuc_id DESC LIMIT 1"; // Chọn top 1 bản ghi, sắp xếp theo id giảm dần
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Lặp qua các hàng dữ liệu
    while ($row = $result->fetch_assoc()) {
        // Hiển thị ảnh trong imageDiv
        echo "
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                const imageDiv = document.getElementById('imageDiv');
                const innerDiv = document.getElementById('innerDiv');
                const img = document.createElement('img');
                img.src = '{$row["img_title"]}';
                img.style.width = '195px';
                img.style.height = '195px';
                innerDiv.remove();
                imageDiv.appendChild(img);

                const titleInput = document.querySelector('input[name=\'title\']');
                titleInput.placeholder = '{$row["title"]}';
                const linkInput = document.querySelector('input[name=\'link\']');
                linkInput.placeholder = '{$row["img_title"]}';
            });
        </script>";
    }
}

?>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const fileInput = document.getElementById('fileToUpload');
        fileInput.addEventListener('change', function () {
            if (fileInput.files.length > 0) {
                // alert("yes in upload");
                const input = document.querySelector('input[type="file"]');
                const imageDiv = document.getElementById('imageDiv');
                const innerDiv = document.getElementById('innerDiv');
                // Xóa ảnh cũ nếu có
                const existingImg = imageDiv.querySelector('img');
                if (existingImg) {
                    imageDiv.removeChild(existingImg);
                }

                // Tạo và hiển thị ảnh mới
                const file = event.target.files[0];
                console.log(file);
                if (file) {
                    const reader = new FileReader();
                    reader.onload = function (e) {
                        const img = document.createElement('img');
                        img.src = e.target.result;
                        img.style.width = '195px'; // Đặt kích thước tối đa cho ảnh
                        img.style.height = '195px'; // Đặt kích thước tối đa cho ảnh
                        // innerDiv.remove();
                        imageDiv.appendChild(img);
                    };
                    reader.readAsDataURL(file);
                }
            } else {

                alert("no in upload");

            }
        });
    });
</script>