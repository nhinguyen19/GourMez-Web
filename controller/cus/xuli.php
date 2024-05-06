<?php
    require("../../model/connect.php");
    $name = $_POST["cusname"];
    $tele = $_POST["tel"];
    $email = $_POST["email"];
    $name_birthday = $_POST["name_birthday"];
    $gender = $_POST["gender"];
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
            header('Location: ../../view/cus/dichvu/dichvu_sn.php?alert=empty'); //flag = empty -> chưa chọn món
        }
        else
        {
            $sql = "INSERT INTO birthday_service (name_food, quantity, customer_name, phone, email, name_order_party, booking_date, gender, address, note, total_price, status) 
            VALUES ('$food', '$quantity','$name', '$tele', '$email', '$name_birthday', STR_TO_DATE('$party', '%d/%m/%Y'), '$gender', '$address', '$note', '$Total_price', NULL)";
            if(mysqli_query($conn,$sql)) {
                header('Location: ../../view/cus/dichvu/dichvu_sn.php?alert=success'); //flag = success
                exit();
            } 
            else 
            {
                header('Location: ../../view/cus/dichvu/dichvu_sn.php?alert = "unsuccess');  //flag = unsuccess
                echo "Lỗi: " . $sql . "<br>" . mysqli_error($conn);
            
            }
            mysqli_close($conn);

        // }
         }
        }
?>
