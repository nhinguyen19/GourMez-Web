<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
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

        //insert vào order_item
        for($i=0; $i < sizeof($_SESSION['giohang']); $i++)
        {
            $tenmon = $_SESSION['giohang'][$i][1];
            $soluong = $_SESSION['giohang'][$i][3];
            $dongia = $_SESSION['giohang'][$i][2];
            $thanhtien = $dongia*$soluong;
            taogiohang($tenmon,$dongia,$soluong,$thanhtien,$id_bill);
        }

        

        //unset giỏ hàng session
        unset($_SESSION['giohang']);

        echo "<script src='https://cdn.jsdelivr.net/npm/sweetalert2@10'></script>";
        echo "<script>
        Swal.fire({
            icon: 'success',
            title: 'Đơn hàng của bạn đã được ghi nhận. Nhân viên sẽ liên hệ lại với bạn.',
            showConfirmButton: false,
            timer: 1500
        }).then(function() {
            window.location.href = 'tranghienthi.php?quanly=2';
        });
        </script>";
        header('Location: tranghienthi.php?quanly=2');

       
    }
    
?>