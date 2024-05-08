<link rel="stylesheet" href="danhmuc.css">
<h2 class="title"> Sửa danh mục sản phẩm </h2>
<div class="insert" >
    <table>
        <form method="POST" action="tranghienthi.php?quanly=sua&id=<?php echo $_GET['id'] ?>">
            <tr>
                <th style="text-align: center">Id</th>
                <td name="id"><?php echo $_GET['id'] ?></td>
            </tr> 
            <tr>
                <th style="text-align: center">Tên danh mục </th>
                <td><input type="text" name="tendanhmuc" style="width: 350px"></td>
            </tr>
            
            <tr>
                <td style="text-align: center;" colspan="2"><input type="submit" name="sua" value="Cập nhật"></td>
            </tr>
        </form>
    </table>
</div>