<link rel="stylesheet" href="tranghienthi.css">
<script src="https://cdn.ckeditor.com/ckeditor5/41.3.1/classic/ckeditor.js"></script>
<?php
    $conn = connectdb();
    $id = $_GET['id'];
    $query = "SELECT * FROM orders WHERE order_id = $id";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($result);

    $query1 = "SELECT * FROM order_item INNER JOIN food ON order_item.food_id = food.food_id WHERE order_id='$id'";
    $result1 = mysqli_query($conn, $query1);
    $row1 = mysqli_fetch_assoc($result1);
?>
<h2 class="title">Chi tiết đơn hàng</h2>
<div class="insert">
    <form method="POST" action="tranghienthi.php?quanly=updateorder&id=<?php echo $_GET['id'] ?>">
        <p>ID đơn hàng: <?php echo $row['order_id']; ?></p>
        <p>Trạng thái: <?php echo $row['status']; ?></p>
        <p>Thời gian ghi nhận: <?php echo $row['date_order']; ?></p>
        <p>ID khách hàng: <?php echo $row['user_id']; ?></p>
        <p>Họ tên người nhận: <?php echo $row['name_cus']; ?></p>
        <p>Địa chỉ người nhận : <?php echo $row['address']; ?></p>
        <p>Số điện thoại người nhận: <?php echo $row['phone']; ?></p>
        <p>Phương thức thanh toán : <?php echo $row['payment_mode']; ?></p>
        <p>Thành tiền: <?php echo $row['origin_total_price']; ?></p>
       
        <h1> CHI TIẾT HÓA ĐƠN</h1>
        <p>Món ăn :<?php echo $row1['food_name']; ?></p>
        <p>Số lượng :<?php echo $row1['quantity']; ?></p>
        <h1> TRẠNG THÁI ĐƠN HÀNG</h1>
        <label>Nhân viên đảm nhận :</label>
        <select id="staff" name="staff" required>
        <option value="" selected>Tên nhân viên </option>
    <?php
    // Kết nối cơ sở dữ liệu
    $conn = connectdb();

    // Lấy id của đơn hàng từ tham số GET
    $id = $_GET['id'];

    // Truy vấn cơ sở dữ liệu để kiểm tra xem staff_id của đơn hàng có giá trị NULL không
    $checkNullQuery = "SELECT staff_id FROM orders WHERE order_id = '$id'";
    $resultCheckNull = mysqli_query($conn, $checkNullQuery);

    // Kiểm tra xem có dữ liệu trả về không
    if ($resultCheckNull) {
        $rowCheckNull = mysqli_fetch_assoc($resultCheckNull);
        $staff_id = $rowCheckNull['staff_id'];

        // Nếu staff_id không phải là NULL, hiển thị tên nhân viên đã chọn
        if ($staff_id !== NULL) {
            // Lấy tên nhân viên từ bảng staff
            $getStaffNameQuery = "SELECT name_staff FROM staff WHERE staff_id = '$staff_id'";
            $resultStaffName = mysqli_query($conn, $getStaffNameQuery);
            if ($resultStaffName) {
                $rowStaffName = mysqli_fetch_assoc($resultStaffName);
                echo "<option value='$staff_id' selected>" . $rowStaffName['name_staff'] . "</option>";
            }
        } else {
            // Nếu staff_id là NULL, hiển thị danh sách nhân viên để chọn
            $sql = "SELECT * FROM staff";
            $result2 = mysqli_query($conn, $sql);

            // Kiểm tra xem có dữ liệu trả về không
            if (mysqli_num_rows($result2) > 0) {
                
                // Duyệt qua từng hàng dữ liệu và tạo các tùy chọn trong thẻ select
                while ($row = mysqli_fetch_assoc($result2)) {
                    echo "<option value='" . $row['staff_id'] . "'>" . $row['name_staff'] . "</option>";
                }
            } else {
                echo "<option value=''>Không có nhân viên</option>";
            }
        }
    } else {
        echo "<option value=''>Không thể kiểm tra staff_id</option>";
    }

    // Đóng kết nối cơ sở dữ liệu
    mysqli_close($conn);
    ?>
</select>
<label>Trạng thái đơn hàng :</label>
<select id="status" name="status" required>
    <?php
    // Kết nối cơ sở dữ liệu
    $conn = connectdb();

    // Lấy id của đơn hàng từ tham số GET
    $id = $_GET['id'];

    // Truy vấn cơ sở dữ liệu để lấy trạng thái của đơn hàng hiện tại
    $statusQuery = "SELECT status FROM orders WHERE order_id = '$id'";
    $resultStatus = mysqli_query($conn, $statusQuery);

    // Kiểm tra xem có dữ liệu trả về không
    if ($resultStatus) {
        $rowStatus = mysqli_fetch_assoc($resultStatus);
        $currentStatus = $rowStatus['status'];

        // Danh sách các trạng thái có thể
        $availableStatus = ["Đang xử lý", "Đang giao hàng", "Hoàn thành", "Hủy đơn"];

        // Duyệt qua danh sách và hiển thị từng tùy chọn trong thẻ select
        foreach ($availableStatus as $status) {
            echo "<option value='$status'" . ($status === $currentStatus ? " selected" : "") . ">$status</option>";
        }
    }

    // Đóng kết nối cơ sở dữ liệu
    mysqli_close($conn);
    ?>
</select>




        
        <!-- Add other fields as needed -->
        
        <input type="submit" name="updateorder" style= " background-color: #F5EAD7; border: 0.5px solid black;font-family: 'Lalezar'; color: #E26A2C" value="Cập nhật">
    </form>

</div>
<script>
    ClassicEditor
        .create(document.querySelector('#des'))
        .catch(error => {
            console.error(error);
        });
</script>
