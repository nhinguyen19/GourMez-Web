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
    
    .th
    {
        padding-left: 10px;
        font-weight: bold;
    }

    table
    {
        background-color: rgba(255,255,255,0.8);
        border-radius: 20px;
        margin-bottom: 50px;
        
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
        background-color: rgba(73, 169, 111, 1);
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

    .title
    {
        display: flex;
        justify-content: center;
        padding-top: 50px;
        font-family: 'Lalezar';
        margin-left: 150px;
        color:#fd7e14;
    }

    .body
  {
    background-image: url('/project/GourMez-Web/view/admin/ql_dichvu/uploads/background.png');
    height: 660px;
    margin-top: -30px;
    margin-bottom: -50px;
  }

    
</style>

<div class = "body">


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
                <input type = "number" name = "giamonandv" min = "10000" step = "1000"style=" height:40px; font-size: 15px;background-color: #FFECCB; color: black;border:none"></t>
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
                    <input type="reset" name = "reset_suamon" value = "Xóa thay đổi"style = "font-size: 18px; margin-left:30px">
                </td>
            </tr>
        </form>
    </table>
</div>



</div>