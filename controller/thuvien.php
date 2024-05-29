<?php
require("../model/connect.php");

function getImageUrl() {
    $conn = connectdb();
    $query = "SELECT banner FROM service WHERE id_service = '2'";
    $result = mysqli_query($conn,$query);
    
    if (!$result) {
        die('Invalid query: ' . mysqli_error($conn));
    }
    
    $img = mysqli_fetch_assoc($result);
    
    mysqli_close($conn); // Close the connection
    
    return $img;
}


function tongdonhang()
    {
        $tong = 0;
        if(isset($_SESSION['giohang'])&&(is_array($_SESSION['giohang'])))
        {
            if(sizeof($_SESSION['giohang'])>0)
            {
          
            for($i=0; $i < sizeof($_SESSION['giohang']); $i++)
            {
                $tt =(int) $_SESSION['giohang'][$i][2]*(int)$_SESSION['giohang'][$i][3];
                $tong+= $tt;
            
            }
        }
    }
    return $tong;
}

function taodonhang($id,$name, $phone, $email, $booking_date, $address, $total_price, $note)
{
    $conn = connectdb();
    $sql = "INSERT INTO bigdeal_service(id_bill,name, phone, email, booking_date, address, total_price, note)
                VALUES ('$id','$name','$phone','$email','$booking_date','$address', '$total_price', '$note')";
    mysqli_query($conn,$sql);

    $last_id = $id;
    mysqli_close($conn);
    return $last_id;
}

function taogiohang($tenmon,$dongia,$soluong,$thanhtien,$idbill)
{
    $conn = connectdb();
    $sql = "INSERT INTO bigdeal_order_item(id_bill,tenmon,soluong,dongia,thanhtien)
                VALUES ('$idbill','$tenmon','$soluong','$dongia','$thanhtien')";
    echo "<script src='https://cdn.jsdelivr.net/npm/sweetalert2@10'></script>";
    if(mysqli_query($conn,$sql))
    {
        echo "<script>
        Swal.fire({
            icon: 'success',
            title: 'Đơn hàng của bạn đã được ghi nhận. Nhân viên sẽ liên hệ lại với bạn.',
            showConfirmButton: false,
            timer: 1500
        }).then(function() {
            window.location.href = 'tranghienthi.php?quanly=2';
        });
        </script>";
    }
    else
    {
        echo "<script>
        Swal.fire({
            icon: 'error',
            title: 'Không thể đặt hàng',
            text: 'Vui lòng đặt lại',
            confirmButtonColor: '#3085d6',
            confirmButtonText: 'OK'
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = 'tranghienthi.php?quanly=2';
            }
        });
      </script>";
    }
    mysqli_close($conn);


}

function taodonhang_sinhnhat($id,$name, $phone, $email, $booking_date, $address, $total_price, $note)
{
    $conn = connectdb();
    $sql = "INSERT INTO bigdeal_service(id_bill,name, phone, email, booking_date, address, total_price, note)
                VALUES ('$id','$name','$phone','$email','$booking_date','$address', '$total_price', '$note')";
    mysqli_query($conn,$sql);

    $last_id = $id;
    mysqli_close($conn);
    return $last_id;
}

?>