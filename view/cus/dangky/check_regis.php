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
    function reg_uname($name,$user_name,$email,$phone,$pass){
        $conn=connectdb();
        $errors=array();//mảng thông báo khi kiểm tra đăng ký thông tin bị trùng
       
        // Kiểm tra tên người dùng đã tồn tại trong cơ sở dữ liệu chưa
        $check_user = "SELECT * FROM user WHERE user_name = '$user_name'";
        $check_user_result = $conn->query($check_user);
        if ($check_user_result->num_rows > 0) {
            // Tên người dùng đã tồn tại, thêm thông báo lỗi vào mảng
            $errors['username'] = "Tên người dùng đã tồn tại.";
        }

        // Kiểm tra email đã tồn tại trong cơ sở dữ liệu chưa
        $check_email = "SELECT * FROM user WHERE email = '$email'";
        $check_email_result = $conn->query($check_email);
        if ($check_email_result->num_rows > 0) {
            // Email đã tồn tại, thêm thông báo lỗi vào mảng
            $errors['email'] = "Email đã tồn tại.";
        }

        // Kiểm tra mật khẩu đã tồn tại trong cơ sở dữ liệu chưa
        $check_pass = "SELECT * FROM user WHERE password = '$pass'";
        $check_pass_result = $conn->query($check_pass);
        if ($check_pass_result->num_rows > 0) {
            // Email đã tồn tại, thêm thông báo lỗi vào mảng
            $errors['pass'] = "Email đã tồn tại.";
        }

        if (count($errors) > 0) {
            // Trả về mảng thông báo lỗi nếu có lỗi
            return $errors;
        }

        //Bắt đầu nhập dữ liệu vào dtb
            $sql = "INSERT INTO user (fullname,user_name, email, phone ,password)
            VALUES ('$name','$user_name','$email','$phone','$pass' )";
            
            if ($conn->query($sql)==TRUE)
            {
                header('Location: ../dangnhap/login.php');
            }
            else {
                $errors['fail'] = "Đã xảy ra lỗi: " . $conn->error;
                return $errors;
            }
            $conn->close();

        
    }
    
    

?>

