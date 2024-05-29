<?php
    session_start();
    if(!isset($_SESSION['giohangsn'])) 
    {$_SESSION['giohangsn'] = [];}
    //xóa giỏ hàng
    if(isset($_GET['delcart'])&&($_GET['delcart']==1)) unset($_SESSION['giohangsn']);

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
                        <td><img style = "width:50px; height:50px" src = "../view/admin/ql_dichvu/uploads/'.$_SESSION['giohangsn'][$i][0].'"</td>
                        <td>'.$_SESSION['giohangsn'][$i][1]. '</td>
                        <td>'.$_SESSION['giohangsn'][$i][2]. '</td>
                        <td>'.$_SESSION['giohangsn'][$i][3]. '</td>
                        <td>
                            <div>'.$tt.'</div>
                        </td>
                        <td>
                            <a href="tranghienthi.php?quanly=giohangsn&delid='.$i.'">Xóa</a>
                        </td>

                    </tr>';
            
            }
            echo '<tr>
                    <th colspan = "5">Tổng đơn hàng</th>
                    <th>
                        <div>'.$tong.'</div>
                    </th>
                </tr>';
            }
            else
            {
                echo"<tr><td colspan = '6'>Giỏ hàng rỗng.Bạn đặt hàng thôi!</td></tr>";
            }
            // print_r($_SESSION['giohangsn']);
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
        border: 2px solid orangered;
        border-collapse: collapse;
        font-size: 18px;
        text-align: center;
    }

    th,td
    {
        width: 100px;
        padding: 5px;
    }

    button
    {
        background-color: rgba(73, 169, 111, 1);
        border-radius: 5px;
        border: none; 
        color: white;
        font-size: 15px;
        width: fit-content;
        height: 40px;
        padding: 5px;
        margin-left: 50px;
    }

    h2
    {
        margin-top: 30px;
        text-align: center;
        font-family: 'Lalezar';
        color:rgba(76, 158, 118, 1);
        font-size:30px;
    }

    h2:first-child
    {
        margin-top: 80px;
        margin-bottom:-20px;
    }

/*thông tin khách hàng*/
.cus_info
{
  background-color: rgba(255, 236, 203, 1);
  padding-top: 30px;
  justify-content: center;
  margin-left: 500px;
  margin-top: 10px;
}

::placeholder
{ font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    color: white;
    font-size: 15px;
    padding-left: 1;
  }

  #party_date
  {
    padding-right: 20px;
    width: 380px;
  }

  #gender
  {
    width: 100px;
    background-color: rgba(248, 127, 64, 1);
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
  input
  {
    background-color: rgba(248, 127, 64, 1);
    color:white;
    width: 500px;
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
        border-radius: 5px;
        border: none; 
        color: white;
        font-size: 18px;
        width: fit-content;
        height: 40px;
        padding: 5px;
        margin-left: 50px;
        font-weight:bolder;

  }
</style>

<form action = "" method = "post">
<!-- Thông tin khách hàng -->
<h2>THÔNG TIN KHÁCH HÀNG</h2>

    <div class = "cus_info">    
        <input type = "text" name = "cusname" id = "customer_name" placeholder="Họ và tên*" title="Vui lòng nhập tên người đặt tiệc." > <br>
        <input type = "tel" name = "tel" id = "phone_number" placeholder="Số điện thoại*" required pattern="[0-9]{10}" title="Số điện thoại phải là số, có 10 chữ số!"> <br>
        <input type = "email" name = "email" id = "email" placeholder="Email"> <br>
                      

        <label style = "color: black; font-family: 'Lalezar'; margin-bottom: 15px;">Chọn ngày tổ chức</label> <br>
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
    <h2>Thông tin đơn hàng</h2>
    <div style="margin-top: 20px; display:flex; justify-content:center">
        <table class = "table_food">
            <tr>
                <th>Hình ảnh</th>
                <th>Tên món</th>
                <th>Đơn giá</th>
                <th>Số lượng</th>
                <th>Thành tiền</th>
                <th>Xóa</th>
            </tr>
            <?php
                show_food();
            ?>
        </table>
    </div>

    <div style="display:flex; justify-content:center; margin-top:30px;">
        <input type = "submit" value="Đặt hàng" name = "dathang" class = "submitbutton"> <br>
    </div>

</form>
<div style = "display:flex; justify-content:center">
        <a href = "tranghienthi.php?quanly=giohangsn&delcart=1" style = "color: blue"><button>Xóa giỏ hàng dịch vụ </button></a>
        <a href = "tranghienthi.php?quanly=1"><button>Tiếp tục đặt hàng </button></a> <br>
</div>
        
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<?php
include('../controller/thuvien.php');
// include('../model/connect.php');
    if(isset($_POST['dathang'])&&($_POST['dathang']))
    {
        //lấy thông tin KH
        $ten = $_POST['cusname'];
        $sdt = $_POST['tel'];
        $email = $_POST['email'];
        $party_day = $_POST['party_date'];
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
            taogiohang($tenmon,$dongia,$soluong,$thanhtien,$id_bill);
        }

        

        //unset giỏ hàng session
        
        echo "<script>
        Swal.fire({
            icon: 'success',
            title: 'Đơn hàng đã được ghi nhận. 
            Nhân viên sẽ liên hệ bạn sau.',
            showConfirmButton: false,
            timer: 2500
        });
        </script>";
        // header('Location: tranghienthi.php?quanly=2');   
        unset($_SESSION['giohang']);
    }
    
?>
    
                      

