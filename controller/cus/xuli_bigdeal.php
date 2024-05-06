<?php
    require("../../model/connect.php");
    $name = $_POST["cusname"];
    $tele = $_POST["tel"];
    $email = $_POST["email"];
    $shipdate =  date('d/m/Y',strtotime($_POST["ship_date"]));
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
            header('Location: ../../view/cus/dichvu/dichvu_bigdeal.php?alert=empty'); //flag = empty -> chưa chọn món
        }
        else
        {
            $sql = "INSERT INTO bigdeal_service (name, phone,email, booking_date, address, note, food_name, quantity, total_price, status) 
            VALUES ('$name', '$tele','$email', STR_TO_DATE('$shipdate', '%d/%m/%Y'), '$address','$note', '$food','$quantity','$Total_price', NULL)";
            if(mysqli_query($conn,$sql)) {
                header('Location: ../../view/cus/dichvu/dichvu_bigdeal.php?alert=success'); //flag = success
                exit();
            } 
            else 
            {
                header('Location: ../../view/cus/dichvu/dichvu_bigdeal.php?alert = "unsuccess');  //flag = unsuccess
                echo "Lỗi: " . $sql . "<br>" . mysqli_error($conn);
            
            }
            mysqli_close($conn);

        // }
         }
        }
?>
