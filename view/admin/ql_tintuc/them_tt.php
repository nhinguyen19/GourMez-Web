<link rel="stylesheet" href="them_tt.css">
<link href='https://fonts.googleapis.com/css?family=Lalezar' rel='stylesheet'>

<div id="container">
    <h2>Thêm tin tức</h2>

    <form action="them_tt.php" method="POST" enctype="multipart/form-data">
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
                        <input type="text" name="title" size="30" required><br><br>
                    </div>
                    <div class="textbox">
                        <label for="link">Link</label> <br>
                        <input type="url" name="link" size="30" required><br><br>
                    </div>

                    <button id="them" value="Upload Image" name="submit" type="submit">Thêm</button>

                </td>
            </tr>

        </table>
    </form>
</div>
<?php
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
            include "../../../model/connect.php";
            $conndb = connectdb();
            $imgTitle = $fileToUpload["name"];
            // Use prepared statements to prevent SQL injection
            $stmt = $conndb->prepare("INSERT INTO tintuc (tintuc_id, title, link, img_title) VALUES (NULL, ?, ?, ?)");
            $stmt->bind_param("sss", $title, $_POST['link'], $target_file);

            if ($stmt->execute()) {
                // Insert successful, show alert
                echo '<script>alert("Thêm thành công");window.location = "trangtintuc.php"</script>';
            } else {
                // Handle error
                echo "Lỗi: " . $stmt->error;
            }
            $stmt->close();
            $conndb->close();
        } else {
            // echo "Sorry, there was an error uploading your file.";
        }
    }
}
?>


<script>
    document.addEventListener("DOMContentLoaded", function () {
        const input = document.querySelector('input[type="file"]');
        const imageDiv = document.getElementById('imageDiv');
        const innerDiv = document.getElementById('innerDiv');

        input.addEventListener('change', function (event) {
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
                    innerDiv.remove();
                    imageDiv.appendChild(img);
                };
                reader.readAsDataURL(file);
            }
        });
    });
</script>