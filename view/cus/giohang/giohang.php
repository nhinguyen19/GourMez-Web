<link rel="stylesheet" href="giohang.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"/>
<?php
include("../../../model/connect.php");
$conn = connectdb();
$sql_chitiet = "SELECT * FROM food WHERE food.food_id = '{$_GET['idsanpham']}' LIMIT 1";
$query_chitiet = mysqli_query($conn, $sql_chitiet);
?>
<?php
session_start();

if (!isset($_SESSION['giohang'])) {
    $_SESSION['giohang'] = array();
}
// Kiểm tra xem có thêm sản phẩm vào giỏ hàng không
if (isset($_POST['themgiohang'])) {
    $idsanpham = $_GET['idsanpham'];
    $soluong = $_POST['soluong'];

    // Kiểm tra xem sản phẩm đã tồn tại trong giỏ hàng chưa
    if (isset($_SESSION['giohang'][$idsanpham])) {
        // Nếu đã tồn tại, cập nhật số lượng sản phẩm
        $_SESSION['giohang'][$idsanpham] += $soluong;
    } else {
        // Nếu chưa tồn tại, thêm sản phẩm mới vào giỏ hàng
        $_SESSION['giohang'][$idsanpham] = $soluong;
    }
}
if (isset($_POST['xoasanpham'])) {
    $idsanpham = $_POST['idsanpham'];

    // Remove the product from the shopping cart
    unset($_SESSION['giohang'][$idsanpham]);

    // Redirect back to the shopping cart page
    header("Location: giohang.php");
    exit();
}
// Hiển thị thông tin giỏ hàng và cập nhật cơ sở dữ liệu
echo '<h2 style="color:#E26A2C"><i class="fas fa-shopping-cart"></i> Giỏ hàng của bạn</h2>';
if (count($_SESSION['giohang']) > 0) {
    echo '<table>';
    echo '<tr>';
    echo '<th>';
    echo '<th>Tên sản phẩm</th>';
    echo '<th>Giá sản phẩm</th>';
    echo '<th>Số lượng</th>';
    echo '<th>Tổng tiền</th>';
    echo '</tr>';

    foreach ($_SESSION['giohang'] as $idsanpham => $soluong) {
        // Truy vấn cơ sở dữ liệu để lấy thông tin về sản phẩm dựa trên $idsanpham
        $sql = "SELECT * FROM food WHERE food_id = $idsanpham";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $hinh_anh_san_pham = $row['img'];
            $ten_san_pham = $row['food_name'];
            $gia_san_pham = $row['selling_price'];

            // Hiển thị thông tin sản phẩm
            echo '<tr>';
            echo '<td> <img src="../../admin/ql_sanpham/uploads/' . $hinh_anh_san_pham . '" style="width: 100px; border-radius:"></td>';
            echo '<td>' . $ten_san_pham . '</td>';
            echo '<td>' . number_format($gia_san_pham, 0, ',', '.') . 'vnđ</td>';
            echo '<td>'  . $soluong . '</td>'; 
            echo '</td>';
            echo '<td>' . number_format($gia_san_pham * $soluong, 0, ',', '.') . 'vnđ</td>';
            echo '<td>';
            echo '<form action="" method="post">';
            echo '<input type="hidden" name="idsanpham" value="' . $idsanpham . '">';
            echo '<td><button type="submit" name="xoasanpham"><i class="fas fa-trash"></i></button></td>'; // Button xóa sản phẩm
            echo '</form>';
            echo '</td>';
            echo '</tr>';
    }
}
    echo '</table>';
    if (isset($_POST['capnhatsoluong'])) {
        $idsanpham = $_POST['idsanpham'];
        $soluong = $_POST['soluong'];
    
        // Kiểm tra số lượng có hợp lệ (lớn hơn 0) và cập nhật giỏ hàng
        if ($soluong > 0) {
            $_SESSION['giohang'][$idsanpham] = $soluong;
        } else {
            // Nếu số lượng <= 0, xóa sản phẩm khỏi giỏ hàng
            unset($_SESSION['giohang'][$idsanpham]);
        }
    }

    // Hiển thị tổng tiền
    $tong_tien = 0;
    foreach ($_SESSION['giohang'] as $idsanpham => $soluong) {
        $sql = "SELECT * FROM food WHERE food_id = $idsanpham";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $gia_san_pham = $row['selling_price'];
            $tong_tien += $gia_san_pham * $soluong;
        }
    }

    echo '<h3>Tổng tiền: ' . number_format($tong_tien, 0, ',', '.') . 'vnđ</h3>';
    } else {
        echo '<p>Giỏ hàng của bạn đang trống.</p>';
    }

// Đóng kết nối cơ sở dữ liệu
$conn->close();

// Kết thúc sessiong
session_write_close();
?>