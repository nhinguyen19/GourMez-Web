<link rel="stylesheet" href="sua_tt.css">
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
    $link = isset($row["link"]) ? $row["link"] : "";
    $imgTitle = isset($row["img_title"]) ? $row["img_title"] : $imgTitle;
}
?>
<h2 class="title">Sửa tin tức</h2>
<div class="insert">
    

    <form action="../admin/tranghienthi.php?quanly=suatintuc&tintucId=<?php echo $row['tintuc_id'] ?>" method="POST" enctype="multipart/form-data">
        <table>
            <tr>
                <td>
                    <div id="imageDiv">
                        <div id="innerDiv">
                            
                            <img id="currentImage" style="width:200px; height: 200px" src="ql_tintuc/<?php echo $imgTitle; ?>" alt="News Image">
                            
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
                        <label for="link">Link</label> <br>
                        <input type="url" name="link" value="<?php echo $link; ?>" size="30"><br><br>
                    </div>
                    <button id="sua" name="suaTinTuc" type="submit" value="CSS">Thay đổi</button>
                </td>
            </tr>
        </table>
    </form>
</div>

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
                        innerDiv.appendChild(img);
                    };
                    reader.readAsDataURL(file);
                }
            } else {
                alert("No file uploaded");
            }
        });
    });
</script>
