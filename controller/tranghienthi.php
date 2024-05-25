<?php
    include("xuly_tinnhanKH.php");
    session_start();
    if(isset($_SESSION['role']) && ($_SESSION['role'] == 0)) {
        include("../view/cus/header/header_sauDN.php");
    } else {
        include("../view/cus/header/header_trcDN.php");
    }
?>
<?php 
    if(isset($_GET['quanly']))
    { 
        switch($_GET['quanly'])
        {
        case 'thucdon':
            include ('hienthi_menu.php');
            break;

        // CASE KHUYẾN MÃI
        case 'khuyenmai':
            include ('../view/cus/khuyenmai/khuyenmai.php');
            break;
        case 'chitietkm':
            include("../view/cus/khuyenmai/chitietkm.php");
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
            insertMessage();
            break;
        case 'vechungtoi':
            include ('../view/cus/vechungtoi/vechungtoi.php');
            break;
        case 'giohang':
            include ('../view/cus/giohang/giohang.php');
            break;
        case 'dangnhap':
            include ('../view/cus/dangnhap/login.php');
            break;
        case 'dangky':
            include ('../view/cus/dangky/register.php');
            break;
        case 'dangxuat':
            include ('../view/cus/dangxuat/check_logout.php');
            break;
        // case 'dangnhapadmin':
        //     include ('../view/admin/tranghienthi.php');
        //     break;
        case 'quenmatkhau':
            include ('../view/cus/quenmatkhau/forgotpass.php');
            break;
        case 'trangchu':
            include ('../view/cus/trangchu/trangchu.php');
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
