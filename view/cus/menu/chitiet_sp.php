<?php
    $conn = connectdb();
    $sql_chitiet = "SELECT * FROM food, category WHERE food.cate_id = category.cate_id AND food.food_id='$_GET[id]' LIMIT 1";
    $query_chitiet= mysqli_query($conn, $sql_chitiet);
    while($row_chitiet = mysqli_fetch_array($query_chitiet)){
?>
<div class="noidung_chitiet" style=" margin-left: 19vw;">
    <h1 class= "title_chitiet" style="text-align: center"><?php echo $row_chitiet['food_name']?></h1>
    <div class="content-wrapper">
        <div class="anhsp" >
            <img src="../view/admin/ql_sanpham/uploads/<?php echo $row_chitiet['img'] ?>" style="width: 200px; height: 200px; margin-bottom: 10px">
            <img src="../view/admin/ql_sanpham/uploads/<?php echo $row_chitiet['img'] ?>" style="width: 50px; height: 50px;  opacity: 0.7;">
        </div>
        <div class="mota_sp" style="font-size:20px; width: fit-content; padding-left: 40px">
            <span class="label">Giá bán:</span> 
            <?php
            if ($row_chitiet['original_price'] > $row_chitiet['selling_price']) {
                echo '<span class="price">' . number_format($row_chitiet['selling_price'], 0, ',', '.') . 'vnđ</span>';
                echo '<span class="or_price" style="text-decoration: line-through; margin-left: 10px; color: #AEA3A3">' . number_format($row_chitiet['original_price'], 0, ',', '.') . 'vnđ</span>';
            } else {
                echo '<span class="price">' . number_format($row_chitiet['selling_price'], 0, ',', '.') . 'vnđ</span>';
            }
            ?><br>
            <p style="line-height: 0.2; font-weight: bold;width: fit-content; ">Mô tả: </p>
            <p class="descr" style="width:90%"><?php echo $row_chitiet['small_descr']?></p>
        </div>
        <?php
        }
        ?>
    </div>
</div>
