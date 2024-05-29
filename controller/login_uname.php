<?php
    // session_start();
    $role=$_SESSION['role'];
    if($role==1) {
        
        header ('Location: tranghienthi.php?quanly=dangnhapadmin');
        // header ('Location: ../view/admin/tranghienthi.php');
    
    }
    elseif ($role==0) {
        
        header ('Location: tranghienthi.php?quanly=trangchu');
        // header ('Location: ../view/index.php');
    }
    
?>