<?php
   include("../view/cus/header/header.php")
?>
<?php 
    if(isset($_GET['quanly']))
    { 
        switch($_GET['quanly'])
        {
        case 'thucdon':
            include ('dieuhuong_menu.php');
            break;
        case 'khuyenmai':
            include ('../view/cus/khuyenmai/khuyenmai.php');
            break;

        case 'dichvu':
            include ('../view/cus/dichvu/dichvu.php');
            break;
        case '1':
            include ('../view/cus/dichvu/dichvu_sn.php');
            break;
            case '2':
                include ('../view/cus/dichvu/dichvu_bigdeal.php');
                break;
        case 'tintuc':
            include ('../view/cus/tintuc/tintuc.php');
            break;
        case 'lienhe':
            include ('../view/cus/lienhe/lienhe.php');
            break;
        case 'vechungtoi':
            include ('../view/cus/vechungtoi/vechungtoi.php');
            break;
        case 'giohang':
            include ('../view/cus/giohang/giohang.php');
            break;
        case 'dangnhap':
            include ('../view/cus/dangnhap/dangnhap.php');
            break;
        default :
        include ('../view/cus/trangchu/trangchu.php');
        break;
        }
    }
    else 
    {
        include ('../view/cus/trangchu/trangchu.php');
    }
    ?>
    <?php 
    include ('../view/cus/footer/footer.php');
    ?>