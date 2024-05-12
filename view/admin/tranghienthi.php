  <?php
  session_start();

if(isset($_SESSION['role'])&&($_SESSION['role']==1)){
    
    include_once("../../model/connect.php");
    include_once("../../model/admin/xuly_danhmucsp.php");  
    include_once("../../model/admin/xuly_sanpham.php");  
    include_once ("../../model/admin/xuly_khuyenmai.php");
    include_once ("../../model/admin/xuly_dichvu.php");
    include("header_ad/header_ad.php");
    include("sidebar_ad/sidebar_ad.php");
    
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
        case 'themsanpham':
          include ('ql_sanpham/them_sanpham.php');
          themSanPham();
          break;
        case 'tatcasp':
          include ('ql_sanpham/lietke.php');
          break;
        case 'xoasp':
          xoaSanPham();
          break;
        case 'suasp':
          include("ql_sanpham/sua.php");
          suaSanPham();
          break;

        case 'tatcakm' :
          $kq=getall_discountnews();
          include ('ql_khuyenmai/tatcakm.php');
          break;
        case 'themkmnews' :
          insertdiscountnews();
          include ('ql_khuyenmai/themkmnews.php');
          
          break;
        case 'deldiscountnews':
          deldiscountnews();
          $kq=getall_discountnews();
          include ('ql_khuyenmai/tatcakm.php');
          break;

          case 'updatediscountnews' :
            capnhatkmnews();
            include ('ql_khuyenmai/capnhatkmnews.php');
            break;


        //Dịch vụ  
        case 'themdichvu' :
          include ('ql_dichvu/them_dv.php');
          themDichVu();
          break;
        case 'tatcadichvu':
          include('ql_dichvu/tatca_dichvu.php');
          break;
        case 'xoaDichVu':
          xoaDichVu();
          break;
        case 'suaDichVu':
        include ('ql_dichvu/sua_dv.php');
        suaDichVu();
        break;

        case 'themmonan':
          include ('ql_dichvu/themmonan.php');
          themmonanDV();
          break;
        case 'suamonandichvu':
          include ('ql_dichvu/suamonan.php');
          suaMonAn();
          break;
        
        case 'xoamonandichvu':
          xoamonandichvu();
          break;

          
        default :
          include ('tranghienthi.php');
          break;
        
          
      }
    }
  }
  else {
    header('Location: ../cus/dangnhap/login.php');
  }
  ?>

  