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
function CheckEmailExist($email){
    
    $conn=connectdb();

    $sql="SELECT*FROM user WHERE email='$email'";
    
    $kq=$conn->query($sql);

    if($kq && $kq->num_rows>0){
        $row=$kq->fetch_assoc();
        $_SESSION['user']=$row['user_name'];
        $_SESSION['password']=$row['password'];
        $conn->close();
        return true;

    }
    else {
        $conn->close();
        return false;
    }
    // $conn->close();
}


?>
