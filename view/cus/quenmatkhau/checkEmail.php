<?php
include ('../../model/connect.php');
$conn=connectdb();
$email=$_POST['email'];
$pass_email=$_POST['pass_email'];
$sql= "SELECT * FROM user WHERE email='$email'";
$run=$conn->query($sql);
if($run && $run->num_rows >0)
{
    
    $access_token=md5($email.time());
    $sql_update_access_token="UPDATE user SET access_token='$access_token' WHERE email='$email'";

    $run_update_access_token=$conn->query($sql_update_access_token) or die($conn->error);

    if($run_update_access_token)
    {
        require '';
        $mail = new PHPMailer();
        $mail->IsSMTP(); // set mailer to use SMTP
        $mail->Host = "smtp.gmail.com"; // specify main and backup server
        $mail->Port = 587; // set the port to use
        $mail->SMTPAuth = true; // turn on SMTP authentication
        $mail->SMTPSecure = 'tls';
        $mail->Username = $email; // your SMTP username or your gmail username
        $mail->Password = $pass_email; // your SMTP password or your gmail password
        $mail->setFrom ($email,'Notification');
        $mail->AddAddress($email);
        $mail->AddReplyTo($email);
        $mail->IsHTML(true); // send as HTML
        $mail->Subject = 'Be The Player Of Code';
        $mail->Body = '<h1>Ấn vào link để đổi mk</h1>.<br>
        <a href="changePassword.php">Đổi mật khẩu</a>'
            return $mail->Send();
    }
}


?>