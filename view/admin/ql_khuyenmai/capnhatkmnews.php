<link rel="stylesheet" href="tranghienthi.css">
<script src="https://cdn.ckeditor.com/ckeditor5/41.3.1/classic/ckeditor.js"></script>
<?php
    $conn = connectdb();
    $id = $_GET['id'];
    $query = "SELECT * FROM discount_news WHERE id = $id";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($result);
?>
<h2 class="title">Sửa khuyến mãi</h2>
<div class="insert">
    <table>
        <form method="POST" action="tranghienthi.php?quanly=updatediscountnews&id=<?php echo $_GET['id'] ?>" enctype="multipart/form-data">
            <tr>
                <td style="text-align: center;font-family: 'Lalezar'">Id</td>
                <td name="id"><?php echo $_GET['id'] ?></td>
            </tr>
            <tr>
                <td style="text-align: center;font-family: 'Lalezar'">Tên khuyến mãi</td>
                <td><input type="text" name="discount_name" style="width: 350px; background-color: #FFECCB; color: black;border:none" value="<?php echo $row['discount_name']; ?>"></td>
            </tr>
            <tr>
                <td style="text-align: center;font-family: 'Lalezar'">Mô tả</td>
                <td><textarea name="des" id="des" rows="7"><?php echo $row['description'] ?></textarea></td>
            </tr>
            <tr>
                <td style="text-align: center;font-family: 'Lalezar'">Hình ảnh</td>
                <td><input type="file" name="img" style="width: 350px; font-family: Lalezar"></td>
            </tr>
          
            <tr>
                <td style="text-align: center;" colspan="2"><input type="submit" name="suakmnews" style= " background-color: #F5EAD7; border: 0.5px solid black;font-family: 'Lalezar'; color: #E26A2C" value="Cập nhật"></td>
            </tr>
        </form>
    </table>
</div>

<script>
    ClassicEditor
        .create(document.querySelector('#des'))
        .catch(error => {
            console.error(error);
        });
</script>
