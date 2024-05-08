<?php

function getall_discountnews()
{
    $conn = connectdb();
    $sql = "SELECT Id, discount_name, description, img FROM discount_news";
    $result = $conn->query($sql);
    $kq = array();

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $kq[] = $row;
        }
    }

    $conn->close();
    return $kq;
}

function insertdiscountnews()
{
    if ((isset($_POST['themkmnews1'])) &&($_POST['themkmnews1']))
    {
        $conn=connectdb();
        $tenkmnews =$_POST['namediscountnews'];
        $mota =$_POST['description'];
        $target_dir = "uploads/";
        $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
        if($_FILES['img']['name'] != "") $img=$_FILES['img']['name']; else $img="";

        $conn=connectdb();
        $sql = "INSERT INTO discount_news (discount_name, description, img)
        VALUES ('$tenkmnews', ' $mota', '$img')";
        $conn->query($sql);



    }

}