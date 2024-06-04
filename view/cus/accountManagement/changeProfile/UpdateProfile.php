<?php
ob_start();
session_start();

$host = "localhost";
$username = "root";
$password = "";
$database = "gourmez_web";
$conn = new mysqli($host, $username, $password, $database);

if ($conn->connect_error) {
    die('Kết nối không thành công: ' . $conn->connect_error);
} 

if (isset($_POST['luu']) && $_POST['luu'] == "Lưu") {
    if (!isset($_SESSION['id'])) {
        echo "<script>
                Swal.fire({
                    icon: 'error',
                    title: 'Người dùng không tồn tại.',
                    showConfirmButton: true,
                });
                </script>";
        exit();
    }
    $id = $_SESSION['id'];
    $user_name = htmlspecialchars($_POST['username']);
    if (strlen($user_name)<3) {
        echo "<script>
                Swal.fire({
                    icon: 'error',
                    title: 'Tên đăng nhập phải tối thiểu 3 ký tự.',
                    showConfirmButton: true,
                });
                </script>";
    }
    $email = htmlspecialchars($_POST['email']);
    $phone = htmlspecialchars($_POST['phone']);
    $fullname = htmlspecialchars($_POST['fullname']);
    $address = htmlspecialchars($_POST['address']);
    
    date_default_timezone_set('Asia/Ho_Chi_Minh'); 
    $now = date('Y-m-d H:i:s');

    if ($stmt = $conn->prepare("UPDATE user SET user_name = ?, email = ?, phone = ?, fullname = ?, address = ?, last_updated = ? WHERE user_id = ?")) {
        $stmt->bind_param("ssssssi", $user_name, $email, $phone, $fullname, $address, $now, $id);
        if ($stmt->execute()) {
            echo "<script>
            Swal.fire({
                icon: 'success',
                title: 'Cập nhật thành công.',
                showConfirmButton: true,
            }).then(() => {
                window.location.href = 'tranghienthi.php?quanly=quanlytaikhoan';
            });
            </script>";
            exit();
        } else {
            echo "Error updating profile: " . $stmt->error;
        }
        $stmt->close();
    } else {
        echo "Error preparing statement: " . $conn->error;
    }

    $conn->close();
    exit();
} 
ob_end_flush();
?>


    <link rel="stylesheet" href="ql_taikhoan/doimatkhau.css">
   

    <div class="box-content">
        <h2>Cập nhật thông tin tài khoản</h2>
        <div class="form">
            <form method="POST">
                <div>
                    <label for="username">Tên đăng nhập:</label>
                    <input type="text" id="username" name="username" value="<?php echo htmlspecialchars($user['user_name']); ?>">
                </div>
                <div>
                    <label for="email">Email:</label>
                    <input type="email" id="email" name="email" value="<?php echo htmlspecialchars($user['email']); ?>">
                </div>
                <div>
                    <label for="phone">Số điện thoại:</label>
                    <input type="text" id="phone" name="phone" value="<?php echo htmlspecialchars($user['phone']); ?>">
                </div>
                <div>
                    <label for="fullname">Họ và tên:</label>
                    <input type="text" id="fullname" name="fullname" value="<?php echo htmlspecialchars($user['fullname']); ?>">
                </div>
                <div>
                    <label for="address">Địa chỉ:</label>
                    <input type="text" id="address" name="address" value="<?php echo htmlspecialchars($user['address']); ?>">
                </div>
                <div>
                    <input type="submit" name="luu" value="Lưu">
                </div>
            </form>
        </div>
    </div>

