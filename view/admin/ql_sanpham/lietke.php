<link rel ="stylesheet" href="tranghienthi.css">
<?php
    $conn = connectdb();
    $sql_lietke_sanpham = "SELECT * FROM food, category WHERE food.cate_id = category.cate_id ORDER BY food_id ASC";
    $query_lietke_sanpham = mysqli_query($conn, $sql_lietke_sanpham);
?>
<h2 class="title">Tất cả sản phẩm</h2>
<div class="insert">
    <table>
        <tr style="font-family: 'Lalezar'">
            <td style="text-align: center">Id</td>
            <td style="text-align: center">Tên sản phẩm</td>
            <td style="text-align: center">Danh mục</td>
            <td style="text-align: center">Giá gốc</td>
            <td style="text-align: center">Giá bán</td>
            <td style="text-align: center">Mô tả</td>
            <td style="text-align: center">Hình ảnh</td>
            <td style="text-align: center">Quản lý</td>
        </tr>
        <?php
            $i = 0;
            while ($row = mysqli_fetch_array($query_lietke_sanpham)) {
                $i++;
        ?>     
        <tr>
            <td style="text-align: center"><?php echo $row['food_id'] ?></td>
            <td style="text-align: center"><?php echo $row['food_name'] ?></td>
            <td style="text-align: center"><?php echo $row['cate_name'] ?></td>
            <td style="text-align: center"><?php echo number_format($row['original_price'],0,',','.').'vnđ' ?></td>
            <td style="text-align: center"><?php echo number_format($row['selling_price'],0,',','.').'vnđ' ?></td>
            <td style="text-align: center; width: 200px"><?php echo $row['small_descr'] ?></td>
            <td style="text-align: center"><img src="ql_sanpham/uploads/<?php echo $row['img'] ?>" width="100" height="100"></td>
            <td style="text-align: center; width: 90px">
                <a href="tranghienthi.php?quanly=xoasp&idsanpham=<?php echo $row['food_id']; ?>">Xóa</a> | <a href="tranghienthi.php?quanly=suasp&idsanpham=<?php echo $row['food_id']; ?>">Sửa</a>
            </td> 
        </tr>
        <?php
            }
        ?>
        <tr>
            <td style="text-align: center" colspan="8">
                <form action="../admin/tranghienthi.php?quanly=themsanpham" method="post">
                    <input type="submit" value="Thêm sản phẩm" style= " background-color: #F5EAD7; border: 0.5px solid black;font-family: 'Lalezar'; color: #E26A2C">
                </form>
            </td>
        </tr>
    </table>
</div>