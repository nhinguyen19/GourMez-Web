<?php
    require("connect.php");

    $sql = "SELECT food_name, original_price FROM food";
    $result = mysqli_query($conn, $sql);

    if(!$result)
    {
        die("Lỗi". mysqli_error($conn));
    }

    if(mysqli_num_rows($result) > 0)
    {
        while($row = mysqli_fetch_assoc($result))
        {
            echo "<prev>";
            print_r($row);
            echo "</prev>";
        }
    }

?>