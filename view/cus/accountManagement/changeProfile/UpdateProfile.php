
<?php

ob_start();

// Database connection parameters
$host = "localhost";
$username = "root";
$password = "";
$database = "gourmez_web";
$conn = new mysqli($host, $username, $password, $database);

// Check the connection
if ($conn->connect_error) {
    die('Kết nối không thành công: ' . $conn->connect_error);
}

// Check if the form is submitted
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
    $email = htmlspecialchars($_POST['email']);
    $phone = htmlspecialchars($_POST['phone']);
    $fullname = htmlspecialchars($_POST['fullname']);
    $address = htmlspecialchars($_POST['address']);

    // Validate inputs
    if (strlen($user_name) < 3) {
        echo "<script>
                Swal.fire({
                    icon: 'error',
                    title: 'Tên đăng nhập phải tối thiểu 3 ký tự.',
                    showConfirmButton: true,
                });
              </script>";
    } elseif (empty($email)) {
        echo "<script>
                Swal.fire({
                    icon: 'error',
                    title: 'Email không được để trống.',
                    showConfirmButton: true,
                });
              </script>";
    } else {
        // Update user details
        date_default_timezone_set('Asia/Ho_Chi_Minh'); 
        $now = date('Y-m-d H:i:s');

        $sql = "UPDATE user SET user_name = ?, email = ?, phone = ?, fullname = ?, address = ?, last_updated = ? WHERE user_id = ?";
        if ($stmt = $conn->prepare($sql)) {
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
    }
}

// Fetch current user details
if (!isset($_SESSION['user'])) {
    die("User not logged in");
}

$user = $_SESSION['user'];
$sql = "SELECT user_name, email, fullname, phone, address FROM user WHERE user_name = ?";
$stmt = $conn->prepare($sql);
if ($stmt) {
    $stmt->bind_param("s", $user);
    $stmt->execute();
    $result = $stmt->get_result();
    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
    } else {
        die("User not found");
    }
    $stmt->close();
} else {
    die("Preparation failed: " . $conn->error);
}

$conn->close();
ob_end_flush();
?>



