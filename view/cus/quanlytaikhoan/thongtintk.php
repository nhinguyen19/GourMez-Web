<?php
$user=$_SESSION['user'];




?>




<div id="user_login" class="box-content" >
                
    <h2>QUẢN LÝ TÀI KHOẢN</h2>

    <H3>THÔNG TIN TÀI KHOẢN</H3>
        <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="Post" autocomplete="off" style="border: 1px solid rgba(255, 130, 67, 1);background-color: rgba(255, 130, 67, 1);border-radius: 20px;padding: 50px;">
                    
            <span><h3>Họ và tên: </h3></span>
                        
            <span><h3>Tên đăng nhập: </h3></span>

            <span><h3>Email: </h3></span>

            <span><h3>Số điện thoại: </h3></span>

            <span><h3>Địa chỉ giao hàng: </h3></span>

        </form>

        <a href="chinhsua_tttk.php">Chỉnh sửa</a>

        <a href="doimk.php">Đổi mật khẩu</a>
    
</div>





















