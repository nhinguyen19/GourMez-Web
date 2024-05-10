<style>
    .insert_food
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


<h2 class = "title"> Sửa món ăn </h2>
<div class="insert_food" >
    <table>
        <form method="POST" action="tranghienthi.php?quanly=suamonandichvu&idmonan=<?php echo $_GET['idmonan']?>" enctype="multipart/form-data">
            <tr>
                <th style="text-align: center">ID</th>
                <td name="idmonanDV"><?php echo $_GET['idmonan'] ?></td>
            </tr> 

            <tr>
                <th style="text-align: center">Tên món ăn mới</th>
                <td><input type="text" name="tenmonandv" style="width: 600px; height: 40px;font-size: 18px;background-color: #FFECCB; color: black;border:none"></td>
            </tr>

            <tr>
                <th style="text-align: center">Giá </th>
                <td>
                <input type = "number" name = "giamonandv" min = "10000" step = "1000"style=" height:40px; font-size: 15px;background-color: #FFECCB; color: black;border:none"></>
                </td>
            </tr>
            
            <tr>
                <th style="text-align: center">Hình ảnh</th>
                <td>
                    <input type="file" name = "hinhanhmonandvmoi" id ="hinhanhmonandvmoi" style="width: 400px; background-color: #FFECCB; color: black;border:none">
                </td>
            </tr>
            <tr>
                <td style="text-align: center;" colspan="4">
                    <input type="submit" name="suamonanDV" value="Cập nhật" style = "font-size: 18px">
                </td>
            </tr>
        </form>
    </table>
</div>



