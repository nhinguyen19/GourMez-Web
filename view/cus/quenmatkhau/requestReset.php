<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php'; // Adjust the path to your vendor directory

if (isset($_POST['send']) && ($_POST['send'])=='Gửi email') {
    $email = $_POST['email'];

    if (empty($email)) {
        echo "Email is required.";
        exit;
    }

    $host = "localhost";
    $username = "root";
    $password = "";
    $database = "gourmez_web";
    $conn = new mysqli($host, $username, $password, $database);

    if ($conn->connect_error) {
        die('Kết nối không thành công: ' . $conn->connect_error);
    }

    $stmt = $conn->prepare("SELECT user_id FROM user WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        $token = bin2hex(random_bytes(50));
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        // $current_time_zone = date_default_timezone_get();
        // echo "The current time zone is: " . $current_time_zone;
        $expiry = date('Y-m-d H:i:s', strtotime('+1 hour'));
        
        $reset_link = "http://localhost/GOURMEZ-WEB/view/cus/quenmatkhau/resetPassword.php?token=" . $token;

        $stmt->close();

        $stmt = $conn->prepare("UPDATE user SET reset_token = ?, reset_token_expiry = ? WHERE email = ?");
        $stmt->bind_param("sss", $token, $expiry, $email);
        $stmt->execute();

        // Sending the email using PHPMailer
        $mail = new PHPMailer(true);

        try {
            //Server settings
            $mail->isSMTP();
            $mail->Host       = 'smtp.gmail.com';
            $mail->SMTPAuth   = true;
            $mail->Username   = 'gourmezfood123@gmail.com'; // Your Gmail address
            $mail->Password   = 'wdou acbq frvw pbro';  // Your Gmail password or app password
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $mail->Port       = 587;

            //Recipients
            $mail->setFrom('gourmezfood123@gmail.com', 'Gourmez Food');
            $mail->addAddress($email);

            // Content
            $mail->isHTML(true);
            $mail->setLanguage('vn', '/optional/path/to/language/directory/');
            $mail->Subject = 'Gourmez Password';
            $mail->Body    = 'Bấm vào link để thay đổi mật khẩu: <a href="' . $reset_link . '">Thay đổi mật khẩu</a>';

            $mail->send();
            echo "<script>
            Swal.fire({
                icon: 'success',
                title: 'Liên kết để thay đổi mật khẩu đã được gửi đến bạn. <br>Vui lòng kiểm tra email.',
                showConfirmButton: true,
            });
            </script>";
            // echo 'Liên kết để thay đổi mật khẩu đã được gửi đến bạn. Vui lòng kiểm tra email.';
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
    } else {
        // echo "Email không tồn tại.";
        echo "<script>
            Swal.fire({
                icon: 'error',
                title: 'Email không tồn tại.',
                showConfirmButton: true,
            });
            </script>";
    }

    $stmt->close();
    $conn->close();
}
?>

<link rel="stylesheet" href="../view/cus/quenmatkhau/requestReset.css">
<div class="box-content">
    <h3>QUÊN MẬT KHẨU?</h3>
    <form class="form" method="post">
       
        <br><input type="email" name="email" placeholder="Email" required>
        <br><input type="submit" name="send" value="Gửi email">
    </form>
</div>
    
