<?php
// Lấy dữ liệu từ yêu cầu POST
$data = $_POST['data'];

// Giải mã chuỗi JSON thành mảng PHP
$selectedFood = json_decode($data, true);

// Kết nối cơ sở dữ liệu (ví dụ: MySQL)
require("../model/connect.php");
$conn = connectdb();
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

foreach ($selectedFood as $food) {
    $ten = $food['ten'];
    $soluong = $food['soluong'];
    $dongia = $food['dongia'];
    $thanhtien = $food['thanhtien'];

    // Kiểm tra xem món đã tồn tại trong cơ sở dữ liệu chưa
    $sql_check = "SELECT * FROM bigdeal_order_item WHERE tenmon = '$ten'";
    $result = $conn->query($sql_check);

    if ($result->num_rows > 0) {
        // Món đã tồn tại, cập nhật số lượng
        $sql_update = "UPDATE bigdeal_order_item SET soluong = soluong + $soluong WHERE tenmon = '$ten'";
        if ($conn->query($sql_update) !== TRUE) {
            echo "Lỗi khi cập nhật dữ liệu: " . $conn->error;
        }
        else
        {
            echo "Dữ liệu đã được chèn thành công vào cơ sở dữ liệu.";
        }
    } else {
        // Món chưa tồn tại, thêm mới dữ liệu
        $sql_insert = "INSERT INTO bigdeal_order_item (tenmon, soluong, dongia, thanhtien)
                       VALUES ('$ten', '$soluong', '$dongia', '$thanhtien')";
        if ($conn->query($sql_insert) !== TRUE) {
            echo "Lỗi khi chèn dữ liệu: " . $conn->error;
        }
        else
        {
            echo "Dữ liệu đã được chèn thành công vào cơ sở dữ liệu.";
        }
    }
}

$conn->close();
?>