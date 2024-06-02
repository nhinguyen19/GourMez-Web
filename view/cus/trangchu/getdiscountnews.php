<style>

.khuyenmaigroup{
    background-color: #ffffff;
    border-radius: 20px;
    border : 1px solid #000000;
    box-shadow: 0 0 10px 2px rgba(0, 0, 0, 0.09);
    display: inline-block;
    width : 200px;
    height : 300px;
    padding: 15px;
    justify-content: center;
    text-align: center;
}
.discount_name{
    color: #000000;
}
.label {
    color: black;
    font-weight: bold;
}
.btn_xemthem
{
    background-color: #E26A2C;
    border: none;
    border-radius: 10px;
    width: 100px;
    height: 23px;
    color: #ffff;
    font-family: 'Lalezar';
    font-size: 16px;
}
.xemthembutton
{
    display : flex;
    justify-content: center;
}

.btn_xemchitiet{
    background-color: #E26A2C;
    border: none;
    border-radius: 10px;
    width: 100px;
    height: 23px;
    color: #ffff;
    font-family: 'Lalezar';
    font-size: 16px;
}
.btn_xemchitiet:hover:not(.active) {
    background-color: #ffb84d;
    transition: background-color 0.3s ease;
}

.onediscount {
    display: grid;
    grid-template-columns: repeat(4, 1fr);
    grid-template-rows: repeat(2, 1fr);
    grid-gap: 30px;
    justify-items: center;
    align-items: center;
    height: 100%;
    overflow: hidden; 
    /* margin-top : 30px; */
}



</style>
<?php
include('../../../model/connect.php');
    $conn = connectdb();
    $sql_lietke= "SELECT * FROM discount_news ORDER BY id ASC";
    $query_lietke = mysqli_query($conn, $sql_lietke);
?>
<ul id="tatcadiscount">
    <div class="onediscount">
        <?php
            $i = 0;
            while ($row = mysqli_fetch_array($query_lietke)) {
                $i++;
        ?>
        <li class="khuyenmaigroup" style="margin-top : 20px; margin-bottom:20px;">  
            <img src="../view/admin/<?php echo $row['img'] ?>" style="width: 150px; height: 150px;">
            <p class="discount_name"><?php echo $row['discount_name'] ?></p>
            <button class="btn_xemchitiet">
                <a href="tranghienthi.php?quanly=chitietkm&id=<?php echo $row['id']?>" style="text-decoration: none; color: #ffff;">Xem chi tiết</a>
            </button>
        </li>
        <?php
            }
        ?>
    </div>
</ul>
<div class="xemthembutton" >
<button class="btn_xemthem" style="margin-top : 10px; margin-bottom: 10px; size : 20px;">
                <a href="tranghienthi.php?quanly=khuyenmai" style="text-decoration: none; color: #ffff; ">XEM THÊM</a>
            </button>
            </div>
       