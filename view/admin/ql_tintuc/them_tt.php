<link rel="stylesheet" href="them_tt.css">
<link href='https://fonts.googleapis.com/css?family=Lalezar' rel='stylesheet'>

<div id="container">
    <h2>Thêm tin tức</h2>

    <form action="../admin/tranghienthi.php?quanly=themtintuc" method="POST" enctype="multipart/form-data">
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
                        <input type="file" name="hinhanh" id="fileToUpload" />
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

                    <button id="them" value="Upload Image" name="themTinTuc" type="submit">Thêm</button>

                </td>
            </tr>

        </table>
    </form>
</div>


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