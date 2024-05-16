
<style>
    .banner
    {
        width: 100%;
        height: 90%;
        margin-top: 90px;

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
    width: 600px;
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
            <div class="food_order" style = "font-family: 'Lalezar'">

            <div class="food_label" style = "border: 1px solid yellow">
                <h1>ĐẶT MÓN ĂN</h1>

                <div class="full_menu">
                    <?php
                        require("../model/connect.php");
                        $conn = connectdb();
        
                        $sql = "SELECT food_combo, price,image FROM food_for_service WHERE ID_service = '2'";
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
                                echo '<img name = "image" src="../view/admin/ql_dichvu/uploads/' . $row['image'] . '">';
                                echo '<div class="text">';
                                echo '<p name="name_of_food">'. $row['food_combo'] .  '</p>';
                                echo 'Giá bán: <p name="price" style="color:rgba(253, 166, 93, 1); display: inline; id =" ' . $row['price']. '">' . number_format($row['price'], 0, ',', '.') . 'đ</p><br>';
                                echo 'Số lượng: <input type="number" name="quantity" id = "quantity"  placeholder="1" value="1" min="1" step="1" max="50" title="Vui lòng nhập số lượng" onchange = "get_info_food()" required ><br>';
                                echo 'Chọn <input type="checkbox" name="choose" id="choose'.$counter.'" onclick="get_info_food()" required title="Vui lòng chọn món">';
                                echo '</div>';
                                echo '</div>';
                            }
                        }
                    ?>
                
                </div>
        </div>
            <!-- Thông tin khách hàng -->
            <div class = "cus_info">
                
                    
                    <form id="form_customer" action="../controller/xuli_bigdeal.php" method="post">
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
                        <input type="hidden" name = "Tongcong" id ="tongcong">
                    </form>
                </div>

        </div>
                

 <script>
    

let selected_food = [];
function formatNumber(number) {
    return number.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
  }

  function get_info_food() {
  let names = document.getElementsByName("name_of_food");
  let prices = document.getElementsByName("price");
  let quantities = document.getElementsByName("quantity");
  let img = document.querySelectorAll(".option1 img");
  let checks = document.getElementsByName("choose");

  let sum_money = 0;

  for (let i = 0; i < checks.length; i++) {
    if (checks[i].checked) {
      let name_food = names[i].innerText;
      let quantity = parseInt(quantities[i].value);
      let price = parseInt(prices[i].innerText.replace(/\D/g, ''));
      let trans_price = formatNumber(price);
      let img_src = img[i].getAttribute("src");
      let total_price = quantity * price;

      selected_food.push({
        ten: name_food,
        soluong: quantity,
        dongia: trans_price,
        thanhtien: quantity * price,
        hinhanh: img_src
      });

      sum_money += quantity * price;
    }
  }

  // update_order(selected_food);

  let totalBox = document.getElementById('totalBox');
  totalBox.innerHTML="";

  selected_food.forEach(food => {
    let foodItem = document.createElement('div');
    foodItem.classList.add('food_item');
    foodItem.innerHTML = `
      <img src="${food.hinhanh}" style="display:inline; width: 80px; height: 80px; margin-left: 10px">
      <p name="bigdeal_food" style="display:inline; margin-right: 30px; margin-left: 15px">${food.ten}</p>
      <p style="display:inline; margin-left:20px">x</p>
      <p style="display:inline; name="bigdeal_quantity">${food.soluong}</p>
      <p style="display:inline; margin-left: 20px name = "bigdeal_money">${formatNumber(food.dongia)}</p>
      <p style="display:inline; margin-left: 20px name = "bigdeal_total">${formatNumber(food.thanhtien)}</p>
      <hr>
    `;

    totalBox.appendChild(foodItem);
  });

    let text = document.createElement("p");
  
        text.classList.add("text_price");
        text.setAttribute("name","Tongcong");
        text.innerHTML = "Tổng cộng: " + formatNumber(sum_money);
        totalBox.appendChild(text);

    
    let Tong =document.getElementById("tongcong");
    Tong.value = sum_money;

    insertDataToDatabase(selected_food);
  }

  function insertDataToDatabase(selected_food) {
  var xhr = new XMLHttpRequest();
  xhr.open('POST', 'xuli.php', true);
  xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
  xhr.onreadystatechange = function() {
    if (xhr.readyState === 4 && xhr.status === 200) {
      var response = xhr.responseText;
      console.log(response);
    }
  };

  // Chuyển đổi mảng selected_food thành chuỗi JSON
  var jsonData = JSON.stringify(selected_food);

  // Gửi yêu cầu AJAX đến insert_data.php
  xhr.send('data=' + encodeURIComponent(jsonData));
  return true;
}
  </script>