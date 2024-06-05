<?php
    include_once('../view/cus/dichvu/function_dv.php');
    // session_start();
    if(!isset($_SESSION['giohangsn'])) $_SESSION['giohangsn'] = [];
    // Xóa giỏ hàng
    $message = "";
    if (isset($_GET['delcart']) && ($_GET['delcart'] == 1)) {
        unset($_SESSION['giohangsn']);
        $message = "Đơn hàng trống. Đặt hàng thôi nào!";
        
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


    .submitbutton
  {
        background-color: rgb(180 33 6);
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
    margin-left: 100px;
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
<form action = "tranghienthi.php?quanly=dathang_sn" method = "post">

<div class = "container">
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
    <div style="margin-top:40px; margin-left: 300px;">
        <input type = "submit" value="Đặt hàng" class = "submitbutton"> <br>
    </div>

</form>

</div>      


