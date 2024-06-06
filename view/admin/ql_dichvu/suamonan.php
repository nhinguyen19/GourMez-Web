<style>
    .insert_food
    {
        display: flex;
        justify-content: center;
        font-size: 20px;
        padding-left: 200px;
    }
    th
    {
        padding: 15px;
        font-family: 'Lalezar';
        font-size: 20px;
        font-weight: bolder;
    }

    table
    {
        margin-bottom: 30px;
        width: 800px;
        
    }

    th,td
    {
         border: 1px solid black;
    }

    th, td
    {
        width: 150px;
        padding: 10px 5px 10px 5px;
    }
    
    input[type = 'submit'], input[type = 'reset']
    {
        background-color: #14942c;
        border-radius: 8px;
        border: none; 
        color: white;
        font-size: 22px;
        width: fit-content;
        height: fit-content;
        padding: 5px 10px 5px 10px;
        font-family: 'Lalezar';
        /* margin: 10px 0 10px 0; */
    }

    input[type = 'reset']
    {
        background-color:#BB0000;
    }


    .title
    {
        display: flex;
        justify-content: center;
        padding-top: 50px;
        font-family: 'Lalezar';
        margin-left: 150px;
        color:#ff5722;
    }
    
    #idmonan
    {
        font-weight: bolder;
        font-size: 20px;
        text-align: center;
    }

    .con_button
    {
        display: flex;
        justify-content: center;
        margin-left: 150px;
    }
</style>

<div class = "body">


<h2 class = "title"> Sửa món ăn </h2>
<div class="insert_food" >
    <table>
    <form method="POST" action="tranghienthi.php?quanly=suamonandichvu&iddichvu=<?php echo $_GET['iddichvu']?>&idmonan=<?php echo $_GET['idmonan']?>" enctype="multipart/form-data">
            <tr>
                <th style="text-align: center">ID món ăn</th>
                <td id="idmonan" name="idmonan"><?php echo $_GET['idmonan'] ?></td>
            </tr> 

            <tr>
                <th style="text-align: center">Tên món ăn mới</th>
                <td><input type="text" name="tenmonandv" style="width: 600px; height: 40px;font-size: 18px;background-color: #d9dad7; color: black;border:none"></td>
            </tr>

            <tr>
                <th style="text-align: center">Giá </th>
                <td>
                <input type = "number" name = "giamonandv" min = "10000" step = "1000"style=" height:40px; font-size: 15px;background-color: #d9dad7; color: black;border:none"></t>
                </td>
            </tr>
            
            <tr>
                <th style="text-align: center">Hình ảnh</th>
                <td>
                    <input type="file" name = "hinhanhmonandvmoi" id ="hinhanhmonandvmoi" style="width: 400px; background-color: #d9dad7; color: black;border:none">
                </td>
            </tr>
            
    </table>
</div>
    <div class = "con_button">
        <input type="submit" name="suamonanDV" value="Cập nhật" style = "font-size: 18px">
        <input type="reset" name = "reset_suamon" value = "Xóa thay đổi"style = "font-size: 18px; margin-left:30px">
    </div>

    </form>

</div>