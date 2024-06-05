<link rel="stylesheet" href="tranghienthi.css">
<?php
    $conn = connectdb();
    $sql_lietke_tinnhan = "SELECT * FROM customer_message";
    $query_lietke_tinnhan = mysqli_query($conn, $sql_lietke_tinnhan);
?>
<h2 class="title">Tất cả tin nhắn khách hàng</h2>
<div class="insert">
    <table>
        <tr style="font-family: 'Lalezar'">
            <td style="text-align: center; width: 150px">Id</td>
            <td style="text-align: center; width: 150px">Tên khách hàng</td>
            <td style="text-align: center; width: 150px">Số điện thoại</td>
            <td style="text-align: center">Email</td>
            <td style="text-align: center">Tin nhắn</td>
        </tr>
        <?php
            $i = 0;
            while ($row = mysqli_fetch_array($query_lietke_tinnhan)) {
                $i++;
        ?>     
        <tr>
            <td style="text-align: center"><?php echo $row['id'] ?></td>
            <td style="text-align: center"><?php echo $row['cus_name'] ?></td>
            <td style="text-align: center"><?php echo $row['phone_number'] ?></td>
            <td style="text-align: center"><?php echo $row['email'] ?></td>
            <td style="text-align: center"><?php echo $row['mess'] ?></td>
        </tr>
        <?php
            }
        ?>
    </table>
</div>