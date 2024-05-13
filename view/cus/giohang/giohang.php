<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="giohang.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"/>
    <link href='https://fonts.googleapis.com/css?family=Lalezar' rel='stylesheet'>
    <title>Giỏ hàng của bạn</title>
    <?php
        include("../../../model/connect.php");
        $conn = connectdb();

        if (isset($_POST['update'])) {
            $foodId = $_POST['food_id'];
            $quantity = $_POST['quantity'];

            $updateQuantityQuery = "UPDATE cart SET quantity = $quantity WHERE food_id = $foodId";
            mysqli_query($conn, $updateQuantityQuery);
        }

        if (isset($_POST['delete'])) {
            $foodId = $_POST['food_id'];

            $deleteQuery = "DELETE FROM cart WHERE food_id = $foodId";
            mysqli_query($conn, $deleteQuery);
        }

        $sql_cart = "SELECT * FROM cart INNER JOIN food ON cart.food_id = food.food_id";
        $query_cart = mysqli_query($conn, $sql_cart);
    ?>
</head>
<body>
<?php
    $totalPrice = 0;
    $cartItems = "";
    while ($row_cart = mysqli_fetch_array($query_cart)) {
        $hinh_anh_san_pham = $row_cart['img'];
        $productPrice = $row_cart['selling_price'];
        $quantity = $row_cart['quantity'];
        $subtotal = $productPrice * $quantity;
        $totalPrice += $subtotal;

        $cartItems .= '<tr>';
        $cartItems .= '<td> <img src="../../admin/ql_sanpham/uploads/' . $hinh_anh_san_pham . '" style="width: 120px;height: 120px; border-radius:5px"></td>';
        $cartItems .= '<td>';
        $cartItems .= '<span style="color: #E26A2C; font-weight: bold">' . $row_cart['food_name'] . '</span><br>';
        $cartItems .= '<form method="POST" action="">';
        $cartItems .= '<input type="hidden" name="food_id" value="' . $row_cart['food_id'] . '">';
        $cartItems .= '<div class="quantity-update" style="padding-top:5px; padding-bottom:5px">';
        $cartItems .= '<span style="padding-right: 5px">Số lượng:</span> <input type="number" style="width:30px;text-align:center" name="quantity" value="' . $quantity . '">';
        $cartItems .= '<button type="submit" name="update" class="btn_update">Sửa</button>';
        $cartItems .= '</div>';
        $cartItems .= '</form>';
        $cartItems .= "Giá bán: " . number_format($productPrice, 0, '.', '.') . " đ<br>";
        $cartItems .= '<span style="display: inline-block; padding-top: 5px;"> Tổng: ' . number_format($subtotal, 0, '.', '.') . ' đ</span><br>';
        $cartItems .= '<form method="POST" action="" style="display: flex; justify-content: center; padding-top: 5px">';
        $cartItems .= '<input type="hidden" name="food_id" value="' . $row_cart['food_id'] . '">';
        $cartItems .= '<button type="submit" name="delete" class="btn_delete">Xóa món ăn</button>';
        $cartItems .= '</form>';
        $cartItems .= '</td>';
        $cartItems .= '</tr>';
        $cartItems .= '<tr>';
        $cartItems .= '<td colspan="2"><hr style="width:350px"></td>';
        $cartItems .= '</tr>';
    }
?>
<div class="noidung" style="margin-left: 150px;">
    <?php
        echo '<p style="color:black; font-family: Lalezar; font-size: 30px"><i class="fas fa-shopping-cart" style="color:#E26A2C"></i> Giỏ hàng của bạn</p>';
        echo '<table style="font-size: 16px">';
        echo $cartItems;
        echo '<tr>';
        echo '<td colspan="2" style="text-align: center; font-weight:bold">Thành tiền: ' . number_format($totalPrice, 0, '.', '.') . ' đ</td>';
        echo '</tr>';
        echo '<tr>';
        echo '<td colspan="2" style="text-align: center;"> <button class="btn_thanhtoan" type="button" style="margin-top: 5px;">Thanh toán</button> </td>';
        echo '</tr>';
        echo '</table>';
    ?>
</div>
</body>
</html>