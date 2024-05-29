<?php
    session_start();
    if(isset($_SESSION['role'])){
        unset($_SESSION['user']);
        unset($_SESSION['role']);
        if(isset($_SESSION['text_error'])&& !empty($_SESSION['text_error']) ) {unset($_SESSION['text_error']);}
        header('Location: tranghienthi.php?quanly=dangnhap');
        
        
    }
    elseif(isset($_SESSION['current_user'])&& (!empty($_SESSION['current_user']))){
        unset($_SESSION['current_user']);
        unset($_SESSION['access_token']);
        header('Location: tranghienthi?quanly=dangnhap');
        if(isset($_SESSION['text_error'])&& !empty($_SESSION['text_error']) ) {unset($_SESSION['text_error']);}
        // header('Location: logout.php');
    }
?>