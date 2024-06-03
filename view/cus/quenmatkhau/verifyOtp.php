<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<?php
if (isset($_POST['otp']) && isset($_POST['email'])) {
    $otp = $_POST['otp'];
    $email = $_POST['email'];
    $token=$_POST['token'];

    $host = "localhost";
    $username = "root";
    $password = "";
    $database = "gourmez_web";
    $conn = new mysqli($host, $username, $password, $database);

    if ($conn->connect_error) {
        die('Kết nối không thành công: ' . $conn->connect_error);
    }

    $stmt = $conn->prepare("SELECT otp FROM user WHERE email = ? AND otp = ?");
    $stmt->bind_param("si", $email, $otp);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        header("Location: tranghienthi.php?quanly=lammoimatkhau&token={$token}");
    } else {
        echo "<script>
            Swal.fire({
                icon: 'error',
                title: 'Mã OTP không chính xác.',
                showConfirmButton: true,
            }).then(function() {
                window.location.href = 'tranghienthi.php?quanly=quenmatkhau';
            });
            </script>";
            exit();
    }

    $stmt->close();
    $conn->close();
}
?>
