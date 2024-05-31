<link rel="stylesheet" href="tranghienthi.css">
<?php
$conn = connectdb();
$tatCaTinTuc = "SELECT * FROM tintuc ";
$query_trangtintuc = mysqli_query($conn, $tatCaTinTuc);
?>
<h2 class="title">Tất cả sản phẩm</h2>
<div class="insert">
    <table>
        <tr style="font-family: 'Lalezar'">
            <td style="text-align: center">Id</td>
            <td style="text-align: center">Hình ảnh</td>
            <td style="text-align: center">Title</td>
            <td style="text-align: center">Link bài viết</td>
            <td style="text-align: center">Mô tả</td>
            <td style="text-align: center">Quản lý </td>

        </tr>
        <?php
        $i = 0;
        while ($row = mysqli_fetch_array($query_trangtintuc)) {
            $i++;
            ?>
            <tr>
                <td style="text-align: center"><?php echo $row['tintuc_id'] ?></td>
                <td style="text-align: center"><img src="ql_tintuc/<?php echo $row['img_title'] ?>" width="100"
                        height="100"></td>
                <td style="text-align: center"><?php echo $row['title'] ?></td>
                <td style="text-align: center"><?php echo $row['link'] ?></td>
                <td style="text-align: center"><?php echo $row['description'] ?></td>
                <td style="text-align: center; width: 90px">
                    <button> <a style="text-decoration: none;color: inherit;"
                            href="../admin/tranghienthi.php?quanly=suatintuc&tintucId=<?php echo $row['tintuc_id'] ?>">Sửa</a>
                    </button>
                    <button> <a style="text-decoration: none;color: inherit;"
                            href="../admin/tranghienthi.php?quanly=xoatintuc&tintucId=<?php echo $row['tintuc_id'] ?>">Xóa</a>
                    </button>

                </td>
            </tr>
            <?php
        }
        ?>
        <tr>
            <td style="text-align: center" colspan="8">
                <form action="../admin/tranghienthi.php?quanly=themtintuc" method="post">
                    <input type="submit" value="Thêm tin tức"
                        style=" background-color: #F5EAD7; border: 0.5px solid black;font-family: 'Lalezar'; color: #E26A2C">
                </form>
            </td>
        </tr>
    </table>
</div>