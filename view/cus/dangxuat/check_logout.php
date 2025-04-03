<?php
    // session_start();
    if(isset($_SESSION['role'])){
        unset($_SESSION['id']);
        unset($_SESSION['user']);
        unset($_SESSION['role']);
        if(isset($_SESSION['text_error'])&& !empty($_SESSION['text_error']) ) {unset($_SESSION['text_error']);}
        header('Location: tranghienthi.php?quanly=dangnhap');
    }
?>