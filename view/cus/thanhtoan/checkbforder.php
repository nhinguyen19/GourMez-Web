<?php
// Kết nối đến cơ sở dữ liệu hoặc bất kỳ xử lý khác nếu cần
include('../../../model/connect.php');


if(isset($_POST['discountCode'])){
    $conn = connectdb();
    $discountCode = mysqli_real_escape_string($conn, $_POST['discountCode']);
    $sql_discount = "SELECT * FROM discount WHERE code_dis = '$discountCode'";
    $result_discount = mysqli_query($conn, $sql_discount);
    $totalPrice = $_POST['totalPrice'];
    if(mysqli_num_rows($result_discount) > 0) {
        $row_discount = mysqli_fetch_assoc($result_discount);
        $discountPercentage = $row_discount['qtt_of_dis'];
        // Tính toán discountAmount
        $discountAmount = ($totalPrice * $discountPercentage) / 100;
        // Trả về discountAmount và discountPercentage dưới dạng JSON
        echo json_encode(array('discountAmount' => $discountAmount, 'discountPercentage' => $discountPercentage));
    } else {
        echo json_encode(array('error' => 'Mã giảm giá không hợp lệ',));
    }
}
?>
