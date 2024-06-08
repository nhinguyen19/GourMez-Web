<?php
    $host = "localhost";
    $username = "root";
    $password = "";
    $database = "database";
    $conn = new mysqli($host, $username, $password, $database);
 
    if ($conn->connect_error) {
     die('Kết nối không thành công: ' . $conn->connect_error);
 } 

    $sql = "SELECT date(date_order), COUNT(order_id) AS total_orders
                        FROM orders
                        GROUP BY date(date_order)
                        ORDER BY date(date_order)
           "; 
  
    $kq = mysqli_query($conn,$sql);

    $data = [];

    if (mysqli_num_rows($kq)>0)
    {
        while ($row = mysqli_fetch_assoc($kq))
        {
            $data[] = $row;
        }
    }

    $conn->close();

    header('Content-Type: application/json');
    echo json_encode($data);
    
?>
