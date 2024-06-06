    
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<?php
if (isset($_POST['update']) && $_POST['update'] == "Cập nhật") {
    if (isset($_GET['token'])) {
        $token = $_GET['token'];
        // echo "Token: " . htmlspecialchars($token) . "<br>";
    } else {
        echo "<script>
        Swal.fire({
            icon: 'error',
            title: 'Mã thông báo không hợp lệ hoặc đã hết hạn.',
            showConfirmButton: true,
        });
        </script>";
        exit();
    }
    $err=array();
    $new_password = $_POST['new_password'];
    $confirm_password = $_POST['confirm_password'];
    // echo "2<br>";

    if (empty($new_password) || empty($confirm_password)) {
        // echo "<script>
        // Swal.fire({
        //     icon: 'error',
        //     title: 'Bạn chưa nhập mật khẩu.',
        //     showConfirmButton: true,
        // });
        // </script>";
        $err['emptypass']='Bạn chưa nhập mật khẩu.';
        
    }

    if (strlen($new_password) < 6) {
        // echo "<script>
        // Swal.fire({
        //     icon: 'error',
        //     title: 'Mật khẩu tối thiểu 6 ký tự.',
        //     showConfirmButton: true,
        // });
        // </script>";
        $err['countpass']='Mật khẩu tối thiểu 6 ký tự.';
    }

    if ($new_password !== $confirm_password) {
        // echo "<script>
        // Swal.fire({
        //     icon: 'error',
        //     title: 'Mật khẩu nhập lại không đúng.',
        //     showConfirmButton: true,
        // });
        // </script>";
        $err['rpass']='Mật khẩu nhập lại không đúng.';
    }
    if(empty($err)){
        $host = "localhost";
        $username = "root";
        $password = "";
        $database = "gourmez_web";
        $conn = new mysqli($host, $username, $password, $database);

        if ($conn->connect_error) {
            die('Kết nối không thành công: ' . $conn->connect_error);
        }

        $stmt = $conn->prepare("SELECT email, reset_token_expiry FROM user WHERE reset_token = ? AND reset_token_expiry > NOW()");
        if ($stmt === false) {
            die('Prepare failed: ' . htmlspecialchars($conn->error));
        }
        // echo "3<br>";
        $stmt->bind_param("s", $token);
        // $stmt->bind_param("ss", $token, $current_date);
        $stmt->execute();
        $stmt->store_result();
        
        // echo "Number of rows found: " . $stmt->num_rows . "<br>";

        if ($stmt->num_rows > 0) {
            $stmt->bind_result($email, $reset_token_expiry);
            $stmt->fetch();
            $stmt->close();
            
            // echo "Email: " . htmlspecialchars($email) . "<br>";
            // echo "Reset Token Expiry: " . htmlspecialchars($reset_token_expiry) . "<br>";

            $hashed_password = password_hash($new_password, PASSWORD_BCRYPT);

            $stmt = $conn->prepare("UPDATE user SET password = ?, reset_token = NULL, reset_token_expiry = NULL, otp = NULL WHERE email = ?");
            echo "5<br>";
            if ($stmt === false) {
                die('Prepare failed: ' . htmlspecialchars($conn->error));
            }

            $stmt->bind_param("ss", $hashed_password, $email);

            if ($stmt->execute()) {
                // echo "4<br>";
                echo "<script>
                Swal.fire({
                    icon: 'success',
                    title: 'Cập nhật thành công.',
                    showConfirmButton: true,
                }).then(() => {
                    window.location.href = 'tranghienthi.php?quanly=dangnhap';
                });
                </script>";
                exit();
            } else {
                echo "<script>
                Swal.fire({
                    icon: 'error',
                    title: 'Cập nhật thất bại.',
                    showConfirmButton: true,
                });
                </script>";
            }
        } else {
            // echo "6<br>";
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
    
}
?>

<link rel="stylesheet" href="../view/cus/quenmatkhau/resetPassword.css">
<div class="box-content">
    <p style="font-size:25px;font-family:'Lalezar'">THAY ĐỔI MẬT KHẨU</p>
    <div class="form">
        <form method="post">
            <label for="password">Mật khẩu mới</label>
            <br>
            <div class = "input-icon">
                <input type="password" id="password" name="new_password" placeholder="Mật khẩu mới" >
                <span id="nosee" style="cursor: pointer;" onclick="showpass()"><i class="fas fa-eye-slash icon"></i></span>
            </div>
            <div class="has-error" style="color:red">
                <span><?php echo (isset($err['emptypass']))?$err['emptypass'].'<br>':''?></span>
                <span><?php echo (isset($err['countpass']))?$err['countpass']:''?></span>
            </div> 
                
            <br>
            <label for="re_enter_password">Nhập lại mật khẩu mới</label>
            <br>
            <div class = "input-icon">
                <input type="password" id="re_enter_password" name="confirm_password" placeholder="Nhập lại mật khẩu mới" >
                <span id="noseeRe" style="cursor: pointer;" onclick="showRepass()"><i class="fas fa-eye-slash icon"></i></span>
            </div>
            <div class="has-error" style="color:red">
                <span><?php echo (isset($err['rpass']))?$err['rpass'].'<br>':''?></span>
            </div> 
            <br>
            <input type="submit" name="update" value="Cập nhật">
        </form>
    </div>
</div>
