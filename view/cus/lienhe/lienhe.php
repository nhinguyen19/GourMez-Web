<?php
function connectdb()
{
    $host = "localhost";
    $username = "root";
    $password = "";
    $database = "gourmez_web";
    $conn = new mysqli($host, $username, $password, $database);

    if ($conn->connect_error) {
        die('Kết nối không thành công: ' . $conn->connect_error);
    }
    return $conn;
}
?>
<style>
    .contact-info {
        display: flex;
        justify-content: space-between;
    }

    .contact-details,

    .google-map {
        margin-right: 90px;
    }

    .contact-details table {
        font-family: Lalezar;
        margin-left: 20px;
    }
    input{
        width: 400px;
        border-radius:5px; 
        height: 30px; 
        border:none;
        padding-left:5px;
        background-color: #F5EAD7;
    }
    .btn_gui{
        border:none;
        background-color: #2480ED; 
        color: white; 
        font-size:20px; 
        border-radius:10px;
        padding-left:5px; 
        width: 50px;
        font-family: Lalezar;
        border:none"
    }
    .btn_gui:hover:not(.active) {
    background-color: #ffb84d;
    transition: background-color 0.3s ease;
}
</style>
<div class="content">
        <?php echo '<h1 style="font-family: Lalezar;margin-top:130px; color: #E7B037; text-align:center;">LIÊN HỆ GOURMÉZ</h1>'; ?>
        <div class="contact-info">
            <div class="contact-details">
                <?php
                    $conn = connectdb();
                    $sql_lietke_lienhe = "SELECT * FROM contacts";
                    $query_lietke_lienhe = $conn->query($sql_lietke_lienhe);

                    echo '<ul id="tatca_thongtin">';
                    echo '<table class="tb_lienhe">';
                    echo '<tr><td style="font-size: 20px; color: #E7B037;">Thông tin liên hệ: </td></tr>';

                    while ($row = $query_lietke_lienhe->fetch_assoc()) {
                        echo '<tr><td style="padding-top:10px"><i class="fas fa-user" style="border: 1px solid white; background-color: white; padding: 5px; border-radius: 50%"></i><span style="padding-left: 15px;color:#ffff">' . $row['ResName'] . '</span></td></tr>';
                        echo '<tr><td style="padding-top:10px"><i class="fas fa-phone-alt" style="border: 1px solid white; background-color: white; padding: 5px; border-radius: 50%"></i><span style="padding-left: 15px;color:#ffff">' . $row['ResPhoneNumber'] . '</span></td></tr>';
                        echo '<tr><td style="padding-top:10px"><i class="fas fa-map-marker-alt" style="border: 1px solid white; background-color: white; padding: 5px; border-radius: 50%"></i><span style="padding-left: 5px;color:#ffff"></i><span style="padding-left: 15px">' . $row['ResAddress'] . '</span></td></tr>';
                        echo '<tr><td style="padding-top:10px"><i class="fas fa-envelope" style="border: 1px solid white; background-color: white; padding: 5px; border-radius: 50%"></i><span style="padding-left: 0px"></i><span style="padding-left: 15px;color:#ffff">' . $row['ResEmail'] . '</span></td></tr>';
                    }

                    echo '<tr><td style="font-size: 20px; color: #E7B037;; padding-top: 10px">Gửi tin nhắn cho chúng tôi: </td></tr>';
                    echo '<form method="POST" action="tranghienthi.php?quanly=lienhe">';
                    echo '<tr><td><input type="text" id="name" name="tenkhachhang" placeholder="Họ và tên"></td></tr>';
                    echo '<tr><td><input type="text" id="phone" name="sodienthoai" placeholder="Số điện thoại"></td></tr>'; 
                    echo '<tr><td colspan="2"><input type="text" id="mail" name="mailkhachhang" placeholder="Địa chỉ email*"></td></tr>';
                    echo '<tr><td colspan="2"><input id="message" name="tinnhan" placeholder="Tin nhắn"></td></tr>';
                    echo '<tr><td style="text-align: center;"><button type="submit" name="gui" class="btn_gui" >Gửi</button></td></tr>';
                    echo '</form>';

                    echo '</table>';
                    echo '</ul>';

                    $conn->close();
                ?>
            </div>
            <div class="google-map">
                <div id="map-container">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3903.387049790095!2d108.4567228743034!3d11.947682136500624!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3171131d886ead69%3A0x46a4d17dbd0acfaf!2zNDcgUXVhbmcgVHJ1bmcsIFBoxrDhu51uZyA5LCBUaMOgbmggcGjhu5EgxJDDoCBM4bqhdCwgTMOibSDEkOG7k25nLCBWaeG7h3QgTmFt!5e0!3m2!1svi!2s!4v1715954425734!5m2!1svi!2s" width="500" height="440" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
            </div>
        </div>
    </div>

