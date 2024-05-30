<?php
function updateorder()
{
    $conn = connectdb();
    if((isset($_POST['updateorder'])) &&($_POST['updateorder']))
    {
        $staff_id = $_POST['staff'];
        $status = $_POST['status'];
    
        // Kết nối đến cơ sở dữ liệu
        $conn = connectdb();
    
        // Lấy id của đơn hàng từ tham số GET
        $id = $_GET['id'];
    
        // Cập nhật bảng orders với giá trị của staff_id và status mới
        $updateQuery = "UPDATE orders SET staff_id = '$staff_id', status = '$status' WHERE order_id = '$id'";
        $result = mysqli_query($conn, $updateQuery);
    
        // Kiểm tra xem truy vấn đã thành công hay không
        if ($result) {
            echo "Cập nhật đơn hàng thành công!";
        } else {
            echo "Có lỗi xảy ra khi cập nhật đơn hàng: " . mysqli_error($conn);
        }

        mysqli_close($conn);
    }
}
?>