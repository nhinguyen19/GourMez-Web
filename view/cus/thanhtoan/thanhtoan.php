
  <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.21.1/axios.min.js"></script>
  <link rel="stylesheet" href="../view/cus/thanhtoan/thanhtoan.css">
<?php
  include('../model/connect.php');
  $conn = connectdb();

  
?>
<body>
  <div class="thanhtoanform">
    <div class="thongtin">
    <form method="POST" action="tranghienthi.php?quanly=thanhtoan">
      <label class="label">Họ tên của bạn*</label>
      <br>
      <input type="text" id="cusname" name="cusname" class="inputform" required>
      <br>
      <label class="label">Số điện thoại*</label>
      <br>
      <input type="number" id="cusphone" name="cusphone" class="inputform" required>
      <br>
      <label class="label">Email*</label>
      <br>
      <input type="email" id="cusemail" name="cusemail" class="inputform" required>
      <br>
      <label class="label">Ghi chú</label>
      <br>
      <textarea id="ghichu" name="ghichu"></textarea>
      <br>
      <label class="label">Địa chỉ nhận hàng*</label>
      <br>
      <div class="deliform">
        <table class="formdeli">
          <tr>
            <td colspan="2">
              <div class="inputdeliform">
                <table class="formdeli2">
                  <tr>
                    <td>
                      <select id="city" name="city">
                        <option value="" selected>Chọn thành phố</option>
                        <option value="Đà Lạt">Đà Lạt</option>
                        <option value="Hồ Chí Minh">Hồ Chí Minh</option>
                      </select>
                    </td>
                    <td>
                      <select id="ward" name="ward" required>
                        <option value="" selected>Chọn phường</option>
                        <?php
                        for ($i = 1; $i <= 12; $i++) {
                            echo "<option value='Phường $i'>Phường $i</option>";
                        }
                        ?>
                      </select>
                    </td>
                  </tr>
                  <tr>
                    <td colspan="2">
                      <input class="inputdeli" type="text" id="diachideli" name="diachideli" placeholder="Nhập địa chỉ cụ thể của bạn" required>
                    </td>
                  </tr>
                </table>
              </div>
            </td>
          </tr>
        </table>
      </div>
      <br>
   
      <label class="label" >Phương thức thanh toán*</label>
      <br>
    
      <input type="radio" name="pay" value="VIETQR" required> <label  class="label1">Thanh toán qua VietQR</label>
      <br>
      <input type="radio" name="pay" value="Tiền mặt"> <label  class="label1">Thanh toán khi nhận hàng</label>
      <br>
  
      <div id="qrcode"></div>


      </div>
   
  <div class="giohang_content">
    <div class="noidung">
      <?php 
        $cartItems = "";
        $totalPrice = 0;

        if (isset($_SESSION['id'])) {
        
          $user_id = mysqli_real_escape_string($conn, $_SESSION['id']);
          $sql_cart = "SELECT * FROM cart INNER JOIN food ON cart.food_id = food.food_id and user_id='$user_id'";
          $query_cart = mysqli_query($conn, $sql_cart);
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
            $cartItems .= "Thành tiền: " . number_format($subtotal, 0, '.', '.') . " đ<br>";
            $cartItems .= '</td>';
            $cartItems .= '</tr>';
            $cartItems .= '<tr>';
            $cartItems .= '<td colspan="3"><hr style="width:350px"></td>';
            $cartItems .= '</tr>';
          }
          echo '<p style="color:black; font-family: Lalezar; font-size: 30px;"><i class="fas fa-shopping-cart" style="color:#E26A2C"></i> CHI TIẾT ĐƠN HÀNG</p>';
          echo '<table class="tb_noidung" style="font-size: 16px">';
          echo $cartItems;
          echo '<tr>';
          echo '<td colspan="3" style="text-align: center; font-weight:bold">Tổng cộng: ' . number_format($totalPrice, 0, '.', '.') . ' đ</td>';
          echo '</tr>';
          echo '</table>';
        } else  
        { 
          if (isset($_SESSION['cart'])) {
          foreach ($_SESSION['cart'] as $item) {
              $hinh_anh_san_pham = $item['img'];
              $productPrice = $item['price'];
              $quantity = $item['quantity'];
              $subtotal = $productPrice * $quantity;
              $totalPrice += $subtotal;
  
              $cartItems .= '<tr>';
              $cartItems .= '<td>';
              $cartItems .= '<span style="color: #E26A2C; font-weight: bold">' . $item['name'] . '</span><br>';
              $cartItems .= '</td>';
              $cartItems .= '<td>';
              $cartItems .= '<span style="padding-right: 5px">Số lượng:</span> ' . $quantity . '</span>';
              $cartItems .= '</td>';
              $cartItems .= '<td>';
              $cartItems .= "Thành tiền: " . number_format($subtotal, 0, '.', '.') . " đ<br>";
              $cartItems .= '</td>';
              $cartItems .= '</tr>';
              $cartItems .= '<tr>';
              $cartItems .= '<td colspan="4"><hr style="width:350px"></td>';
              $cartItems .= '</tr>';
            }
            
            echo '<p style="color:black; font-family: Lalezar; font-size: 30px;"><i class="fas fa-shopping-cart" style="color:#E26A2C"></i> CHI TIẾT ĐƠN HÀNG</p>';
            echo '<table class="tb_noidung" style="font-size: 16px">';
            echo $cartItems;
            echo '<tr>';
            echo '<td colspan="3" style="text-align: center; font-weight:bold">Tổng cộng : ' . number_format($totalPrice, 0, '.', '.') . ' đ</td>';
            echo '</tr>';
            echo '</table>';
          }
      }
  
      ?>
       
   
      <input type="hidden" name="totalPrice" value="<?php echo $totalPrice; ?>">
    </div>
    </div>
    <div class="buttonxem">
  <button type="submit" name="guithanhtoan" class="buttonxem" style="background-color: #E26A2C; color: white; font-size:20px; border-radius:40px; height : 50px; width: 200px;font-family: Lalezar;border:none">Xác nhận </button>
  </div>
  </form>
  <div class="buttonxem">
  <button type="submit" name="quaylai" class="buttonxem" style="background-color: #575f68; color: white; font-size:20px; border-radius:40px;height : 50px; width: 200px;font-family: Lalezar;border:none"><a href="tranghienthi.php?quanly=giohang" style="text-decoration: none; color: #ffff;">Quay lại</a> </button>
    </div>
    </div>
   

    <!-- Modal -->
    <div id="myModal" class="modal">
        <div class="modal-content">
            <span class="close">&times;</span>
            <h2>GOURMEZ đã nhận được thanh toán từ bạn !</h2>
            <p>Thanh toán thành công</p>
        </div>
    </div>

    <script>
        let isSuccess = false;

        // Replace this with your actual values
        const totalPrice = <?php echo $totalPrice; ?>;
        const BANK_ID = "MB";
        const ACCOUNT_NO = "020410046823";

        // Function to generate random string
        function generateRandomString(length) {
            const characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
            let result = '';
            const charactersLength = characters.length;
            for (let i = 0; i < length; i++) {
                result += characters.charAt(Math.floor(Math.random() * charactersLength));
            }
            return result;
        }

        // Function to handle payment selection
        function handlePaymentSelection() {
            const radioButtons = document.querySelectorAll('input[name="pay"]');
            radioButtons.forEach(radio => {
                radio.addEventListener('change', function () {
                    const qrCodeDiv = document.getElementById('qrcode');
                    if (this.value === 'VIETQR') {
                        // Generate random content for paid_content
                        const paid_content = generateRandomString(10); // Adjust the length as needed
                        const imgUrl = `https://img.vietqr.io/image/${BANK_ID}-${ACCOUNT_NO}-qr_only.png?amount=2000&addInfo=${paid_content}`;
                        qrCodeDiv.innerHTML = `<img src="${imgUrl}" alt="QR Code">`;
                        
                        setTimeout(()=>{
                            const intervalId = setInterval(()=>{
                                checkPaid(2000, paid_content, intervalId);
                            }, 1000);
                        }, 20000);
                    } else {
                        // Clear QR code if other payment method is selected
                        qrCodeDiv.innerHTML = '';
                    }
                });
            });
        }

        // Function to check payment
        async function checkPaid(price, content, intervalId) {
            if (isSuccess) {
                return;
            } else {
                try {
                    const response = await fetch("https://script.google.com/macros/s/AKfycbz25gxpgsa2VDy_3My22rzsp9o8lZDK2A2rYJ4oYf4E96Kr6rAwmI00bQ_SsN4y1B1Y/exec");
                    const data = await response.json();
                    const lastPaid = data.data[data.data.length - 1];
                    const lastPrice = lastPaid["Giá trị"];
                    const lastContent = lastPaid["Mô tả"];
                    if (lastPrice >= price && lastContent.includes(content)) {
                        showModal();
                        isSuccess = true;
                        clearInterval(intervalId);
                    } else {
                        console.log("Không thành công");
                    }
                } catch (error) {
                    console.error("Lỗi", error);
                }
            }
        }

        // Function to show the modal
        function showModal() {
            const modal = document.getElementById("myModal");
            const span = document.getElementsByClassName("close")[0];
            modal.style.display = "block";
            span.onclick = function() {
                modal.style.display = "none";
            }
            window.onclick = function(event) {
                if (event.target == modal) {
                    modal.style.display = "none";
                }
            }
        }

        // Attach event listener to radio buttons on page load
        document.addEventListener('DOMContentLoaded', handlePaymentSelection);
    </script>

  <script type="text/javascript" src="../view/cus/thanhtoan/thanhtoan.js"></script>

  </body>