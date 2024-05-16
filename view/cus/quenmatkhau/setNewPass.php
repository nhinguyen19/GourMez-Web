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
function setNewPass($email,$password)
{
    $conn=connectdb();
    $sql = "UPDATE user SET password='$pass_hash' WHERE email='$email'";
    $result=$conn->query($sql);

    if($result && $result->num_rows > 0){
        $row=$result->fetch_assoc();
        return $row['role'];
    }
    else {return 2;}
    $conn->close();



}












?>