<link rel="stylesheet" href="../view/cus/accountManagement/qlidonhang.css">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.21.1/axios.min.js"></script>
    <script src="https://cdn.ckeditor.com/ckeditor5/41.3.1/classic/ckeditor.js"></script>
<body>
    <h2>LỊCH SỬ ĐƠN HÀNG CỦA BẠN</h2>
    <?php
    include('../model/connect.php');
    $conn = connectdb();
    $user_id = mysqli_real_escape_string($conn, $_SESSION['id']);
    
    $query = "SELECT orders.*, order_item.*, food.food_name 
              FROM orders 
              JOIN order_item ON orders.order_id = order_item.order_id 
              JOIN food ON order_item.food_id = food.food_id 
              WHERE orders.user_id = $user_id
              ORDER BY orders.order_id DESC";
    $result = mysqli_query($conn, $query);
    
    $orders = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $order_id = $row['order_id'];
        if (!isset($orders[$order_id])) {
            $orders[$order_id] = [
                'order_id' => $row['order_id'],
                'status' => $row['status'],
                'date_order' => $row['date_order'],
                'name_cus' => $row['name_cus'],
                'address' => $row['address'],
                'phone' => $row['phone'],
                'payment_mode' => $row['payment_mode'],
                'origin_total_price' => $row['origin_total_price'],
                'items' => []
            ];
        }
        $orders[$order_id]['items'][] = [
            'food_name' => $row['food_name'],
            'quantity' => $row['quantity']
        ];
    }
    
    foreach ($orders as $order) {
        echo '<div class="thanhcong">';
        echo '<p>ID đơn hàng: ' . $order['order_id'] . '</p>';
        echo '<p>Trạng thái: ' . $order['status'] . '</p>';
        echo '<p>Thời gian ghi nhận: ' . $order['date_order'] . '</p>';
        echo '<p>Họ tên người nhận: ' . $order['name_cus'] . '</p>';
        echo '<p>Địa chỉ người nhận: ' . $order['address'] . '</p>';
        echo '<p>Số điện thoại người nhận: ' . $order['phone'] . '</p>';
        echo '<p>Phương thức thanh toán: ' . $order['payment_mode'] . '</p>';
        echo '<p>Thành tiền: ' . $order['origin_total_price'] . '</p>';
        echo '<h2>CHI TIẾT HÓA ĐƠN</h2>';
        foreach ($order['items'] as $item) {
            echo '<p>Món ăn: ' . $item['food_name'] . '</p>';
            echo '<p>Số lượng: ' . $item['quantity'] . '</p>';
        }
        echo '</div>';
    }
    ?>
</body>
</html>
