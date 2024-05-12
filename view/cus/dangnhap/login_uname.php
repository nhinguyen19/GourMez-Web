<?php

if((isset($_POST['dangnhap']))&&($_POST['dangnhap'])=="Đăng nhập"){
    include 'checkuser.php';
    $user=$_POST['user'];
    $pass=$_POST['password'];
    $_SESSION['user']=$user;
    $role=checkuser($user,$pass);
    $_SESSION['role']=$role;
    if($role==1) {
        
        header ('Location: ../../admin/tranghienthi.php');
        if(isset($_SESSION['text_error'])&& (!empty($_SESSION['current_user']))) {usset($_SESSION['text_error']);}
    }
    elseif ($role==0) {
        
        header ('Location:../index.php');
        if(isset($_SESSION['text_error'])&& (!empty($_SESSION['current_user']))) {usset($_SESSION['text_error']);}
    }
    else {
        $_SESSION['text_error']="Tài khoản hoặc mật khẩu không đúng!!!";
        header ('Location:login.php');
    }
    
}

?>