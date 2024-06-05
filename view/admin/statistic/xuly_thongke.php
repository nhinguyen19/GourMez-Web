<?php
    include_once("C:/xampp/htdocs/project/GourMez-Web/model/connect.php");
    $conn = connectdb();
    $sql = "SELECT order_day, SUM(total_quantity_service) AS total_quantity
            FROM (
                    (SELECT order_day, COUNT(id_bill) AS total_quantity_service
                        FROM birthday_service
                        GROUP BY order_day)
                    UNION ALL
                    (SELECT order_day, COUNT(id_bill) AS total_quantity_service
                    FROM bigdeal_service
                    GROUP BY order_day) ) AS new_table
            GROUP BY order_day
            ORDER BY order_day"; 
  
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
