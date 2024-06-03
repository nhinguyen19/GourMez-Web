<?php
function show_food()
    {
        if($_GET['quanly'] == 'giohangbigdeal')
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
                            <a style = "color:#1B4D3E;font-weight:bold;"href="tranghienthi.php?quanly=giohangbigdeal&delid='.$i.'">Xóa</a>
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
    else if ($_GET['quanly'] == 'giohangsn')
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
    }
function show_details()
{
    if($_GET['quanly'] == 'dathang_bigdeal')
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
                echo"<tr><td colspan = '3'>Giỏ hàng rỗng.Bạn đặt hàng thôi!</td></tr>";
            }
        }
}
else if ($_GET['quanly'] == 'dathang_sn')
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
                    <td>'.$_SESSION['giohangsn'][$i][1]. '</td>
                    <td>x '.$_SESSION['giohangsn'][$i][3]. '</td>
                    <td>
                        <div>'.$tt.'</div>
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
            echo"<tr><td colspan = '3'>Giỏ hàng rỗng.Bạn đặt hàng thôi!</td></tr>";
        }
    }
}
}
?>