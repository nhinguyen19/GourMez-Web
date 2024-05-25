<?php
session_start();
include('../controller/thuvien.php');
include('../model/connect.php');
    if(isset($_POST['dathang'])&&($_POST['dathang']))
    {
        //lấy thông tin KH
        $ten = $_POST['cusname'];
        $sdt = $_POST['tel'];
        $email = $_POST['email'];
        $ship_day = $_POST['ship_date'];
        $diachi = $_POST['address'];
        $ghichu = $_POST['note'];

        $total = tongdonhang();

        $new_id = uniqid('bigdeal_');

        //insert đơn hàng -  tạo đơn hàng mới
        $id_bill = taodonhang($new_id,$ten,$sdt,$email,$ship_day,$diachi,$total,$ghichu);
        echo "tạo đơn hàng thành công";

        //lấy thông tin giỏ hàng từ session + id đơn hàng vừa tạo

        //insert vào order_item
        for($i=0; $i < sizeof($_SESSION['giohang']); $i++)
        {
            $tenmon = $_SESSION['giohang'][$i][1];
            $soluong = $_SESSION['giohang'][$i][3];
            $dongia = $_SESSION['giohang'][$i][2];
            $thanhtien = $dongia*$soluong;
            taogiohang($tenmon,$dongia,$soluong,$thanhtien,$id_bill);
            echo "thêm giỏ hàng thành công";
        }

         //show confirm đơn hàng



        //unset giỏ hàng session


       
    }
    
?>