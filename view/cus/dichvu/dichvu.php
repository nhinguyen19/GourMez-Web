<!-- <link rel="stylesheet" href="../dichvu/style_dv.css"> -->

<style>

@font-face {
  font-family: 'Lalezar';
  src: url('https://fonts.googleapis.com/css2?family=Lalezar&display=swap');
}
.container
{
    font-family: 'Lalezar';
}
.birthday
{
    display: grid;
    width: 1360px;
    grid-template-columns: 500px 700px;
    background-color: rgba(251, 229, 218, 1);
    margin-left: 50px;
    padding: 50px;
    border: 1px solid yellowgreen;
}

.birthday img
{
    width: 400px;
    height: 400px;
    padding-left: 30px;
}

.content
{
    width: 480px ;
    padding-left: 50px;
    justify-content: center;
    align-items: center;
    text-align:justify;
    font-size: medium;
    line-height: 30px;
    padding-top: 60px;
}

.content h3
{
    color: orangered;
    font-family: 'Lalezar';
    font-size: 40px;
}

.content p
{
    color: grey;
    font-family: 'Times New Roman', Times, serif;
    font-size: 25px;
}

button
{
    width: fit-content;
    height: 50px;
    background-color: rgba(252, 47, 19, 1);
    border-radius: 30px;
    border-color: rgba(252, 47, 19, 1) ;
    color: white;
    font-size: 25px;
    padding-left: 10px;
    padding-right: 10px;
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif'
}

.big_order
{
    display: grid;
    width: 1360px;
    grid-template-columns: 500px 700px;
    background-color: rgba(239, 255, 242, 1);
    margin-left: 50px;
    padding: 50px;
    border: 1px solid yellowgreen;
}

.big_order img
{
    width: 400px;
    height: 400px;
    padding-left: 30px;
}

.big_order h1
{
    color: rgba(21, 156, 51, 1);
    font-family: 'Lalezar';
    font-size: 40px;
}


</style>
<div class="container" style=" margin: 10px">
    <img src="../view/cus/img/banner_dv.png" style="width:1400px; height: 700px;align-items: center; margin-left: 10px">

    <form method="POST" action="tranghienthi.php?quanly=dichvu_sn" >
        <div class="birthday">
            <img src="../view/cus/img/sinhnhat_icon.png">
            <div class="content">
                <h3 style="color: orangered">ĐẶT TIỆC SINH NHẬT</h3>
                <p>Bạn đang phân vân không biết tổ chức sinh nhật như thế nào? Chuyện gì khó có Gourméz lo, Gourméz sẽ mang lại trải nghiệm tuyệt vời, thú vị, đáng nhớ dành cho bạn.</p>
                <button type="submit">Đặt hàng</button>
            </div>
        </div>
    </form>

    <form method="POST" action="tranghienthi.php?quanly=dichvu_bigdeal">
        <div class="big_order">
            <img src="../view/cus/img/iconbigdeal.png">
            <div class="content">
                <h1>Đơn hàng lớn</h1>
                <p>Để phục vụ sở thích quây quần cùng gia đình và bạn bè, chương trình chiết khấu hấp dẫn dành cho những đơn hàng lớn đã ra đời để đem đến những lựa chọn tiện lợi hơn cho bạn. Liên hệ ngay với cửa hàng gần nhất để được phục vụ.</p>
                <button type="submit">Đặt hàng</button>
            </div>
        </div>
    </form>
</div>

<script>
    function dieuhuong() {
        window.location.href = "../view/cus/dichvu/dichvu_sn.php";
    }
</script>
