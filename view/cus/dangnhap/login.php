        <link rel="stylesheet" href="login.css">
        <?php
        session_start();
        if (!empty($_SESSION['current_user'])) {
            $currentUser = $_SESSION['current_user'];
            ?>
            <div id="login-notify" class="box-content">
                Xin chào <?= $currentUser['fullname'] ?><br/>
                <a href="./edit.php">Đổi mật khẩu</a><br/>
                <a href="./logout.php">Đăng xuất</a>
            </div>
            <?php
        } else {
            include './facebook_source.php';
            include './google_source.php';
            include '../header/header_sauDN_dyn.php';
            ?>
            <div id="user_login" class="box-content">
                <div class="xinchao">
                    <img src="../img/logocus.png" style="width: 120px;height: 120px; margin-right: 10px;">
                    <p style="font-family: Langar;" >XIN CHÀO</p>
                </div>
                <h1>Đăng nhập</h1>
                <form action="./login.php" method="Post" autocomplete="off" >
                    <label>Tên đăng nhập</label></br>
                    <input type="text" name="username" value="" /><br/>
                    <label>Mật khẩu</label></br>
                    <input type="password" name="password" value="" /></br>
                    <br>
                    <input type="submit" value="Đăng nhập" /><br/>
                    <a href="../dangki/register.php">Đăng ký</a>
                </form>
                <h2>Hoặc đăng nhập với mạng xã hội</h2>
                <div id="login-with-social">
                    <a href="<?= $loginUrl ?>"><img src="../img/facebook.png" alt='facebook login' title="Facebook Login" height="50" width="280" /></a>
                    <?php if(isset($authUrl)){ ?>
                    <a href="<?= $authUrl ?>"><img src="../img/google.png" alt='google login' title="Google Login" height="50" width="280" /></a>
                    <?php } ?>
                </div>
            </div>
        <?php } ?>
    