<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $token = $_POST['token'];
    $new_password = $_POST['new_password'];
    $confirm_password = $_POST['confirm_password'];

    if (empty($new_password) || empty($confirm_password)) {
        echo "Both password fields are required.";
        exit;
    }

    if (strlen($new_password) < 6) {
        echo "Password must be at least 6 characters.";
        exit;
    }

    if ($new_password !== $confirm_password) {
        echo "Passwords do not match.";
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

    $stmt = $conn->prepare("SELECT email FROM user WHERE reset_token = ? AND reset_token_expiry > NOW()");
    $stmt->bind_param("s", $token);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        $stmt->bind_result($email);
        $stmt->fetch();
        $stmt->close();

        $hashed_password = password_hash($new_password, PASSWORD_BCRYPT);

        $stmt = $conn->prepare("UPDATE user SET password = ?, reset_token = NULL, reset_token_expiry = NULL WHERE email = ?");
        $stmt->bind_param("ss", $hashed_password, $email);

        if ($stmt->execute()) {
            echo "Your password has been reset successfully.";
        } else {
            echo "Error updating password.";
        }
    } else {
        echo "Invalid or expired token.";
    }

    $stmt->close();
    $conn->close();
} 

else {
    $token = $_GET['token'];

    $host = "localhost";
    $username = "root";
    $password = "";
    $database = "gourmez_web";
    $conn = new mysqli($host, $username, $password, $database);

    if ($conn->connect_error) {
        die('Kết nối không thành công: ' . $conn->connect_error);
    }

    $stmt = $conn->prepare("SELECT email FROM user WHERE reset_token = ? AND reset_token_expiry > NOW()");
    $stmt->bind_param("s", $token);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        $stmt->close();
    } else {
        echo "Invalid or expired token.";
        $stmt->close();
        $conn->close();
        exit;
    }
}
?>

    <form method="post" >
    <!-- action="resetPassword.php" -->
        <input type="hidden" name="token" value="<?php echo htmlspecialchars($_GET['token']); ?>">
        <label for="new_password">New Password:</label>
        <input type="password" id="new_password" name="new_password" placeholder="New Password" required>
        <span id="nosee" style="cursor: pointer;" onclick="showpass()" ><i class="fas fa-eye-slash" ></i></span>
        <br>
        <label for="confirm_password">Re-enter New Password:</label>
        <input type="password" id="confirm_password" name="confirm_password" placeholder="Re-enter New Password" required>
        <span id="noseeRe" style="cursor: pointer;" onclick="showRepass()"><i class="fas fa-eye-slash" ></i></span>
        <br>
        <input type="submit" value="Reset Password">
    </form>

