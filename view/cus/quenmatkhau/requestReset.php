<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php'; // Adjust the path to your vendor directory

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
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
            $mail->setFrom('duongyennhi270904@gmail.com', 'Mailer');
            $mail->addAddress($email);

            // Content
            $mail->isHTML(true);
            $mail->Subject = 'Password Reset Request';
            $mail->Body    = 'Click the following link to reset your password: <a href="' . $reset_link . '">Reset Password</a>';

            $mail->send();
            echo 'A password reset link has been sent to your email.';
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
    } else {
        echo "No account found with that email.";
    }

    $stmt->close();
    $conn->close();
}
?>


    <form method="post" action="requestReset.php">
        <label for="email"></label>
        <input type="email" name="email" placeholder="Email" required>
        <input type="submit" value="Request Password Reset">
    </form>
