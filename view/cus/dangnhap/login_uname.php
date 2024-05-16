<?php


    // include ('../view/cus/dangnhap/checkuser.php');
    include ('checkuser.php');
    $user=$_POST['user'];
    $pass=$_POST['password'];
    $pass_hash=password_hash($pass,PASSWORD_DEFAULT);
    $_SESSION['user']=$user;
    $role=checkuser($user,$pass_hash);
    $_SESSION['role']=$role;
    if($role==1) {
        
        // header ('Location: tranghienthi.php?quanly=dangnhapadmin');
        header ('Location: ../../admin/tranghienthi.php');
    
    }
    elseif ($role==0) {
        
        // header ('Location: tranghienthi.php?quanly=trangchu');
        header ('Location: ../index.php');
    }
    else {
        $_SESSION['text_error']="Tài khoản hoặc mật khẩu không đúng";
        // header ('Location:tranghienthi.php?quanly=dangnhap');
        header ('Location: login.php');
    }
    


?>