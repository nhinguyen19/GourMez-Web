<?php
    // session_start();

    $id=$_SESSION['id'];
  
    
    $host = "localhost";
    $username = "root";
    $password = "";
    $database = "gourmez_web";
    $conn = new mysqli($host, $username, $password, $database);

    if ($conn->connect_error) {
        die('Kết nối không thành công: ' . $conn->connect_error);
    } 
    $array= array();
    $sql="SELECT * FROM user WHERE user_id ='$id'";

    $kq=$conn->query($sql);

    if($kq->num_rows >0){
        while($row=$kq->fetch_row()){
            // return $row;
            if($row[4]==NULL){
                $array['fullname']='';
            }else{$array['fullname']=$row[4];}

            if($row[5]==NULL){
                $array['phone']='';
            }else{$array['phone']=$row[5];}

            if($row[6]==NULL){
                $array['address']='';
            }else{$array['address']=$row[6];}

            $array['user']=$row[1];
            $array['email']=$row[2];

            

        }
        $conn->close();
    }
    else{
        echo 'Không có thông tin';
        $conn->close();
    }




?>



<link rel="stylesheet" href="ql_taikhoan/thongtintaikhoan.css">
<div id="user_login" class="box-content" >
                

    <p>THÔNG TIN TÀI KHOẢN</p>
    <div class="form">
        <form method="Post" autocomplete="off" >
            
            <div class="info" name="fullname"><b>HỌ VÀ TÊN: </b><?php echo $array['fullname']?></div>
            
            <div class="info" name="username"><b>TÊN ĐĂNG NHẬP:</b> <?php echo $array['user']?></div>
            
            <div class="info" name="email"><b>EMAIL: </b><?php echo $array['email']?></div>
            
            <div class="info" name="phone"><b>SỐ ĐIỆN THOẠI: </b><?php echo $array['phone']?></div>
            
            <div class="info" name="address"><b>ĐỊA CHỈ:  </b><?php echo $array['address']?></div>
            
        </form>
        
    </div>
    <a href="tranghienthi.php?quanly=chinhsuathongtin">Chỉnh sửa</a>

    <a href="tranghienthi.php?quanly=doimatkhau">Đổi mật khẩu</a>
        
    
</div>

