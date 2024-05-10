<?php
    $conn = connectdb();
    $sql_chitiet = "SELECT * FROM food, category WHERE food.cate_id = category.cate_id AND food.food_id='$_GET[id]' LIMIT 1";
    $query_chitiet = mysqli_query($conn, $sql_chitiet);
    while ($row_chitiet = mysqli_fetch_array($query_chitiet)) {
?>
<form method= "POST" action="../view/cus/giohang/giohang.php?quanly=giohang&idsanpham=<?php echo $row_chitiet['food_id']?>">
    <div class="noidung_chitiet" style=" margin-left: 19vw;">
        <h1 class= "title_chitiet" style="text-align: center"><?php echo $row_chitiet['food_name']?></h1>
        <div class="content-wrapper">
            <div class="anhsp" >
                <img src="../view/admin/ql_sanpham/uploads/<?php echo $row_chitiet['img'] ?>" style="width: 200px; height: 200px; margin-bottom: 10px">
                <img src="../view/admin/ql_sanpham/uploads/<?php echo $row_chitiet['img'] ?>" style="width: 50px; height: 50px;  opacity: 0.7;">
            </div>
            <div class="mota_sp" style="width: fit-content; padding-left: 40px">
                <span class="label" style="font-size:18px">Giá bán:</span> 
                <?php
                if ($row_chitiet['original_price'] > $row_chitiet['selling_price']) {
                    echo '<span class="price">' . number_format($row_chitiet['selling_price'], 0, ',', '.') . 'vnđ</span>';
                    echo '<span class="or_price" style="text-decoration: line-through; margin-left: 10px; color: #AEA3A3">' . number_format($row_chitiet['original_price'], 0, ',', '.') . 'vnđ</span>';
                } else {
                    echo '<span class="price">' . number_format($row_chitiet['selling_price'], 0, ',', '.') . 'vnđ</span>';
                }
                ?><br>
                <p style="line-height: 0.2; font-weight:bold;width: fit-content;font-size:18px">Mô tả: </p>
                <p class="descr" style="width:90%; font-size:16px"><?php echo $row_chitiet['small_descr']?></p>
                <form action="giohang.php" method="POST">
                    <div class="button-quantity-container">
                        <div id="buy-amount" style="display: flex; gap: 0;">
                            <button class="btn_amount" id="minusBtn" style="border-radius: 10px 0 0 10px;"><i class="fas fa-minus"></i></button>
                            <input type="number" name="soluong" id="amount" value="1" min="1" style="margin-right: 0; border: none; font-weight: bold">
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