<!-- <link rel="stylesheet" href="ql_dinhvu.css"> -->

<style>
    .insert_foodservice{
    display: flex;
    justify-content: center;
    padding-left: 50px;


}

th
    {
        font-size: 20px;
        font-family: 'Lalezar';
        font-weight: bolder;
    }
table,tr,th,td
{
    padding: 15px;
    font-size: 20px;
    border: 1px solid black;
}

table
{
    width: fit-content;
}

h2
{
    padding-left: 700px;
    padding-top: 30px;
    font-family: Lalezar;
    font-size: 30px;
    text-transform: uppercase;
    color: #E26A2C;
}
input[type = 'submit'],input[type = 'reset']
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
        margin-right: 20px;;
    }

    input[type = 'reset']
    {
        background-color:#BB0000;
    }
</style>
<h2> Thêm món ăn </h2>
<div class="insert_foodservice" >
    <table>
    <form method="POST" action = "tranghienthi.php?quanly=themmonan&iddichvu='<?php  echo $_GET['iddichvu'] ?>'" enctype="multipart/form-data">

            <input type="hidden" name = "IDdichvu" value = " <?php  echo $_GET['iddichvu'] ?>">
            <tr>
                <th style="text-align: center">Tên món ăn </th>
                <td><input required type="text" name="tenmon_dv" style="width: 400px; height: 30px; color: black;border:none"></td>
            </tr>
            <tr>
                <th>Giá tiền</th>
                <td>
                    <input required type = number name = "giamonan_dv" min = "10000" step = "1000" id = "giamonan_dv" style="width: 400px;; height: fit-content;color: black;border:none">
                </td>
            </tr>
            <tr>
                <th>Hình ảnh</th>
                <td>
                    <input type="file" name = "hinhanhmondv" id ="hinhanhmondv" style="width: 400px; background-color: white; color: black;border:none" required>
                </td>
            </tr>
            <tr>
                <td style="text-align: center;" colspan="2">
                    <input type="submit" name="themmonan" value="Thêm món ăn" style = "font-size: 18px">
                    <input type="reset"  value="Xóa thay đổi" style = "font-size: 18px">

                </td>
                
            </tr>

            

        </form>
    </table>
</div>
