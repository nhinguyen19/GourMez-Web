<style>
    .insert_dv
    {
        display: flex;
        justify-content: center;
        font-size: 20px;
        padding-left: 200px;
    }
    th
    {
        padding: 15px;
        font-weight: bolder;
        font-family: 'Lalezar';
        font-size: 20px;
    }

    table
    {
        margin-bottom: 30px;
        width: 800px;
        
    }
    
    table,th, td
    {
        width: fit-content;
    } 
    
    .insert_dv td,th
    {
        border: 1px solid black;
    }

    input[type = 'submit'], input[type = 'reset']
    {
        background-color:#14942c;
        border-radius: 8px;
        border: none; 
        color: white;
        font-size: 22px;
        width: fit-content;
        height: fit-content;
        padding: 5px 10px 5px 10px;
        font-family: 'Lalezar';
        margin: 10px 0 10px 0;
    }

    input[type = 'reset']
    {
        background-color:#BB0000;
    }

    #iddichvu
    {
        font-weight: bolder;
        font-size: 20px;
        text-align: center;
    }

    .title1
    {
        display: flex;
        justify-content: center;
        padding-top: 50px;
        font-family: 'Lalezar';
        margin-left: 150px;
        color:#ff5722;
    }
    
</style>

<h2 class = "title1"> Sửa dịch vụ </h2>
<div class="insert_dv" >
    <table>
        <form method="POST" action="tranghienthi.php?quanly=suaDichVu&iddichvu=<?php echo $_GET['iddichvu']?>" enctype="multipart/form-data">
            <tr>
                <th style="text-align: center;border: 1px solid black">ID dịch vụ</th>
                <td id = "iddichvu" name="iddichvu"><?php echo $_GET['iddichvu'] ?></td>
            </tr> 

            <tr>
                <th style = "text-align:center">Logo mới</th>
                <td>
                    <input type = "file" name = "logodichvumoi" style="width: 600px;font-size: 18px;background-color:#d9dad7; color: black;border:none">
                </td>
            </tr>

            <tr>
                <th style = "text-align:center">Banner mới</th>
                <td>
                    <input type = "file" name = "bannerdichvumoi" style="width: 600px;font-size: 18px;background-color:#d9dad7; color: black;border:none">
                </td>
            </tr>

            <tr>
                <th style="text-align: center;border: 1px solid black">Tên dịch vụ mới</th>
                <td><input type="text" name="tendichvu" style="width: 600px; height: 40px;font-size: 18px;background-color:#d9dad7; color: black;border:none"></td>
            </tr>

            <tr>
                <th style="text-align: center;border: 1px solid black">Mô tả </th>
                <td>
                <textarea name = "mota" style="width: 600px; height:40px; font-size: 18px;background-color:#d9dad7; color: black;border:none"></textarea>
                </td>
            </tr>
            
            <tr>
                <td style="text-align: center;border: 1px solid black" colspan="2">
                    <input type="submit" name="sua" value="Cập nhật" style = "font-size: 18px">
                    <input type="reset" name = "reset_suamon" value = "Xóa thay đổi"style = "font-size: 18px; margin-left:30px">
                </td>
            </tr>
        </form>
    </table>
</div>




