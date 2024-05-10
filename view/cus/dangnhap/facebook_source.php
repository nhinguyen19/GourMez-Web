<?php
include './Facebook/autoload.php';
include('./fbconfig.php');
$helper = $fb->getRedirectLoginHelper(); //tạo biến xin dữ liệu từ 2 file include phía trên
$permissions = ['email']; // Optional permissions - xin truy cập đến email người dùng
$loginUrl = $helper->getLoginUrl('http://localhost/GOURMEZ-WEB/view/cus/dangnhap/fbconfig.php', $permissions);
?>