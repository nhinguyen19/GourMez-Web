
<link rel="stylesheet" href="ql_khuyenmai/khuyenmai.css">
<div class="main">
    <h2> Quản lý khuyến mãi </h2>
<div class="tablekhuyenmai">
<table>
    <tr>
        <th> STT</th> 
        <th> Tên khuyến mãi</th>
        <th> Miêu tả</th> 
        <th> Hình ảnh</th> 
        <th></th>
</tr> 
<?php 
//var_dump($kq);
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
            <td> '.$dis['img'].' </td>
             <td><a href="index.php?act=updatecategory&id='.$dis['Id'].'"> Sửa</a> | <a href="index.php?act=delcategory&id='.$dis['Id'].'"> Xóa</a>  </td> 
                </tr> ';
        $i++;
    }
}
?>

<tr><th colspan="5">
<form action="tranghienthi.php?quanly=themkmnews" method="POST"class="tablekhuyenmai">
        <input type="submit" name="themkmnews" value="Thêm mới">
    </form>
</th>
</tr>
</table>
</div>