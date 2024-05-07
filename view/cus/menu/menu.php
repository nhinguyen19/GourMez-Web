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
    $conn = connectdb();
    $sql_lietke_sanpham = "SELECT * FROM food, category WHERE food.cate_id = category.cate_id ORDER BY food_id ASC";
    $query_lietke_sanpham = mysqli_query($conn, $sql_lietke_sanpham);
?>
<?php include('sidebar.php') ?>

<h2 class="title">Tất cả sản phẩm</h2>
<div class="insert_sp">
    <table>
        <tr>
            <th style="text-align: center">Id</th>
            <th style="text-align: center">Tên sản phẩm</th>
            <th style="text-align: center">Danh mục</th>
            <th style="text-align: center">Giá gốc</th>
            <th style="text-align: center">Giá bán</th>
            <th style="text-align: center">Mô tả</th>
            <th style="text-align: center">Hình ảnh</th>
        </tr>
        <?php
            $i = 0;
            while ($row = mysqli_fetch_array($query_lietke_sanpham)) {
                $i++;
        ?>     
        <tr>
            <td style="text-align: center"><?php echo $row['food_id'] ?></td>
            <td style="text-align: center"><?php echo $row['food_name'] ?></td>
            <td style="text-align: center"><?php echo $row['cate_name'] ?></td>
            <td style="text-align: center"><?php echo $row['original_price'] ?></td>
            <td style="text-align: center"><?php echo $row['selling_price'] ?></td>
            <td style="text-align: center"><?php echo $row['small_descr'] ?></td>
            <td style="text-align: center"><img src="ql_sanpham/uploads/<?php echo $row['img'] ?>" width="100" height="100"></td>

        </tr>
        <?php
            }
        ?>
        
    </table>
</div>