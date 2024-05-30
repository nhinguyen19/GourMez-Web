<?php
function thanhtoandonhang() {
    if (isset($_POST['guithanhtoan'])) {

        $conn = connectdb();
        $tenkhachhang = $_POST['cusname'];
        $sodienthoai = $_POST['cusphone'];
        $email = $_POST['cusemail'];
        $ghichu = $_POST['ghichu'];
        $city = $_POST['city'];
        $ward = $_POST['ward'];
        $diachideli = $_POST['diachideli'];
        $phuongthuc = $_POST['pay'];
        $totalPrice = $_POST['totalPrice'];

        $diachi = $city . ', ' . $ward . ', ' . $diachideli;
        $date = date('Y-m-d H:i:s');

        // Insert the order into the database
        $sql_insert = "INSERT INTO orders (name_cus, phone, email, note, address, payment_mode, origin_total_price, date_order) 
                             VALUES ('$tenkhachhang', '$sodienthoai', '$email', '$ghichu', '$diachi', '$phuongthuc', '$totalPrice', '$date')";
        $query_insert = mysqli_query($conn, $sql_insert);

        if ($query_insert) {
            // Get the ID of the last inserted order
            $orderID = mysqli_insert_id($conn);  
          
            // Update the cart to associate the items with this order ID
            $updateCartQuery = "UPDATE cart SET orderid = '$orderID' WHERE orderid IS NULL";
            mysqli_query($conn, $updateCartQuery);

            // Clear the cart items that were just associated with this order
            $clearCartQuery = "DELETE FROM cart WHERE orderid = '$orderID'";
            mysqli_query($conn, $clearCartQuery);

            echo "Order placed successfully!";
        } else {
            echo "Error: " . mysqli_error($conn);
        }

        $conn->close();
    }
}
?>
