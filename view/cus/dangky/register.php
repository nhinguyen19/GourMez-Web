<?php
        // session_start();
        // include 'facebook_source.php';
        // include 'google_source.php';
        include '../header/header_trcDN.php';
        
            
        ?>
        <link rel="stylesheet" href="register.css">
        <link rel="stylesheet" href="../header/header.css">
        <script src="hienthi_mk.js"></script>
        <div id="user_login" class="box-content" >
            <div class="xinchao"style="display: flex; align-items: center;text-align: center;justify-content: center;">
                <img src="../img/logocus.png" style="width: 160px;height: 160px; margin-right: 10px;">
                <p style="font-family: Langar; font-size:26px " >XIN CHÀO</p>
            </div>
            <h2>Đăng ký</h2>
            <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="Post" autocomplete="off" style="border: 1px solid rgba(255, 130, 67, 1);background-color: rgba(255, 130, 67, 1);border-radius: 20px;padding: 50px;">
                    
                    <table class="bang_dk">
                        <tr >
                            <td class="left" style="font-size:20px ">Tên đăng nhập</td>
                            <td><input type="text" id="user" name="user"></td>
                        </tr>
                            
                        <tr >
                            <td class="left" style="font-size:20px ">Họ và tên</td>
                            <td><input type="text" id="user" name="user"></td>
                        </tr>

                        <tr >
                            <td class="left" style="font-size:20px ">Tên đăng nhập<p style="color:red">*</p></td>
                            <td><input type="text" id="user" name="user"></td>
                        </tr>

                        <tr >
                            <td class="left" style="font-size:20px ">Địa chỉ email</td>
                            <td><input type="email" id="user" name="user"></td>
                        </tr>

                        <tr >
                            <td class="left" style="font-size:20px ">Số điện thoại</td>
                            <td><input type="text" id="user" name="user"></td>
                        </tr>


                        <tr>
                            <td class="left" style="font-size:20px ">Mật khẩu<p>*</p></td>
                            <td style="display: flex;align-items: center;">
                                <input type="password" id="password" name="password">
                                <span id="nosee" style="cursor: pointer;" onclick="showpass()" ><i class="fas fa-eye-slash" ></i></span>
                            </td>
                        </tr>

                        <tr>
                            <td class="left">Nhập lại mật khẩu<p style="color: red;">*</p></td>
                            <td>
                                <input type="password" id="re_enter_password" name="re_enter_password">
                                <span id="noseeRe" style="cursor: pointer;" onclick="showRepass()"><i class="fas fa-eye-slash" ></i></span>
                                <p style="color: red;">Mật khẩu từ 8 ký tự trở lên, bao gồm chữ hoa, chữ thường và chữ số</p>
                            </td>
                        </tr>

                        <tr colspan="2">
                            <td><input type="submit" id="dangky" name="dangky" value="Đăng ký">
                                
                            </td>
                        </tr>

                    
                    </table>
                </form>
                <div class="mes_error" style="display: flex;align-items: center;text-align: center; justify-content: center;">
                    <?php 
                        
                        
                        
                    ?>
                </div>
                <div id="login-with-social">
                    <a href="<?= $loginUrl ?>"><img src="../img/facebook.png" alt='facebook login' title="Facebook Login" height="50" width="280" /></a>
                    <?php if(isset($authUrl)){ ?>
                    <a href="<?= $authUrl ?>"><img src="../img/google.png" alt='google login' title="Google Login" height="50" width="280" /></a>
                    <?php } ?>
                </div>

                
            
        </div>
       
    