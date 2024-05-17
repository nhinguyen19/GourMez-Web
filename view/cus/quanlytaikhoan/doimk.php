<?php





?>
<!-- <script src="../view/cus/dangnhap/hienthi_mk.js"></script> -->
<script src="../dangnhap/hienthi_mk.js"></script>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"/>
    <div id="change_pass" class="box-content" >
        
        <h2>Đổi mật khẩu</h2>
        <form" method="Post" autocomplete="off">
            
            <table class="bang_tdmk">
                
                <!-- MK cũ -->
                <tr >
                    <td style="font-size:18px ">Mật khẩu cũ</td>
                    <td style="display: flex;align-items: center;">
                        <input type="password" id="old_password" name="old_password">
                        <span id="old_nosee" style="cursor: pointer;" onclick="showOldpass()" ><i class="fas fa-eye-slash" ></i></span>
                    </td>
                </tr>
                    
                <tr>
                    <td class="has-error" colspan="2">
                        <span><?php echo (isset($err['name']))?$err['name']:''?></span>
                    </td> 
                </tr>

                <!-- Mật khẩu mới -->
                <tr>
                    <td style="font-size:18px ">Mật khẩu mới</td>
                    <td style="display: flex;align-items: center;">
                        <input type="password" id="password" name="password">
                        <span id="nosee" style="cursor: pointer;" onclick="showpass()" ><i class="fas fa-eye-slash" ></i></span>
                    </td>
                </tr>

                <!-- Nhập lại MK mới -->
                <tr>
                    <td class="title" style="font-size:18px " >Nhập lại mật khẩu mới</td>
                    <td style="display: flex;align-items: center;">
                        <input type="password" id="re_enter_password" name="re_enter_password">
                        <span id="noseeRe" style="cursor: pointer;" onclick="showRepass()"><i class="fas fa-eye-slash" ></i></span>
                    </td>
                </tr>

                <tr>
                    <td class="has-error" colspan="2"> 
                        <span><?php echo (isset($err['pass']))?$err['pass']:''?></span>
                    </td> 
                </tr>

                <tr colspan="2">
                    <td><input type="submit" id="dangnhap" name="dangnhap" value="Đăng nhập"></td>
                </tr>
            
            </table>
        </form>

        
    </div>
       
    