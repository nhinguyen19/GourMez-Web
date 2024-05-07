
<style>
    .banner
    {
        width: 1500px;
        height: 700px;

    }

    /* Thanh đặt món */
.food_label
{
  background-color: rgba(255, 242, 242, 1);
  padding-bottom: 50px;
}

.food_label h1
{
  display: flex;
  justify-content: center;
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
  
  #ship_date
  {
    padding-right: 20px;
    font-size: 15px;
    color: white;
    padding-right: 20px;
    margin-bottom: 15px;

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
    margin-bottom: 15px;
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
    margin-left: 100px;
    margin-bottom: 30px;
  }
  
  .total_box
  {
    width: 520px;
    height: fit-content;
    background-color: white;
    border: none;
    border-radius: 15px;
    margin: 35px 0 0 50px;
    padding: 20px;
    align-content: center;
    font-size: 25px;
    padding-inline: 5px;

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


  label
  {
    padding: 5px 0 5px 0;
  }

.text_price
{
  font-size: 30px;
  padding-left: 50px;
  padding-top: 10px;
}

#form_customer
{
  display: grid;
  grid-template-columns: 750px 400px;
}
</style>
        <!-- Thanh đặt món -->
        
            <img src = "../view/cus/img/banner_bigdeal.png" class = "banner">
            <div class="food_order">

            <div class="food_label" style = "border: 1px solid yellow">
                <h1>ĐẶT MÓN ĂN</h1>

                <div class="full_menu">
                    <?php
                        require("../model/connect.php");
                        $conn = connectdb();
        
                        $sql = "SELECT NameFood, Price,image FROM food_for_bigdeal";
                        $result = mysqli_query($conn, $sql);

                        if(!$result)
                        {
                            die("Lỗi". mysqli_error($conn));
                        }

                        if (mysqli_num_rows($result) > 0) {
                            $counter = 0; // Counter to generate unique identifiers for radio buttons
                            while ($row = mysqli_fetch_assoc($result)) {
                                $counter++;
                                echo '<div class="option1">';
                                echo '<img name = "image" src="' . $row['image'] . '">';
                                echo '<div class="text">';
                                echo '<p name="name_of_food">'. $row['NameFood'] .  '</p>';
                                echo 'Giá bán: <p name="price" style="color:rgba(253, 166, 93, 1); display: inline; id =" ' . $row['Price']. '">' . number_format($row['Price'], 0, ',', '.') . 'đ</p><br>';
                                echo 'Số lượng: <input type="number" name="quantity" id = "quantity"  placeholder="1" min="1" step="1" max="50" title="Vui lòng nhập số lượng" onchange = "get_info_food()" required ><br>';
                                echo 'Chọn <input type="radio" name="choose" id="choose'.$counter.'" onclick="get_info_food()" required title="Vui lòng chọn món">';
                                echo '</div>';
                                echo '</div>';
                            }
                        }
                    ?>
                
                </div>
        </div>
            <!-- Thông tin khách hàng -->
            <div class = "cus_info">
                
                    
                    <form id="form_customer" action="xuli_bigdeal.php" method="post">
                    <div class = "info">
                        <h2>THÔNG TIN KHÁCH HÀNG</h2>

                        <input type = "text" name = "cusname" id = "customer_name" placeholder="Họ và tên*" title="Vui lòng nhập tên người đặt tiệc." > <br>
                        <input type = "tel" name = "tel" id = "phone_number" placeholder="Số điện thoại*" required pattern="[0-9]{10}" title="Số điện thoại phải là số, có 10 chữ số!"> <br>
                        <input type = "email" name = "email" id = "email" placeholder="Email"> <br>
                        

                        <label style = "color: black; margin-top: -10px;">Chọn ngày giao hàng</label> <br>
                        <input type="date" style="font-size: 15px;" name = "ship_date" value = "12-5-2004" id = "ship_date" value ="Ngày đặt tiệc*" title="Vui lòng chọn ngày đặt tiệc" required>

                        <input type="text" name = "address" id="address" placeholder="Địa chỉ giao hàng"> <br>
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
                                <p style="display: inline;" id = "total">Tổng cộng: 0đ</p>
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
    let img = document.querySelectorAll(".option1 img");
    let checks = document.getElementsByName("choose");
  
    for (let i = 0; i < checks.length; i++) {
      if (checks[i].checked) 
        {
        let name_food = names[i].innerText;
        let quantity = parseInt(quantities[i].value);
        // Remove non-numeric characters (like comma) from the price
        let price = parseInt(prices[i].innerText.replace(/\D/g, ''));
        let trans_price =formatNumber(price);
        let img_src = img[i].getAttribute("src");
        
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

    </div>
        