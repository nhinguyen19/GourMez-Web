
<script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.21.1/axios.min.js"></script>
  <link rel="stylesheet" href="../view/cus/thanhtoan/thanhtoan.css">
<?php
  include('../model/connect.php');
  $conn = connectdb();
?>
<link rel="stylesheet" href="../view/cus/thanhtoan/donethanhtoan.css">
<script src="https://cdn.ckeditor.com/ckeditor5/41.3.1/classic/ckeditor.js"></script>
<?php
    $conn = connectdb();
    $id = $_GET['id'];
    $query = "SELECT * FROM orders WHERE order_id = $id";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($result);

    $query1 = "SELECT * FROM order_item INNER JOIN food ON order_item.food_id = food.food_id WHERE order_id='$id'";
    $result1 = mysqli_query($conn, $query1);
?>
<body>
<div class="titlegr">
<h2 class="title">GOURMEZ ĐÃ GHI NHẬN ĐƠN HÀNG CỦA BẠN!</h2>
</div>
<div class="thanhcong">
        <p style="color:#E26A2C">Cảm ơn bạn đã đặt hàng! Chúng tôi sẽ xử lý đơn hàng của bạn ngay lập tức và thông báo cho bạn khi nào hàng sẽ được giao. Xin cảm ơn!</p>
        <p style="color:#E26A2C">Nếu có bất kỳ vấn đề gì, xin vui lòng liên hệ HOTLINE(038)123456789</p>
        <p>ID đơn hàng: <?php echo $row['order_id']; ?></p>
        <p>Trạng thái: <?php echo $row['status']; ?></p>
        <p>Thời gian ghi nhận: <?php echo $row['date_order']; ?></p>
        <p>Họ tên người nhận: <?php echo $row['name_cus']; ?></p>
        <p>Địa chỉ người nhận : <?php echo $row['address']; ?></p>
        <p>Số điện thoại người nhận: <?php echo $row['phone']; ?></p>
        <p>Phương thức thanh toán : <?php echo $row['payment_mode']; ?></p>
        <p>Thành tiền: <?php echo $row['origin_total_price']; ?></p>
        <h2> CHI TIẾT HÓA ĐƠN</h2>
       <?php while ($row1 = mysqli_fetch_assoc($result1)) {
    ?>
    <p>Món ăn: <?php echo $row1['food_name']; ?></p>
    <p>Số lượng: <?php echo $row1['quantity']; ?></p>
    <?php
}

?>
   
</div>
   </body>