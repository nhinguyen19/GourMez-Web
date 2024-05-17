<link rel="stylesheet" href="them_tt.css">
<link href='https://fonts.googleapis.com/css?family=Lalezar' rel='stylesheet'>

<div id="container">
    <h2>Thêm tin tức</h2>

    <form action="submit_news.php" method="POST" enctype="multipart/form-data">
        <table>
            <tr>
                <td>
                    <div id="imageDiv">
                        <div id = "innerDiv">
                            <b>Ảnh title</b>
                        </div>
                    </div>
                    <div class="upload-btn-wrapper">
                        <button class="btn">Thêm ảnh</button>
                        <input type="file" name="myfile" />
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

                    <button id="them" name="subject" type="submit" value="CSS">Thêm</button>
                   
                </td>
            </tr>

        </table>
    </form>
</div>
<?php
include "../../../model/connect.php";
 $conndb = connectdb();
//  $sql = "INSERT INTO `tintuc` (`tintuc_id`, `title`, `link`, `img_title`) VALUES (NULL, 'qq', 'ww', 'w');
//  ";

// if ($conndb->query($sql) === TRUE) {
//   echo "New record created successfully";
// } else {
//   echo "Error: " . $sql . "<br>" . $conn->error;
// }
$sql = "SELECT* FROM tintuc";
$result = $conndb->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    echo "id: " . $row["title"]. " - Name: " . $row["link"]. " " . $row["img_title"]. "<br>";
  }
} else {
  echo "0 results";
}


?>

<script>
    document.addEventListener("DOMContentLoaded", function() {
    const input = document.querySelector('input[type="file"]');
    const imageDiv = document.getElementById('imageDiv');
    const innerDiv = document.getElementById('innerDiv');

    input.addEventListener('change', function(event) {
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
            reader.onload = function(e) {
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

