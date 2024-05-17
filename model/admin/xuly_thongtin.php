<?php
    function suaThongTin()
    {
        $conn = connectdb();
        if(isset($_POST['suathongtin'])) 
        {
            $tencuahang = $_POST['tencuahang'];
            $sodienthoai = $_POST['sodienthoai'];
            $diachi = $_POST['diachi'];
            $email = $_POST['email'];
            
            $sql_sua = "UPDATE contacts SET ResName = '$tencuahang', ResPhoneNumber = '$sodienthoai', ResAddress = '$diachi', ResEmail = '$email'";
            
            if(mysqli_query($conn, $sql_sua)) {
                echo '<div style="text-align: center; margin-top: 50px; font-size: 18px; color: green;">Cập nhật thông tin thành công!</div>';
            } else {
                echo "Lỗi: " . mysqli_error($conn);
            }
        }
    }
?>