<?php
include "../model/connect.php";
$conn = connectdb();

// Kiểm tra kết nối
if (!$conn) {
    die("Lỗi kết nối MySQL: " . mysqli_connect_error());
}

// Kiểm tra tổng số trang
$sql_trang = "SELECT * FROM tintuc";
$query_trang = mysqli_query($conn, $sql_trang);

// Kiểm tra lỗi truy vấn
if (!$query_trang) {
    die("Lỗi truy vấn SQL: " . mysqli_error($conn));
}

$row_count = mysqli_num_rows($query_trang);
$trang = ceil($row_count / 4);

$page = isset($_GET['trang']) ? (int)$_GET['trang'] : 1;
$page = max($page, 1); // Đảm bảo trang >= 1

$begin = ($page - 1) * 4;
$beginBenPhai = $begin + 1;
$beginBenTrai = $begin;

// Truy vấn tin tức bên trái (1 tin)
$tinTucBenTrai_sql = "SELECT * FROM tintuc ORDER BY tintuc_id DESC LIMIT $beginBenTrai, 1";
$query_tinTucBenTrai = mysqli_query($conn, $tinTucBenTrai_sql);

// Kiểm tra lỗi
if (!$query_tinTucBenTrai) {
    die("Lỗi truy vấn tinTucBenTrai: " . mysqli_error($conn));
}

// Truy vấn tin tức bên phải (3 tin)
$tinTucBenPhai_sql = "SELECT * FROM tintuc ORDER BY tintuc_id DESC LIMIT $beginBenPhai, 3";
$query_tinTucBenPhai = mysqli_query($conn, $tinTucBenPhai_sql);

// Kiểm tra lỗi
if (!$query_tinTucBenPhai) {
    die("Lỗi truy vấn tinTucBenPhai: " . mysqli_error($conn));
}
?>

<div id="container">
  <div>
    <div id="lead">
      <table>
        <tr>
          <td>
            <?php while ($row = mysqli_fetch_array($query_tinTucBenTrai)) { ?>
              <div id="box">
                <a style="width:90%" href="tranghienthi.php?quanly=tintuc&id=<?= $row['tintuc_id'] ?>">
                  <img class="main-image" src="../view/admin/ql_tintuc/<?= $row['img_title'] ?>">
                </a>
                <br>
                <div class="text-container">
                  <a class="font-family" href="tranghienthi.php?quanly=tintuc&id=<?= $row['tintuc_id'] ?>">
                    <?= htmlspecialchars($row['title']) ?>
                  </a>
                  <a style="font-size:22px;" href="tranghienthi.php?quanly=tintuc&id=<?= $row['tintuc_id'] ?>">
                    <p style="padding-right: 15%; color:white;">
                      <?= htmlspecialchars($row['summary']) ?>
                    </p>
                  </a>
                </div>
                <a href="tranghienthi.php?quanly=tintuc&id=<?= $row['tintuc_id'] ?>">
                  <button id="xemchitiet" type="button"><b>Xem chi tiết</b></button>
                </a>
              </div>
            <?php } ?>
          </td>
          <td>
            <?php while ($row = mysqli_fetch_array($query_tinTucBenPhai)) { ?>
              <div class="item-container">
                <a href="tranghienthi.php?quanly=tintuc&id=<?= $row['tintuc_id'] ?>">
                  <img class="bigger-image" src="../view/admin/ql_tintuc/<?= $row['img_title'] ?>">
                </a>
                <div id="right-textContainer" class="text-container">
                  <a class="font-family" href="tranghienthi.php?quanly=tintuc&id=<?= $row['tintuc_id'] ?>">
                    <?= htmlspecialchars($row['title']) ?>
                  </a>
                  <a style="font-size:22px;" href="tranghienthi.php?quanly=tintuc&id=<?= $row['tintuc_id'] ?>">
                    <p style="color:white;">
                      <?= htmlspecialchars($row['summary']) ?>
                    </p>
                  </a>
                </div>
              </div>
            <?php } ?>

            <div class="list_trang" style="clear:both;">
              <?php for ($i = 1; $i <= $trang; $i++) { ?>
                <b><a href="tranghienthi.php?quanly=tintuc&trang=<?= $i ?>"><?= $i ?></a></b> 
              <?php } ?>
            </div>
          </td>
        </tr>
      </table>
    </div>
  </div>
</div>
