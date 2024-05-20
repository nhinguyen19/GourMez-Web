<?php
  include ('../model/connect.php');
    $conn = connectdb();
    $sql_lietke_sanpham = "SELECT * FROM discount_news ORDER BY id ASC";
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
            <img src="../view/admin/<?php echo $row['img'] ?>" style="width: 150px; height: 150px;">
            <p class="Ten_mon"><?php echo $row['discount_name'] ?></p>
            <button class="btn_xemchitiet">
                <a href="hienthi_menu.php?quanly=chitiet_sp&id=<?php echo $row['id']?>" style="text-decoration: none; color: #ffff;">Xem chi tiết</a>
            </button>
        </li>
        <?php
            }
        ?>
    </div>
</ul>