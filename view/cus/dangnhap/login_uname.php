<?php

include 'checkuser.php';
if((isset($_POST['dangnhap']))&&($_POST['dangnhap'])=='Đăng nhập'){
    $user=$_POST['user'];
    $pass=$_POST['password'];
    $role=checkuser($user,$pass);
    $_SESSION['role']=$role;
    if($role==1) {header ('Location: ../../admin/tranghienthi.php');}
    elseif ($role==0) {header ('Location:../index.php');}
    else {
        header ('Location:login.php');
        echo 'Chưa có tài khoản. Vui lòng đăng ký!';
    }
}



?>