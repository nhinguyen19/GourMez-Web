<script src="../cus/dangnhap/hienthi_mk.js"></script>

<?php
    ob_start();
   session_start();
    //if(isset($_SESSION['role'])){
    include_once("../../model/connect.php");
    include_once("../../model/admin/xuly_danhmucsp.php");  
    include_once("../../model/admin/xuly_sanpham.php");  
    include_once ("../../model/admin/xuly_khuyenmai.php");
    include_once ("../../model/admin/xuly_dichvu.php");
    include_once ("../../model/admin/xuly_thongtin.php");
    include_once ("../../model/admin/xuly_tintuc.php");
    include_once ("../../model/admin/xuly_donhang.php");

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


        case 'donhang':
          include('ql_donhang/donhang.php');
          break;
        case 'updateorder':
          updateorder();
          include('ql_donhang/updateorder.php');
         
          break;
        case 'tatcakm' :
          $discount=getall_discountnews();
          $codedis=getall_codedis();
          include ('ql_khuyenmai/tatcakm.php');
          break;
        case 'themkmnews' :
          insertdiscountnews();
          include ('ql_khuyenmai/themkmnews.php');
          break;
        case 'deldiscountnews':
          deldiscountnews();
          $discount=getall_discountnews();
          include ('ql_khuyenmai/tatcakm.php');
          break;
        case 'updatediscountnews' :
          include ('ql_khuyenmai/capnhatkmnews.php');
          updatekmnews();
          break;
          case 'updatecodedis' :
            include ('ql_khuyenmai/capnhatcodedis.php');
            updatecodedis();
            break;
        case 'themcodedis':
          insertcodedis();
          include('ql_khuyenmai/themcodedis.php');
          break;
        case 'delcodedis':
          delcodedis();
          $codedis=getall_codedis();
          include ('ql_khuyenmai/tatcakm.php');
        case 'tatcathongtin':
          include ('ql_thongtin/lietke.php');
          break;
        case 'suathongtin':
          include ('ql_thongtin/suathongtin.php');
          suaThongTin();
          break;
        case 'tinnhan':
          include ('ql_thongtin/lietke_tinnhanKH.php');
          break;

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
        case 'thucdondv':
          include('ql_dichvu/thucdondichvu.php');
          break;

        case 'suadichvu':
          include('ql_dichvu/sua_dv.php');
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
        // Case Quản lý tin tức
        case 'tatcatintuc';
        include ('ql_tintuc/trangtintuc.php');
        
        break;
        case 'suatintuc';
        include ('ql_tintuc/sua_tt.php');
        suaTinTuc();
        break;
       case 'themtintuc';
        include('ql_tintuc/them_tt.php');
        themTinTuc();
        break;
       case 'xoatintuc';
       xoaTinTuc();
        break;

      // báo cáo thống kê
      case 'bieudo':
        include('statistic/chart.php');
        break;
        

      // test
      case 'donhang1':
        include('ql_donhang/donhang_1.php');


      //tai khoan
      case 'themadmin';
      include('ql_taikhoan/themadmin.php');
      break;

      case 'thongtintaikhoan';
      include('ql_taikhoan/thongtintaikhoan.php');
      break;

      case 'chinhsuathongtin';
      include('ql_taikhoan/chinhsuathongtin.php');
      break;

      case 'doimatkhau';
      include('ql_taikhoan/doimatkhau.php');
      break;
      
      case 'quanlytaikhoanuser';
      include('ql_tk_user/danhsach_user.php');
      break;

      case 'edit_user';
      include('ql_tk_user/edit_user.php');
      break;

      case 'delete_user';
      include('ql_tk_user/delete_user.php');
      break;
      case 'thoat';
      include('ADdangxuat.php');
      break;

      
        default :
          include ('trangchu.php');
          break;
        
        
          
      }
     }
     else
     {
      include ('trangchu.php');
     }
  
  // else{
  // //  header('Location: tranghienthi.php?quanly='dangnhap');
  // include ('tranghienthi.php');
  // }
  ?>

