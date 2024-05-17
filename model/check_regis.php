<?php
    function connectdb()
    {
        $host = "localhost";
        $username = "root";
        $password = "";
        $database = "gourmez_web";
        $conn = new mysqli($host, $username, $password, $database);
    
        if ($conn->connect_error) {
            die('Kết nối không thành công: ' . $conn->connect_error);
        } 
        return $conn;
    }

    function reg_uname($name, $user_name, $email, $phone, $pass) {
        $conn = connectdb();
        $errors = array(); // Mảng để lưu trữ các thông báo lỗi
    
        // Kiểm tra xem tên người dùng, email hoặc mật khẩu đã tồn tại
        $check_query = "SELECT * FROM user WHERE user_name = '$user_name' OR email = '$email' OR password = '$pass'";
        $check_result = $conn->query($check_query);
    
        if ($check_result->num_rows > 0) {
            // Lặp qua tập kết quả và thêm các thông báo lỗi phù hợp
            while ($row = $check_result->fetch_assoc()) {
                if ($row['user_name'] == $user_name) {
                    $errors['username'] = "Tên người dùng đã tồn tại.";
                }
                if ($row['email'] == $email) {
                    $errors['email'] = "Email đã tồn tại.";
                }
                if ($row['password'] == $pass) {
                    $errors['pass'] = "Mật khẩu đã tồn tại.";
                }
            }
    
            // Trả về mảng lỗi
            return $errors;
        } else {
            // Thêm người dùng mới vào cơ sở dữ liệu
            $sql = "INSERT INTO user (fullname, user_name, email, phone, password) VALUES ('$name', '$user_name', '$email', '$phone', '$pass')";
    
            if ($conn->query($sql)) {
                header('Location: tranghienthi?quanly=dangnhap');
                // header('Location: ../view/cus/dangnhap/login.php');
                $conn->close();
                die();
            } else {
                $errors['fail'] = "Đã xảy ra lỗi: " . $conn->error;
                return $errors;
                $conn->close();
                die();
            }
        }
    
        $conn->close();
    }
    

?>

