<?php
   include("../VIEW/Pages/header.php")
   ?>

   <?php 
   if(isset($_GET['quanly']))
   { 
    switch($_GET['quanly'])
    {
      case 'thucdon':
        include ('../VIEW/Pages/thucdon.php');
        break;
      case 'khuyenmai':
        include ('../VIEW/Pages/khuyenmai.php');
        break;
      case 'dichvu':
        include ('../VIEW/Pages/dichvu.php');
        break;
      case 'tintuc':
        include ('../VIEW/Pages/tintuc.php');
        break;
      case 'lienhe':
          include ('../VIEW/Pages/lienhe.php');
          break;
      case 'vechungtoi':
          include ('../VIEW/Pages/vechungtoi.php');
          break;
      case 'giohang':
          include ('../VIEW/Pages/giohang.php');
          break;
      case 'dangnhap':
        include ('../VIEW/Pages/dangnhap.php');
        break;
      default :
      include ('../VIEW/Pages/home.php');
      break;
    }
  }
  else 
  {
    include ('../VIEW/Pages/home.php');
  }
?>
<?php 
include ('../VIEW/Pages/footer.php');
?>