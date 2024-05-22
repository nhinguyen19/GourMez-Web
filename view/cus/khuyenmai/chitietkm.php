
<?php
  include ('../model/connect.php');
    $conn = connectdb();
    $sql_lietke= "SELECT * FROM discount_news WHERE id ='$_GET[id]'";
    $query_lietke = mysqli_query($conn, $sql_lietke);
    while ($row = mysqli_fetch_array($query_lietke)) {
?>
    <div class="noidung_chitiet" style=" margin-left: 19vw;">
        <h1 class="title_chitiet" style="text-align: center"><?php echo $row['discount_name'] ?></h1>
        <div class="content-wrapper">
            <div class="anhsp">
            <img src="../view/admin/<?php echo $row['img'] ?>" style="width: 150px; height: 150px;">
            </div>
            <div class="mota_sp" style="width: fit-content; padding-left: 40px">
                <p style="line-height: 0.2; font-weight:bold;width: fit-content;font-size:18px">Mô tả: </p>
                <p class="descr" style="width:90%; font-size:16px"><?php echo $row['description'] ?></p>
            </div>
    </div>
    <?php
            }
        ?>
