<?php
    $conn = connectdb();
    $sql_danhmuc = "SELECT * FROM food, category WHERE food.cate_id = category.cate_id AND food.cate_id='$_GET[id]' ORDER BY food.food_id ASC";
    $query_danhmuc= mysqli_query($conn, $sql_danhmuc);
    $query_danhmuc1= mysqli_query($conn, $sql_danhmuc);
    $row_title = mysqli_fetch_array($query_danhmuc1);
?>
<ul id="all_dishes" style=" margin-left: 16vw;">
    <h1 class="title_thucdon"><?php echo $row_title['cate_name']?></h1>
    <div class="food-item">
        <?php
            while ($row = mysqli_fetch_array( $query_danhmuc)) {
        ?>
        <li class="Thucdon_mon">  
            <img src="../view/admin/ql_sanpham/uploads/<?php echo $row['img'] ?>" style="width: 150px; height: 150px;">
            <p class="Ten_mon"><?php echo $row['food_name'] ?></p>
            <p>
                <span class="label">Giá bán:</span> 
                <span class="price"><?php echo number_format($row['selling_price'],0,',','.').'vnđ' ?></span>
            </p>
            <button class="btn_xemchitiet">
                <a href="hienthi_menu.php?quanly=chitiet_sp&id=<?php echo $row['food_id']?>" style="text-decoration: none; color: #ffff;">Xem chi tiết</a>
            </button>
        </li>
        <?php
        }
        ?>
    </div>
    <h1 class="title_datngaynao">Đặt ngay nào</h1>
</ul>
