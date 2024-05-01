<?php
$mysqli = new mysqli("localhost", "root", "", "gourmez_web");
if ($mysqli->connect_errno) {
    echo "Kết nối lỗi: " . $mysqli->connect_error;
    exit();
}

$htmlFile = '../menu/menu.html';

$htmlContent = file_get_contents($htmlFile);

$dom = new simplehtmldom\HtmlDocument();
$dom->load($htmlContent);

$foodElements = $dom->find('.food-item');

foreach ($foodElements as $foodElement) {
    $id_food = $foodElement->getAttribute('id');
    $cate_name = $foodElement->getAttribute('data-category');
    $food_name = $foodElement->find('.Ten_mon', 0)->plaintext;
    $price = $foodElement->find('.price', 0)->plaintext;
    $img_src = $foodElement->find('img', 0)->getAttribute('src');

    $query = "INSERT INTO food (id_food, cate_name, food_name, price, img) VALUES ('$id_food', '$id_cate', '$food_name', '$price','$img_src')";
    $result = $mysqli->query($query);

    if (!$result) {
        echo "Lỗi truy vấn: " . $mysqli->error;
    }
}
?>