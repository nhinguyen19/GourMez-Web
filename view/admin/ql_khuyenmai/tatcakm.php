
<link rel="stylesheet" href="ql_khuyenmai/khuyenmai.css">
<div class="main">
    <h2> Tất cả tin tức khuyến mãi </h2>
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
            <td> <img src="'.$dis['img'].'" width="200px" </td>
             <td><a href="tranghienthi.php?quanly=updatediscountnews&id='.$dis['id'].'"> Sửa</a> | <a href="tranghienthi.php?quanly=deldiscountnews&id='.$dis['id'].'"> Xóa</a>  </td> 
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