<?php
    // session_start();
    include('../view/cus/accountManagement/lay_tttk.php');

    $user=$_SESSION['user'];

    $array=get_info($user);

?>



<link rel="stylesheet" href="../view/cus/accountManagement/profile.css">
<div id="user_login" class="box-content" >
                
    <h2>QUẢN LÝ TÀI KHOẢN</h2>

    <H3>THÔNG TIN TÀI KHOẢN</H3>
        <form method="Post" autocomplete="off" style="border: 1px solid rgba(255, 130, 67, 1);background-color: rgba(255, 130, 67, 1);border-radius: 20px;padding: 50px;">
                    
            <div name="fullname">Họ và tên: <?php echo $array['fullname']?></div>
            
            <div class="info" name="username">Tên đăng nhập: <?php echo $array['user']?></div>
            
            <div class="info" name="email">Email: <?php echo $array['email']?></div>
            
            <div class="info" name="phone">Số điện thoại: <?php echo $array['phone']?></div>
            
            <div class="info" name="address">Địa chỉ giao hàng:  <?php echo $array['address']?></div>
           
        </form>

        <a href="tranghienthi.php?quanly=chinhsuathongtin">Chỉnh sửa</a>

        <a href="tranghienthi.php?quanly=doimatkhau">Đổi mật khẩu</a>
    
</div>

