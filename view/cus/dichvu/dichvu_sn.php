
<style>
.banner_sn
{
    margin-top: 50px;
    width: 1500px;
    height: 700px;
}

    .food_label
{
  background-color: rgba(255, 242, 242, 1);
  padding-bottom: 20px;
}

.food_label h1
{
    text-align: center;
    font-family: 'Lalezar';
    align-items: center;
    background-color: rgba(174, 33, 8, 1);
    color: white;
    padding: 10px 0 5px 0;
}

.full_menu
{
    display: grid;
  grid-template-columns: 500px 500px 500px;
  margin-top: 50px;
  margin-block-end: 50px;
  font-size: 20px;
  
}

.full_menu img
{
  width: 350px;
  height: 350px;
  margin-bottom: 10px;
  
}

.option
{
    text-align: justify;
    padding: 40px;
}

.text
{
    padding-left: 120px;
}

/*thông tin khách hàng*/
.cus_info
{
  background-color: rgba(255, 236, 203, 1);
  padding-top: 30px;
  display: grid;
  grid-template-columns: 800px 600px;
}
.info h2
{
  font-family: 'Lalezar';
  width: 350px;
  text-align: center;
  align-items: center;
  margin-left: 100px;

}
::placeholder
{ font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    color: white;
    font-size: 15px;
    padding-left: 1;
  }

  .info  input 
  {
    background-color: rgba(248, 127, 64, 1);
    color:white;
    width: 500px;
    height: 40px;
    border: none;
    border-radius: 5px;
    margin-bottom: 15px;
    padding-left: 20px;
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
  }
  
  .info input:focus
  {
    outline: 1px solid gray ;
  }
  
  .info
  {
    padding-left: 200px;
    margin-top: 20px;
  }
  
  #birthday
  {
    width: 350px;
    color: white;
    padding-right: 20px;
    margin-bottom: 0;
  }
  
  #party_date
  {
    padding-right: 20px;
    font-size: 15px;
  }

  #gender
  {
    margin-left: 18px;
    width: 128px;
    height: 40px;
    background-color:rgba(248, 127, 64, 1) ;
    border-radius: 5px;
    border: none;
    color: white;
    padding-left: 10px;
    padding-right: 10px;
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
  }
  
  option
  {
    background-color: white;
    color: black;
  
  }

  /*payment*/
  
  .info_payment
  {
    font-family: 'Lalezar';
    margin-top: 30px;
  }
  
  .info_payment h2
  {
    font-family: 'Lalezar';
    text-align: center;
    align-items: center;
    /* margin-left: 100px; */
    margin-bottom: 30px;
  }
  
  .total_box
  {
    width: 500px;
    height: fit-content;
    background-color: white;
    border: none;
    border-radius: 15px;
    margin: 35px 0 0 0;
    padding: 0 18px 0 18px;
    align-content: center;
    font-size: 25px;
  }
  
  #total
  {
    float: right;
  }

  #send_order
  {
    background-color: rgba(252, 47, 19, 1);
    border-radius: 30px;
    border: none; 
    color: white;
    font-family: 'Lalezar';
    font-size: 25px;
    width: 180px;
    height: 40px;
    padding: 5px;
  }

  #reset
  {
    background-color: rgba(252, 47, 19, 1);
    border-radius: 30px;
    border: none; 
    color: white;
    font-family: 'Lalezar';
    font-size: 25px;
    width: 100px;
    height: 40px;
    padding: 5px;
    margin-left: 50px;
  }
  
  .button
  {
    display: flex;
    padding: 20px 0 20px 100px;
  }

  #name_birthday
  {
    margin-bottom: 0;
  }
  
  label
  {
    padding: 5px 0 5px 0;
  }


</style>


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
                                echo '<div class="option">';
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
            
        <div class = "info">
                <form id="form_customer" action="../controller/xuli_sn.php" method="post">
                
                    <h2>THÔNG TIN KHÁCH HÀNG ĐẶT TIỆC</h2>

                    <input type = "text" name = "cusname" id = "customer_name" placeholder="Họ và tên*" title="Vui lòng nhập tên người đặt tiệc." > <br>
                    <input type = "tel" name = "tel" id = "phone_number" placeholder="Số điện thoại*" required pattern="[0-9]{10}" title="Số điện thoại phải là số, có 10 chữ số!"> <br>
                    <input type = "email" name = "email" id = "email" placeholder="Email"> <br>
                    <input type="text" name ="name_birthday" id = "name_birthday" placeholder="Tên đặt tiệc sinh nhật*" title="Vui lòng nhập tên người sinh nhật. " lang="vi" required> <br>

                    

                    <label style = "color: black; fontfamily: 'Tahoma'">Chọn ngày đặt tiệc</label> <br>
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
                            <input type="reset" id = "reset" value = "Reset">
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
<script>
    

function formatNumber(number) {
    return number.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
  }
  
  
  function get_info_food() {
    let names = document.getElementsByName("name_of_food");
    let prices = document.getElementsByName("price");
    let quantities = document.getElementsByName("quantity");
    let img = document.querySelectorAll(".option img");
    let checks = document.getElementsByName("choose");
  
    for (let i = 0; i < checks.length; i++) {
      if (checks[i].checked) 
        {
        let name_food = names[i].innerText;
        let quantity = parseInt(quantities[i].value);
        // Remove non-numeric characters (like comma) from the price
        let price = parseInt(prices[i].innerText.replace(/\D/g, ''));
        let img_src = img[i].getAttribute("src");
        let trans_price =formatNumber(price);
        
        // Update the content of the div with class "total_box"
        let totalBox = document.querySelector('.total_box');
        let total_price = quantity * price;
        
        // Format total_price as desired
        let formatted_total_price = formatNumber(total_price);
  
        
        
        totalBox.innerHTML = '<img src = "'+ img_src + '"'+ 'style = "display:inline; width: 80px; height: 80px; margin-left: 10px">' + '<p name="name_food" style="display:inline; margin-right: 30px; margin-left: 15px">' + name_food + '</p>' + '<p style = "display:inline; margin-left:20px">x</p>' + '<p style="display:inline; name = "Last_quantity">' + quantity + '</p>' + '<p style="display:inline; margin-left: 20px">' + trans_price + '</p>';
        
        let text = document.createElement("p");
        let line = document.createElement("hr");
  
        text.classList.add("text_price");
        text.setAttribute("name","Last_price");
        text.innerHTML = "Tổng cộng: " + formatted_total_price;
        totalBox.appendChild(line);
        totalBox.appendChild(text);
  
        //add value for input hidden -> to get value to insert into
        document.getElementById('name_food_input').value = name_food;
        document.getElementById('quantity_input').value = quantity;
        document.getElementById('price_input').value = total_price;
  
        // Exit the loop after finding the checked radio button
        break;
      }
    }
  }
  </script>
  
  
  

  
    
  
  

