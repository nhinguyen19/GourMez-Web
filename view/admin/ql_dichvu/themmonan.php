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
    <form method="POST" action = "tranghienthi.php?quanly=themmonan&iddichvu='<?php  echo $_GET['iddichvu'] ?>'" enctype="multipart/form-data">

            <input type="hidden" name = "IDdichvu" value = " <?php  echo $_GET['iddichvu'] ?>">
            <tr>
                <th style="text-align: center">Tên món ăn </th>
                <td><input required type="text" name="tenmon_dv" style="width: 400px; height: 30px; background-color: #FFECCB; color: black;border:none"></td>
            </tr>
            <tr>
                <th>Giá tiền</th>
                <td>
                    <input required type = number name = "giamonan_dv" min = "10000" step = "1000" id = "giamonan_dv" style="width: 400px;; height: fit-content;background-color: #FFECCB; color: black;border:none">
                </td>
            </tr>
            <tr>
                <th>Hình ảnh</th>
                <td>
                    <input type="file" name = "hinhanhmondv" id ="hinhanhmondv" style="width: 400px; background-color: #FFECCB; color: black;border:none" required>
                </td>
            </tr>
            <tr>
                <td style="text-align: center;" colspan="2"><input type="submit" name="themmonan" value="Thêm món ăn" style = "font-size: 18px"></td>
            </tr>

            

        </form>
    </table>
</div>
