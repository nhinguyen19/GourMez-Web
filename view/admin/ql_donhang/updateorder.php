
    <link rel="stylesheet" href="ql_donhang/chitietorder.css">
    <script src="https://cdn.ckeditor.com/ckeditor5/41.3.1/classic/ckeditor.js"></script>
<div class="main1">
    <?php
        $conn = connectdb();
        $id = $_GET['id'];
        $query = "SELECT * FROM orders WHERE order_id = $id";
        $result = mysqli_query($conn, $query);
        $row = mysqli_fetch_assoc($result);

        $query1 = "SELECT * FROM order_item INNER JOIN food ON order_item.food_id = food.food_id WHERE order_id='$id'";
        $result1 = mysqli_query($conn, $query1);
    ?>
    <div class="container">
        <h1 class="title">CHI TIẾT ĐƠN HÀNG</h1>
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

                <h2>CHI TIẾT HÓA ĐƠN</h2>
                <?php while ($row1 = mysqli_fetch_assoc($result1)) { ?>
                    <p>Món ăn: <?php echo $row1['food_name']; ?></p>
                    <p>Số lượng: <?php echo $row1['quantity']; ?></p>
                <?php } ?>

                <h2>TRẠNG THÁI ĐƠN HÀNG</h2>
                <label>Nhân viên đảm nhận:</label>
                <select id="staff" name="staff" required>
                    <option value="" selected>Tên nhân viên</option>
                    <?php
                        // Truy vấn để lấy danh sách nhân viên
                        $conn = connectdb();
                        $id = $_GET['id'];
                        $checkNullQuery = "SELECT staff_id FROM orders WHERE order_id = '$id'";
                        $resultCheckNull = mysqli_query($conn, $checkNullQuery);

                        if ($resultCheckNull) {
                            $rowCheckNull = mysqli_fetch_assoc($resultCheckNull);
                            $staff_id = $rowCheckNull['staff_id'];

                            if ($staff_id !== NULL) {
                                $getStaffNameQuery = "SELECT name_staff FROM staff WHERE staff_id = '$staff_id'";
                                $resultStaffName = mysqli_query($conn, $getStaffNameQuery);
                                if ($resultStaffName) {
                                    $rowStaffName = mysqli_fetch_assoc($resultStaffName);
                                    echo "<option value='$staff_id' selected>" . $rowStaffName['name_staff'] . "</option>";
                                }
                            }

                            $sql = "SELECT * FROM staff";
                            $result2 = mysqli_query($conn, $sql);
                            if (mysqli_num_rows($result2) > 0) {
                                while ($row = mysqli_fetch_assoc($result2)) {
                                    if ($staff_id !== NULL && $row['staff_id'] == $staff_id) {
                                        continue;
                                    }
                                    echo "<option value='" . $row['staff_id'] . "'>" . $row['name_staff'] . "</option>";
                                }
                            } else {
                                echo "<option value=''>Không có nhân viên</option>";
                            }
                        } else {
                            echo "<option value=''>Không thể kiểm tra staff_id</option>";
                        }
                        mysqli_close($conn);
                    ?>
                </select>

                <div id="additionalStaffInfo"></div>
                <label>Trạng thái đơn hàng:</label>
                <select id="status" name="status" required>
                    <?php
                        $conn = connectdb();
                        $id = $_GET['id'];
                        $statusQuery = "SELECT status FROM orders WHERE order_id = '$id'";
                        $resultStatus = mysqli_query($conn, $statusQuery);

                        if ($resultStatus) {
                            $rowStatus = mysqli_fetch_assoc($resultStatus);
                            $currentStatus = $rowStatus['status'];
                            $availableStatus = ["Đang xử lý", "Đang giao hàng", "Hoàn thành", "Hủy đơn"];

                            foreach ($availableStatus as $status) {
                                echo "<option value='$status'" . ($status === $currentStatus ? " selected" : "") . ">$status</option>";
                            }
                        }
                        mysqli_close($conn);
                    ?>
                </select>
                <div id="additionalStatusInfo"></div>

                <input type="submit" name="updateorder" value="Cập nhật" class="btn-update">
            </form>
        </div>
    </div>
    <script>
        ClassicEditor
            .create(document.querySelector('#des'))
            .catch(error => {
                console.error(error);
            });

        document.addEventListener('DOMContentLoaded', function () {
            const statusSelect = document.getElementById('status');

            function handleStatusChange() {
                const status = statusSelect.value;
                if (status === 'Đang giao hàng') {
                    document.getElementById('additionalStatusInfo').innerHTML = `
                        <label>Nhân viên giao hàng:</label>
                        <select id="shipper" name="shipper" required>
                            <option value="" selected>Tên nhân viên</option>
                            <?php
                                $conn = connectdb();
                                $id = $_GET['id'];
                                $checkNullQuery = "SELECT shipper_id FROM orders WHERE order_id = '$id'";
                                $resultCheckNull = mysqli_query($conn, $checkNullQuery);

                                if ($resultCheckNull) {
                                    $rowCheckNull = mysqli_fetch_assoc($resultCheckNull);
                                    $shipper_id = $rowCheckNull['shipper_id'];

                                    if ($shipper_id !== NULL) {
                                        $getShipperNameQuery = "SELECT name_shipper FROM shipper WHERE shipper_id = '$shipper_id'";
                                    $resultShipperName = mysqli_query($conn, $getShipperNameQuery);
                                        if ($resultShipperName) {
                                            $rowShipperName = mysqli_fetch_assoc($resultShipperName);
                                            echo "<option value='$shipper_id' selected>" . $rowShipperName['name_shipper'] . "</option>";
                                        }
                                    }

                                    $sql = "SELECT * FROM shipper";
                                    $result2 = mysqli_query($conn, $sql);
                                    if (mysqli_num_rows($result2) > 0) {
                                        while ($row = mysqli_fetch_assoc($result2)) {
                                            if ($shipper_id !== NULL && $row['shipper_id'] == $shipper_id) {
                                                continue;
                                            }
                                            echo "<option value='" . $row['shipper_id'] . "'>" . $row['name_shipper'] . "</option>";
                                        }
                                    } else {
                                        echo "<option value=''>Không có nhân viên</option>";
                                    }
                                } else {
                                    echo "<option value=''>Không thể kiểm tra shipper_id</option>";
                                }
                                mysqli_close($conn);
                            ?>
                        </select>
                    `;
                }else if (status === 'Hủy đơn') {
                    document.getElementById('additionalStatusInfo').innerHTML = `
                        <label>Lý do hủy đơn:</label>
                        <br>
                        <input id="cancelReason" name="cancelReason" required>
                        <p> Bạn hãy liên hệ ngay với khách hàng qua số điện thoại được cung cấp để thông báo nhé!</p>
                    `;
                } else {
                    document.getElementById('additionalStatusInfo').innerHTML = '';
                }
            }

            statusSelect.addEventListener('change', handleStatusChange);
            handleStatusChange();
        });
        
    </script>
</div>
