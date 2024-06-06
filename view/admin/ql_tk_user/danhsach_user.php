
    <style>
        .box-content{
            display: block;
            width:80%;
            justify-content: end;
            
            margin-right: 3%;
            margin-left: 18%;
            text-align: center;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid black;
        }
        th, td {
            padding: 10px;
            text-align: center;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
<div class="box-content">
<h1>Danh sách người dùng</h1>
    <table>
        <tr>
            <th>ID</th>
            <th>Tên đăng nhập</th>
            <th>Họ và tên</th>
            <th>Email</th>
            <th>Số điện thoại</th>
            <th>Địa chỉ</th>
            <th>Ngày tạo</th>
            <th>Lần cuối cập nhật</th>
            <th>Phương thức</th>
        </tr>
        <?php
        $host = "localhost";
        $username = "root";
        $password = "";
        $database = "database";
        $conn = new mysqli($host, $username, $password, $database);
        
        if ($conn->connect_error) {
            die('Kết nối không thành công: ' . $conn->connect_error);
        } 

        $sql = "SELECT user_id, user_name, COALESCE(fullname, '') as fullname, email, COALESCE(phone, '') as phone, COALESCE(address, '') as address, create_at, last_updated FROM user WHERE role = 0";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo "<tr>
                    <td>{$row['user_id']}</td>
                    <td>{$row['user_name']}</td>
                    <td>{$row['fullname']}</td>
                    <td>{$row['email']}</td>
                    <td>{$row['phone']}</td>
                    <td>{$row['address']}</td>
                    <td>{$row['create_at']}</td>
                    <td>{$row['last_updated']}</td>
                    <td>
                        <a href='tranghienthi.php?quanly=edit_user&user_id={$row['user_id']}' style='text-decoration: none;color: black;'>Sửa /</a>
                        <a href='tranghienthi.php?quanly=delete_user&user_id={$row['user_id']}' onclick=\"return confirm('Bạn có chắc chắn muốn xoá người dùng này không?');\" style='text-decoration: none;color: black;'> Xoá</a>
                    </td>
                </tr>";
            }
        } else {
            echo "<tr><td colspan='9'>Không có user nào</td></tr>";
        }

        $conn->close();
        ?>
    </table>



</div>
    