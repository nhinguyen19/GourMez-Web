<link rel="stylesheet" href="tranghienthi.css">
<h2 class="title">Thêm thông tin liên hệ</h2>
<div class="insert">
    <table>
        <form method="POST" action="tranghienthi.php?quanly=themthongtin" enctype="multipart/form-data">
            <tr>
                <th style="text-align: center">Tên sản phẩm</th>
                <td><input type="text" name="tensanpham" style="width: 350px; background-color: #FFECCB; color: black;border:none"></td>
            </tr>
            <tr>
                <th style="text-align: center">Giá bán</th>
                <td><input type="text" name="giasanpham" style="width: 350px; background-color: #FFECCB; color: black;border:none"></td>
            </tr>
            <tr>
                <th style="text-align: center">Giá gốc</th>
                <td><input type="text" name="giagoc_sanpham" style="width: 350px; background-color: #FFECCB; color: black;border:none"></td>
            </tr>
            <tr>
                <th style="text-align: center">Danh mục sản phẩm</th>
                <td>
                    <select name="danhmuc">
                        <?php
                        $conndb = connectdb();
                        $sql_danhmuc = "SELECT cate_id, cate_name FROM category ORDER BY cate_id ASC";
                        $query_danhmuc = mysqli_query($conndb, $sql_danhmuc);
                        while ($row_danhmuc = mysqli_fetch_array($query_danhmuc)) {
                            $cate_id = $row_danhmuc['cate_id'];
                            $cate_name = $row_danhmuc['cate_name'];
                        ?>
                            <option value="<?php echo $cate_id; ?>"><?php echo $cate_name; ?></option>
                        <?php
                        }
                        ?>
                    </select>
                </td>
            </tr>
            <tr>
                <th style="text-align: center">Hình ảnh</th>
                <td><input type="file" name="hinhanh" style="width: 350px"></td>
            </tr>
            <tr>
                <th style="text-align: center">Mô tả</th>
                <td style="width:400px"><textarea name="mota" id="mota" rows="7"></textarea></td>
            </tr>
            <tr>
                <td style="text-align: center;" colspan="2"><input type="submit" name="themsanpham" value="Thêm sản phẩm"></td>
            </tr>
        </form>
    </table>
</div>

<script src="https://cdn.ckeditor.com/ckeditor5/41.3.1/classic/ckeditor.js"></script>
<script>
    ClassicEditor
        .create(document.querySelector('#mota'))
        .catch(error => {
            console.error(error);
        });
</script>
