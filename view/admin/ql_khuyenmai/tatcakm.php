

<div class="main">
    <h2> Quản lý khuyến mãi </h2>
    <form action="tramghienthi.php?act=themkm" method="POST">
        <input type="text" name="namecategory" id="">
        <input type="submit" name="themkm" value="Thêm mới">
</form>

<br>
<table>
    <tr>
        <th> STT</th> 
        <th> Tên khuyến mãi</th>
        <th> Miêu tả</th> 
        <th> Hình ảnh</th> 
</tr> 
<?php 
var_dump($kq);
 //check trong mảng đã có dữ liệu chưa
if (isset($kq)&&(count($kq)>0))
{
    $i =1;
    foreach ($kq as $dis)
    {
        echo '<tr>
            <td>'.$i.' </td> 
            <td>'.$dis['discount_name'].' </td>
            <td> '.$dis['description'].'</td> 
             <td><a href="index.php?act=updatecategory&id='.$dis['Id'].'"> Sửa</a> | <a href="index.php?act=delcategory&id='.$dis['Id'].'"> Xóa</a>  </td> 
                </tr> ';
        $i++;
    }
}
?>


</table>