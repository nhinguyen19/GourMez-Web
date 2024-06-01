
<?php
include('../../../model/connect.php');
$conn = connectdb();
    $sql_lietke = "SELECT * FROM orders WHERE status='Đang xử lý'";
    $query_lietke = mysqli_query($conn, $sql_lietke);
?>

<div class="danhsach">
    <table>
        <thead>
            <tr>
                <th>ID đơn hàng</th>
                <th>Trạng thái</th>
                <th>Thời gian</th>
                <th>Thành tiền</th>
                <th>ID khách hàng</th>
                <th>ID nhân viên</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <?php
                $i = 0;
                while ($row = mysqli_fetch_array($query_lietke)) {
                    $i++;
            ?>
            <tr>  
                <td><?php echo $row['order_id'] ?></td>
                <td><?php echo $row['status'] ?></td>
                <td><?php echo $row['date_order'] ?></td>
                <td><?php echo $row['origin_total_price'] ?></td>
                <td><?php echo $row['user_id'] ?></td>
                <td><?php echo $row['staff_id'] ?></td>
                <td><a href="tranghienthi.php?quanly=updateorder&id=<?php echo $row['order_id']; ?>"> Sửa</a></td>
            </tr>
            <?php
                }
            ?>
        </tbody>
    </table>
</div>
<!-- <div class="xemthembutton">
<button class="btn_xemthem">
                <a href="tranghienthi.php?quanly=thucdon" style="text-decoration: none; color: #ffff;">XEM THÊM</a>
            </button>
            </div> -->