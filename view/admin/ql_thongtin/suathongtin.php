<link rel="stylesheet" href="tranghienthi.css">
<?php
    $conn = connectdb();
    $query = "SELECT * FROM contacts";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($result);
?>
<h2 class="title">Sửa sản phẩm</h2>
<div class="insert">
    <table>
        <form method="POST" action="tranghienthi.php?quanly=suathongtin" enctype="multipart/form-data">
            <tr>
                <td style="text-align: center;font-family: 'Lalezar'">Tên cửa hàng</td>
                <td><input type="text" name="tencuahang" style="width: 600px;background-color: #CFCBCB; color: black;border:none" value="<?php echo $row['ResName']; ?>"></td>
            </tr>
            <tr>
                <td style="text-align: center;font-family: 'Lalezar'">Số điện thoại</td>
                <td><input type="text" name="sodienthoai" style="width: 600px; background-color: #CFCBCB; color: black;border:none" value="<?php echo $row['ResPhoneNumber']; ?>"></td>
            </tr>
            <tr>
                <td style="text-align: center;font-family: 'Lalezar'">Địa chỉ</td>
                <td><input type="text" name="diachi" style="width: 600px; background-color: #CFCBCB; color: black;border:none" value="<?php echo $row['ResAddress']; ?>"></td>
            </tr>
            <tr>
                <td style="text-align: center;font-family: 'Lalezar'">Email </td>
                <td><input type="text" name="email" style="width: 600px; background-color: #CFCBCB; color: black;border:none" value="<?php echo $row['ResEmail']; ?>"></td>
            </tr>
            <tr>
                <td style="text-align: center;" colspan="2"><input type="submit" name="suathongtin"value="Cập nhật"></td>
            </tr>
        </form>
    </table>
</div>