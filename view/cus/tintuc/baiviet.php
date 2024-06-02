<link rel="stylesheet" href="../view/cus/tintuc/baiviet.css">
<?php
include "../model/connect.php";

$conn = connectdb();
$id = $_GET['id'];
$baiVietSql = "SELECT * FROM tintuc WHERE tintuc_id  = $id ";
$queryBaiViet = mysqli_query($conn, $baiVietSql);
?>

<div id="container">
    <?php
    $i = 0;
    while ($row = mysqli_fetch_array($queryBaiViet)) {
        $i++;
        ?>
        <tr>

            <h1 style="text-align: center"><?php echo $row['title'] ?></h1>
            <p style="text-align: center"><?php echo ($row['description']) ?></p>

        </tr>
        <?php
    }
    ?>
</div>