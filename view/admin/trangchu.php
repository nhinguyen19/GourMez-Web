<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Homepage - New Orders</title>
    <link rel ="stylesheet" href="trangchu.css">
    <?php

    $conn = connectdb();

    $sql_orders = "SELECT * FROM orders WHERE status = 'Ghi nhận' ORDER BY date_order DESC";
    $query_orders = mysqli_query($conn, $sql_orders);
    ?>
</head>
<div class="main1">
    <div class="container">
        <h1 class="title">Đơn Hàng Mới</h1>
        <div class="orders">
            <?php
            while ($row_order = mysqli_fetch_array($query_orders)) {
                echo '<div class="order">';
                echo '<h2>Đơn hàng #' . $row_order['order_id'] . '</h2>';
                echo '<p><strong>Khách hàng:</strong> ' . $row_order['name_cus'] . '</p>';
                echo '<p><strong>Ngày đặt hàng:</strong> ' . date('d-m-Y H:i', strtotime($row_order['date_order'])) . '</p>';
                echo '<p><strong>Trạng thái:</strong> ' . $row_order['status'] . '</p>';
                echo '<p><strong>Tổng tiền:</strong> ' . number_format($row_order['origin_total_price'], 0, '.', '.') . ' đ</p>';
                echo '<a href="tranghienthi.php?quanly=updateorder&id='.$row_order['order_id'].'"> Xem chi tiết</a>';
                echo '</div>';

            }
            ?>
        </div>
    </div>
    </div>
