<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Header</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"/>
    <link rel="stylesheet" href="../view/cus/header/header.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <link rel="stylesheet" href="../view/cus/menu/hienthi_menu.css">
    <script src="../view/cus/dangnhap/hienthi_mk.js"></script>
    <link href='https://fonts.googleapis.com/css?family=Lalezar' rel='stylesheet'>

    <style>
        body{
            width: 100%;
            margin : 0;
            background-color : #FFECCB;
        }
        .header{
            font-family: 'Lalezar';
        }
    </style>
</head>
<body>
    <nav class="header">
        <!-- <div id="img"><img src="..view/cus/img/logocus.png" style="height: 86.61px; width: 100px;"></div> -->
        
        <ul class="menu_header">
            <li><a href="tranghienthi.php?quanly=trangchu&id=1" id="header"><img src="../view/cus/img/logocus.png" style="z-index:2;height: 150px; width: 150px;"></a></li>
            <li><a href="tranghienthi.php?quanly=thucdon" id="header">THỰC ĐƠN</a></li>
            <li><a href="tranghienthi.php?quanly=khuyenmai" id="header">KHUYẾN MÃI</a></li>
            <li><a href="tranghienthi.php?quanly=dichvu" id="header">DỊCH VỤ</a></li>
            <li><a href="tranghienthi.php?quanly=tintuc" id="header">TIN TỨC</a></li>
            <li><a href="tranghienthi.php?quanly=lienhe" id="header">LIÊN HỆ</a></li>
            <li><a href="tranghienthi.php?quanly=vechungtoi" id="header">VỀ CHÚNG TÔI</a></li>
            <li><a href="tranghienthi.php?quanly=giohang" id="header"><i class="fas fa-shopping-cart"></i></a></li>
        </ul>

        <div class="user_dropdown" > 
            <button id="name_user" style="border: 0;background-color:rgba(174, 33, 8, 1); font-size: 16px;font-weight: bold;">
                <!-- <?php echo "Chào, ".$username?> -->
            </button> 
            <div class="dropdown_content" style="right: 0;"> 
                <a href="#">Quản lý tài khoản</a>
                <a href="tranghienthi.php?quanly=dangxuat">Đăng xuất</a>
            </div>
        </div>
    </nav>
    
