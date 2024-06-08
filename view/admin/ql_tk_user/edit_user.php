<?php
$host = "localhost";
$username = "root";
$password = "";
$database = "database";
$conn = new mysqli($host, $username, $password, $database);

if ($conn->connect_error) {
    die('Kết nối không thành công: ' . $conn->connect_error);
} 

$user = [];
$errors = [];
if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['user_id'])) {
    $user_id = intval($_GET['user_id']);

    $sql = "SELECT user_name, fullname, email, phone, address FROM user WHERE user_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $user_id);
    $stmt->execute();
    $result = $stmt->get_result();
    $user = $result->fetch_assoc();
    $stmt->close();
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['user_id'])) {
    $user_id = intval($_POST['user_id']);
    $user_name = trim($_POST['user_name']);
    $fullname = trim($_POST['fullname']);
    $email = trim($_POST['email']);
    $phone = trim($_POST['phone']);
    $address = trim($_POST['address']);

    if (strlen($user_name) < 3) {
        $errors[] = "Tên đăng nhập phải tối thiểu 3 ký tự.";
    }
    if (empty($email)) {
        $errors[] = "Email không được để trống.";
    }

    if (empty($errors)) {
        $sql = "UPDATE user SET user_name = ?, fullname = ?, email = ?, phone = ?, address = ? WHERE user_id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sssssi", $user_name, $fullname, $email, $phone, $address, $user_id);

        if ($stmt->execute()) {
            echo "<script>
                    Swal.fire({
                        icon: 'success',
                        title: 'Cập nhật thành công.',
                        showConfirmButton: true,
                    }).then(() => {
                        window.location.href = 'tranghienthi.php?quanly=quanlytaikhoanuser';
                    });
                  </script>";
            $stmt->close();
            $conn->close();
            exit();
        } else {
            $errors[] = "Cập nhật thất bại: " . $conn->error;
        }
        $stmt->close();
    }
}
$conn->close();
?>
<style>
.box-content {
    display: flex;
    flex-direction: column;
    align-items: center;
    margin: 0 auto;
    width: 40%;
    padding: 20px;
    border: 1px solid black;
    border-radius: 5px;
    box-shadow: 0 0 10px rgba(0,0,0,0.1);
}

.box-content form input {
    width: 100%;
    margin-bottom: 10px;
    padding: 8px;
    box-sizing: border-box;
}

.box-content form {
    width: 100%;
}
</style>

<div class="box-content">
    <h1>Sửa người dùng</h1>
    <?php
    if (!empty($errors)) {
        foreach ($errors as $error) {
            echo "<script>
                    Swal.fire({
                        icon: 'error',
                        title: '$error',
                        showConfirmButton: true,
                    });
                  </script>";
        }
    }
    ?>
    <form method="post">
        <input type="hidden" name="user_id" value="<?php echo htmlspecialchars($user_id); ?>">
        <label for="user_name">Tên đăng nhập:</label><br>
        <input type="text" id="user_name" name="user_name" value="<?php echo htmlspecialchars($_POST['user_name'] ?? $user['user_name'] ?? ''); ?>"><br>
        <label for="fullname">Họ và tên:</label><br>
        <input type="text" id="fullname" name="fullname" value="<?php echo htmlspecialchars($_POST['fullname'] ?? $user['fullname'] ?? ''); ?>"><br>
        <label for="email">Email:</label><br>
        <input type="email" id="email" name="email" value="<?php echo htmlspecialchars($_POST['email'] ?? $user['email'] ?? ''); ?>"><br>
        <label for="phone">Số điện thoại:</label><br>
        <input type="text" id="phone" name="phone" value="<?php echo htmlspecialchars($_POST['phone'] ?? $user['phone'] ?? ''); ?>"><br>
        <label for="address">Địa chỉ:</label><br>
        <input type="text" id="address" name="address" value="<?php echo htmlspecialchars($_POST['address'] ?? $user['address'] ?? ''); ?>"><br><br>
        <input type="submit" value="Cập nhật">
    </form>
</div>
