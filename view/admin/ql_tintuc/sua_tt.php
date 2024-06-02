<link rel="stylesheet" href="tranghienthi.css">
<link href='https://fonts.googleapis.com/css?family=Lalezar' rel='stylesheet'>
<?php
// Kết nối đến cơ sở dữ liệu
$conn = connectdb();

$tinTucId = $_GET['tintucId'];

// Truy vấn SQL để lấy thông tin từ bảng tintuc
$sql = "SELECT * FROM tintuc WHERE tintuc_id = $tinTucId";
$result = $conn->query($sql);

$title = "";
$link = "";
$imgTitle = "default_image.jpg"; // Path to a default image if no image found

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $title = isset($row["title"]) ? $row["title"] : "";
    $summary = isset($row["summary"]) ? $row["summary"] : "";
    $imgTitle = isset($row["img_title"]) ? $row["img_title"] : $imgTitle;
    $description = isset($row["description"]) ? $row["description"] : "";
}
?>
<h2 class="title">Sửa tin tức</h2>
<div class="insert">


    <form action="../admin/tranghienthi.php?quanly=suatintuc&tintucId=<?php echo $row['tintuc_id'] ?>" method="POST"
        enctype="multipart/form-data">
        <table>
            <tr>
                <td>
                    <div id="imageDiv">
                        <div id="innerDiv">

                            <img id="currentImage" style="width:200px; height: 200px;margin-left : 45px;"
                                src="ql_tintuc/<?php echo $imgTitle; ?>" alt="News Image">

                        </div>
                    </div>
                    <div class="upload-btn-wrapper">
                        <button class="btn"></button>
                        <input type="file" name="hinhanh" id="fileToUpload" />
                    </div>
                </td>

                <td id="secondTd">
                    <div class="textbox">
                        <label for="title">Title</label> <br>
                        <input type="text" name="title" value="<?php echo $title; ?>" size="30"><br><br>
                    </div>
                    <div class="textbox">
                        <label for="tomtat">Tóm tắt</label> <br>
                        <input type="text" name="tomtat" value="<?php echo $summary; ?>" size="30"><br><br>
                    </div>
                    <div class="textbox">
                        <label for="description">Mô tả</label> <br>
                        <!-- <input type="text" name="description" value="<?php echo $description; ?>" size="30"><br><br> -->
                        <textarea name="description" id="description" rows="7"><?php echo $description; ?></textarea>
                    </div>



                    <button id="sua" name="suaTinTuc" type="submit" value="CSS">Thay đổi</button>
                </td>
            </tr>
        </table>
    </form>
</div>

<script src="//cdn.ckeditor.com/4.22.1/full/ckeditor.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const fileInput = document.getElementById('fileToUpload');
        fileInput.addEventListener('change', function (event) {
            if (fileInput.files.length > 0) {
                const innerDiv = document.getElementById('innerDiv');
                // Xóa ảnh cũ nếu có
                const existingImg = innerDiv.querySelector('img');
                if (existingImg) {
                    innerDiv.removeChild(existingImg);
                }

                // Tạo và hiển thị ảnh mới
                const file = event.target.files[0];
                if (file) {
                    const reader = new FileReader();
                    reader.onload = function (e) {
                        const img = document.createElement('img');
                        img.src = e.target.result;
                        img.style.width = '200px'; // Đặt kích thước tối đa cho ảnh
                        img.style.height = '200px'; // Đặt kích thước tối đa cho ảnh
                        img.style.marginLeft = '45px';
                        innerDiv.appendChild(img);
                    };
                    reader.readAsDataURL(file);
                }
            } else {
                alert("No file uploaded");
            }
        });
    });

    CKEDITOR.replace('description');

</script>