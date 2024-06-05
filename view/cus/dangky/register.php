<?php
        // session_start();
        // include 'google_source.php';
        
        $err=array();
        if(isset($_POST['dangky']) && ($_POST['dangky'])=='Đăng ký')
        {
            include('../model/check_regis.php');
            // include ('check_regis.php');
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
            
            if(empty($pass)){
                $err['pass']='Bạn chưa nhập mật khẩu';
            }
            if($pass!==$rpass)
            {
                $err['rpass'] ='Mật khẩu nhập lại không khớp';
            }
            if (strlen($user_name) < 3) {
                $err['countname']='Tên đăng nhập tối thiểu 3 kí tự';
            }
            if (strlen($pass) < 6) {
                $err['countpass']='Mật khẩu tối thiểu 6 kí tự';
            }
            if(empty($err)){
                
                $errors=reg_uname($name,$user_name,$email,$phone,$pass);
                
            }
            // var_dump($err);hien ra mang cho de nhin va kiem tra
            // die();

        }
        ?>
        <link href='https://fonts.googleapis.com/css?family=Lalezar' rel='stylesheet'>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"/>

        <link rel="stylesheet" href="../view/cus/dangky/register.css">
        
        <script src="../view/cus/dangnhap/hienthi_mk.js"></script>
        
        <div class="box-content" >
            <img class="img" src="../view/cus/img/anhDK.png">
            <div class="form">
                <h2 class="dangky">ĐĂNG KÝ</h2>
                <form class="bang-dk"  method="Post">                
                        <!-- //name -->
                    <div class="name">
                        <label class="title" >Họ và tên</label>
                        <br><input type="text" name="name">
                    </div>
                            
                            <!-- user_name --> 
                    <div class="user">
                        <label class="title" >Tên đăng nhập*</label>
                        <br><input type="text" name="user_name">
                    </div>
                    
                    <div class="has-error">
                        <span><?php echo (isset($err['name']))?$err['name']:''?></span>
                    </div> 

                            <!-- email -->
                    <div class="email">
                        <label class="title" >Địa chỉ email*</label>
                        <br><input type="email" name="email">
                    </div>

                    <div class="has-error">
                        <span><?php echo (isset($err['email']))?$err['email']:''?></span>
                    </div> 
                            
                            <!-- phone -->
                    <div class="phone">
                        <label class="title" >Số điện thoại</label>
                        <br><input type="text" name="phone">
                    </div>
                    
                            <!-- pass -->
                    <div class="pass-icon">
                        <div class="pass">
                            <label class="title" >Mật khẩu*</label>
                            <br><input type="password" id="password" name="password">
                        </div>
                        <span class="icon" id="nosee" style="cursor: pointer;" onclick="showpass()" ><i class="fas fa-eye-slash" ></i></span>
                    </div>
                                
                    <div class="has-error">
                        <span><?php echo (isset($err['pass']))?$err['pass'].'<br>':''?></span>
                        <span><?php echo (isset($err['countpass']))?$err['countpass']:''?></span>
                    </div>
                            <!-- rpass -->
                    <div class="rpass-icon">
                        <div class="rpass">
                            <label class="title" >Nhập lại mật khẩu*</label>
                            <br><input type="password" id="re_enter_password" name="re_enter_password">
                        </div>
                        <span class="icon" id="noseeRe" style="cursor: pointer;" onclick="showRepass()"><i class="fas fa-eye-slash" ></i></span>
                    </div>

                    <div class="has-error">
                        <span><?php echo (isset($err['rpass']))?$err['rpass']:''?></span>
                    </div> 
                            
                        <!-- dangky button -->
                    <input class="dk-bt" type="submit" id="dangky" name="dangky" value="Đăng ký">
                    <?php
                        if(isset($errors))
                        {
                            if (count($errors) > 0) {
                                // Hiển thị thông báo lỗi
                                foreach ($errors as $error) //trong mỗi vòng lặp qua mảng $errors thì sẽ gán mỗi ptu mảng vào biến $error
                                {
                                    echo "<p style='color:red'>".$error . "</p><br>";
                                }
                            }
                        }
                    ?>
                    </form>

            </div>
            
                
            
                </div>

        </div>
       
    
