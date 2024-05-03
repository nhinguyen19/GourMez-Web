<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dịch vụ sinh nhật</title>
    <link rel = "stylesheet" href = "style_sn.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />
    <link href='https://fonts.googleapis.com/css?family=Lalezar' rel='stylesheet'>
    <script src = "sinhnhat.js"></script>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel = "stylesheet" href = "css/bootstrap-datepicker.css">


</head>

<body onload="showSlides()">
    <img src = "../img/sn_banner.png" class = "banner_sn">

    <div class="slideshow-container">

  <!-- Full-width images with number and caption text -->
    <div class="mySlides fade">
        <div class="numbertext">1 / 3</div>
        <img src="../img/slide1.png" style="width:100%">
    </div>

    <div class="mySlides fade">
        <div class="numbertext">2 / 3</div>
        <img src="../img/slide2.png" style="width:100%">
    </div>

    <div class="mySlides fade">
        <div class="numbertext">3 / 3</div>
        <img src="../img/slide3.png" style="width:100%">
    </div>

    <!-- Next and previous buttons -->
    <a class="prev"><i class="fas fa-chevron-left" style="color: #ff5700;"></i></a>
    <a class="next"><i class="fas fa-chevron-right" style="color: #ff5700;"></i></i></a>
    </div>
<br>
<!--The dots/circles  -->
    
    <div style="text-align:center">
    <span class="dot"></span>
    <span class="dot"></span>
    <span class="dot"></span>
    </div>

    <div class="food_order">
        <!-- Thanh đặt món -->
        <div class="food_label">
            <h1>ĐẶT MÓN ĂN</h1>

            <div class="full_menu">
                <?php
                    require("../../../model/connect.php");

                    $sql = "SELECT combo_name, price,img FROM combo_for_birthday";
                    $result = mysqli_query($conn, $sql);

                    if(!$result)
                    {
                        die("Lỗi". mysqli_error($conn));
                    }

                    if(mysqli_num_rows($result) > 0)
                    {
                        while($row = mysqli_fetch_assoc($result))
                        {
                            echo '<div class="option">';
                            echo '<img src="'.$row['img'].'">';
                            echo '<p name="name_of_food">' . $row['combo_name'] . '</p>';
                            echo 'Giá bán: <p name="price" style="color:rgba(253, 166, 93, 1); display: inline;">' . $row['price'] . 'đ</p><br>';
                            echo 'Số lượng: <input type="number" name="quantity" placeholder="10" min="10" step="1" max="50" title="Vui lòng nhập số lượng" required><br>';
                            echo 'Chọn: <input type ="radio" name = "choose" id = "choose" ><br>';
                            echo '</div>';

                        }
                    }
                ?>
            
            </div>
    </div>
        <!-- Thông tin khách hàng -->
        <div class = "cus_info">
            <div class = "info">
                <h2>THÔNG TIN KHÁCH HÀNG ĐẶT TIỆC</h2>
                <form id="form_customer" action="../../../controller/cus/xuli.php" method="post">


                    <input type = "text" name = "cusname" id = "customer_name" placeholder="Họ và tên*" title="Vui lòng nhập tên người đặt tiệc." > <br>
                    <input type = "tel" name = "tel" id = "phone_number" placeholder="Số điện thoại*" required pattern="[0-9]{10}" title="Số điện thoại phải là số, có 10 chữ số!"> <br>
                    <input type = "email" name = "email" id = "email" placeholder="Email"> <br>
                    <input type="text" name ="name_birthday" id = "name_birthday" placeholder="Tên đặt tiệc sinh nhật*" title="Vui lòng nhập tên người sinh nhật. " lang="vi" required> <br>
                    <label>Ngày sinh</label> <br>
                    <input type="date" style="font-size: 15px;" name = "birthday" id = "birthday" placeholder="Ngày sinh" class = "ngaysinh" title = "Vui lòng chọn ngày sinh" required> 
                    <!-- <span class = "icon" onclick="showCalendar()"><i class="far fa-calendar fa-lg" style="color: #ffffff;"></i></span> -->

                    


                    <select name = "gender" id = "gender">  
                        <option value="" hidden>Giới tính*</option>
                        <option value="Nữ">Nữ</option>
                        <option value="Nam">Nam</option>
                        <option value="Khác">Khác</option>
                    </select> <br>
                    <label>Chọn ngày đặt tiệc</label>
                    <input type="date" style="font-size: 15px;" name = "party_date" value = "12-5-2004" id = "party_date" value ="Ngày đặt tiệc*" title="Vui lòng chọn ngày đặt tiệc" required> <br>
                    <input type="text" name = "address" id="address" placeholder="Địa chỉ khách hàng"> <br>
                    <!-- <textarea id = "note" placeholder="Ghi chú"></textarea> -->
                    <input type="text" name = "note" id = "note" placeholder="Ghi chú"> <br>

                    <div class = "button">
                        <input type ="submit" name = "send" id = "send_order" value="Gửi đơn hàng" >
                        <div class = "button_reset">
                            <input type="reset" id = "reset" value = "Reset">
                        </div>
                    </div>

                    
                
                </form>
            </div>


            <div class = "info_payment">
                <h2>CHI TIẾT ĐƠN HÀNG</h2>
                <div class = "total_box">
                    <p style="display: inline;">Tổng cộng</p>
                    <p style="display: inline;" id = "total">0đ</p>
                </div>
                
            </div>
        
        </div>
        
       


        </div>

       

        <script>
            function add_food()
{
  let img = document.getElementsByTagName(img);
  let name = document.getElementsByName("name_of_food");
  let price = document.getElementsByName("price");
  let quantity = document.getElementsByName("quantity");

  window.open("","_blank");

}
        </script>
</body>
</html>