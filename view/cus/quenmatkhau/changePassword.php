<?php

    $err=array();
        if(isset($_POST['restore']) && ($_POST['restore'])=='Khôi phục mật khẩu')
        {
            // include('../view/cus/dangky/check_regis.php');
            
           
            $password=$_POST['password'];
            $rpassword=$_POST['rpassword'];
    
            if(empty($password)){
                $err['password']='Bạn chưa nhập mật khẩu mới';
            }
            if($password!==$rpassword)
            {
                $err['rpassword'] ='Mật khẩu mới nhập lại không khớp';
            }
            if(empty($err)){
                $Npass_hash=password_hash($password, PASSWORD_DEFAULT);

            }
            else {
                
            }
        }

?>

<div id="change_pass" class="box-content" >
        
        <h2>Đổi mật khẩu</h2>
        
        <form method="get" autocomplete="off" style="display: flex;">

            <!-- Mật khẩu mới -->
            <h3>Mật khẩu mới</h3>
            <span>
            <input type="password" id="password" name="password">
            <span id="nosee" style="cursor: pointer;" onclick="showpass()" ><i class="fas fa-eye-slash" ></i></span>
            <span class="has-error"><?php echo (isset($err['pass']))?$err['pass']:''?></span>


            <!-- Nhập lại mật khẩu -->
            <h3>Nhập lại mật khẩu mới</h3>
            <span>
            <input type="password" id="password" name="rpassword">
            <span id="noseeRe" style="cursor: pointer;" onclick="showRepass()"><i class="fas fa-eye-slash" ></i></span>
            <span class="has-error"><?php echo (isset($err['pass_email']))?$err['pass_email']:''?></span>

        </form>
        <input type="submit" name="restore" value="Khôi phục mật khẩu">   
    </div>