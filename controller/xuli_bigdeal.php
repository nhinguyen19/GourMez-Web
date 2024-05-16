<?php
require("../model/connect.php");

// session_start();
// // Lưu dữ liệu từ yêu cầu POST vào biến $_SESSION
// $_SESSION['food_list'] = file_get_contents('php://input');

$conn = connectdb();
$name = $_POST["cusname"];
$tele = $_POST["tel"];
$email = $_POST["email"];
$shipdate = date('d/m/Y', strtotime($_POST["ship_date"]));
$address = $_POST["address"];
$price = $_POST["Tongcong"];
$note = $_POST["note"];
$price = preg_replace('/\D/', '', $price); //replace characters that are not numbers
$Total_price = (int)$price;

// Tạo ID random
$newId = uniqid('bigdeal_');

if (isset($_POST["send"]) && ($_POST["send"] == "Gửi đơn hàng"))
{
    $sql = "INSERT INTO bigdeal_service (id,name,phone,email,booking_date,address,total_price,status)
        VALUES ('$newId','$name','$tele','$email',STR_TO_DATE('$shipdate', '%d/%m/%Y'),'$address','$Total_price','$note')";

    if(mysqli_query($conn,$sql))
    {
        echo"<script>alert('Đơn hàng được ghi nhận!'); window.location('tranghienthi.php?quanly=2');</script>";
        exit();
    }
    else
    {
        // echo '<script>alert("Đơn hàng bị lỗi, vui lòng nhập lại")</script>';
        // header('Location: tranghienthi.php?quanly=2');
        echo "Lỗi: " . $sql . "<br>" . mysqli_error($conn);
    }
}



?>