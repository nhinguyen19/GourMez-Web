<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<?php
include_once('../view/cus/dichvu/function_dv.php');
include('../controller/xuly_dichvu.php');
    if(isset($_POST['dathangdv'])&&($_POST['dathangdv']))
    {
        //lấy thông tin KH
        $ten = $_POST['cusname'];
        $sdt = $_POST['tel'];
        $email = $_POST['email'];
        $ship_day = $_POST['ship_date'];
        $diachi = $_POST['address'];
        $ghichu = $_POST['note'];
        $ngaydathang = date('Y-m-d');

        $total = tongdonhang();

        $new_id = uniqid('bigdeal_');

        //insert đơn hàng -  tạo đơn hàng mới
        $id_bill = taodonhang($new_id,$ten,$sdt,$email,$ship_day,$diachi,$total,$ghichu,$ngaydathang);

        //insert vào order_item
        for($i=0; $i < sizeof($_SESSION['giohang']); $i++)
        {
            $tenmon = $_SESSION['giohang'][$i][1];
            $soluong = $_SESSION['giohang'][$i][3];
            $dongia = $_SESSION['giohang'][$i][2];
            $thanhtien = $dongia*$soluong;
            taogiohang_bigdeal($tenmon,$dongia,$soluong,$thanhtien,$id_bill);
        }

        unset($_SESSION['giohang']);
    }
    
?>
<style>
    h2
    {
        margin-top: 30px;
        text-align: center;
        font-family: 'Lalezar';
        color:black;
        font-size:30px;
    }

.body
  {
    background-image: url('/project/GourMez-Web/view/admin/ql_dichvu/uploads/background.png');
    padding-top: 20px;
    display: grid;
    grid-template-columns: 700px 700px;
  }

  .submitbutton
  {
        background-color: rgba(73, 169, 111, 1);
        border-radius: 8px;
        border: none; 
        color: white;
        font-size: 28px;
        width: 150px;
        height: fit-content;
        padding: 5px 10px 5px 10px;
        margin-left: 50px;
        font-family: 'Lalezar';
        margin-bottom: 50px;

  }

  /*thông tin khách hàng*/
.cus_info
{
    padding: 35px 45px 35px 45px;
    background-color: rgba(255,255,255,0.8);
    border-radius: 40px;
    width: fit-content;
    height: fit-content;
    color: green;
    font-family: 'Lalezar';
    font-size: 25px;
    margin-left: 120px;
    margin-top: 100px;
}

.food
{
    padding: 35px 30px 35px 30px;
    background-color: rgba(255,255,255,0.8);
    border-radius: 40px;
    width: fit-content;
    height: fit-content;
    color: #1B4D3E;
    font-family: 'Lalezar';
    font-size: 25px;
    margin-left: 120px;
    margin-top: 100px;
}
::placeholder
{ font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    color: white;
    font-size: 15px;
    padding-left: 1;
  }


  input 
  {
    background-color: rgba(174, 33, 8, 1);
    color:white;
    width: 430px;
    height: 40px;
    border: none;
    border-radius: 5px;
    margin-bottom: 15px;
    padding-left: 20px;
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
  }
  
  input:focus
  {
    outline: 1px solid gray ;
  }
  
  .info
  {
    padding-left: 200px;
    margin-top: 20px;
  }
  
  option
  {
    background-color: white;
    color: black;
  
  }

  table, th,td
    {
        text-align: center;
        font-size: 25px;
    }

    th,td
    {
        width: 120px;
        padding: 5px;
    }
</style>
<div class = "body">
    <div>
    <div class = "cus_info">   
    <form action = "#" method = "post">
        <h2>THÔNG TIN KHÁCH HÀNG</h2> 
        <input type = "text" name = "cusname" id = "customer_name" placeholder="Họ và tên*" title="Vui lòng nhập tên người đặt tiệc." > <br>
        <input type = "tel" name = "tel" id = "phone_number" placeholder="Số điện thoại*" required pattern="[0-9]{10}" title="Số điện thoại phải là số, có 10 chữ số!"> <br>
        <input type = "email" name = "email" id = "email" placeholder="Email"> <br>
                    

        <label style = "color: black; font-family: 'Lalezar'; margin-bottom: 15px;font-size:20px;">Chọn ngày giao hàng</label> <br>
        <input type="date" style="font-size: 15px;" name = "ship_date" value = "12-5-2004" id = "ship_date" value ="Ngày giao hàng*" title="Vui lòng chọn ngày đặt tiệc" required> <br>

        <input type="text" name = "address" id="address" placeholder="Địa chỉ giao hàng"> <br>
        <input type="text" name = "note" id = "note" placeholder="Ghi chú"> <br>
    </div>

        <div style=" margin-top:30px; margin-left: 250px;">
            <input type = "submit" value="Đặt dịch vụ" name = "dathangdv" class = "submitbutton"> <br>
        </div>
    </form>
    </div>

    <div class = "food">
            <h2>THÔNG TIN ĐƠN HÀNG</h2> 
            <table class = "table_food">
                <tr>
                    <th></th>
                    <th></th>
                    <th></th>
                </tr>

                <?php
                    if (!empty($message)) {
                        echo "<tr><td colspan='4' class='message'>$message</td></tr>";
                    }
                ?>

                <?php
                    show_details();
                ?>
            </table>
        </div>
</div>


 