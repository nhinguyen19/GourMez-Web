<?php
    session_start();
    if(!isset($_SESSION['giohangsn'])) $_SESSION['giohangsn'] = [];
    // Xóa giỏ hàng
    $message = "";
    if (isset($_GET['delcart']) && ($_GET['delcart'] == 1)) {
        unset($_SESSION['giohangsn']);
        $message = "Giỏ hàng rỗng. Bạn đặt hàng thôi!";
    }
    //xóa sp
    if(isset($_GET['delid'])&&($_GET['delid']>=0)) 
    {
        array_splice($_SESSION['giohangsn'], $_GET['delid'],1);
    }

    //chuyển lại trang đặt món
    if (isset($_GET['continue_order']))
    {
        header('Location: tranghienthi.php?quanly=1');
    }
    function show_food()
    {
        //1: tên món  //2: đơn giá //3: số lượng //4: thành tiền
        if(isset($_SESSION['giohangsn'])&&(is_array($_SESSION['giohangsn'])))
        {
            if(sizeof($_SESSION['giohangsn'])>0)
            {
            $tong = 0;
            for($i=0; $i < sizeof($_SESSION['giohangsn']); $i++)
            {
                $tt =(int) $_SESSION['giohangsn'][$i][2]*(int)$_SESSION['giohangsn'][$i][3];
                $tong+= $tt;
                echo '<tr>
                        <td>'.$_SESSION['giohangsn'][$i][1]. '</td>
                        <td>x '.$_SESSION['giohangsn'][$i][3]. '</td>
                        <td>
                            <div>'.$tt.'</div>
                        </td>
                        <td>
                            <a style = "color:#1B4D3E;font-weight:bold;"href="tranghienthi.php?quanly=giohangsn&delid='.$i.'">Xóa</a>
                        </td>

                    </tr>';
            
            }
            echo '<tr>
                    <th  style = "color:rgba(174, 33, 8, 1);padding-top: 25px; font-size: 28px;" colspan = "2">Tổng đơn hàng</th>
                    <th>
                        <div  style = "padding-top: 25px;font-size:28px;">'.$tong.'</div>
                    </th>
                </tr>';
            }
            else
            {
                echo"<tr><td colspan = '4'>Giỏ hàng rỗng.Bạn đặt hàng thôi!</td></tr>";
            }
        }
    }

    //lấy dữ liệu từ form
    if(isset($_POST['datmonsinhnhat'])&&($_POST['datmonsinhnhat']))
    {
        $hinh = $_POST['hinhanh'];
        $tenmon = $_POST['tenmon'];
        $gia = (int)$_POST['giamon'];
        $soluong = (int)$_POST['soluong'];

        $flag = 0; //kiểm tra sp có trùng khong

        //kiểm tra sp có trong giỏ hàng
        for($i=0; $i< sizeof($_SESSION['giohangsn']); $i++)
        {
            if($_SESSION['giohangsn'][$i][1] == $tenmon)
            {
                $flag = 1; //tìm được sp
                $soluongnew = $soluong + $_SESSION['giohangsn'][$i][3];
                $_SESSION['giohangsn'][$i][3] = $soluongnew;
                break;
            }
        }

        //khong tìm thấy trùng trong giỏ hàng
        if($flag ==0)
        {
            //thêm sp vào giỏ hàng
            $monan = [$hinh,$tenmon,$gia,$soluong];
            $_SESSION['giohangsn'][] = $monan;
        }
             

    }

    
?>

<style>
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

    h2
    {
        margin-top: 30px;
        text-align: center;
        font-family: 'Lalezar';
        color:black;
        font-size:30px;
    }

/*thông tin khách hàng*/
.cus_info
{
    background-color: rgba(255,255,255,0.8);
    border-radius: 40px;
    color: green;
    width: 500px;
    height: fit-content;
    font-family: 'Lalezar';
    font-size: 25px;
    margin-left: 150px;
    padding: 20px 20px 40px 20px;
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
    margin-left: 20px;
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

  .giohang
  {
    padding: 35px 45px 35px 45px;
    background-color: rgba(255,255,255,0.8);
    border-radius: 40px;
    width: fit-content;
    height: fit-content;
    color: #1B4D3E;
    font-family: 'Lalezar';
    margin-left: 50px;
  }

  .container
  {
    display: grid;
    grid-template-columns: 800px 600px;
    margin-top: 120px;
  }

  .body
  {
    background-image: url('/project/GourMez-Web/view/admin/ql_dichvu/uploads/background.png');
    padding-top: 20px;
  }

  .buttons a
  {
        background-color: rgba(73, 169, 111, 1);
        border-radius: 8px;
        border: none; 
        color: white;
        font-size: 20px;
        width: fit-content;
        height: fit-content;
        padding: 8px 5px 8px 5px;
        margin-left: 50px;
        font-family: 'Lalezar';
        text-decoration: none;
  }

  #party_date
  {
    width: 310px;
    padding-right: 20px;
  }

  #gender
  {
    width: 100px;
    background-color: rgba(174, 33, 8, 1);
    color:white;
    width: 90px;
    height: 40px;
    border: none;
    border-radius: 5px;
    margin-bottom: 15px;
    margin-left: 10px;
    padding-left: 10px;
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
  }

</style>

<div class = "body">
<form action = "" method = "post">
<!-- Thông tin khách hàng -->
<div class = "container">
    
    <div class = "cus_info">   
            <h2>THÔNG TIN KHÁCH HÀNG</h2> 
            <input type = "text" name = "cusname" id = "customer_name" placeholder="Họ và tên*" title="Vui lòng nhập tên người đặt tiệc." > <br>
            <input type = "tel" name = "tel" id = "phone_number" placeholder="Số điện thoại*" required pattern="[0-9]{10}" title="Số điện thoại phải là số, có 10 chữ số!"> <br>
            <input type = "email" name = "email" id = "email" placeholder="Email"> <br>
            
            <input type = "text" name = "order_name" id = "order_name" placeholder="Tên người tổ chức*" title="Vui lòng nhập tên người tổ chức." > <br>

            <label style = "color: black; font-size: 20px; font-family: 'Lalezar';margin:0 0 0 20px">Chọn ngày đặt tiệc</label> <br>
            <input type="date" style="font-size: 15px;" name = "party_date" value = "12-5-2004" id = "party_date" value ="Ngày đặt tiệc*" title="Vui lòng chọn ngày đặt tiệc" required>

            <select name = "gender" id = "gender">
                <option value  = "" disabled selected>Giới tính</option>
                <option value = "nữ">Nữ</option>
                <option value  = "nam">Nam</option>
                <option value = "khác">Khác</option>
            </select>

            <input type="text" name = "address" id="address" placeholder="Địa chỉ giao hàng"> <br>
            <input type="text" name = "note" id = "note" placeholder="Ghi chú"> <br>
        
    </div> 
                      
    
    <!-- Thông tin đơn hàng -->
    <div>
    <div class = "giohang" style="margin-top: 20px;display: flex; flex-direction: column; align-items: center;">
        <div>
            <h2>THÔNG TIN ĐƠN HÀNG</h2>
        </div>
        
        <div>
            <table class = "table_food">
                <tr>
                    <th></th>
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
                    show_food();
                ?>
            </table>
        </div>
    </div>
        <div class = "buttons" style = "display:flex; justify-content:center; margin-top: 30px;">
            <a href = "tranghienthi.php?quanly=giohangsn&delcart=1">Xóa giỏ hàng</a>
            <a href = "tranghienthi.php?quanly=1">Tiếp tục đặt hàng</a> <br>
        </div>
    </div>   
    
 </div>
    <div style="display:flex; justify-content:center; margin-top:30px;">
        <input type = "submit" value="Đặt hàng" name = "dathangsn" class = "submitbutton"> <br>
    </div>

</form>

</div>      
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<?php
include('../controller/thuvien.php');
    if(isset($_POST['dathangsn'])&&($_POST['dathangsn']))
    {
        //lấy thông tin KH
        $ten = $_POST['cusname'];
        $sdt = $_POST['tel'];
        $email = $_POST['email'];
        $name_sn = $_POST['order_name'];
        $gioitinh = $_POST['gender'];
        $party_day = $_POST['party_date'];
        $diachi = $_POST['address'];
        $ghichu = $_POST['note'];

        $total = tongdonhang_sinhnhat();

        $new_id = uniqid('sinhnhat_');

        //insert đơn hàng -  tạo đơn hàng mới
        $id_bill = taodonhang_sinhnhat($new_id,$ten,$sdt,$email,$name_sn,$gioitinh,$party_day,$diachi,$total,$ghichu);

        //insert vào order_item
        for($i=0; $i < sizeof($_SESSION['giohangsn']); $i++)
        {
            $tenmon = $_SESSION['giohangsn'][$i][1];
            $soluong = $_SESSION['giohangsn'][$i][3];
            $dongia = $_SESSION['giohangsn'][$i][2];
            $thanhtien = $dongia*$soluong;
            taogiohang_sinhnhat($tenmon,$dongia,$soluong,$thanhtien,$id_bill);
        }

        

        //unset giỏ hàng session
        
        // header('Location: tranghienthi.php?quanly=2');   
        unset($_SESSION['giohangsn']);
    }
    
?>
    
                      

