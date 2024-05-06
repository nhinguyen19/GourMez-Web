
    <link rel = "stylesheet" href = "../view/cus/dichvu/style_dv.css">
    <div class ="container">
    <a href="dichvu_sn.php">abc</a>
    <img src="../view/cus/img/banner_dv.png" class = "banner">

    <div class = "birthday">
    <form method="POST" action="tranghienthi.php?quanly=dichvu_sn">
        <img src = "../view/cus/img/sinhnhat_icon.png">
        <div class = "content">
            <h3>ĐẶT TIỆC SINH NHẬT</h3>
            <p>Bạn đang phân vân không biết tổ chức sinh nhật như thế nào? Chuyện gì khó có Gourméz lo, Gourméz sẽ mang lại trải nghiệm tuyệt vời, thú vị, đáng nhớ dành cho bạn.</p>
            <button type="submit">Đặt tiệc</button>

        </div>   
    </form>
    </div>


    <div class = "big_order">
    <form method="POST" action="tranghienthi.php?quanly=dichvu_bigdeal">
        <img src = "../view/cus/img/bigdeal_icon.png">
        <div class = "content">
            <h1>Đơn hàng lớn</h1>
            <p>Để phục vụ sở thích quây quần cùng gia đình và bạn bè, chương trình chiết khấu hấp dẫn dành cho những đơn hàng lớn đã ra đời để đem đến những lựa chọn tiện lợi hơn cho bạn. Liên hệ ngay với cửa hàng gần nhất để được phục vụ.</p>
            <button type="submit">Đặt hàng</button>

        </div>
    </form>
    </div>

    </div>

    <script>
        function dieuhuong()
        {
            window.location.href = "../view/cus/dichvu/dichvu_sn.php";
        }
    </script>