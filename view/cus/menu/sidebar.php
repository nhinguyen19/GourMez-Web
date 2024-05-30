<?php
  $conn = connectdb();
  $sql_sidebar_danhmuc = "SELECT * FROM category ORDER BY cate_id ASC";
  $query_sidebar_danhmuc = mysqli_query($conn, $sql_sidebar_danhmuc);
?>
<div id="sidebar_menu">
  <div class="menu_categories">
    <?php
      while ($row = mysqli_fetch_array($query_sidebar_danhmuc)) {
    ?>   
    <a href="hienthi_menu.php?quanly=danhmucsanpham&id=<?php echo $row['cate_id']?>"><?php echo $row['cate_name']?></a>
    <?php 
      } 
    ?>
  </div>
</div>

