<?php
session_start();
 // Include your database connection file
 $host = "localhost";
 $username = "root";
 $password = "";
 $database = "gourmez_web";
 $conn = new mysqli($host, $username, $password, $database);

 if ($conn->connect_error) {
     die('Kết nối không thành công: ' . $conn->connect_error);
 } 


// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_SESSION['id'];
    $old_password = $_POST['old_password'];
    $new_password = $_POST['new_password'];
    $confirm_password = $_POST['confirm_password'];

    // Fetch the old password from the database
    $stmt = $conn->prepare("SELECT password FROM user WHERE user_id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $stmt->bind_result($db_password);
    $stmt->fetch();
    $stmt->close();

    // Validate old password
    if (!password_verify($old_password, $db_password)) {
        $error = "The old password is incorrect.";
    } elseif ($new_password !== $confirm_password) {
        $error = "The new passwords do not match.";
    } else {
        // Hash the new password and update it in the database
        $new_password_hashed = password_hash($new_password, PASSWORD_DEFAULT);
        $stmt = $conn->prepare("UPDATE user SET password = ? WHERE user_id = ?");
        $stmt->bind_param("si", $new_password_hashed, $id);
        
        if ($stmt->execute()) {
            $success = "Your password has been successfully updated.";
        } else {
            $error = "There was an error updating your password. Please try again.";
        }

        $stmt->close();
    }
}
?>

    <link rel="stylesheet" href="../view/cus/accountManagement/changePass/changePass.css">
    <script src="../view/cus/dangnhap/hienthi_mk.js"></script>
    <div class="box-content">
        <h2>Change Password</h2>
        
        <form method="POST">
            <div>
                <label for="old_password">Old Password:</label>
                <input type="password" id="old_password" name="old_password" >
                <span id="old_nosee" style="cursor: pointer;" onclick="showOldpass()" ><i class="fas fa-eye-slash" ></i></span>
            </div>
            <div>
                <label for="new_password">New Password:</label>
                <input type="password" id="new_password" name="new_password" >
                <span id="nosee" style="cursor: pointer;" onclick="showpass()" ><i class="fas fa-eye-slash" ></i></span>

            </div>
            <div>
                <label for="confirm_password">Re-enter New Password:</label>
                <input type="password" id="confirm_password" name="confirm_password" >
                <span id="noseeRe" style="cursor: pointer;" onclick="showRepass()"><i class="fas fa-eye-slash" ></i></span>
            </div>
            <div>
                <button type="submit">Change Password</button>
            </div>
        </form>
        <?php if (isset($error)): ?>
            <div style="color: red;"><?php echo $error; ?></div>
        <?php endif; ?>
        <?php if (isset($success)): ?>
            <div style="color: green;"><?php echo $success; ?></div>
        <?php endif; ?>


    </div>
    


<!-- <script src="../view/cus/dangnhap/hienthi_mk.js"></script>
<script src="../dangnhap/hienthi_mk.js"></script>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"/>
    <div id="change_pass" class="box-content" >
        
        <h2>Đổi mật khẩu</h2>
        <form" method="Post" autocomplete="off">
            
            <table class="bang_tdmk">
                
                MK cũ
                 <tr > 
                    <td style="font-size:18px ">Mật khẩu cũ</td>
                    <td style="display: flex;align-items: center;">
                        <input type="password" id="old_password" name="old_password">
                        <span id="old_nosee" style="cursor: pointer;" onclick="showOldpass()" ><i class="fas fa-eye-slash" ></i></span>
                    </td>
                </tr>
                    
                <tr>
                    <td class="has-error" colspan="2">
                        <span><?php echo (isset($err['name']))?$err['name']:''?></span>
                    </td> 
                </tr> -->

                <!-- Mật khẩu mới -->
                <!-- <tr>
                    <td style="font-size:18px ">Mật khẩu mới</td>
                    <td style="display: flex;align-items: center;">
                        <input type="password" id="password" name="password">
                        <span id="nosee" style="cursor: pointer;" onclick="showpass()" ><i class="fas fa-eye-slash" ></i></span>
                    </td>
                </tr> -->

                <!-- Nhập lại MK mới -->
                <!-- <tr>
                    <td class="title" style="font-size:18px " >Nhập lại mật khẩu mới</td>
                    <td style="display: flex;align-items: center;">
                        <input type="password" id="re_enter_password" name="re_enter_password">
                        <span id="noseeRe" style="cursor: pointer;" onclick="showRepass()"><i class="fas fa-eye-slash" ></i></span>
                    </td>
                </tr>

                <tr>
                    <td class="has-error" colspan="2"> 
                        <span><?php echo (isset($err['pass']))?$err['pass']:''?></span>
                    </td> 
                </tr>

                <tr colspan="2">
                    <td><input type="submit" id="dangnhap" name="dangnhap" value="Đăng nhập"></td>
                </tr>
            
            </table>
        </form>

        
    </div> -->
       
     