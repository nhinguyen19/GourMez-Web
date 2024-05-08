<style>
    .insert_dv
    {
        display: flex;
        justify-content: center;
    }

    table
    {
        width: fit-content;
    }
    
</style>
<h2> Sửa dịch vụ </h2>
<div class="insert_dv" >
    <table>
        <form method="POST" action="tranghienthi.php?quanly=suaDichVu&id=<?php echo $_GET['id'] ?>">
            <tr>
                <th style="text-align: center">ID</th>
                <td name="id"><?php echo $_GET['id'] ?></td>
            </tr> 
            <tr>
                <th style="text-align: center">Tên dịch vụ </th>
                <td><input type="text" name="tendichvu" style="width: 400px; background-color: #FFECCB; color: black;border:none"></td>
            </tr>

            <tr>
                <th style="text-align: center">Mô tả </th>
                <td>
                <textarea name = "mota" style="width: 400px; background-color: #FFECCB; color: black;border:none"></textarea>
                </td>
            </tr>
            
            <tr>
                <td style="text-align: center;" colspan="2"><input type="submit" name="sua" value="Cập nhật"></td>
            </tr>
        </form>
    </table>
</div>