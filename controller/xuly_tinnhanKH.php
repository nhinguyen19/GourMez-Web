<?php
function insertMessage()
{
    if (isset($_POST['gui'])) {
        $conn = connectdb();
        $tenkhachhang = $_POST['tenkhachhang'];
        $sodienthoai = $_POST['sodienthoai'];
        $mailkhachhang = $_POST['mailkhachhang'];
        $tinnhan = $_POST['tinnhan'];
    
        if (empty($tenkhachhang) || empty($sodienthoai) || empty($mailkhachhang) || empty($tinnhan)) {
            echo "Vui lòng điền đầy đủ thông tin.";
        } elseif (!filter_var($mailkhachhang, FILTER_VALIDATE_EMAIL)) {
            echo "Vui lòng nhập một địa chỉ email hợp lệ.";
        } else {
            $tenkhachhang = mysqli_real_escape_string($conn, $tenkhachhang);
            $sodienthoai = mysqli_real_escape_string($conn, $sodienthoai);
            $mailkhachhang = mysqli_real_escape_string($conn, $mailkhachhang);
            $tinnhan = mysqli_real_escape_string($conn, $tinnhan);
    
            $sql_insert_message = "INSERT INTO customer_message (cus_name, phone_number, email, mess) VALUES ('$tenkhachhang', '$sodienthoai', '$mailkhachhang', '$tinnhan')";
            $query_insert_message = $conn->query($sql_insert_message);
    
            if ($query_insert_message) {
                echo "Tin nhắn đã được gửi thành công!";
            } else {
                echo "Đã xảy ra lỗi. Vui lòng thử lại sau.";
            }
        }
    
        $conn->close();
    }
}
?>