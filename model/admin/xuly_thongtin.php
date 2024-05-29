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
                echo "<script>
                    Swal.fire({
                        icon: 'success',
                        title: 'Cập nhật thông tin thành công!',
                        showConfirmButton: false,
                        timer: 1500
                    }).then(function() {
                        window.location.href = 'tranghienthi.php?quanly=tatcathongtin'
                    });
                  </script>";
            } else {
                echo "Lỗi: " . mysqli_error($conn);
            }
        }
    }
?>