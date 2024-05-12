
    <link href="forgotpass.css" rel="stylesheet">

<?php include '../header/header_trcDN.php';?>
<link rel="stylesheet" href="../header/header.css">

    <div id="user_login" class="box-content" >
        <div class="xinchao"style="display: flex; align-items: center;text-align: center;justify-content: center;">
            <img src="../img/logocus.png" style="width: 160px;height: 160px; margin-right: 10px;">
            <p style="font-family: Langar; font-size:26px ">XIN CHÀO</p>
        </div>
        <h2>Bạn quên mật khẩu?</h2>
        <h3>Đừng lo lắng!</h3>
        <h3>Chúng tôi sẽ gửi cho bạn một email liên kết để</h3>
        <h3>đặt lại mật khẩu của bạn</h3>
        <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="get" autocomplete="off" style="display: flex;">
            <h3>Địa chỉ email</h3>
            <input type="email" name="email">
        </form>
        <input type="submit" name="send_email" value="Gửi">   
    </div>
        
        
