<script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.21.1/axios.min.js"></script>
<link rel="stylesheet" href="../view/cus/thanhtoan/thanhtoan.css">
<?php
  include ('../model/connect.php');
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
  <div class="thanhtoanform">
  <form>
    <label>
        Họ tên của bạn*
    </label>
    <br>
    <input type="text" id="cusname" class="inputform">
    <br>
    <label>
        Số điện thoại*
    </label>
    <br>
    <input type="number" id="cusphone" class="inputform">
    <br>
    <label>
        Email*
    </label>
    <br>
    <input type="email" id="cusemail" class="inputform">
    <br>
    <label>
        Ghi chú
    </label>
    <br>
    <textarea>
    </textarea>
    <br>
    <label>
        Địa chỉ nhận hàng*
    </label>
    <br>
    <div class ="deliform">
          <table class="formdeli">
            <tr> 
              <td colspan ="2">
              <div class="inputdeliform">
                <table class="formdeli2">
                  <tr>
               <td> 
                <select class="form-select form-select-sm mb-3" id="city" aria-label=".form-select-sm">
                  <option value="" selected>Chọn tỉnh thành</option>           
                  </select>
               </td>
               <td>
                <select class="form-select form-select-sm mb-3" id="district" aria-label=".form-select-sm">
                  <option value="" selected>Chọn quận huyện</option>
                  </select>
               </td>
              <td>
                <select class="form-select form-select-sm mb-3" id="ward" aria-label=".form-select-sm">
                  <option value="" selected>Chọn phường </option>
                  </select>
              </td>
            </tr>
            <tr>
              <td colspan ="3">
                <input class="inputdeli" type="text" id="diachideli" placeholder="Nhập địa chỉ cụ thể của bạn">
              </td>
            </tr>
            <tr>
              <td colspan="3">
                <button class="buttonguideli" id="GuiDeliTC" type="submit"> Đặt giao hàng</button>
              </td>
            </tr>
            </table>
          </div>
          </td>
          </tr>
          </table>
        </div> 
        </form>
  </div>
        <script type="text/javascript" src="../view/cus/thanhtoan/thanhtoan.js"></script>
<?php
$totalPrice = 0;
$cartItems = "";
while ($row_cart = mysqli_fetch_array($query_cart)) {
    $productPrice = $row_cart['selling_price'];
    $quantity = $row_cart['quantity'];
    $subtotal = $productPrice * $quantity;
    $totalPrice += $subtotal;

    $cartItems .= '<tr>';
    $cartItems .= '<td>';
    $cartItems .= '<span style="color: #E26A2C; font-weight: bold">' . $row_cart['food_name'] . '</span><br>';
    $cartItems .= '</td>';
    $cartItems .= '<td>';
    $cartItems .= '<span style="padding-right: 5px">Số lượng:</span> ' . $quantity . '</span>';
    $cartItems .= '</td>';
    $cartItems .= '<td>';
    $cartItems .= "Đơn giá: " . number_format($productPrice, 0, '.', '.') . " đ<br>";

    $cartItems .= '</td>';
    $cartItems .= '</tr>';
    $cartItems .= '<tr>';
    $cartItems .= '<td colspan="2"><hr style="width:350px"></td>';
    $cartItems .= '</tr>';
}
?>
<div class="giohang_content">
<div class="noidung">
    <?php
        echo '<p style="color:black; font-family: Lalezar; font-size: 30px;"><i class="fas fa-shopping-cart" style="color:#E26A2C"></i> CHI TIẾT ĐƠN HÀNG</p>';
        echo '<table class="tb_noidung" style="font-size: 16px">';
        echo $cartItems;
        echo '<tr>';
        echo '<td colspan="2" style="text-align: center; font-weight:bold">Thành tiền: ' . number_format($totalPrice, 0, '.', '.') . ' đ</td>';
        echo '</tr>';
        echo '<tr>';
        echo '<td colspan="2" style="text-align: center;"> <button class="btn_thanhtoan" style="margin-top: 5px;"> <a href="tranghienthi.php?quanly=thanhtoan" style="text-decoration: none; color: #ffff;">Thanh toán</a>
        </button> </td>';
        echo '</tr>';
        echo '</table>';
    ?>
</div>
</div>
</body>