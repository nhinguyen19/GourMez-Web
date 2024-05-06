<?php
    $host = "localhost";
    $username = "root";
    $password = "";
    $database = "gourmezwweb";

    $conn = new mysqli($host, $username, $password, $database);
    if ($conn->connect_error) {
        die('Kết nối không thành công'. $conn->connect_error);
    }
    // echo"kết nối thành công";
    
       
   
?>
