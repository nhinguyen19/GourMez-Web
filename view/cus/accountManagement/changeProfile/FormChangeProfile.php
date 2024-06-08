<?php
// session_start();
    $host = "localhost";
    $username = "root";
    $password = "";
    $database = "database";
    $conn = new mysqli($host, $username, $password, $database);

    if ($conn->connect_error) {
        die('Kết nối không thành công: ' . $conn->connect_error);
    } 
    
    if (!isset($_SESSION['user'])) {
        die("User not logged in");
    }
$id =  $_SESSION['id'];
// echo $user;

$sql = "SELECT user_name, email, fullname,phone, address FROM user WHERE user_id = ?";
$stmt = $conn->prepare($sql);
if (!$stmt) {
    die("Preparation failed: " . $conn->error);
}
else {
    // echo 1;
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();

    } else {
        echo "User not found";
        exit();
}
}

?>

<link rel="stylesheet" href="../view/cus/accountManagement/changeProfile/FormChangeProfile.css">
<div class="box-content">
    <h3>CHỈNH SỬA THÔNG TIN</h3>
    <div class="form">
        <form method="Post">
            <label for="user_name">Tên đăng nhập:</label>
            <input type="text" id="user_name" name="username" value="<?php echo htmlspecialchars($row['user_name']); ?>"><br>
            

            <label for="user_name">Họ và tên:</label>
            <input type="text" id="full_name" name="fullname" value="<?php echo htmlspecialchars($row['fullname']); ?>"><br>

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" value="<?php echo htmlspecialchars($row['email']); ?>"><br>

            <label for="phone">Số điện thoại:</label>
            <input type="text" id="phone" name="phone" value="<?php echo htmlspecialchars($row['phone']); ?>"><br>

            <label for="phone">Địa chỉ:</label>
            <input type="text" id="address" name="address" value="<?php echo htmlspecialchars($row['address']); ?>"><br>

            <input type="submit" value="Lưu" name="luu">
        </form>

    </div>
    

</div>
    <?php
    include('../view/cus/accountManagement/changeProfile/UpdateProfile.php');?>

