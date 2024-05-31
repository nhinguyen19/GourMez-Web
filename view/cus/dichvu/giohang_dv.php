<?php
    session_start();
    if(!isset($_SESSION['giohang'])) $_SESSION['giohang'] = [];
    // Xóa giỏ hàng
    $message = "";
    if (isset($_GET['delcart']) && ($_GET['delcart'] == 1)) {
        unset($_SESSION['giohang']);
        $message = "Giỏ hàng rỗng. Bạn đặt hàng thôi!";
    }
    //xóa sp
    if(isset($_GET['delid'])&&($_GET['delid']>=0)) 
    {
        array_splice($_SESSION['giohang'], $_GET['delid'],1);
    }

    //chuyển lại trang đặt món
    if (isset($_GET['continue_order']))
    {
        header('Location: tranghienthi.php?quanly=2');
    }
    function show_food()
    {
        //1: tên món  //2: đơn giá //3: số lượng //4: thành tiền
        if(isset($_SESSION['giohang'])&&(is_array($_SESSION['giohang'])))
        {
            if(sizeof($_SESSION['giohang'])>0)
            {
            $tong = 0;
            for($i=0; $i < sizeof($_SESSION['giohang']); $i++)
            {
                $tt =(int) $_SESSION['giohang'][$i][2]*(int)$_SESSION['giohang'][$i][3];
                $tong+= $tt;
                echo '<tr>
                        <td>'.$_SESSION['giohang'][$i][1]. '</td>
                        <td>x '.$_SESSION['giohang'][$i][3]. '</td>
                        <td>
                            <div>'.$tt.'</div>
                        </td>
                        <td>
                            <a style = "color:#1B4D3E;font-weight:bold;"href="tranghienthi.php?quanly=giohangdv&delid='.$i.'">Xóa</a>
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
    if(isset($_POST['datmonbigdeal'])&&($_POST['datmonbigdeal']))
    {
        $hinh = $_POST['hinhanh'];
        $tenmon = $_POST['tenmon'];
        $gia = (int)$_POST['giamon'];
        $soluong = (int)$_POST['soluong'];

        $flag = 0; //kiểm tra sp có trùng khong

        //kiểm tra sp có trong giỏ hàng
        for($i=0; $i< sizeof($_SESSION['giohang']); $i++)
        {
            if($_SESSION['giohang'][$i][1] == $tenmon)
            {
                $flag = 1; //tìm được sp
                $soluongnew = $soluong + $_SESSION['giohang'][$i][3];
                $_SESSION['giohang'][$i][3] = $soluongnew;
                break;
            }
        }

        //khong tìm thấy trùng trong giỏ hàng
        if($flag ==0)
        {
            //thêm sp vào giỏ hàng
            $monan = [$hinh,$tenmon,$gia,$soluong];
            $_SESSION['giohang'][] = $monan;
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

    /* button
    {
        background-color: rgba(73, 169, 111, 1);
        border-radius: 8px;
        border: none; 
        color: white;
        font-size: 20px;
        width: fit-content;
        height: 40px;
        padding: 8px;
        margin-left: 50px;
        font-family: 'Lalezar';
    } */

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
    padding: 35px 45px 35px 45px;
    background-color: rgba(255,255,255,0.8);
    border-radius: 40px;
    width: fit-content;
    height: fit-content;
    color: green;
    font-family: 'Lalezar';
    font-size: 25px;
    margin-left: 120px;
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
</style>

<div class = "body">
<form action = "" method = "post">
<!-- Thông tin khách hàng -->
<div class = "container">
    
    <div class = "cus_info">   

        <div class = "thongtinkh">
            <h2>THÔNG TIN KHÁCH HÀNG</h2> 
            <input type = "text" name = "cusname" id = "customer_name" placeholder="Họ và tên*" title="Vui lòng nhập tên người đặt tiệc." > <br>
            <input type = "tel" name = "tel" id = "phone_number" placeholder="Số điện thoại*" required pattern="[0-9]{10}" title="Số điện thoại phải là số, có 10 chữ số!"> <br>
            <input type = "email" name = "email" id = "email" placeholder="Email"> <br>
                        

            <label style = "color: black; font-family: 'Lalezar'; margin-bottom: 15px;">Chọn ngày giao hàng</label> <br>
            <input type="date" style="font-size: 15px;" name = "ship_date" value = "12-5-2004" id = "ship_date" value ="Ngày đặt tiệc*" title="Vui lòng chọn ngày đặt tiệc" required> <br>

            <input type="text" name = "address" id="address" placeholder="Địa chỉ giao hàng"> <br>
            <input type="text" name = "note" id = "note" placeholder="Ghi chú"> <br>
        </div>
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
            <a href = "tranghienthi.php?quanly=giohangdv&delcart=1">Xóa giỏ hàng</a>
            <a href = "tranghienthi.php?quanly=2">Tiếp tục đặt hàng</a> <br>
        </div>
    </div>   
    
 </div>
    <div style="display:flex; justify-content:center; margin-top:30px;">
        <input type = "submit" value="Đặt hàng" name = "dathangdv" class = "submitbutton"> <br>
    </div>

</form>

</div>      
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<?php
include('../controller/thuvien.php');
    if(isset($_POST['dathangdv'])&&($_POST['dathangdv']))
    {
        //lấy thông tin KH
        $ten = $_POST['cusname'];
        $sdt = $_POST['tel'];
        $email = $_POST['email'];
        $ship_day = $_POST['ship_date'];
        $diachi = $_POST['address'];
        $ghichu = $_POST['note'];

        $total = tongdonhang();

        $new_id = uniqid('bigdeal_');

        //insert đơn hàng -  tạo đơn hàng mới
        $id_bill = taodonhang($new_id,$ten,$sdt,$email,$ship_day,$diachi,$total,$ghichu);

        //insert vào order_item
        for($i=0; $i < sizeof($_SESSION['giohang']); $i++)
        {
            $tenmon = $_SESSION['giohang'][$i][1];
            $soluong = $_SESSION['giohang'][$i][3];
            $dongia = $_SESSION['giohang'][$i][2];
            $thanhtien = $dongia*$soluong;
            taogiohang_bigdeal($tenmon,$dongia,$soluong,$thanhtien,$id_bill);
        }

        

        //unset giỏ hàng session
        
        // echo "<script>
        // Swal.fire({
        //     icon: 'success',
        //     title: 'Đơn hàng đã được ghi nhận. 
        //     Nhân viên sẽ liên hệ bạn sau.',
        //     showConfirmButton: false,
        //     timer: 2500
        // });
        // </script>";
        // header('Location: tranghienthi.php?quanly=2');   
        unset($_SESSION['giohang']);
    }
    
?>
    
                      

