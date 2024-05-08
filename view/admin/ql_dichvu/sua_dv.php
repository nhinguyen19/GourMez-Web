<style>
    .insert_dv
    {
        display: flex;
        justify-content: center;
        font-size: 20px;
        padding-left: 200px;
    }

    table
    {
        width: 800px;
    }

    
</style>
<h2 class = "title"> Sửa dịch vụ </h2>
<div class="insert_dv" >
    <table>
        <form method="POST" action="tranghienthi.php?quanly=suaDichVu&iddichvu=<?php echo $_GET['iddichvu']?>">
            <tr>
                <th style="text-align: center">ID</th>
                <td name="id"><?php echo $_GET['iddichvu'] ?></td>
            </tr> 

            <tr>
                <th style="text-align: center">Tên dịch vụ mới</th>
                <td><input type="text" name="tendichvu" style="width: 600px; height: 40px;font-size: 18px;background-color: #FFECCB; color: black;border:none"></td>
            </tr>

            <tr>
                <th style="text-align: center">Mô tả </th>
                <td>
                <textarea name = "mota" style="width: 600px; height:40px; font-size: 1px;background-color: #FFECCB; color: black;border:none"></textarea>
                </td>
            </tr>
            
            <tr>
                <td style="text-align: center;" colspan="2"><input type="submit" name="sua" value="Cập nhật" style = "font-size: 18px"></td>
            </tr>
        </form>
    </table>
</div>