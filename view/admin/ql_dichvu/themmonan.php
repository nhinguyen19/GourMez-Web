<!-- <link rel="stylesheet" href="ql_dinhvu.css"> -->

<style>
    .insert_foodservice{
    display: flex;
    justify-content: center;
    padding-left: 50px;


}

table,tr,th,td{
    border: 1px solid black;
    background-color: #f0ac74;
    border-collapse: collapse;
    padding: 15px;
    font-size: 20px;
}

table{
    width: fit-content;
}
h2{
    padding-left: 700px;
    padding-top: 30px;
    font-family: Lalezar;
    font-size: 30px;
    text-transform: uppercase;
    color: #E26A2C;
}
</style>
<h2> Thêm món ăn </h2>
<div class="insert_foodservice" >
    <table>
    <form method="POST">

            <input type="hidden" name = "IDdichvu" value = " <?php  echo $_GET['iddichvu'] ?>">
            <tr>
                <th style="text-align: center">Tên món </th>
                <td><input type="text" name="tenmon_dv" style="width: 400px; height: 30px; background-color: #FFECCB; color: black;border:none"></td>
            </tr>
            <tr>
                <th>Giá</th>
                <td>
                    <input type = number name = "giamonan_dv" id = "giamonan_dv" style="width: 400px; height: 100px;background-color: #FFECCB; color: black;border:none">
                </td>
            </tr>
            <tr>
                <th>Hình ảnh</th>
                <td>
                    <input type="file" name = "hinhanh_mondv" id ="hinhanh_mondv" style="width: 400px; background-color: #FFECCB; color: black;border:none">
                </td>
            </tr>
            <tr>
                <td style="text-align: center;" colspan="2"><input type="submit" name="themmonan" value="Thêm món ăn" style = "font-size: 18px"></td>
            </tr>
        </form>
    </table>
</div>
