<?php
// session_start();
$host = "localhost";
$username = "root";
$password = "";
$database = "gourmez_web";
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
    $email = htmlspecialchars($_POST['email']);
    $phone = htmlspecialchars($_POST['phone']);
    $fullname=htmlspecialchars($_POST['fullname']);
    $address=htmlspecialchars($_POST['address']);

    if ($stmt = $conn->prepare("UPDATE user SET user_name = ?, email = ?, phone = ?, fullname = ?, address = ? WHERE user_id = ?")) {
        $stmt->bind_param("sssssi", $user_name, $email, $phone, $fullname, $address,$id);
        if ($stmt->execute()) {
            echo "Profile updated successfully";
        } else {
            echo "Error updating profile: " . $stmt->error;
        }
        $stmt->close();
    } else {
        echo "Error preparing statement: " . $conn->error;
    }

    $conn->close();

    // Redirect back to profile page or some confirmation page
    header("Location: tranghienthi.php?quanly=quanlytaikhoan");
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


