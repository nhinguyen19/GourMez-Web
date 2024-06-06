<!-- <link rel="stylesheet" href="ql_dinhvu.css"> -->

<style>
    .insert_service{
    display: flex;
    justify-content: center;
    padding-left: 50px;
}
th
    {
        font-family: 'Lalezar';
        font-size: 20px;
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
<h2> Thêm dịch vụ </h2>
<div class="insert_service" >
    <table>
    <form method="POST" action="tranghienthi.php?quanly=themdichvu" enctype="multipart/form-data">
            <tr>
                <th style="text-align: center">Tên dịch vụ </th>
                <td><input required type="text" name="tendichvu" style="width: 400px; height: 30px; background-color: white; color: black;border:none"></td>
            </tr>
            <tr>
                <th>Mô tả</th>
                <td>
                    <textarea name = "motadichvu" id = "motadichvu" style="width: 400px; height: 100px;background-color: white; color: black;border:none"> </textarea> 
                </td>
            </tr>
            <tr>
                <th>Logo</th>
                <td>
                    <input required type="file" name = "hinhanhdv" id ="hinhanhdv" style="width: 400px; background-color: white; color: black;border:none">
                </td>
            </tr>

            <tr>
                <th>Banner</th>
                <td>
                    <input required type="file" name = "bannerdv" id ="bannerdv" style="width: 400px; background-color: white; color: black;border:none">
                </td>
            </tr>

            <tr>
                <td style="text-align: center;" colspan="2">
                    <input type="submit" name="themdichvu" value="Thêm dịch vụ" style = "font-size: 18px">
                    <input type="reset" value="Xóa thay đổi" style = "font-size: 18px">
                </td>
            </tr>
        </form>
    </table>
</div>
