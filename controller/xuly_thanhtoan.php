<?php
function thanhtoandonhang(){
    if (isset($_POST['guithanhtoan'])) {

    $conn = connectdb();
    $tenkhachhang = $_POST['cusname'];
    $sodienthoai = $_POST['cusphone'];
    $email = $_POST['cusemail'];
    $ghichu = $_POST['ghichu'];
    $city = $_POST['city'];
    $district = $_POST['district'];
    $ward = $_POST['ward'];
    $diachideli = $_POST['diachideli'];
    $phuongthuc = $_POST['pay'];
    $totalPrice = $_POST['total_price'];

    $diachi = $city . ', ' . $district . ', ' . $ward . ', ' . $diachideli;
    $date = date('Y-m-d H:i:s');

    // Insert the order into the database
    $sql_insert_message = "INSERT INTO orders (name_cus, phone, email, note, address, payment_mode, origin_total_price, date_order) 
                         VALUES ('$tenkhachhang', '$sodienthoai', '$email', '$ghichu', '$diachi', '$phuongthuc', '$totalPrice', '$date')";
    $query_insert_message = mysqli_query($conn, $sql_insert_message);
    
    if ($query_insert_message) {
        echo "Order placed successfully!";
        // Clear the cart after successful order
        $clearCartQuery = "DELETE FROM cart";
        mysqli_query($conn, $clearCartQuery);
    } else {
        echo "Error: " . mysqli_error($conn);
    }


$conn->close();
   
}
}
?>
