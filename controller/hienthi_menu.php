<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Gourmez</title>
  <link rel="stylesheet" href="../view/cus/menu/hienthi_menu.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"/>
</head>
<body>
  <?php
    include_once("../model/connect.php");
    include("../view/cus/menu/sidebar.php");
  ?>
  <?php 
    if(isset($_GET['quanly']))
    { 
      switch($_GET['quanly'])
      {
        case 'danhmucsanpham':
          include("../view/cus/menu/danhmuc.php");
          break;
        case 'chitiet_sp':
          include("../view/cus/menu/chitiet_sp.php");
          break;
      }
    }
    else{
      include("../view/cus/menu/menu.php");
    }
  ?>
</body>
  