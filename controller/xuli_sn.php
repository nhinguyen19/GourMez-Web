<?php
    require("../model/connect.php");
    $name = $_POST["cusname"];
    $tele = $_POST["tel"];
    $email = $_POST["email"];
    $name_birthday = $_POST["name_birthday"];
    $name_gender = $_POST["gender"];
    $birthday =  date('d/m/Y',strtotime($_POST["birthday"]));
    $party =  date('d/m/Y',strtotime($_POST["party_date"]));
    $address = $_POST["address"];
    $note = $_POST["note"];

   
    if (isset($_POST["send"]) && ($_POST["send"] == "Gửi đơn hàng")) {
        echo"abc";
        $sql = "INSERT INTO birthday_service (customer_name, phone_number, email, party_name, birthday, party_date, gender, address, note)
            VALUES ('$name', '$tele', '$email', '$name_birthday', '$birthday', '$party', '$name_gender', '$address', '$note')";
        if(mysqli_query($conn,$sql)) {
            echo "Thêm thành công";
        } else {
            echo "Lỗi: " . $sql . "<br>" . mysqli_error($conn);
        }
        mysqli_close($conn);
    }
?>