<?php 
 session_start();
include("../view/cus/header/header.php");
?>
<?php
$conn = connectdb();
$sql_chitiet = "SELECT * FROM food, category WHERE food.cate_id = category.cate_id AND food.food_id='$_GET[id]'";
$query_chitiet = mysqli_query($conn, $sql_chitiet);
while ($row_chitiet = mysqli_fetch_array($query_chitiet)) {
    $cate_id = $row_chitiet['cate_id'];
    $food_id = $row_chitiet['food_id'];
?>
<div id="all">
    <?php
        include("../view/cus/menu/sidebar.php");
    ?>
    <div class="content">
        <form method="POST" action="">
            <div class="noidung_chitiet">
                <h1 class="title_chitiet1"><?php echo $row_chitiet['food_name'] ?></h1>
                <div class="content-wrapper">
                    <div class="anh">
                        <img src="../view/admin/ql_sanpham/uploads/<?php echo $row_chitiet['img'] ?>" style="width: 250px; height: 250px;">
                    </div>
                    <div class="mota_sp" style="width: fit-content; padding-left: 40px;font-size:20px">
                        <span class="label" style="font-size:20px; color:#000">Giá bán:</span>
                        <?php
                        if ($row_chitiet['original_price'] > $row_chitiet['selling_price']) {
                            echo '<span class="price">' . number_format($row_chitiet['selling_price'], 0, ',', '.') . 'vnđ</span>';
                            echo '<span class="or_price" style="text-decoration: line-through; margin-left: 10px; color: #AEA3A3">' . number_format($row_chitiet['original_price'], 0, ',', '.') . 'vnđ</span>';
                        } else {
                            echo '<span class="price">' . number_format($row_chitiet['selling_price'], 0, ',', '.') . 'vnđ</span>';
                        }
                        ?><br>
                        <p style="line-height: 0.2; color: #000; font-weight:bold;width: fit-content">Mô tả: </p>
                        <div class="descr"><?php echo $row_chitiet['small_descr'] ?></div>
                        <form action="giohang.php" method="POST">
                            <div class="button-quantity-container">
                                <div id="buy-amount" style="display: flex; gap: 0;">
                                    <button class="btn_amount" id="minusBtn" style="border-radius: 5px 0 0 5px;"><i class="fas fa-minus"></i></button>
                                    <input type="text" name="soluong" id="amount" value="1" min="1" style="margin-right: 0; font-weight: bold; text-align: center;">
                                    <button class="btn_amount" id="plusBtn"><i class="fas fa-plus"></i></button>
                                </div>
                                <input class="btn_dathang" type="submit" name="themgiohang" value="Thêm vào giỏ hàng" style="text-decoration: none; color: #ffff;">
                            </div>
                        </form>
                    </div>
                    <?php
                    }
                    ?>
                </div>
            </div>
        </form>
        <?php
            $random_offset = rand(0, 100);

            $sql_random = "SELECT * FROM food, category WHERE food.cate_id = category.cate_id AND food.cate_id = '$cate_id' AND food.food_id != '$food_id' ORDER BY RAND($random_offset) LIMIT 3";
            $query_random = mysqli_query($conn, $sql_random);
        ?>  
        <div id="all_dishes1">
            <h1 class="title_thucdon1" style="padding-top:10px">Thực đơn liên quan</h1>
            <div class="other_food">
                <?php
                    $i = 0;
                    while ($row_random = mysqli_fetch_array($query_random)) {
                        $i++;
                ?>
                <li class="Thucdon">  
                    <img src="../view/admin/ql_sanpham/uploads/<?php echo $row_random['img'] ?>" style="width: 150px; height: 150px;">
                    <p class="Ten_mon"><?php echo $row_random['food_name'] ?></p>
                    <p>
                        <span class="label">Giá bán:</span> 
                        <span class="price"><?php echo number_format($row_random['selling_price'],0,',','.').'vnđ' ?></span>
                    </p>
                    <button class="btn_xemchitiet">
                        <a href="hienthi_menu.php?quanly=chitiet_sp&id=<?php echo $row_random['food_id']?>" style="text-decoration: none; color: #ffff;">Xem chi tiết</a>
                    </button>
                </li>
                <?php
                    }
                ?>
            </div>
        </div>
    </div>
</div>

<?php
if (isset($_POST['themgiohang'])) {
    $idsanpham = mysqli_real_escape_string($conn, $_GET['id']);
    $soluong = mysqli_real_escape_string($conn, $_POST['soluong']);

    $sql = "SELECT * FROM food WHERE food_id = '$idsanpham'";
    $result = mysqli_query($conn, $sql);
    $food = mysqli_fetch_assoc($result);

    // Kiểm tra đăng nhập
    if (isset($_SESSION['id'])) {
        // Nếu đã đăng nhập, lưu thông tin vào bảng cart
        $user_id = $_SESSION['id'];

        // Kiểm tra xem sản phẩm đã tồn tại trong giỏ hàng của user chưa
        $sql_check_existing = "SELECT * FROM cart WHERE user_id = '$user_id' AND food_id = '$idsanpham'";
        $query_check_existing = mysqli_query($conn, $sql_check_existing);
        $row_check_existing = mysqli_fetch_assoc($query_check_existing);

        if ($row_check_existing) {
            // Nếu sản phẩm đã tồn tại, cập nhật số lượng
            $newQuantity = $row_check_existing['quantity'] + $soluong;
            $sql_update_quantity = "UPDATE cart SET quantity = $newQuantity WHERE user_id = '$user_id' AND food_id = '$idsanpham'";
            mysqli_query($conn, $sql_update_quantity);
        } else {
            // Nếu sản phẩm chưa tồn tại, thêm sản phẩm mới
            $sql_insert = "INSERT INTO cart (user_id, food_id, quantity) VALUES ('$user_id', '$idsanpham', '$soluong')";
            mysqli_query($conn, $sql_insert);
        }
    } else  {
        // Nếu chưa đăng nhập, lưu thông tin vào session cart
        if (!isset($_SESSION['cart'])) {
            $_SESSION['cart'] = [];
        }
    
        $found = false;
        for ($i = 0; $i < sizeof($_SESSION['cart']); $i++) {
            if ($_SESSION['cart'][$i]['food_id'] == $idsanpham) {
                // Món ăn đã tồn tại trong giỏ hàng, cập nhật số lượng
                $_SESSION['cart'][$i]['quantity'] += $soluong;
                $found = true;
                break;
            }
        }
        
        if (!$found) {
            // Món ăn chưa tồn tại trong giỏ hàng, thêm mới
            $item = [
                'food_id' => $idsanpham,
                'name' => $food['food_name'],
                'price' => $food['selling_price'], // Đảm bảo lấy đúng giá trị bán
                'quantity' => $soluong,
                'img' => $food['img'] // Thêm img vào session
            ];
            $_SESSION['cart'][] = $item;
        }
        
        // Sau khi thêm hoặc cập nhật sản phẩm, cập nhật giá trị session cart
        $_SESSION['cart'] = array_values($_SESSION['cart']); // Cập nhật lại chỉ số mảng
        
    }
    // if (isset($_SESSION['cart'])) {
    //     var_dump($found);
    //     var_dump($_SESSION['cart']);
    // } else {
    //     echo "Session cart không tồn tại hoặc không có dữ liệu.";
    // }
    echo "<script>
        Swal.fire({
            icon: 'success',
            title: 'Sản phẩm đã được thêm vào giỏ hàng',
            showConfirmButton: false,
            timer: 1500
        });
    </script>";
}
?>

<script>
    var plusBtn = document.getElementById('plusBtn');
    var minusBtn = document.getElementById('minusBtn');
    var amountInput = document.getElementById('amount');

    plusBtn.addEventListener('click', function(event) {
        event.preventDefault(); // Ngăn chặn hành vi mặc định của nút
        var currentValue = parseInt(amountInput.value);
        amountInput.value = currentValue + 1;
    });

    minusBtn.addEventListener('click', function(event) {
        event.preventDefault(); // Ngăn chặn hành vi mặc định của nút
        var currentValue = parseInt(amountInput.value);
        if (currentValue > 1) {
            amountInput.value = currentValue - 1;
        }
    });
</script>