
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php'; // Adjust the path to your vendor directory

if (isset($_POST['send']) && ($_POST['send']) == 'Gửi email') {
    $email = $_POST['email'];

    if (empty($email)) {
        // echo "Bạn chưa nhập email.";
        echo "<script>
            Swal.fire({
                icon: 'error',
                title: 'Bạn chưa nhập email.',
                showConfirmButton: true,
            });
            </script>";
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
        $expiry = date('Y-m-d H:i:s', strtotime('+1 hour'));
        $otp = random_int(100000, 999999);

        $stmt->close();

        $stmt = $conn->prepare("UPDATE user SET reset_token = ?, reset_token_expiry = ?, otp = ? WHERE email = ?");
        $stmt->bind_param("ssis", $token, $expiry, $otp, $email);
        $stmt->execute();

        // Sending the email using PHPMailer
        $mail = new PHPMailer(true);
        echo("abc");

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
            $mail->Body    = '<p>Mã OTP: "' . $otp . '"</p><br><p>Lưu ý: Mã chỉ dùng một lần!</p>';

            $mail->send();
            echo "<script>
                Swal.fire({
                    icon: 'success',
                    title: 'Mã OTP đã được gửi đến email của bạn. Vui lòng kiểm tra email.',
                    showConfirmButton: true,
                }).then(function() {
                    Swal.fire({
                        title: 'Nhập mã OTP',
                        input: 'text',
                        inputPlaceholder: 'Nhập mã OTP',
                        showCancelButton: true,
                        confirmButtonText: 'Xác nhận',
                    }).then((result) => {
                        if (result.isConfirmed) {
                            var enteredOtp = result.value;
                            var form = document.createElement('form');
                            form.method = 'POST';
                            form.action = 'tranghienthi.php?quanly=xacthucotp';

                            var otpInput = document.createElement('input');
                            otpInput.type = 'hidden';
                            otpInput.name = 'otp';
                            otpInput.value = enteredOtp;
                            form.appendChild(otpInput);

                            var emailInput = document.createElement('input');
                            emailInput.type = 'hidden';
                            emailInput.name = 'email';
                            emailInput.value = '$email';
                            form.appendChild(emailInput);

                            var tokenInput = document.createElement('input');
                            tokenInput.type = 'hidden';
                            tokenInput.name = 'token';
                            tokenInput.value = '$token';
                            form.appendChild(tokenInput);

                            document.body.appendChild(form);
                            form.submit();
                        }
                    });
                });
            </script>";
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
    } else {
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
