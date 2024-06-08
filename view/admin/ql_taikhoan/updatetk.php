<?php

$host = "localhost";
$username = "root";
$password = "";
$database = "database";
$conn = new mysqli($host, $username, $password, $database);

if ($conn->connect_error) {
    die('Kết nối không thành công: ' . $conn->connect_error);
} 

if (isset($_POST['luu']) && $_POST['luu']=="Lưu") {
    if (!isset($_SESSION['id'])) {
        die('User not logged in.');
    }
    $id=$_SESSION['id'];
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
    if ($email=='') {
        echo "<script>
                Swal.fire({
                    icon: 'error',
                    title: 'Email không được để trống.',
                    showConfirmButton: true,
                });
                </script>";
    }
    $phone = htmlspecialchars($_POST['phone']);
    $fullname=htmlspecialchars($_POST['fullname']);
    $address=htmlspecialchars($_POST['address']);

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
                    window.location.href = 'tranghienthi.php?quanly=thongtintaikhoan';
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

    // Redirect back to profile page or some confirmation page
    // header("Location: tranghienthi.php?quanly=thongtintaikhoan");
    ob_end_flush();
    exit();
}
else {
    
    if (isset($_SESSION['id'])) {
        $id = $_SESSION['id'];

        if ($stmt = $conn->prepare("SELECT user_name, email, phone, fullname, address FROM user WHERE user_id = ?")) {
            $stmt->bind_param("i", $id);
            $stmt->execute();
            $result = $stmt->get_result();

            if ($result->num_rows == 1) {
                $user = $result->fetch_assoc();
            } else {
                echo "User not found";
                exit();
            }
            $stmt->close();
        } else {
            echo "Error preparing statement: " . $conn->error;
            exit();
        }
    } else {
        echo "User not logged in.";
        exit();
    }
}
?>


