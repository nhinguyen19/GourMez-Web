<?php
        // session_start();
        // include 'facebook_source.php';
        // include 'google_source.php';
        // include '../header/header_trcDN.php';
        // include ('regis_uname.php');
        // include ('../../../model/connect.php');
        include ('check_regis.php');
        // $conn=connectdb();
        $err=array();
        if(isset($_POST['dangky']) && ($_POST['dangky'])=='Đăng ký')
        {
            // include('../view/cus/dangky/check_regis.php');
            
            $name=$_POST['name'];
            $user_name=$_POST['user_name'];
            $email=$_POST['email'];
            $phone=$_POST['phone'];
            $pass=$_POST['password'];
            $rpass=$_POST['re_enter_password'];
            if(empty($user_name)){
                $err['name']='Bạn chưa nhập tên đăng nhập';
            }
            if(empty($email)){
                $err['email']='Bạn chưa nhập email';
            }
            if(empty($phone)){
                $err['phone']='Bạn chưa nhập số điện thoại';
            }
            if(empty($pass)){
                $err['pass']='Bạn chưa nhập mật khẩu';
            }
            if($pass!==$rpass)
            {
                $err['rpass'] ='Mật khẩu nhập lại không khớp';
            }
            if(empty($err)){
                $pass_hash=password_hash($pass,PASSWORD_DEFAULT);//mã hoá pass để an toàn thông tin
                $errors=reg_uname($name,$user_name,$email,$phone,$pass_hash);
                if (count($errors) > 0) {
                    // Hiển thị thông báo lỗi
                    foreach ($errors as $error) //trong mỗi vòng lặp qua mảng $errors thì sẽ gán mỗi ptu mảng vào biến $error
                    {
                        echo $error . "<br>";
                    }
                }
            }
            // var_dump($err);hien ra mang cho de nhin va kiem tra
            // die();

        }
        ?>
        <link href='https://fonts.googleapis.com/css?family=Lalezar' rel='stylesheet'>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"/>

        <!-- <link rel="stylesheet" href="../view/cus/dangky/register.css"> -->
        <link rel="stylesheet" href="register.css">
        <!-- <script src="../view/cus/dangnhap/hienthi_mk.js"></script> -->
        <script src="../dangnhap/hienthi_mk.js"></script>
        <div id="user_login" class="box-content" >
            
            <h2>ĐĂNG KÝ</h2>
            <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="Post" style="border: 1px solid rgba(255, 130, 67, 1);background-color: rgba(255, 130, 67, 1);border-radius: 20px;padding: 50px;">
                    
                    <table class="bang_dk">
                        <!-- //name -->
                        <tr >
                            <td class="title" >Họ và tên</td>
                            <td><input type="text" name="name"></td>
                        </tr>

                        <!-- user_name -->
                        <tr >
                            <td class="title" >Tên đăng nhập*</td>
                            <td><input type="text" name="user_name"></td>
                            
                        </tr>

                        <tr colspan='2'>
                            <td class="has-error">
                                <span><?php echo (isset($err['name']))?$err['name']:''?></span>
                            </td> 
                        </tr>

                        <!-- email -->
                        <tr >
                            <td class="title" >Địa chỉ email*</td>
                            <td><input type="email" name="email"></td>
                        </tr>

                        <tr colspan='2'>
                            <td class="has-error">
                                <span><?php echo (isset($err['email']))?$err['email']:''?></span>
                            </td> 
                        </tr>

                        <!-- phone -->
                        <tr >
                            <td class="title" >Số điện thoại*</td>
                            <td><input type="text" name="phone"></td>
                        </tr>

                        <tr colspan='2'>
                            <td class="has-error">
                                <span><?php echo (isset($err['phone']))?$err['phone']:''?></span>
                            </td> 
                        </tr>


                        <!-- pass -->
                        <tr>
                            <td class="title" >Mật khẩu*</td>
                            <td >
                                <input type="password" id="password" name="password">
                                <span id="nosee" style="cursor: pointer;" onclick="showpass()" ><i class="fas fa-eye-slash" ></i></span>
                            </td>
                        </tr>

                        <tr colspan='2'>
                            <td class="has-error">
                                <span><?php echo (isset($err['pass']))?$err['pass']:''?></span>
                            </td> 
                        </tr>

                        <!-- rpass -->
                        <tr>
                            <td class="title" >Nhập lại mật khẩu*</td>
                            <td>
                                <input type="password" id="re_enter_password" name="re_enter_password">
                                <span id="noseeRe" style="cursor: pointer;" onclick="showRepass()"><i class="fas fa-eye-slash" ></i></span>
                                <!-- <p style="color: red;">Mật khẩu từ 8 ký tự trở lên, bao gồm chữ hoa, chữ thường và chữ số</p> -->
                            </td>
                        </tr>

                        <tr colspan="2">
                            <td class="has-error">
                                <span><?php echo (isset($err['rpass']))?$err['rpass']:''?></span>
                            </td> 
                        </tr>

                        <!-- dangky button -->
                        <tr>
                        <td colspan="2" align='center' class="dangky-bt"><input type="submit" id="dangky" name="dangky" value="Đăng ký">                             
                        </td>
                        </tr>
                    </table>
                    
                    
                </form>
                <div class="mes_error" style="display: flex;align-items: center;text-align: center; justify-content: center;">
                    <?php 
                        
                        
                        
                    ?>
                </div>
                <div id="login-with-social">

                    <!-- <?php if(isset($authUrl)){ ?>
                    <a href="<?= $authUrl ?>"><img src="../view/cus/img/google.png" alt='google login' title="Google Login" height="40" width="160" /></a>
                    <?php } ?> -->
                    <?php if(isset($authUrl)){ ?>
                    <a href="<?= $authUrl ?>"><img src="../img/google.png" alt='google login' title="Google Login" height="40" width="160" /></a>
                    <?php } ?>
                </div>

                
            
        </div>
       
    