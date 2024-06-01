<link href='https://fonts.googleapis.com/css?family=Lalezar' rel='stylesheet'>
<link rel="stylesheet" href="../view/cus/tintuc/tintuc.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
  integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

<?php
include "../model/connect.php";
$conn = connectdb();
?>

<?php
$sql_trang = mysqli_query($conn, "SELECT * FROM tintuc");
$row_count = mysqli_num_rows($sql_trang);
$trang = ceil($row_count / 4);
?>
<?php
$page = 1;
if (isset($_GET['trang'])) {
  $page = $_GET['trang'];
} else {
  $page = 1;
}


$begin = 0;
if ($page == 1) {
  $begin = 0;
} else {
  $begin = ($page - 1) * 4;
}

$beginBenPhai = $begin + 1;
$beginBenTrai = $begin;

$tinTucBenPhai_sql = "SELECT * FROM tintuc order by tintuc_id DESC LIMIT $beginBenPhai, 3";
$query_tinTucBenPhai = mysqli_query($conn, $tinTucBenPhai_sql);

$tinTucBenTrai_sql = "SELECT * FROM tintuc order by tintuc_id DESC LIMIT $beginBenTrai, 1";
$query_tinTucBenTrai = mysqli_query($conn, $tinTucBenTrai_sql);
?>

<div id="container">
  <div>
    <div id="header_tt">
      <img id="img_header" src="../view/admin/ql_tintuc/img_tintuc/HeaderTinTuc.png">
    </div>
    <!-- view\admin\ql_tintuc\img_tintuc\anhchotintuc.png -->
    <div id="lead">
      <table>
        <tr>
          <td>

            <?php
            $i = 0;
            while ($row = mysqli_fetch_array($query_tinTucBenTrai)) {
              $i++;
              ?>
              <div id="box">
                <img class="main-image" src="../view/admin/ql_tintuc/<?php echo $row['img_title'] ?>">
                <br>
                <div class="text-container">
                  <a class="font-family " href="<?php echo $row['link'] ?>"><?php echo $row['title'] ?></a>
                  <p style="padding-right : 15%; color:white;"><?php echo $row['description'] ?></p>
                </div>
                <a href="<?php echo $row['link'] ?>"><button id="xemchitiet" type="button"><b>Xem chi tiết</b>
                  </button></a>

              </div>
              <?php
            }
            ?>
          </td>
          <td>
            <?php
            $i = 0;
            while ($row = mysqli_fetch_array($query_tinTucBenPhai)) {
              $i++;
              ?>
              <div class="item-container">
                <img class="bigger-image" src="../view/admin/ql_tintuc/<?php echo $row['img_title'] ?>">
                <div id="right-textContainer" class="text-container">
                  <a class="font-family " href="<?php echo $row['link'] ?>"><?php echo $row['title'] ?></a>
                  <p style="color:white;"><?php echo $row['description'] ?></p>
                </div>
              </div>
              <?php
            }
            ?>
            <div class="list_trang" style="clear:both;">
              <?php
              for ($page = 1; $page <= $trang; $page++) {
                echo '<b><a href="tranghienthi.php?quanly=tintuc&trang=' . $page . '">' . $page . '</a></b> ';
              }
              ?>
            </div>



    </div>
    </td>


    </tr>
    </table>
  </div>
</div>
</div>