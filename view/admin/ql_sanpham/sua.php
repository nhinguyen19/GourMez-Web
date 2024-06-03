<link rel="stylesheet" href="tranghienthi.css">
<script src="https://cdn.ckeditor.com/ckeditor5/41.3.1/classic/ckeditor.js"></script>
<?php
    $conn = connectdb();
    $idSanPham = $_GET['idsanpham'];
    $query = "SELECT * FROM food WHERE food_id = $idSanPham";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($result);
?>
<h2 class="title">Sửa thông tin món ăn</h2>
<div class="insert">
    <table>
        <form method="POST" action="tranghienthi.php?quanly=suasp&idsanpham=<?php echo $_GET['idsanpham'] ?>" enctype="multipart/form-data">
            <tr>
                <td style="text-align: center;font-family: 'Lalezar'">Id</td>
                <td name="id"><?php echo $_GET['idsanpham'] ?></td>
            </tr>
            <tr>
                <td style="text-align: center;font-family: 'Lalezar'">Tên sản phẩm</td>
                <td><input type="text" name="tensanpham" style="width: 500px; background-color: #CFCBCB; color: black;border:none" value="<?php echo $row['food_name']; ?>"></td>
            </tr>
            <tr>
                <td style="text-align: center;font-family: 'Lalezar'">Giá bán </td>
                <td><input type="text" name="giasanpham" style="width: 500px; background-color: #CFCBCB; color: black;border:none" value="<?php echo $row['selling_price']; ?>"></td>
            </tr>
            <tr>
                <td style="text-align: center;font-family: 'Lalezar'">Giá gốc </td>
                <td><input type="text" name="giagoc_sanpham" style="width: 500px; background-color: #CFCBCB; color: black;border:none" value="<?php echo $row['original_price']; ?>"></td>
            </tr>
            <tr>
                <td style="text-align: center;font-family: 'Lalezar'">Hình ảnh</td>
                <td><input type="file" name="hinhanh" style="width: 500px; font-family: Lalezar"></td>
            </tr>
            <tr>
                <td style="text-align: center;font-family: 'Lalezar'">Mô tả</td>
                <td><textarea name="mota" id="mota" rows="7"><?php echo $row['small_descr'] ?></textarea></td>
            </tr>
            <tr>
                <td style="text-align: center;" colspan="2"><input type="submit" name="suaspham" value="Cập nhật"></td>
            </tr>
        </form>
    </table>
</div>

<script>
    ClassicEditor
        .create(document.querySelector('#mota'))
        .catch(error => {
            console.error(error);
        });
</script>
