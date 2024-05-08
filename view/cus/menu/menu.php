<?php
    $conn = connectdb();
    $sql_lietke_sanpham = "SELECT * FROM food, category WHERE food.cate_id = category.cate_id ORDER BY food_id ASC";
    $query_lietke_sanpham = mysqli_query($conn, $sql_lietke_sanpham);
?>
<ul id="all_dishes">
    <h1 class="title_thucdon">Thực đơn</h1>
    <div class="food-item">
         <?php
            $i = 0;
            while ($row = mysqli_fetch_array($query_lietke_sanpham)) {
                $i++;
        ?>
        <li class="Thucdon_mon">  
            <img src="../view/admin/ql_sanpham/uploads/<?php echo $row['img'] ?>" style="width: 165px; height: 150px;">
            <p class="Ten_mon"><?php echo $row['food_name'] ?></p>
            <p>
                <span class="label">Giá bán:</span> 
                <span class="price"><?php echo number_format($row['selling_price'],0,',','.').'vnđ' ?></span>
            </p>
            <button class="btn_xemchitiet">Xem chi tiết</button>
            <?php
            }
            ?>
        </li>
    </div>
</ul>