
    <link rel = "stylesheet" href = "../view/cus/dichvu/style_sn.css">
   



    <div class="food_order">
        <img src = "../view/cus/img/sn_banner.png" class = "banner_sn">
        <!-- Thanh đặt món -->
        <div class="food_label">
            <h1>ĐẶT MÓN ĂN</h1>

            <div class="full_menu">
                <?php
                    require("../model/connect.php");
                    $conn = connectdb();
                    $sql = "SELECT comboname, price,img FROM combo_for_birthday";
                    $result = mysqli_query($conn, $sql);

                    if(!$result)
                    {
                        die("Lỗi". mysqli_error($conn));
                    }
                    else
                    {
                        if (mysqli_num_rows($result) > 0) {
                            $counter = 0; // Counter to generate unique identifiers for radio buttons
                            while ($row = mysqli_fetch_assoc($result)) {
                                $counter++;
                                echo '<div class="option1">';
                                echo '<img name = "image" src="' . $row['img'] . '">';
                                echo '<div class="text">';
                                echo '<p name="name_of_food">'. $row['comboname'] .  '</p>';
                                echo 'Giá bán: <p name="price" style="color:rgba(253, 166, 93, 1); display: inline; id =" ' . $row['price']. '">' . number_format($row['price'], 0, ',', '.') . 'đ</p><br>';
                                echo 'Số lượng: <input type="number" name="quantity" value = "10" id = "quantity"  placeholder="10" min="10" step="1" max="50" title="Vui lòng nhập số lượng" onchange = "get_info_food()" required ><br>';
                                echo 'Chọn <input type="radio" name="choose" id="choose'.$counter.'" onclick="get_info_food()" required title="Vui lòng chọn món">';
                                echo '</div>';
                                echo '</div>';
                            }
                    }
                }

                   
                    
                ?>
            
            </div>
    </div>
        <!-- Thông tin khách hàng -->
        <div class = "cus_info">
            
                
                <form id="form_customer" action="xuli_sn.php" method="post">
                <div class = "info">
                    <h2>THÔNG TIN KHÁCH HÀNG ĐẶT TIỆC</h2>

                    <input type = "text" name = "cusname" id = "customer_name" placeholder="Họ và tên*" title="Vui lòng nhập tên người đặt tiệc." > <br>
                    <input type = "tel" name = "tel" id = "phone_number" placeholder="Số điện thoại*" required pattern="[0-9]{10}" title="Số điện thoại phải là số, có 10 chữ số!"> <br>
                    <input type = "email" name = "email" id = "email" placeholder="Email"> <br>
                    <input type="text" name ="name_birthday" id = "name_birthday" placeholder="Tên đặt tiệc sinh nhật*" title="Vui lòng nhập tên người sinh nhật. " lang="vi" required> <br>

                    

                    <label>Chọn ngày đặt tiệc</label> <br>
                    <input type="date" style="font-size: 15px; width:350px" name = "party_date" value = "12-5-2004" id = "party_date" value ="Ngày đặt tiệc*" title="Vui lòng chọn ngày đặt tiệc" required>

                    <select name = "gender" id = "gender">  
                        <option value="" hidden>Giới tính*</option>
                        <option value="Nữ">Nữ</option>
                        <option value="Nam">Nam</option>
                        <option value="Khác">Khác</option>
                    </select> <br>

                    <input type="text" name = "address" id="address" placeholder="Địa chỉ khách hàng"> <br>
                    <input type="text" name = "note" id = "note" placeholder="Ghi chú"> <br>
                    <div class = "button">
                        <input type ="submit" name = "send" id = "send_order" value="Gửi đơn hàng">
                        <div class = "button_reset">
                            <input type="reset" id = "reset" value = "Reset" onclick = "reset_quantity()">
                        </div>
                    </div>

                </div> 

                    <div class = "info_payment">
                        <h2>CHI TIẾT ĐƠN HÀNG</h2>
                        <div class = "total_box" id = "totalBox">
                        

                            <p style="display: inline;">Tổng cộng</p>
                            <p style="display: inline;" id = "total">0đ</p>
                        </div>
                        
                     </div>

                     
                    <input type="hidden" name="name_food" id="name_food_input">
                    <input type="hidden" name="Last_quantity" id="quantity_input">
                    <input type="hidden" name="Last_price" id="price_input">
                
                </form>
            </div>

        </div>

 
        <?php
if(isset($_GET['alert']) && $_GET['alert'] == 'success') {
    echo '<script>alert("Đơn hàng đã được ghi nhận. Nhân viên sẽ liên hệ với bạn.");</script>';
}
else if (isset($_GET['alert']) && $_GET['alert'] == 'empty')
{
    echo '<script>alert("Vui lòng chọn món ăn.");</script>';
}
else if (isset($_GET['alert']) && $_GET['alert'] == 'unsuccess')
{
    echo '<script>alert("Đơn hàng bị lỗi. Vui lòng nhập lại.");</script>';
}
?>

