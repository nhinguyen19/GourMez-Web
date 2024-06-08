<link rel="stylesheet" href="tranghienthi.css">
<script src="https://cdn.ckeditor.com/ckeditor5/41.3.1/classic/ckeditor.js"></script>
<?php
    $conn = connectdb();
    $id = $_GET['id'];
    $query = "SELECT * FROM discount WHERE id = $id";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($result);
?>
<h2 class="title">Sửa mã khuyến mãi</h2>
<div class="insert">
    <table>
        <form method="POST" action="tranghienthi.php?quanly=updatecodedis&id=<?php echo $_GET['id'] ?>" >
            <tr>
                <td style="text-align: center;font-family: 'Lalezar'">Id</td>
                <td name="id"><?php echo $_GET['id'] ?></td>
            </tr>
            <tr>
                <td style="text-align: center;font-family: 'Lalezar'">Tên mã khuyến mãi</td>
                <td><input type="text" name="discount_name" style="width: 350px; background-color: #FFECCB; color: black;border:none" value="<?php echo $row['code_dis']; ?>"></td>
            </tr>
            <tr>
                <td style="text-align: center;font-family: 'Lalezar'">Gía trị mã khuyến mãi</td>
                <td><input type="number"  name="qtt" id="qtt" rows="7"><?php echo $row['qtt_of_dis'] ?></td>
            </tr>
          
            <tr>
                <td style="text-align: center;" colspan="2"><input type="submit" name="suacodedis" value="Cập nhật"></td>
            </tr>
        </form>
    </table>
</div>

<!-- <script>
    ClassicEditor
        .create(document.querySelector('#des'))
        .catch(error => {
            console.error(error);
        });
</script> -->
