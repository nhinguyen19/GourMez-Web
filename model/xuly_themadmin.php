<?php
    

    function reg_uname($name, $user_name, $email, $phone, $pass) {
        
        $host = "localhost";
        $username = "root";
        $password = "";
        $database = "database";
        $conn = new mysqli($host, $username, $password, $database);
    
        if ($conn->connect_error) {
            die('Kết nối không thành công: ' . $conn->connect_error);
        } 
        $errors = array(); // Mảng để lưu trữ các thông báo lỗi
    
        // Prepare and bind to prevent SQL injection
        $stmt = $conn->prepare("SELECT user_name, email, password FROM user WHERE user_name = ? OR email = ?");
        $stmt->bind_param("ss", $user_name, $email);
        $stmt->execute();
        $result = $stmt->get_result();
    
        if ($result->num_rows > 0) {
            // Lặp qua tập kết quả và thêm các thông báo lỗi phù hợp
            while ($row = $result->fetch_assoc()) {
                if ($row['user_name'] == $user_name) {
                    $errors['username'] = "Tên người dùng đã tồn tại.";
                }
                if ($row['email'] == $email) {
                    $errors['email'] = "Email đã tồn tại.";
                }
                if (password_verify($pass, $row['password'])) {
                    $errors['pass'] = "Mật khẩu đã tồn tại.";
                }
            }
        } else {
            // Thêm người dùng mới vào cơ sở dữ liệu
            $pass_hash = password_hash($pass, PASSWORD_DEFAULT);
            $role=1;
            $insert_stmt = $conn->prepare("INSERT INTO user (fullname, user_name, email, phone, password,role) VALUES (?, ?, ?, ?, ?,?)");
            $insert_stmt->bind_param("sssssi", $name, $user_name, $email, $phone, $pass_hash,$role);
    
            if ($insert_stmt->execute()) {
                echo "<script>
                Swal.fire({
                    icon: 'success',
                    title: 'Thêm thành công',
                    showConfirmButton: true,
                });
                </script>";
                $conn->close();
                exit();
            } else {
                $errors['fail'] = "Đã xảy ra lỗi: " . $conn->error;
            }
            $insert_stmt->close();
        }
    
        $stmt->close();
        $conn->close();
        return $errors;
    }
?>
