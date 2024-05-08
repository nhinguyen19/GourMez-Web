<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Gourmez</title>
  <link rel="stylesheet" href="../view/cus/menu/menu.css">
  <link rel="stylesheet" href="../view/cus/menu/sidebar.css">
  <style>
    body {
      background-color: #FBF5F5;
    }
  </style>
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
      }
    }
    else
    {
      include ("../view/cus/menu/menu.php");
    }
  ?>
</body>
  