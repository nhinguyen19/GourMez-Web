<?php
    require("../model/connect.php");
    $conn = connectdb();
    $name = $_POST["cusname"];
    $tele = $_POST["tel"];
    $email = $_POST["email"];
    $name_birthday = $_POST["name_birthday"];
    $name_gender = $_POST["gender"];
    $party =  date('d/m/Y',strtotime($_POST["party_date"]));
    $address = $_POST["address"];
    $note = $_POST["note"];
    $food = $_POST["name_food"];
    $quantity = (int)$_POST["Last_quantity"];
    $price = $_POST["Last_price"];
    $price = preg_replace('/\D/', '', $price); //replace character which not number
    $Total_price = (int)$price;

   
    
    if (isset($_POST["send"]) && ($_POST["send"] == "Gửi đơn hàng")) {
        if ($food == "" || $quantity == 0 || $Total_price == null)
        {
            echo"<script>alert('Vui lòng chọn món ăn')</script>"; header('Location: tranghienthi.php?quanly=dichvu_sn');
           
            
        }
        else
        {
            $sql = "INSERT INTO birthday_service (customer_name, phone, email,name_order_party, booking_date, gender, address, note, name_food, quantity, total_price, status)
            VALUES ('$name', '$tele', '$email', '$name_birthday', STR_TO_DATE('$party', '%d/%m/%Y'), '$name_gender', '$address', '$note', '$food', '$quantity', '$Total_price', null)";
            if(mysqli_query($conn,$sql)) {
                echo "<script>alert('Đơn hàng của bạn đã được ghi nhận. Nhân viên cửa hàng sẽ sớm liên hệ'); window.location('tranghienthi.php') </script>";
                exit();  
            } 
            else 
            {
                echo '<script>alert("Đơn hàng bị lỗi, vui lòng nhập lại")</script>';
                header('Location: tranghienthi.php?quanly=1');
                echo "Lỗi: " . $sql . "<br>" . mysqli_error($conn);
            
            }
            mysqli_close($conn);

        // }
         }
        }
?>