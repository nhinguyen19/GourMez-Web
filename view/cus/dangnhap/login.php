        <?php
            session_start();
            include 'facebook_source.php';
            include 'google_source.php';
            include '../header/header_trcDN.php';
            include 'login_uname.php';
            
        ?>
           <link rel="stylesheet" href="login.css">
           <link rel="stylesheet" href="../header/header.css">
           <script src="hienthi_mk.js"></script>
           <link href='https://fonts.googleapis.com/css?family=Lalezar' rel='stylesheet'>
            <div id="user_login" class="box-content" >
                <div class="xinchao"style="display: flex; align-items: center;text-align: center;justify-content: center;">
                    <img src="../img/logocus.png" style="width: 160px;height: 160px; margin-right: 10px;">
                    <p style="font-family: Langar; font-size:26px " >XIN CHÀO</p>
                </div>
                <h2>Đăng nhập</h2>
                <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="Post" autocomplete="off" style="border: 1px solid rgba(255, 130, 67, 1);background-color: rgba(255, 130, 67, 1);border-radius: 20px;padding: 50px;">
                    
                    <table class="bang_dn">
                        <tr >
                            <td style="font-size:22px ">Tên đăng nhập</td>
                            <td><input type="text" id="user" name="user"></td>
                        </tr>
                            
                        <tr>
                            <td style="font-size:22px ">Mật khẩu</td>
                            <td style="display: flex;align-items: center;">
                                <input type="password" id="password" name="password">
                                <span id="nosee" style="cursor: pointer;" onclick="showpass()" ><i class="fas fa-eye-slash" ></i></span>
                            </td>
                        </tr>

                        <tr colspan="2">
                            <td><input type="submit" id="dangnhap" name="dangnhap" value="Đăng nhập">
                                
                            </td>
                        </tr>

                    
                    </table>
                </form>
                <!-- <div class="mes_error" style="display: flex;align-items: center;text-align: center; justify-content: center;">
                    <?php 
                        
                        $text_error= isset($_SESSION['text_error']) && !empty($_SESSION['text_error']) ? $_SESSION['text_error'] : '';
                        if(isset($text_error)&&($text_error!=""))
                        {
                            echo "<h4 style=width:300px; >".$text_error."</h4>";
                        }
                        
                    ?>
                </div> -->
                <div id="login-with-social">
                    <a href="<?= $loginUrl ?>"><img src="../img/facebook.png" alt='facebook login' title="Facebook Login" height="50" width="280" /></a>
                    <?php if(isset($authUrl)){ ?>
                    <a href="<?= $authUrl ?>"><img src="../img/google.png" alt='google login' title="Google Login" height="50" width="280" /></a>
                    <?php } ?>
                </div>

                
            </div>
       
    