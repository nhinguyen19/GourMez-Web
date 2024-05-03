<?php
    include('../../../model/connect.php');
    $tenloaisp = $_POST['tendanhmuc'];
    $thutu = $_POST['thutu'];
    if(isset($_POST['themdanhmuc']))
    {
        $sql_them = "INSERT INTO category(cate_id,cate_name) VALUE('".$tenloaisp."','".$thutu."')";
        mysqli_query($mysqli,$sql_them);
    }
    header('Location')
?>ưewrewrwr