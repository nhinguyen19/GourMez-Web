<?php
    // session_start();
    $role=$_SESSION['role'];
    if($role==1) {
      header ('Location: adminhienthi.php');
    }
    elseif ($role==0) {
        header ('Location: tranghienthi.php?quanly=trangchu');
    }
    
?>