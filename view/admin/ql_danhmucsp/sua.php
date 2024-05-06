<div class="insert_cat" >
    <table>
        <form method="POST" action="tranghienthi.php?quanly=sua&id=<?php echo $_GET['id'] ?>">
            <tr >
                <th style="text-align: center;" colspan ="2">Sửa danh mục sản phẩm</th>
            </tr>
            <tr>
                <td>Id</td>
                <td name="id"><?php echo $_GET['id'] ?></td>
            </tr> 
            <tr>
                <td>Tên danh mục </td>
                <td><input type="text" name="tendanhmuc"></td>
            </tr>
            
            <tr>
                <td style="text-align: center;" colspan="2"><input type="submit" name="sua" value="Sửa danh mục sản phẩm"></td>
            </tr>
        </form>
    </table>
</div>