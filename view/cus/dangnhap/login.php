        <?php
            include './facebook_source.php';
            include './google_source.php';
            include '../header/header_trcDN.php';
            
            ?>
           
            <div id="user_login" class="box-content" >
                <div class="xinchao"style="display: flex; align-items: center;text-align: center;justify-content: center;">
                    <img src="../img/logocus.png" style="width: 160px;height: 160px; margin-right: 10px;">
                    <p style="font-family: Langar; font-size:26px " >XIN CHÀO</p>
                </div>
                <h2>Đăng nhập</h2>
                <form action="./login.php" method="Post" autocomplete="off" style="border: 1px solid rgba(255, 130, 67, 1);background-color: rgba(255, 130, 67, 1);border-radius: 20px;padding: 50px;">
                    <!-- <div class="name" style="display: flex; align-items: center;text-align: center; justify-content: space-between;">
                    <label style="display: flex; align-items: left;text-align: left;  justify-content: center;">Tên đăng nhập</label></br>
                    <input type="text" name="username" value="" style="display: flex; align-items: right; justify-content: right;"/><br/>
                    </div>
                    <div class="pass" style="display: flex; align-items: center;text-align: center; justify-content: space-between;">
                    <label style="display: flex; align-items: left;text-align: left;  justify-content: center;">Mật khẩu</label></br>
                    <input type="password" name="password" value="" style="display: flex; align-items: right; justify-content: right;"/>
                    <span id="nosee" style="cursor: pointer; " onclick="showpass()" ><i class="fas fa-eye-slash" ></i></span></br>
                    </div>

                
                    <input type="submit" value="Đăng nhập" /><br/>
                    <a href="../dangki/register.php">Đăng ký</a> -->
                    <table class="bang_dn">
                        <tr >
                            <td style="font-size:22px ">Tên đăng nhập</td>
                            <td><input type="text" id="user" name="user"></td>
                        </tr>
                            
                        <tr>
                            <td style="font-size:20px ">Mật khẩu</td>
                            <td style="display: flex;align-items: center;">
                                <input type="password" id="password" name="password">
                                <span id="nosee" style="cursor: pointer;" onclick="showpass()" ><i class="fas fa-eye-slash" ></i></span>
                            </td>
                        </tr>
                    </table>
                </form>
                
                <div id="login-with-social">
                    <a href="<?= $loginUrl ?>"><img src="../img/facebook.png" alt='facebook login' title="Facebook Login" height="50" width="280" /></a>
                    <?php if(isset($authUrl)){ ?>
                    <a href="<?= $authUrl ?>"><img src="../img/google.png" alt='google login' title="Google Login" height="50" width="280" /></a>
                    <?php } ?>
                </div>
            </div>
       
    