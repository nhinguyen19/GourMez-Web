<?php


    include ('../model/checkuser.php');
    // include ('checkuser.php');
    $user=$_POST['user'];
    $pass=md5($_POST['password']);
    
    $_SESSION['user']=$user;
    $role=checkuser($user,$pass);
    $_SESSION['role']=$role;
    if($role==1) {
        
        header ('Location: tranghienthi.php?quanly=dangnhapadmin');
        // header ('Location: ../view/admin/tranghienthi.php');
    
    }
    elseif ($role==0) {
        
        header ('Location: tranghienthi.php?quanly=trangchu');
        // header ('Location: ../view/index.php');
    }
    else {
        $_SESSION['text_error']="Tài khoản hoặc mật khẩu không đúng";
        header ('Location:tranghienthi.php?quanly=dangnhap');
        // header ('Location: ../view/cus/dangnhap/login.php');
    }
?>