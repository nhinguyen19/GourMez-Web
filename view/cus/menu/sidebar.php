<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Gourmez</title>
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lalezar">
  <link rel="stylesheet" href="../view/cus/menu/hienthi_menu.css">
</head>
<body>
<?php
        $conn = connectdb();
        $sql_sidebar_danhmuc = "SELECT * FROM category ORDER BY cate_id ASC";
        $query_sidebar_danhmuc = mysqli_query($conn, $sql_sidebar_danhmuc);
    ?>
    <div class="sidebar_menu">
        <div id="menu_categories" class="menu_categories">
            <?php
            while ($row = mysqli_fetch_array($query_sidebar_danhmuc)) {
            ?>   
            <a href="hienthi_menu.php?quanly=danhmucsanpham&id=<?php echo $row['cate_id']?>"><?php echo $row['cate_name']?></a><hr>
            <?php 
            } 
            ?>
        </div>
    </div>
</body>
</html> 

