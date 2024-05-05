<?php
    $conn = connectdb();
    $sql_lietke_danhmucsp = "SELECT * FROM category ORDER BY cate_id ASC";
    $query_lietke_danhmucsp = mysqli_query($conn,$sql_lietke_danhmucsp);
?>
<div class="insert_cat" >
    <table>
        <tr >
            <th style="text-align: center;" colspan ="3">Liệt kê danh mục sản phẩm</th>
        <tr>
            <th>Id</th>
            <th>Tên danh mục</th>
            <th>Quản lý</th>
        </tr>
        <?php
            $i = 0;
            while($row = mysqli_fetch_array($query_lietke_danhmucsp))
            {
                $i++;
        ?>     
        <tr>
            <td><?php echo $row['cate_id'] ?></td>
            <td><?php echo $row['cate_name']?></td>
            <td>
                <a href="tranghienthi.php?quanly=xoa&iddanhmuc=<?php echo $row['cate_id']; ?>">Xóa</a> | <a href="tranghienthi.php?quanly=sua&id=<?php echo $row['cate_id']; ?>">Sửa</a>
            </td>      
        </tr>

        <?php
            }
        ?>
    </table>
</div>