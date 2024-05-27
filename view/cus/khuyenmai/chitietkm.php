<link rel="stylesheet" href="../view/cus/khuyenmai/khuyenmai.css">
<?php
  include ('../model/connect.php');
    $conn = connectdb();
    $sql_lietke= "SELECT * FROM discount_news WHERE id ='$_GET[id]'";
    $query_lietke = mysqli_query($conn, $sql_lietke);
    while ($row = mysqli_fetch_array($query_lietke)) {
?>
        <div class="content-wrapper">
            <div class="anhsp">
            <img src="../view/admin/<?php echo $row['img'] ?>" style="width: 300px; height: 300px;">
            </div>
            
            <div class="mota_sp" style="width: fit-content; padding-left: 40px">
            <h1 class="title" style="text-align: center"><?php echo $row['discount_name'] ?></h1>
                <p style="line-height: 0.2; font-weight:bold;width: fit-content;font-size:18px">Mô tả: </p>
                <p class="descr" style="width:90%; font-size:16px"><?php echo $row['description'] ?></p>
            </div>
            </div>

    <?php
            }
        ?>
