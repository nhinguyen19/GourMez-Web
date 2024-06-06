<?php
    include_once("C:/xampp/htdocs/project/GourMez-Web/model/connect.php");
    $conn = connectdb();
    $sql = "SELECT date_order, COUNT(order_id) AS total_order
    FROM orders
    GROUP BY date_order
            ORDER BY date_order"; 
  
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
