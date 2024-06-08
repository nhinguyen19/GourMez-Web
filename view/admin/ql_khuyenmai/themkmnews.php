<link rel ="stylesheet" href="tranghienthi.css">
<div class="main">
<h2 class="title"> Thêm tin tức khuyến mãi </h2>
<div class ="main1">
<div class="insert" >
    <table>
    <form action="tranghienthi.php?quanly=themkmnews" method="post" enctype="multipart/form-data">
                <th>Tên tin tức khuyến mãi </th>
                <th><input type="text" name="namediscountnews" id=""></th>
            </tr>
            <tr>
                <th>Mô tả </th>
                <th> <textarea type="text" name="description" id=""></textarea></th>
            </tr>
            <tr>
                <th>Hình ảnh </th>
                <th>  <input type="file" name="img" id=""></th>
            </tr>
            
            <tr>
                <td style="text-align: center;" colspan="2"><input type="submit" name="themkmnews1" value="Thêm khuyến mãi"></td>
            </tr>
        </form>
    </table>
</div>
</div>
</div>