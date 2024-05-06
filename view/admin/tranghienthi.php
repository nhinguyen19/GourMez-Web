<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Welcome to AdminCP</title>
  <link rel="stylesheet" href="sidebar_ad/sidebar_ad.css">
  <link rel="stylesheet" href="ql_danhmucsp/danhmuc.css">
  <style>
    body {
      background-color: #FFECCB;
    }
  </style>
</head>
<body>
  <?php
    include_once("../../model/connect.php");
    include_once("../../model/admin/xuly_danhmucsp.php");  
    include("sidebar_ad/sidebar_ad.php");
    
  ?>

  <?php 
    if(isset($_GET['quanly']))
    { 
      switch($_GET['quanly'])
      {
        case 'themdanhmuc':
          include ('ql_danhmucsp/them_danhmuc.php');
          themDanhMuc();
          break;
        case 'tatca':
          include("ql_danhmucsp/lietke.php");
          break;
        case 'xoa':
          xoaDanhMuc();
          break;
        case 'sua':
          include("ql_danhmucsp/sua.php");
          suaDanhMuc();
          break;
        default :
          include ('tranghienthi.php');
          break;
      }
    }
    else 
    {
      include ('tranghienthi.php');
      
    }
  ?>
</body>
</html>