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
function getall_codedis()
{
    $conn = connectdb();
    $sql = "SELECT id, code_dis, qtt_of_dis FROM discount";
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
        if (empty($tenkmnews||$mota||$img)) {
            echo "<script>
                    Swal.fire({
                        icon: 'error',
                        title: 'Lỗi',
                        text: 'Tên khuyến mãi không được để trống.',
                        confirmButtonColor: '#3085d6',
                        confirmButtonText: 'OK'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            window.location.href = 'tranghienthi.php?quanly=themkmnews';
                        }
                    });
                  </script>";
            return;
        }
       
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
            echo "<script>
            Swal.fire({
                icon: 'success',
                title: 'Thêm tin tức khuyến mãi thành công!',
                showConfirmButton: false,
                timer: 1500
            })
          </script>";

            }

    }

}

function insertcodedis()
{
    if ((isset($_POST['themcodedis1'])) &&($_POST['themcodedis1']))
    {
        $conn=connectdb();
        $code =$_POST['namecode'];
        $qtt =$_POST['qttcode'];
            $sql = "INSERT INTO discount (code_dis, qtt_of_dis)
            VALUES ('$code', ' $qtt')";
            $conn->query($sql);
            echo "<script>
            Swal.fire({
                icon: 'success',
                title: 'Thêm mã khuyến mãi thành công!',
                showConfirmButton: false,
                timer: 1500
            })
          </script>";


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

                echo "<script>
                Swal.fire({
                    icon: 'success',
                    title: 'Xóa tin tức thành công!',
                    showConfirmButton: false,
                    timer: 1500
                }).then(function() {
                    window.location.href = 'tranghienthi.php?quanly=tatcakm'
                });
                </script>";
            } 
}


function delcodedis()
{
    if(isset($_GET['id']))
    {
        $id=$_GET['id'];
    }
    $conn=connectdb();
    $sql = "SELECT * FROM discount WHERE id=".$id;
    $query = mysqli_query($conn, $sql);

            if (mysqli_num_rows($query) > 0) {
                // Delete the record from the database
                $sql_xoa = "DELETE FROM discount WHERE id = '$id'";
                mysqli_query($conn, $sql_xoa);

                // Update  values
                $sql_capnhat = "SET @count = 0";
                mysqli_query($conn, $sql_capnhat);

                $sql_capnhat = "UPDATE discount SET id = @count:= @count + 1";
                mysqli_query($conn, $sql_capnhat);

                // Reset the auto-increment value
                $sql_reset_auto_increment = "ALTER TABLE discount AUTO_INCREMENT = 1";
                mysqli_query($conn, $sql_reset_auto_increment);

                echo "<script>
                Swal.fire({
                    icon: 'success',
                    title: 'Xóa mã khuyến mãi thành công!',
                    showConfirmButton: false,
                    timer: 1500
                }).then(function() {
                    window.location.href = 'tranghienthi.php?quanly=tatcakm'
                });
                </script>";
         
            } 
}

function getone_discountnews($id)
{
    $conn=connectdb();
    $sql = "SELECT id, discount_name, description, img FROM discount_news WHERE id='$id'";
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

function updatekmnews()
{
    $conn = connectdb();
    if((isset($_POST['suakmnews'])) &&($_POST['suakmnews']))
    {
        $id = $_GET['id'];
        $ten = $_POST['discount_name'];
        $mota = $_POST['des'];
        $target_dir = "ql_khuyenmai/uploads/";
        $target_file = $target_dir . basename($_FILES["img"]["name"]);
        $img = $target_file;
        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
          
                if($_FILES['img'])
                {
                $sql_sua = "UPDATE discount_news SET discount_name = '$ten', description ='$mota',img='$img' WHERE id = '$id'";
                   
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

             }

             move_uploaded_file($_FILES["img"]["tmp_name"], $target_file);
                    
 

               }
                else{

                    $sql_sua = "UPDATE discount_news SET discount_name = '$ten', description ='$mota' WHERE id = '$id'";
                }
               
                
                
                if(mysqli_query($conn, $sql_sua))
                {
                   echo "<script>
                       Swal.fire({
                           icon: 'success',
                           title: 'Cập nhật tin tức khuyến mãi thành công!',
                           showConfirmButton: false,
                           timer: 1500
                       })
                     </script>";
               } else {
                   echo "Error: " . mysqli_error($conn);
               }

        
        }
    }
    
function updatecodedis()
{
    $conn = connectdb();
    if((isset($_POST['suacodedis'])) &&($_POST['suacodedis']))
    {
        $id = $_GET['id'];
        $ten = $_POST['discount_name'];
        $qtt = $_POST['qtt'];
       
    
                $sql_sua = "UPDATE discount SET code_dis = '$ten', qtt_of_dis ='$qtt'WHERE id = '$id'";
                   
                
                if(mysqli_query($conn, $sql_sua))
                {
                   echo "<script>
                       Swal.fire({
                           icon: 'success',
                           title: 'Cập nhật mã khuyến mãi thành công!',
                           showConfirmButton: false,
                           timer: 1500
                       })
                     </script>";
               } else {
                   echo "Error: " . mysqli_error($conn);
               }

        
        }
    }
?>