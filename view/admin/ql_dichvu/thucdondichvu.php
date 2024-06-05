<style>
    th
    {
        padding-left: 10px;
        font-weight: bold;
        color: white;
        background-color: #222;
    }

    table
    {
        margin-bottom: 50px;
    }
    th, td
    {
        width: 150px;
        padding: 15px;
    }

    a
    {
        text-decoration: none;
        color: white;
    }

    a:hover
    {
        color: white;
    }

    
    input[type = 'submit'], input[type = 'reset']
    {
        background-color: rgba(73, 169, 111, 1);
        border-radius: 8px;
        border: none; 
        color: white;
        font-size: 22px;
        width: fit-content;
        height: fit-content;
        padding: 5px 10px 5px 10px;
        font-family: 'Lalezar';
        /* margin: 10px 0 10px 0; */
    }

    .title2{
        display: flex;
        justify-content: center;
        padding-top: 50px;
        font-family: 'Lalezar';
        margin-left: 150px;
        color:#fd7e14;
        font-size: 40px;
    }
    #iddichvu
    {
        font-weight: bold;
        padding-left: 10px;
        font-size: 22px;
    }

    button
    {
        background-color: rgba(73, 169, 111, 1);
        font-family: 'Lalezar';
        border-radius: 10px;
        border: none; 
        color: white;
        font-size: 15px;
        width: fit-content;
        padding: 5px;
        margin-bottom: 50px;
    }



</style>

<div class = "body" style="margin-top: -20px;">
<h2 class = "title2">Thực đơn</h2>
<div class = "food_service" style="display: flex; justify-content:center; padding-left: 200px; margin-bottom:10px;">
    <table>
     <form method="POST" action="tranghienthi.php?quanly=themmonan&iddichvu=<?php echo $_GET['iddichvu']?>">
            <tr>
                <th style="text-align:center;border: 1px solid black">Tên Combo</th>
                <th style="text-align:center;border: 1px solid black">Giá</th>
                <th style="text-align:center;border: 1px solid black">Hình ảnh</th>
                <th style="text-align:center;border: 1px solid black " >Quản lý món ăn</th>
            </tr>
            <?php
            $conn = connectdb();
            $id_service = $_GET['iddichvu'];
            $sql_lietke_mon = "SELECT * FROM food_for_service WHERE ID_service = $id_service";
            $result_lietke_mon = mysqli_query($conn, $sql_lietke_mon);
            $i = 0;
            while ($row = mysqli_fetch_array($result_lietke_mon)) {
                $i++;
             ?>     

            <tr>
                <td style = "text-align: center; border: 1px solid black" ><?php echo $row['food_combo']?></td>
                <td style = "text-align: center; border: 1px solid black"><?php echo $row['price']?></td>
                <td style="text-align: center; border: 1px solid black"><img src="../../view/admin/ql_dichvu/uploads/<?php echo $row['image'] ?>" width="100" height="100"></td>
                <td style="text-align: center;border: 1px solid black">
                    <button><a href="tranghienthi.php?quanly=xoamonandichvu&iddichvu=<?php echo $_GET['iddichvu']?>&idmonan=<?php echo $row['ID_food']; ?>">Xóa</a></button> <button><a href="tranghienthi.php?quanly=suamonandichvu&iddichvu=<?php echo $_GET['iddichvu']?>&idmonan=<?php echo $row['ID_food']; ?>">Sửa</a></button> 
                </td>     
            
            </tr>
             
            
                

            <?php 
            }
            ?>

            <tr>
            <td style="text-align: center" colspan="4">
                <form action="../admin/tranghienthi.php?quanly=themmonan&iddichvu= <?php echo $_GET['iddichvu']?>" method="post">
                    <input type="submit" value="Thêm món ăn">
                </form>
            </td>
            </tr>
        </form>
    </table>
</div>
</div>