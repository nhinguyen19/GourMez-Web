<link rel ="stylesheet" href="tranghienthi.css">
<?php
    $conn = connectdb();
    $sql_lietke_danhmucsp = "SELECT * FROM category ORDER BY cate_id ASC";
    $query_lietke_danhmucsp = mysqli_query($conn,$sql_lietke_danhmucsp);
?>
<h2 class="title"> Tất cả danh mục sản phẩm </h2>
<div class="insert" >
    <table>
        <tr style="font-family: 'Lalezar'">
            <td style="text-align: center">Id</td>
            <td style="text-align: center">Tên danh mục</td>
            <td style="text-align: center">Quản lý</td>
        </tr>
        <?php
            $i = 0;
            while($row = mysqli_fetch_array($query_lietke_danhmucsp))
            {
                $i++;
        ?>     
        <tr>
            <td style="text-align: center"><?php echo $row['cate_id'] ?></td>
            <td style="text-align: center"><?php echo $row['cate_name']?></td>
            <td style="text-align: center"><a href="tranghienthi.php?quanly=xoa&iddanhmuc=<?php echo $row['cate_id']; ?>">Xóa</a> | <a href="tranghienthi.php?quanly=sua&id=<?php echo $row['cate_id']; ?>">Sửa</a></td>     
        </tr>
        <?php
            }
        ?>
        <tr>
            <td style="text-align: center" colspan="3">
                <form action="../admin/tranghienthi.php?quanly=themdanhmuc" method="post">
                    <input type="submit" style= " background-color: #F5EAD7; border: 0.5px solid black;font-family: 'Lalezar'; color: #E26A2C" value="Thêm danh mục sản phẩm">
                </form>
            </td>
        </tr>
    </table>
</div>