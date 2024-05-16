<?php
include ('send_mail.php');
$err=array();
if(isset($_POST['send_mail']) && ($_POST['send_mail'])=='Gửi')
{
    $email=$_POST['email'];
    // $pass_email=$_POST['pass_email'];

    if(empty($email)){
        $err['email']='Bạn chưa nhập email';
    }

    // if(empty($pass_email)){
    //     $err['pass_email']='Bạn chưa nhập mật khẩu email';
    // }
}
?>
    
    <!-- <link href="../view/cus/quenmatkhau/forgotpass.css" rel="stylesheet"> -->
    <link href="forgotpass.css" rel="stylesheet">


    <div id="forgot_pass" class="box-content" >
    
        <h2>Bạn quên mật khẩu?</h2>
        <h3>Đừng lo lắng!</h3>
        <h3>Chúng tôi sẽ gửi cho bạn một email liên kết để</h3>
        <h3>đặt lại mật khẩu của bạn</h3>
        <form action="send-pass-reset.php" method="post" autocomplete="off" style="display: flex;">
            <!-- email -->
            <span><h3>Địa chỉ email</h3>
            <input type="email" name="email" ></span><br>
            <span class="has-error"><?php echo (isset($err['email']))?$err['email']:''?></span>

            <!-- Mật khẩu email -->
            <!-- <span><h3>Mật khẩu email</h3>
            <input type="password" name="pass_email"></span>
            <span class="has-error"><?php echo (isset($err['pass_email']))?$err['pass_email']:''?></span> -->
        </form>
        <input type="submit" name="send_mail" value="Gửi">   
    </div>
        
        
