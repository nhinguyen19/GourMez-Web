<?php
    session_start();
    if(isset($_SESSION['role'])){
        
        unset($_SESSION['role']);
        header('Location: login.php');
    }
    elseif(isset($_SESSION['current_user'])&& (!empty($_SESSION['current_user']))&& isset($_SESSION['access_token'])&& (!empty($_SESSION['access_token']))){
        unset($_SESSION['current_user']);
        unset($_SESSION['access_token']);
        header('Location: login.php');
        // header('Location: logout.php');
    }
?>