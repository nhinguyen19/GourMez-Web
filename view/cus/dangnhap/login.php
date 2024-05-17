<?php
            session_start();
            // ob_start();
            // include '../view/cus/dangnhap/facebook_source.php';
            // include '../view/cus/dangnhap/google_source.php';
            // include ('../view/cus/header/header_trcDN.php');
            // include ('../view/cus/dangnhap/login_uname.php');
            
            $err=array();
        if(isset($_POST['dangnhap']) && ($_POST['dangnhap'])=='Đăng nhập')
        {

            $user_name=$_POST['user'];
            $pass=$_POST['password'];

            if(empty($user_name)){
                $err['name']='Bạn chưa nhập tên đăng nhập';
            }

            if(empty($pass)){
                $err['pass']='Bạn chưa nhập mật khẩu';
            }

            if(empty($err)){
                include ('login_uname.php');
            }
        }
        ?>
           <link rel="stylesheet" href="../view/cus/dangnhap/login.css">
           <!-- <link rel="stylesheet" href="login.css"> -->
           <script src="../view/cus/dangnhap/hienthi_mk.js"></script>
           <!-- <script src="hienthi_mk.js"></script> -->
           <link href='https://fonts.googleapis.com/css?family=Lalezar' rel='stylesheet'>
           <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"/>
            <div id="user_login" class="box-content" >
                
                <h2>Đăng nhập</h2>
                <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="Post" autocomplete="off" style="border: 1px solid rgba(255, 130, 67, 1);background-color: rgba(255, 130, 67, 1);border-radius: 20px;padding: 50px;">
                    
                    <table class="bang_dn">
                        
                        <!-- tên đăng nhập -->
                        <tr >
                            <td style="font-size:20px ">Tên đăng nhập</td>
                            <td><input type="text" id="user" name="user"></td>
                        </tr>
                            
                        <tr>
                            <td class="has-error" colspan="2">
                                <span><?php echo (isset($err['name']))?$err['name']:''?></span>
                            </td> 
                        </tr>

                        <!-- Mật khẩu -->
                        <tr>
                            <td style="font-size:20px ">Mật khẩu</td>
                            <td style="display: flex;align-items: center;">
                                <input type="password" id="password" name="password">
                                <span id="nosee" style="cursor: pointer;" onclick="showpass()" ><i class="fas fa-eye-slash" ></i></span>
                            </td>
                        </tr>

                        <tr>
                            <td class="has-error" colspan="2"> 
                                <span><?php echo (isset($err['pass']))?$err['pass']:''?></span>
                            </td> 
                        </tr>

                        <tr >
                            <td colspan="2" class="dn-bt"><input type="submit" id="dangnhap" name="dangnhap" value="Đăng nhập"></td>
                        </tr>

                    
                    </table>
                </form>

                <div class="mes_error" style="color: red;display: flex;align-items: center;text-align: center; justify-content: center;">
                    <?php 
                        
                        $text_error= isset($_SESSION['text_error']) && !empty($_SESSION['text_error']) ? $_SESSION['text_error'] : '';
                        if(isset($text_error)&&($text_error!=""))
                        {
                            echo "<h4 style=width:300px; >".$text_error."</h4>";
                        }
                        
                    ?> 
                </div> 

                <!-- //dangky/quenmatkhau -->
                <div class="dk-qmk">
                    <a href="tranghienthi.php?quanly=dangky">Đăng ký/</a>
                    <!-- <a href="../view/cus/dangky/register.php">Đăng ký/</a> -->
                    <a href="tranghienthi.php?quanly=quenmatkhau">Quên mật khẩu</a>
                    <!-- <a href="../view/cus/quenmatkhau/forgotpass.php">Quên mật khẩu</a> -->

                </div>
                
                <!-- //logo dang nhap -->
                <div id="login-with-social">
                
                    <?php if(isset($authUrl)){ ?>
                    <a href="<?= $authUrl ?>"><img src="../img/google.png" alt='google login' title="Google Login" height="40" width="160" /></a>
                    <!-- <a href="<?= $authUrl ?>"><img src="../view/cus/img/google.png" alt='google login' title="Google Login" height="50" width="250" /></a> -->
                    <?php } ?>
                </div>

                
            </div>
       
    