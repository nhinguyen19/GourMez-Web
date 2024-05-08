<?php

function getall_discountnews()
{
    $conn = connectdb();
    $sql = "SELECT id, discount_name, description, img FROM discount_news";
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
        $target_dir = "ql_khuyenmai/uploads/";
        $target_file = $target_dir . basename($_FILES["img"]["name"]);
        $img = $target_file;
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
       
      // Allow certain file formats
            if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
            && $imageFileType != "gif" ) {
            echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
            $uploadOk = 0;
            }
            if($uploadOk ==1)
            {

                //tmp_name là bộ nhớ
                move_uploaded_file($_FILES["img"]["tmp_name"], $target_file);
            
            //if($_FILES['img']['name'] != "") $img=$_FILES['img']['name']; else $img="";

            $conn=connectdb();
            $sql = "INSERT INTO discount_news (discount_name, description, img)
            VALUES ('$tenkmnews', ' $mota', '$img')";
            $conn->query($sql);

            }

    }

}

function deldiscountnews()
{
     if(isset($_GET['id']))
    {
        $id=$_GET['id'];
    }
    $conn=connectdb();
    $sql = "SELECT * FROM discount_news WHERE id=".$id;
    $query = mysqli_query($conn, $sql);

            if (mysqli_num_rows($query) > 0) {
                // Fetch the image filename from the database
                $row = mysqli_fetch_assoc($query);
                $imageName = $row['img'];

                // Delete the image file from the "uploads" folder
                $imagePath =  $imageName;
                if (file_exists($imagePath)) {
                    unlink($imagePath);
                }

                // Delete the record from the database
                $sql_xoa = "DELETE FROM discount_news WHERE id = '$id'";
                mysqli_query($conn, $sql_xoa);

                // Update  values
                $sql_capnhat = "SET @count = 0";
                mysqli_query($conn, $sql_capnhat);

                $sql_capnhat = "UPDATE discount_news SET id = @count:= @count + 1";
                mysqli_query($conn, $sql_capnhat);

                // Reset the auto-increment value
                $sql_reset_auto_increment = "ALTER TABLE discount_news AUTO_INCREMENT = 1";
                mysqli_query($conn, $sql_reset_auto_increment);

                header('Location: tranghienthi.php?quanly=tatcakm');
                exit();
            } 
}


