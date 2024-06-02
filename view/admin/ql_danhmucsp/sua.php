<link rel ="stylesheet" href="tranghienthi.css">
<h2 class="title"> Sửa danh mục sản phẩm </h2>
<div class="insert" >
    <table>
        <form method="POST" action="tranghienthi.php?quanly=sua&id=<?php echo $_GET['id'] ?>">
            <tr style="font-family: 'Lalezar'">
                <td style="text-align: center">Id</td>
                <td name="id"><?php echo $_GET['id'] ?></td>
            </tr> 
            <tr>
                <td style="text-align: center; font-family: 'Lalezar'">Tên danh mục </td>
                <td><input type="text" name="tendanhmuc" style="width: 500px; background-color: #CFCBCB; border: none"></td>
            </tr>
            
            <tr>
                <td style="text-align: center;" colspan="2"><input type="submit" name="sua"  value="Cập nhật"></td>
            </tr>
        </form>
    </table>
</div>