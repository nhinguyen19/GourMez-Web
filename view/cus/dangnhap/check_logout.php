<?php
    session_start();
    if(isset($_SESSION['role'])){
        unset($_SESSION['user']);
        unset($_SESSION['role']);
        header('Location: login.php');
        // if(isset($_SESSION['text_error'])&& !empty($_SESSION['text_error']) ) {usset($_SESSION['text_error']);}
    }
    elseif(isset($_SESSION['current_user'])&& (!empty($_SESSION['current_user']))){
        unset($_SESSION['current_user']);
        unset($_SESSION['access_token']);
        header('Location: login.php');
        // if(isset($_SESSION['text_error'])&& !empty($_SESSION['text_error']) ) {usset($_SESSION['text_error']);}
        // header('Location: logout.php');
    }
?>