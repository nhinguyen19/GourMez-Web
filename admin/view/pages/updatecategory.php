


<div class="main">
    <h2> Cập nhật danh mục </h2>
<?php
//echo var_dump($kqone);
?>
    <form action="index.php?act=updatecategory" method="post">
        <input type="text" name="categoryname" id="" value="<?=$kqone[0]['category_name']?>">
        <input type="hidden" name="id" value="<?=$kqone[0]['id_category']?>">
        <input type="submit" name="capnhat" value="Cập nhật">
     </form>

<br>
<table>
    <tr>
        <th> STT</th> 
        <th> Tên danh mục</th>
        <th> Ưu tiên</th> 
        <th> Hành động</th> 
</tr> 
<?php 
//var_dump($kq);
// check trong mảng đã có dữ liệu chưa
if (isset($kq)&&(count($kq)>0))
{
    $i =1;
    foreach ($kq as $cate)
    {
        echo '<tr>
            <td>'.$i.' </td> 
            <td>'.$cate['category_name'].' </td>
            <td> '.$cate['number'].'</td> 
            <td><a href="index.php?act=updatecategory&id='.$cate['id_category'].'"> Sửa</a> | <a href="index.php?act=delcategory&id='.$cate['id_category'].'"> Xóa</a>  </td> 
                </tr> ';
        $i++;
    }
}
?>


</table>
