<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng nhập</title>
    <link rel="stylesheet" href="formDN.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"/>
    
    <script src="hienthi_mk.js"></script>
    <style>
        body{
            width: 100%;
            margin: 0px;
        }
    </style>
</head>
<body>

    <div class="form_dangnhap" style="float: center;">
        <!-- Lời chào -->
        <div class="xinchao">
            <img src="C:\xampp\htdocs\DoAn\Helene.png" style="width: 120px;height: 120px; margin-right: 10px;">
            <p style="font-family: Langar;" >XIN CHÀO</p>
        </div>

        <!-- Form đăng nhập -->
        <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
            <table class="bang_dn">
                <tr>
                    <td>Tên đăng nhập</td>
                    <td><input type="text" id="user" name="user"></td>
                </tr>
                    
                <tr>
                    <td>Mật khẩu</td>
                    <td>
                        <input type="password" id="password" name="password">
                        <span id="nosee" style="cursor: pointer;" onclick="showpass()" ><i class="fas fa-eye-slash" ></i></span>
                    </td>
                </tr>
                <tr colspan="2">
                    <td><input type="submit" id="dangnhap" name="dangnhap" value="Đăng nhập"></td>
                </tr>
            </table>

        </form>

        <!-- Quên mật khẩu/Đăng ký -->
        <div class="quenmk_dk">
            <a href="#">QUÊN MẬT KHẨU</a>/
            <a href="#">ĐĂNG KÝ</a>
        </div>
        
        <!-- Đăng nhập bằng Facebook -->
        <button id="dn_face bt" style="width: 200px;height: 50px;display: flex;align-items: center;justify-content: center;">
            <i class="fab fa-facebook"></i>
            <p>Đăng nhập bằng Facebook</p>
        </button>

        <!-- Đăng nhập bằng Gmail -->
        <button id="dn_gmail bt" style="width: 200px;height: 50px;display: flex;align-items: center;justify-content: center;">
            <i class="fab fa-google-plus-g"></i>
            <p>Đăng nhập bằng Gmail</p>
        </button>
    
    </div>

</body>
</html>