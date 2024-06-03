<?php


    include("xuly_tinnhanKH.php");
    session_start();
    include("xuly_thanhtoan.php");
    include("../view/cus/header/header.php");

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
        case 'xulygiohang':
            include('../controller/xuly_order.php');
        case 'giohangbigdeal':
                include('../view/cus/dichvu/giohang_bigdeal.php');   
                break;
        case 'giohangsn':
                include('../view/cus/dichvu/giohang_sinhnhat.php');   
                break;
        case 'dathang_bigdeal':
            include('../view/cus/dichvu/dathang_bigdeal.php');
            break;
        case 'dathang_sn':
                include('../view/cus/dichvu/dathang_sn.php');
                break;
        case 'tintuc':
            if (isset($_GET['id'])) {
                include ('../view/cus/tintuc/baiviet.php');
            } else {
                include ('../view/cus/tintuc/tintuc.php');
            }
            break;
        case 'lienhe':
            include ('../view/cus/lienhe/lienhe.php');
            insertMessage();
            break;
        case 'vechungtoi':
            include ('../view/cus/vechungtoi/vechungtoi.php');
            break;

        // CASE GIỎ HÀNG VÀ THANH TOÁN
        case 'giohang':
            include ('../view/cus/giohang/giohang.php');
            break;
        case 'thanhtoan': 
            include ('../view/cus/thanhtoan/thanhtoan.php');
            //checkdiscount();
            thanhtoandonhang();
            break;
            case 'donethanhtoan' :
                include ('../view/cus/thanhtoan/donethanhtoan.php');
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
        case 'dangnhapadmin':
            include ('adminhienthi.php');
            break;
        case 'quenmatkhau':
            include ('../view/cus/quenmatkhau/requestReset.php');
            break;
        case 'quanlytaikhoan':
            include ('../view/cus/accountManagement/profile.php');
            break;
        case 'chinhsuathongtin':
            include ('../view/cus/accountManagement/changeProfile/FormChangeProfile.php');
            break;
        case 'doimatkhau':
            include ('../view/cus/accountManagement/changePass/changePass.php');
            break;
        case 'lammoimatkhau':
            include ('../view/cus/quenmatkhau/resetPassword.php');
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
<!-- đừng xóa footer nựa -->
    <?php
        include("../view/cus/footer/footer.php");

    ?>
