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
        // else {
        //     echo 'Kết nối thành công đến CSDL.';
        // }
        return $conn;
    }
?>