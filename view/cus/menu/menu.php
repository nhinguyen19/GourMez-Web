<?php
    if(isset($_GET['trang'])){
        $page = $_GET['trang'];
    } else {
        $page = 1; 
    }

    if($page == 1){
        $begin = 0; 
    } else {
        $begin = ($page - 1) * 8; 
    }
    $conn = connectdb();

    $sql_lietke_sanpham = "SELECT * FROM food, category WHERE food.cate_id = category.cate_id ORDER BY food_id ASC LIMIT $begin, 8";
    $query_lietke_sanpham = mysqli_query($conn, $sql_lietke_sanpham);
?>
<ul id="all_dishes" style=" margin-left: 16vw;">
    <h1 class="title_thucdon">Thực đơn</h1>
    <div class="food-item">
        <?php
            $i = 0;
            while ($row = mysqli_fetch_array($query_lietke_sanpham)) {
                $i++;
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
        $sql_trang = mysqli_query($conn,"SELECT * FROM food");
        $row_count = mysqli_num_rows( $sql_trang);
        $trang = ceil($row_count/8);
    ?>
    <div class="list_trang" style="clear:both;"></div>
        <ul class="list">
            <?php
                for($i=1; $i<=$trang;$i++){
                ?>
                    <li><a href="tranghienthi.php?quanly=thucdon&trang=<?php echo $i ?>"><?php echo $i ?></a></li>
                <?php
                }
                ?>
        </ul>
    </div>
    <h1 class="title_datngaynao">Đặt ngay nào</h1>
</ul>