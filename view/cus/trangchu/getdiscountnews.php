<style>



.title{
    display: flex;
    justify-content: center;
    text-align: center;
    color: #E26A2C;
    font-family: 'Lalezar';
    text-transform: uppercase;
}
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
    margin-top : 30px;
}


.btn_dathang{
    background-color: #E26A2C;
    border: none;
    border-radius: 10px;
    width: 150px;
    height:25px;
    color: #ffff;
    font-family: 'Lalezar';
    font-size: 16px;
}
.btn_dathang:active {
    background-color: #ffb84d; 
}
#amount{
    width: 30px;
    text-align: center;
    background-color: #E26A2C;
    color: #ffff;
}
#buy-amount{
    padding-right: 20px;
    padding-left: 30px;;

}
.button-quantity-container {
    display: flex;
    align-items: center;
}
.btn_amount{
    margin-right: 0; 
    background-color: #E26A2C; 
    border: none; 
    width:40px; 
    height:25px;
    border-radius: 0 10px 10px 0;
    color: #ffff;
}
#buy-amount button:active {
    background-color: #ffb84d; 
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
        <li class="khuyenmaigroup">  
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