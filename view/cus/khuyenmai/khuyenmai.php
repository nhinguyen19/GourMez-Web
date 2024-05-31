<?php
  include ('../model/connect.php');
    $conn = connectdb();
    $sql_lietke= "SELECT * FROM discount_news ORDER BY id ASC";
    $query_lietke = mysqli_query($conn, $sql_lietke);
?>
<body>
<link rel="stylesheet" href="../view/cus/khuyenmai/khuyenmai.css">
<ul id="tatcadiscount">
    <h1 class="title">KHUYẾN MÃI HÔM NAY</h1>
    <div class="onediscount">
        <?php
            $i = 0;
            while ($row = mysqli_fetch_array($query_lietke)) {
                $i++;
        ?>
        <li class="khuyenmaigroup">  
            <img src="../view/admin/<?php echo $row['img'] ?>" style="width: 150px; height: 150px;">
            <p class="discount_name"><?php echo $row['discount_name'] ?></p>
            <button class="btn_xemchitiet">
                <a href="tranghienthi.php?quanly=chitietkm&id=<?php echo $row['id']?>" style="text-decoration: none; color: #ffff;">Xem chi tiết</a>
            </button>
        </li>
        <?php
            }
        ?>
    </div>
</ul>
</body>