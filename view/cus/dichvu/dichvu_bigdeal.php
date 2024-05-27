
<style>
    .banner
    {
        width: 100%;
        height: 90%;
        margin-top: 90px;
        margin-left: -40px;

    }

    /* Thanh đặt món */
.food_label
{
  background-color: rgba(255, 242, 242, 1);
  padding-bottom: 50px;
  padding-top: 50px;
}

h1
{
  display: flex;
  justify-content: center;
  text-align: center;
  font-family: 'Lalezar';
  align-items: center;
  background-color: rgba(174, 33, 8, 1);
  color: white;
  margin-top: 0px;
  margin-bottom: 0px;
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
    text-align: center;
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
    width: 800px;
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
  
 #datmonbigdeal
 {
   background-color: rgba(252, 47, 19, 1);
    border-radius: 10px;
    border: none; 
    color: white;
    font-family: 'Lalezar';
    font-size: 20px;
    width: fit-content;
    padding: 5px;

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
            <h1>ĐẶT MÓN ĂN</h1>
            <div class="food_order" style = "font-family: 'Lalezar'">

            <div class="food_label">
                

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
                                echo '<div class="option">';
                                echo '<img name = "image" src="../view/admin/ql_dichvu/uploads/' . $row['image'] . '">';
                                echo '<div class="text">';
                                echo '<p style = "margin-bottom: 0px">'. $row['food_combo'] .'</p>';
                                echo 'Giá bán: <p style="color:rgba(253, 166, 93, 1); display: inline; id =" ' . $row['price']. '">' . number_format($row['price'], 0, ',', '.') . 'đ</p><br>';
                                echo '<form action = "tranghienthi.php?quanly=giohangdv" method = "post">';
                                echo 'Số lượng: <input type="number" name="soluong" id = "quantity"  placeholder="1" value="1" min="1" step="1" max="50" title="Vui lòng nhập số lượng" style = "width: 60px; height: 30px; font-size:18px; margin-bottom:20px "required ><br>';
                                echo '<input type ="hidden" name = "tenmon" value = "'.$row['food_combo'].'">';
                                echo '<input type ="hidden" name = "giamon" value = "'.$row['price'].'">';
                                echo '<input type ="hidden" name = "hinhanh" value = "'.$row['image'].'">';
                                echo '<input type="submit" id  = "datmonbigdeal"name = "datmonbigdeal" value = "Đặt món">';
                                echo '</form>';
                                echo '</div>';
                                echo '</div>';
                            }
                        }
                    ?>
                
                </div>
        </div>
            

        </div>
                