<?php
    // session_start();
    include('../view/cus/accountManagement/lay_tttk.php');

    $id=$_SESSION['id'];

    $array=get_info($id);

?>



<link rel="stylesheet" href="../view/cus/accountManagement/profile.css">
<div id="user_login" class="box-content" >

    <h3>THÔNG TIN TÀI KHOẢN</h3>
    <div class="form">
        <form method="Post" autocomplete="off" >
                
            <div class="info" name="fullname"><b>HỌ VÀ TÊN: </b> <?php echo $array['fullname']?></div>
            
            <div class="info" name="username"><b>TÊN ĐĂNG NHẬP: </b> <?php echo $array['user']?></div>
            
            <div class="info" name="email"><b>EMAIL: </b> <?php echo $array['email']?></div>
            
            <div class="info" name="phone"><b>SỐ ĐIỆN THOẠI: </b><?php echo $array['phone']?></div>
            
            <div class="info" name="address"><b>ĐỊA CHỈ: </b> <?php echo $array['address']?></div>
            
        </form>

    </div>
        

        <a href="tranghienthi.php?quanly=chinhsuathongtin">Chỉnh sửa</a>

        <a href="tranghienthi.php?quanly=doimatkhau">Đổi mật khẩu</a>
    
</div>

