<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />
<?php
require("../model/connect.php");
$conn = connectdb();
?>

<script>
  function navigate()
  {
    window.location = "tranghienthi.php?quanly=giohangsn";
  }
</script>
<style>
    .banner_sinhnhat
    {
        width: 100%;
        height: 90%;
        margin-top: 80px;
    }

    /* Thanh đặt món */
.food_order
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
  margin-top: -5px;
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

 #datmonsinhnhat
 {
    background-color: rgba(252, 47, 19, 1);
    border-radius: 10px;
    border: none; 
    color: white;
    font-family: 'Lalezar';
    font-size: 20px;
    width: fit-content;
    padding: 5px;
    margin-bottom: 50px;

 }
   
  .button
  {
    display: flex;
    padding: 20px 0 20px 100px;
  }

.text_price
{
  font-size: 30px;
  padding-left: 50px;
  padding-top: 10px;
}

.text_info
{
  text-align: left;
  margin-left: 170px;
}
.giohangDV
{
  background-color: rgba(252, 47, 19, 1);
  width: fit-content;
  border-radius: 60px;
  border: none;
  padding: 18px;
  font-size: 24px;
  float: right;
}

</style>
        <!-- Thanh đặt món -->
        
          <?php
           $query = "SELECT banner FROM service WHERE id_service = '1'";
           $result = mysqli_query($conn, $query);
           
           if (!$result) {
               die('Invalid query: ' . mysqli_error($conn));
           }
           
           $img = mysqli_fetch_assoc($result);
           
           if ($img && isset($img['banner'])) {
               $bannerUrl = $img['banner'];
           } else {
               $bannerUrl = false;
           }
           ?>

           <img src="<?php echo htmlspecialchars('../view/admin/ql_dichvu/uploads/' . $bannerUrl); ?>" class="banner_sinhnhat">


            <h1>ĐẶT MÓN ĂN</h1>
            <div class="food_order" style = "font-family: 'Lalezar'">

            <div style = "margin-top: -20px; margin-right: 50px;margin-bottom: 100px;">
              <button class = "giohangDV" onclick="navigate()"><i class="fas fa-shopping-basket fa-lg" style="color: #ffffff;"></i></button>
            </div>

            <div class="food_label">
                <div class="full_menu">
                    <?php
                        $sql = "SELECT food_combo, price,image FROM food_for_service WHERE ID_service = '1'";
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
                                echo '<div class="text_info">';
                                echo '<p style = "margin-bottom: 0px">'. $row['food_combo'] .'</p>';
                                echo 'Giá bán: <p style="color:rgba(253, 166, 93, 1); display: inline; id =" ' . $row['price']. '">' . number_format($row['price'], 0, ',', '.') . 'đ</p><br>';
                                echo '<form action = "tranghienthi.php?quanly=giohangsn" method = "post">';
                                echo 'Số lượng: <input type="number" name="soluong" id = "quantity"  placeholder="10" min="10" step="1" title="Vui lòng nhập số lượng" style = "width: 60px; height: 30px; font-size:18px; margin-bottom:20px "required ><br>';
                                echo '<input type ="hidden" name = "tenmon" value = "'.$row['food_combo'].'">';
                                echo '<input type ="hidden" name = "giamon" value = "'.$row['price'].'">';
                                echo '<input type ="hidden" name = "hinhanh" value = "'.$row['image'].'">';
                                echo '</div>';
                                echo '<input type="submit" id  = "datmonsinhnhat"name = "datmonsinhnhat" value = "Đặt món">';
                                echo '</form>';
                                echo '</div>';
                            }
                        }
                    ?>
                
                </div>
        </div>
            

        </div>
                