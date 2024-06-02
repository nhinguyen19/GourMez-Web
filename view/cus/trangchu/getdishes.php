<style>
.Thucdon_mon{
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
.Ten_mon{
    color: #000000;
}
.label {
    color: black;
    font-weight: bold;
}

.price {
    color: #f98324;
    font-weight: bold;
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
.btn_xemchitiet:hover:not(.active) {
    background-color: #ffb84d;
    transition: background-color 0.3s ease;
}

.food-item {
   display: grid;
    grid-template-columns: repeat(4, 1fr);
    grid-template-rows: repeat(2, 1fr);
    grid-gap: 30px; 
    justify-items: center;
    align-items: center;
    height: 100%;
    overflow: hidden; 
    /* margin-top : 30px;  */
}

.dishes{
    margin-top : 0px;
}
</style>
<?php
include('../../../model/connect.php');
$conn = connectdb();
    $sql_lietke_sanpham = "SELECT * FROM food, category WHERE food.cate_id = category.cate_id and food.food_id between 1 and 8 ORDER BY food_id ASC";
    $query_lietke_sanpham = mysqli_query($conn, $sql_lietke_sanpham);
?>

<ul id="all_dishes">
    <div class="food-item">
        <?php
            $i = 0;
            while ($row = mysqli_fetch_array($query_lietke_sanpham)) {
                $i++;
        ?>
        <li class="Thucdon_mon" style="margin-top : 20px;">  
            <img src="../view/admin/ql_sanpham/uploads/<?php echo $row['img'] ?>" style="width: 150px; height: 150px;">
            <p class="Ten_mon"><?php echo $row['food_name'] ?></p>
            <p>
                <span class="label">Giá bán:</span> 
                <span class="price"><?php echo number_format($row['selling_price'],0,',','.').'vnđ' ?></span>
            </p>
            <button class="btn_xemchitiet">
                <a href="hienthi_menu.php?quanly=chitiet_sp&id=<?php echo $row['food_id']?>" style="text-decoration: none; color: #ffff;">Xem chi tiết</a>
            </button>
        </li>
    <?php
            }
        ?>
    </div>
</ul>
<div class="xemthembutton" >
<button class="btn_xemthem" style="margin-top : 10px; margin-bottom: 10px; size : 20px;">
                <a href="tranghienthi.php?quanly=thucdon" style="text-decoration: none; color: #ffff; ">XEM THÊM</a>
            </button>
            </div>
       