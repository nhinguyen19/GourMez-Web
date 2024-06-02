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

        // Determine if the user is logged in
        if (isset($_SESSION['id'])) {
            $user_id = mysqli_real_escape_string($conn, $_SESSION['id']);
            $sql_cart = "SELECT * FROM cart WHERE user_id='$user_id' AND orderid IS NULL";
            $query_cart = mysqli_query($conn, $sql_cart);
        } else {
            $user_id = "NULL";
            $cart = isset($_SESSION['cart']) ? $_SESSION['cart'] : [];
            $query_cart = false; // We will handle this differently later
        }

        // Insert the order into the database
        $sql_insert = "INSERT INTO orders (name_cus, phone, email, note, address, payment_mode, origin_total_price, date_order, status, user_id) 
                       VALUES ('$tenkhachhang', '$sodienthoai', '$email', '$ghichu', '$diachi', '$phuongthuc', '$totalPrice', '$date', 'Ghi nhận', $user_id)";
        $query_insert = mysqli_query($conn, $sql_insert);

        if ($query_insert) {
            // Get the ID of the last inserted order
            $orderID = mysqli_insert_id($conn);

            if (isset($_SESSION['id'])) {
                // Update the cart to associate the items with this order ID
                $updateCartQuery = "UPDATE cart SET orderid = '$orderID' WHERE user_id='$user_id' AND orderid IS NULL";
                mysqli_query($conn, $updateCartQuery);

                $sql_cart = "SELECT * FROM cart INNER JOIN food ON cart.food_id = food.food_id WHERE orderid='$orderID'";
                $query_cart = mysqli_query($conn, $sql_cart);
               
               
                while ($row_cart = mysqli_fetch_array($query_cart)) {
                $food_id = $row_cart['food_id'];
                $quantity = $row_cart['quantity'];
                $subtotal = $row_cart['selling_price'] * $quantity;
        
                // Thêm từng sản phẩm vào bảng order_items
                $insertOrderItemQuery = "INSERT INTO order_item ( food_id,order_id, quantity, price) 
                                         VALUES ( '$food_id', '$orderID','$quantity', '$subtotal')";
                mysqli_query($conn, $insertOrderItemQuery);
                 // Clear the cart
         
                 $clearCartQuery = "DELETE FROM cart WHERE orderid = '$orderID' AND user_id='$user_id'";
                 mysqli_query($conn, $clearCartQuery);
            }
         }
        else {
                foreach ($_SESSION['cart'] as $item) {
                    $food_id = $item['food_id'];
                    $productPrice = $item['price'];
                    $quantity = $item['quantity'];
                    $subtotal = $productPrice * $quantity;
                    $insertOrderItemQuery = "INSERT INTO order_item ( food_id,order_id, quantity, price) 
                                         VALUES ( '$food_id', '$orderID','$quantity', '$subtotal')";
                mysqli_query($conn, $insertOrderItemQuery);
                
                }
                unset($_SESSION['cart']);
            }

            echo "<script>
            Swal.fire({
                icon: 'success',
                title: 'Đơn hàng đã được gửi đi thành công',
                showConfirmButton: false,
                timer: 1500
            }).then(function() {
                window.location.href = 'tranghienthi.php?quanly=donethanhtoan&id=$orderID';
            });
        </script>";
        
        } else {
            echo "Error: " . mysqli_error($conn);
        }

        $conn->close();
    }
}
?>
