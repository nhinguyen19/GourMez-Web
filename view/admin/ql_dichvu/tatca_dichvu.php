<style>
    .insert th,td
    {
        border: 1px solid black;
    }
</style>
<?php
    $conn = connectdb();
    $sql_lietke_dichvu = "SELECT * FROM service ORDER BY id_service ASC";
    $query_lietke_dichvu = mysqli_query($conn,$sql_lietke_dichvu);
?>
<h2 class="title" style = "padding-left:0px"> Tất cả dịch vụ </h2>
<div class="insert" style="font-size: 20px;">
    <table style = "border-collaspe:collaspe">
        <tr>
            <th style="text-align: center">ID</th>
            <th style="text-align: center">Tên dịch vụ</th>
            <th style="text-align: center">Logo</th>
            <th style="text-align: center">Banner</th>
            <th style="text-align: center">Quản lý</th>
        </tr>
        <?php
            $i = 0;
            while($row = mysqli_fetch_array($query_lietke_dichvu))
            {
                $i++;
        ?>     
        <tr>
            <td style="text-align: center"><?php echo $row['id_service'] ?></td>
            <td style="text-align: center"><?php echo $row['service_name']?></td>
            <td style="text-align: center">
                <img src = "../../view/admin/ql_dichvu/uploads/<?php echo $row['image']?>" style = "width: 150px; height: 150px;">
            </td>
            <td style="text-align: center">
                <img src = "../../view/admin/ql_dichvu/uploads/<?php echo $row['banner']?>" style = "width: 200px; height: 100px;">
            </td>
            <td style="text-align: center"><a href="tranghienthi.php?quanly=xoaDichVu&iddichvu=<?php echo $row['id_service']; ?>">Xóa</a> | <a href="tranghienthi.php?quanly=suaDichVu&iddichvu=<?php echo $row['id_service']; ?>">Sửa</a></td>     
        </tr>
        <?php
            }
        ?>
        <tr>
            <td style="text-align: center" colspan="5">
                <form action="../admin/tranghienthi.php?quanly=themdichvu" method="post">
                    <input type="submit" value="Thêm dịch vụ" style="font-size: 18px;">
                </form>
            </td>
        </tr>
    </table>
</div>

