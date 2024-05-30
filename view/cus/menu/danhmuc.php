<?php
    session_start();
    include("../view/cus/header/header.php");
    $conn = connectdb();
    $sql_danhmuc = "SELECT * FROM food, category WHERE food.cate_id = category.cate_id AND food.cate_id='$_GET[id]' ORDER BY food.food_id ASC";
    $query_danhmuc= mysqli_query($conn, $sql_danhmuc);
    $query_danhmuc1= mysqli_query($conn, $sql_danhmuc);
    $row_title = mysqli_fetch_array($query_danhmuc1);
?>
<img src="../view/cus/menu/banner5.png" width="100%" height="50%" style="padding-top: 100px;">
<ul id="all_dishes" >
<div class="sidebar" style="margin-top: -96px;">
    <?php 
        include("../view/cus/menu/sidebar.php");
    ?>
</div>
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
    <?php
            $conn = connectdb();
            $sql_lietke= "SELECT * FROM discount_news ORDER BY id ASC";
            $query_lietke = mysqli_query($conn, $sql_lietke);
            
            $discounts = mysqli_fetch_all($query_lietke, MYSQLI_ASSOC);
            shuffle($discounts);
            
            $selected_discounts = array_slice($discounts, 0, 3);
        ?>
        <h1 class="title_datngaynao">Đặt ngay nào</h1>
            <div class="onediscount" style="padding-bottom:30px">
                <?php foreach ($selected_discounts as $row): ?>
                <li class="Thucdon_mon2">
                    <img src="../view/admin/<?php echo $row['img'] ?>" style="width: 170px; height: 170px;">
                    <p class="discount_name" style=" color: #F6E7D8; font-size: 19px;font-family:Lalezar"><?php echo $row['discount_name'] ?></p>
                    <button class="btn_xemchitiet">
                        <a href="tranghienthi.php?quanly=chitietkm&id=<?php echo $row['id']?>" style="text-decoration: none; color: #ffff;">Xem chi tiết</a>
                    </button>
                </li>
                <?php endforeach; ?>
            </div>
</ul>
