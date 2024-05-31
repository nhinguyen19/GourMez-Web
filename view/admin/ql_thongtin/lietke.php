<link rel="stylesheet" href="tranghienthi.css">
<?php
    $conn = connectdb();
    $sql_lietke_thongtin = "SELECT * FROM contacts";
    $query_lietke_thongtin = mysqli_query($conn, $sql_lietke_thongtin);
?>
<h2 class="title">Tất cả thông tin liên hệ</h2>
<div class="insert">
    <table>
        <tr style="font-family: 'Lalezar'">
            <td style="text-align: center; width: 150px">Tên cửa hàng</td>
            <td style="text-align: center; width: 150px">Số điện thoại</td>
            <td style="text-align: center">Địa chỉ</td>
            <td style="text-align: center">Email</td>
        </tr>
        <?php
            $i = 0;
            while ($row = mysqli_fetch_array($query_lietke_thongtin)) {
                $i++;
        ?>     
        <tr>
            <td style="text-align: center"><?php echo $row['ResName'] ?></td>
            <td style="text-align: center"><?php echo $row['ResPhoneNumber'] ?></td>
            <td style="text-align: center"><?php echo $row['ResAddress'] ?></td>
            <td style="text-align: center"><?php echo $row['ResEmail'] ?></td>
        </tr>
        <tr>
            <td style="text-align: center; width: 90px" colspan ="4">
                <form action="tranghienthi.php?quanly=suathongtin" method="post">
                    <input type="submit" value="Sửa">
                </form>
            </td> 
        </tr>
        <?php
            }
        ?>
    </table>
</div>