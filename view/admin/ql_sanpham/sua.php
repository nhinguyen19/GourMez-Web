<?php
    $conn = connectdb();
    $idSanPham = $_GET['idsanpham'];
    $query = "SELECT * FROM food WHERE food_id = $idSanPham";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($result);
?>
<h2 class="title">Sửa sản phẩm</h2>
<div class="insert">
    <table>
        <form method="POST" action="tranghienthi.php?quanly=suasp&idsanpham=<?php echo $_GET['idsanpham'] ?>" enctype="multipart/form-data">
            <tr>
                <th style="text-align: center">Id</th>
                <td name="id"><?php echo $_GET['idsanpham'] ?></td>
            </tr>
            <tr>
                <th style="text-align: center">Tên sản phẩm</th>
                <td><input type="text" name="tensanpham" style="width: 350px; background-color: #FFECCB; color: black;border:none" value="<?php echo $row['food_name']; ?>"></td>
            </tr>
            <tr>
            <th style="text-align: center">Giá bán </th>
            <td><input type="text" name="giasanpham" style="width: 350px; background-color: #FFECCB; color: black;border:none" value="<?php echo $row['selling_price']; ?>"></td>
        </tr>
        <tr>
            <th style="text-align: center">Giá gốc </th>
            <td><input type="text" name="giagoc_sanpham" style="width: 350px; background-color: #FFECCB; color: black;border:none" value="<?php echo $row['original_price']; ?>"></td>
        </tr>
        <tr>
            <th style="text-align: center">Hình ảnh</th>
            <td><input type="file" name="hinhanh" style="width: 350px"></td>
        </tr>
        <tr>
            <th style="text-align: center">Mô tả</th>
            <td ><textarea rows = "7"  name="mota" style="width: 350px; background-color: #FFECCB; color: black;"><?php echo $row['small_descr'] ?></textarea></td>
        </tr>
        <tr>
            <td style="text-align: center;" colspan="2"><input type="submit" name="suaspham" value="Cập nhật"></td>
        </tr>
        </form>
    </table>
</div>