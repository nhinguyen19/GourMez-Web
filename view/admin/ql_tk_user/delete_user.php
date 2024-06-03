<?php
$host = "localhost";
$username = "root";
$password = "";
$database = "gourmez_web";
$conn = new mysqli($host, $username, $password, $database);

if ($conn->connect_error) {
    die('Kết nối không thành công: ' . $conn->connect_error);
} 

if (isset($_GET['user_id'])) {
    $user_id = $_GET['user_id'];

    $sql = "DELETE FROM user WHERE user_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $user_id);

    if ($stmt->execute()) {
        // echo "Xoá user thành công!";
        echo "<script>
                Swal.fire({
                    icon: 'success',
                    title: 'Xoá thành công.',
                    showConfirmButton: true,
                }).then(() => {
                    window.location.href = 'tranghienthi.php?quanly=quanlytaikhoanuser';
                });
                </script>";
            exit();
    } else {
        echo "Xoá user thất bại: " . $conn->error;
        echo "<script>
            Swal.fire({
                icon: 'error',
                title: 'Thất bại.',
                showConfirmButton: true,
            });
            </script>";
    }

    $stmt->close();
    $conn->close();

    // Quay lại trang danh sách user
    // header("Location: tranghienthi.php?quanly=quanlytaikhoanuser");
    // exit();
} else {
    echo "Không có user_id để xoá";
}
?>
