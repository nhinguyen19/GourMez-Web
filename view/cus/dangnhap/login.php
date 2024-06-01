<?php
    // session_start();
    $err='';
    $host = "localhost";
    $username = "root";
    $password = "";
    $database = "gourmez_web";
    $conn = new mysqli($host, $username, $password, $database);

    if ($conn->connect_error) {
        die('Kết nối không thành công: ' . $conn->connect_error);
    } 
    if(isset($_POST['dangnhap']) && ($_POST['dangnhap'])=='Đăng nhập')
    {

        $user_name=trim($_POST['user']);
        $pass=trim($_POST['password']);

        if(empty($user_name)){
            $err='Bạn chưa nhập tên đăng nhập';
        }

        elseif(empty($pass)){
            $err='Bạn chưa nhập mật khẩu';
        }
        else {
            $stmt = $conn->prepare("SELECT user_id,password,role FROM user WHERE user_name=? ");
            $stmt->bind_param("s",$user_name);
            $stmt->execute();
            $stmt->store_result();
            if ($stmt->num_rows > 0) {
                $stmt->bind_result($id,$hashed_password,$role);
                $stmt->fetch();
                if (password_verify($pass, $hashed_password)) {
                    // session_start();
                    $_SESSION['id']=$id;
                    $_SESSION['user']=$user_name;
                    $_SESSION['role']=$role;
                    include('login_uname.php');
                    // exit();
                } else {
                    $err= 'Mật khẩu không đúng';
                }
            } else {
                $err= 'Tên đăng nhập không tồn tại';
            }
    
            $stmt->close();
        }
        
        
    }
    $conn->close();
?>
        <link rel="stylesheet" href="../view/cus/dangnhap/login.css">
        <!-- <link rel="stylesheet" href="login.css"> -->

        <script src="../view/cus/dangnhap/hienthi_mk.js"></script>
        <!-- <script src="hienthi_mk.js"></script> -->

        <link href='https://fonts.googleapis.com/css?family=Lalezar' rel='stylesheet'>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"/>
        
        <div class="box-content" >
            <img class="img" src="../view/cus/img/anhDN.png">
            <div class="form">
                <b class="dangnhap">ĐĂNG NHẬP</b><br>
                <form class="bang_dn" method="Post" autocomplete="off" >
                         
                <!-- tên đăng nhập -->
                    <div class="ten">
                    <label class="tittle1" >Tên đăng nhập</label><br>
                    <input type="text" id="user" name="user">
                    </div>
                    
                    
                <!-- Mật khẩu -->
                <div class="mk-icon">
                <div class="mk">
                    <label class="tittle2" >Mật khẩu</label><br>
                    <input type="password" id="password" name="password">
                </div>
                <span class="icon" id="nosee" style="cursor: pointer;" onclick="showpass()" ><i class="fas fa-eye-slash" ></i></span>
                </div>
                    
                        
                <input class="dn-bt" type="submit" id="dangnhap" name="dangnhap" value="Đăng nhập">
                </form>

                <?php
                        if (!empty($err)) {
                            echo '<p style="color:red;">' . htmlspecialchars($err) . '</p>';
                        }
                ?>


                <!-- //dangky/quenmatkhau -->
                <div class="dk-qmk">
                    <a href="tranghienthi.php?quanly=dangky">Đăng ký/</a>
                   
                    <a href="tranghienthi.php?quanly=quenmatkhau">Quên mật khẩu</a>
                   

                </div>
                
                <!-- //logo dang nhap -->
                <div id="login-with-social">
                
                    <?php if(isset($authUrl)){ ?>
                    <a href="<?= $authUrl ?>"><img src="../img/google.png" alt='google login' title="Google Login" height="40" width="160" /></a>
                    <!-- <a href="<?= $authUrl ?>"><img src="../view/cus/img/google.png" alt='google login' title="Google Login" height="50" width="250" /></a> -->
                    <?php } ?>
                </div>



            </div>
                
                
        </div>
       
    