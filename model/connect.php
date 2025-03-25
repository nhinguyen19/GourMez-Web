<?php
    function connectdb()
    {
        $host = "localhost";  // Máy chủ MySQL (có thể đổi nếu dùng server khác)
        $username = "root";   // Tài khoản mặc định của MySQL trên XAMPP
        $password = "";       // Mặc định XAMPP không có mật khẩu
        $database = "database";  // Đổi tên database cho đúng

        $conn = new mysqli($host, $username, $password, $database);

        // Kiểm tra kết nối
        if ($conn->connect_error) {
            die('Kết nối không thành công: ' . $conn->connect_error);
        } 
        return $conn;
    }
?>