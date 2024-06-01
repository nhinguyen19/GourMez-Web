<!-- <link rel="stylesheet" href="ql_dinhvu.css"> -->

<style>
    .insert_service{
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
<h2> Thêm dịch vụ </h2>
<div class="insert_service" >
    <table>
    <form method="POST" action="tranghienthi.php?quanly=themdichvu" enctype="multipart/form-data">
            <tr>
                <th style="text-align: center">Tên dịch vụ </th>
                <td><input required type="text" name="tendichvu" style="width: 400px; height: 30px; background-color: #FFECCB; color: black;border:none"></td>
            </tr>
            <tr>
                <th>Mô tả</th>
                <td>
                    <textarea name = "motadichvu" id = "motadichvu" style="width: 400px; height: 100px;background-color: #FFECCB; color: black;border:none"> </textarea> 
                </td>
            </tr>
            <tr>
                <th>Logo</th>
                <td>
                    <input required type="file" name = "hinhanhdv" id ="hinhanhdv" style="width: 400px; background-color: #FFECCB; color: black;border:none">
                </td>
            </tr>

            <tr>
                <th>Banner</th>
                <td>
                    <input required type="file" name = "bannerdv" id ="bannerdv" style="width: 400px; background-color: #FFECCB; color: black;border:none">
                </td>
            </tr>

            <tr>
                <td style="text-align: center;" colspan="2"><input type="submit" name="themdichvu" value="Thêm dịch vụ" style = "font-size: 18px"></td>
            </tr>
        </form>
    </table>
</div>
