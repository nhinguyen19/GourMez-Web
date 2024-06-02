<?php
function updateorder(){
if (isset($_POST['updateorder']) && $_POST['updateorder']) {
    $staff_id = $_POST['staff'];
    $status = $_POST['status'];
    $note = isset($_POST['cancelReason']) ? $_POST['cancelReason'] : null;
    $shipper_id = isset($_POST['shipper']) ? $_POST['shipper'] : null;
    // Kết nối cơ sở dữ liệu
    $conn = connectdb();

    // Cập nhật thông tin đơn hàng trong cơ sở dữ liệu
    $id = $_GET['id'];
    if ($shipper_id) {
        // Cập nhật cả staff_id, status và shipper_id
        $updateQuery = "UPDATE orders SET staff_id = '$staff_id', shipper_id = '$shipper_id', status = '$status', note='$note' WHERE order_id = '$id'";
    } else {
        // Chỉ cập nhật staff_id và status
        $updateQuery = "UPDATE orders SET staff_id = '$staff_id', status = '$status' WHERE order_id = '$id'";
    }

    $result = mysqli_query($conn, $updateQuery);

    // // Kiểm tra xem truy vấn đã thành công hay không
    // if ($result) {
    //     echo "Cập nhật đơn hàng thành công!";
    // } else {
    //     echo "Có lỗi xảy ra khi cập nhật đơn hàng: " . mysqli_error($conn);
    // }

    mysqli_close($conn);

}
}

?>
