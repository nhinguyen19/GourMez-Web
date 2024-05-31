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
    
    if (!isset($_SESSION['user'])) {
        die("User not logged in");
    }
$user =  $_SESSION['user'];
// echo $user;

$sql = "SELECT user_name, email, fullname,phone, address FROM user WHERE user_name = ?";
$stmt = $conn->prepare($sql);
if (!$stmt) {
    die("Preparation failed: " . $conn->error);
}
else {
    $stmt->bind_param("s", $user);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        include('../view/cus/accountManagement/changeProfile/UpdateProfile.php');

    } else {
        echo "User not found";
        exit();
}
    
}

?>

<link rel="stylesheet" href="../view/cus/accountManagement/changeProfile/FormChangeProfile.css">
<div class="box-content">
    <h3>Chỉnh sửa thông tin</h3>
    <form method="Post">
        <label for="user_name">Tên đăng nhập:</label>
        <input type="text" id="user_name" name="username" value="<?php echo htmlspecialchars($row['user_name']); ?>"><br>

        <label for="user_name">Họ và tên:</label>
        <input type="text" id="full_name" name="fullname" value="<?php echo htmlspecialchars($row['fullname']); ?>"><br>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" value="<?php echo htmlspecialchars($row['email']); ?>"><br>

        <label for="phone">Số điện thoại:</label>
        <input type="text" id="phone" name="phone" value="<?php echo htmlspecialchars($row['phone']); ?>"><br>

        <label for="phone">Địa chỉ giao hàng:</label>
        <input type="text" id="address" name="address" value="<?php echo htmlspecialchars($row['address']); ?>"><br>

        <input type="submit" value="Lưu" name="luu">
    </form>

</div>
    

