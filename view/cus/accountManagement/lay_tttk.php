<?php

function get_info($id){
    
    $host = "localhost";
    $username = "root";
    $password = "";
    $database = "gourmez_web";
    $conn = new mysqli($host, $username, $password, $database);

    if ($conn->connect_error) {
        die('Kết nối không thành công: ' . $conn->connect_error);
    } 
    $array= array();
    $sql="SELECT * FROM user WHERE user_id ='$id'";

    $kq=$conn->query($sql);

    if($kq->num_rows >0){
        while($row=$kq->fetch_row()){
            // return $row;
            if($row[4]==NULL){
                $array['fullname']='';
            }else{$array['fullname']=$row[4];}

            if($row[5]==NULL){
                $array['phone']='';
            }else{$array['phone']=$row[5];}

            if($row[6]==NULL){
                $array['address']='';
            }else{$array['address']=$row[6];}
            
            

            $array['user']=$row[1];
            $array['email']=$row[2];
            
            // echo '1'. $row[1];
            // echo '2'. $row[2];
            // echo '4'. $row[4];
            // echo '6'.$row[6];
            // echo 'hi';
            
            return $array;

        }
        $conn->close();
    }
    else{
        echo 'Không có thông tin';
        $conn->close();
    }
}





?>