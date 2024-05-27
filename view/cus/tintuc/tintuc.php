<link href='https://fonts.googleapis.com/css?family=Lalezar' rel='stylesheet'>
<!-- <link rel="stylesheet" href="trangtintuc.css"> -->
<!-- <link rel="stylesheet" href="tranghienthi.css"> -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
  integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

<style>
  #container {
    background-color: #feeaca;
    text-align: center;
    padding: 20px;

  }

  .font-family {
    font-family: "Lalezar", sans-serif;
  }

  #img_header {
    width: 100%;
    height: 500px;
  }

  #thaydoi {
    background-color: #159c33;
    color: azure;
    border-radius: 5px;
    border: none;
  }

  .chinhsua {
    background-color: #ae2108;
    color: white;
    border: none;
    border-radius: 5px;
    padding: 5px 10px;
    cursor: pointer;
    font-size: 10px;
  }

  #xemchitiet {
    background-color: white;
    border-color: orange;
    border-radius: 5px;
    cursor: pointer;
    font-size: 10px;
    margin-right: 10px;
    padding: 5px 10px;
  }


  #td1 {
    padding-right: 5px;
    padding-left: 5px;
    width: 45%;
  }

  .button-container {
    display: flex;
    justify-content: flex-end;
    align-items: center;
    margin-top: 10px;
  }

  .td1-buttons {
    justify-content: space-between;
  }


  #addButton {
    padding: 0px 10px;
    border-radius: 50%;
    font-size: 20px;
    background-color: rgb(255, 102, 0);
    color: white;
    border: 0px none;
  }


  #addNewArticle span {
    padding-left: 10px;
    font-size: 20px;
    color: green;
  }

  #lead {
    margin-top: 30px;
  }


  #lead table {
    width: 100%;
  }


  #lead td {
    vertical-align: top;
  }


  #lead td:first-child {
    width: 50%;
  }


  #lead td:last-child {
    width: 50%;
  }

  .main-image {
    border-radius: 5px;
    box-shadow: 7px 7px 7px grey;
    width: 100%;
    height: auto;
    max-width: 650px;
    max-height: 500px;
    margin-right: 90px;
    padding-left: 0;
  }


  .bigger-image {
    width: 100%;
    height: auto;
    max-width: 300px;
    max-height: 300px;
    border-radius: 5px;
    box-shadow: 7px 7px 7px grey;
    padding-left: 0;

  }

  .item-container {
    display: flex;
    align-items: flex-start;
    /* Căn chỉnh các phần tử con theo chiều dọc, từ trên xuống dưới */
    margin-bottom: 30px;
  }

  .text-container {
    margin-left: 10px;
    flex: 1;
    text-align: left;
    /* Căn chỉnh văn bản bên trong theo chiều ngang */

  }

  .text-container a {
    font-size: 1.2em;
    color: #000;
    display: block;
    margin-bottom: 5px;
    font-size: 30px;
  }

  .text-container p {
    margin: 5px 0;
  }

  .text-container button {
    display: block;
    margin-top: 5px;
  }

  #box {
    display: flex;
    flex-direction: column;
    align-items: flex-start;
    /* Căn chỉnh các phần tử con theo chiều ngang, từ trái sang phải */
  }

  #img_header{
    padding-left: 0;
  }
</style>
<?php
include "../model/connect.php";
$conn = connectdb();
$tinTucTruTinTucCuoi = "SELECT * FROM tintuc WHERE tintuc_id NOT IN (SELECT MAX(tintuc_id) FROM tintuc) ";
$tinTucCuoi = "SELECT *  FROM tintuc ORDER BY tintuc_id DESC LIMIT 1 ";

$query_tinTucTruTinTucCuoi = mysqli_query($conn, $tinTucTruTinTucCuoi);
$query_tinTucCuoi = mysqli_query($conn, $tinTucCuoi);
?>
<div id="container">
  <div>
    <div id="header_tt">
      <img id="img_header" src="../view/admin/ql_tintuc/img_tintuc/tintuc.png">
    </div>
    <!-- view\admin\ql_tintuc\img_tintuc\anhchotintuc.png -->
    <div id="lead">
      <table>
        <tr>
          <td>

            <?php
            $i = 0;
            while ($row = mysqli_fetch_array($query_tinTucCuoi)) {
              $i++;
              ?>
              <div id="box">
                <img class="main-image" src="../view/admin/ql_tintuc/<?php echo $row['img_title'] ?>">
                <br>
                <div class="text-container">
                  <a class="font-family " href="<?php echo $row['link'] ?>"><?php echo $row['title'] ?></a>
                  <p style="padding-right : 15%;"><?php echo $row['description'] ?></p>
                </div>
              </div>
              <?php
            }
            ?>
          </td>
          <td>
            <?php
            $i = 0;
            while ($row = mysqli_fetch_array($query_tinTucTruTinTucCuoi)) {
              $i++;
              ?>
              <div class="item-container">
                <img class="bigger-image" src="../view/admin/ql_tintuc/<?php echo $row['img_title'] ?>">
                <div class="text-container">
                  <a class="font-family " href="<?php echo $row['link'] ?>"><?php echo $row['title'] ?></a>
                  <p><?php echo $row['description'] ?></p>
                </div>
              </div>
              <?php
            }
            ?>
          </td>
        </tr>
      </table>
    </div>
  </div>
</div>