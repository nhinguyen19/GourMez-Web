<?php
$host = "localhost";
$username = "root";
$password = "";
$database = "gourmez_web";
$conn = new mysqli($host, $username, $password, $database);

if ($conn->connect_error) {
    die('Kết nối không thành công: ' . $conn->connect_error);
} 

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['user_id'])) {
    $user_id = $_GET['user_id'];

    $sql = "SELECT user_name, fullname, email, phone, address FROM user WHERE user_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $user_id);
    $stmt->execute();
    $result = $stmt->get_result();
    $user = $result->fetch_assoc();
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['user_id'])) {
    $user_id = $_POST['user_id'];
    $user_name = $_POST['user_name'];
    $fullname = $_POST['fullname'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];

    $sql = "UPDATE user SET user_name = ?, fullname = ?, email = ?, phone = ?, address = ? WHERE user_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssssi", $user_name, $fullname, $email, $phone, $address, $user_id);

    if ($stmt->execute()) {
        // echo "Cập nhật thành công!";
        echo "<script>
                Swal.fire({
                    icon: 'success',
                    title: 'Cập nhật thành công.',
                    showConfirmButton: true,
                }).then(() => {
                    window.location.href = 'tranghienthi.php?quanly=quanlytaikhoanuser';
                });
                </script>";
            exit();
    } else {
        
        echo "Cập nhật thất bại: " . $conn->error;
        echo "<script>
        Swal.fire({
            icon: 'error',
            title: 'Cập nhật thất bại.',
            showConfirmButton: true,
        });
        </script>";
    }

    $stmt->close();
    $conn->close();
}
?>
<style>
.box-content{
    display: block;
    width:40%;
    justify-content: center;
    align-self: end;
    margin-right: 3%;
    margin-left: 38%;
    text-align: center;
}
.box-content form input{
    width: 100%;
    margin-bottom:5%;
}
.box-content form {
    width: 100%;
    text-align: left;
    border: 1px solid black;
    border-collapse: collapse;
    padding: 5%;
    
}


</style>

<div class="box-content">
    <h1>Sửa người dùng</h1>
    <form method="post" >
        <input type="hidden" name="user_id" value="<?php echo $user_id; ?>">
        <label for="user_name">Tên đăng nhập:</label><br>
        <input type="text" id="user_name" name="user_name" value="<?php echo $user['user_name']; ?>"><br>
        <label for="fullname">Họ và tên:</label><br>
        <input type="text" id="fullname" name="fullname" value="<?php echo $user['fullname']; ?>"><br>
        <label for="email">Email:</label><br>
        <input type="email" id="email" name="email" value="<?php echo $user['email']; ?>"><br>
        <label for="phone">Số điện thoại:</label><br>
        <input type="text" id="phone" name="phone" value="<?php echo $user['phone']; ?>"><br>
        <label for="address">Địa chỉ:</label><br>
        <input type="text" id="address" name="address" value="<?php echo $user['address']; ?>"><br><br>
        <input type="submit" value="Cập nhật">
    </form>
</div>
    

