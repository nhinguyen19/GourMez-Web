<style>
    .insert_dv
    {
        display: flex;
        justify-content: center;
        font-size: 20px;
        padding-left: 200px;
    }

    table
    {
        width: 800px;
    } 
    
    
</style>


<h2 class = "title" style="padding-left: 0px"> Sửa dịch vụ </h2>
<div class="insert_dv" >
    <table>
        <form method="POST" action="tranghienthi.php?quanly=suaDichVu&iddichvu=<?php echo $_GET['iddichvu']?>">
            <tr>
                <th style="text-align: center">ID</th>
                <td name="iddichvu"><?php echo $_GET['iddichvu'] ?></td>
            </tr> 

            <tr>
                <th style="text-align: center">Tên dịch vụ mới</th>
                <td><input type="text" name="tendichvu" style="width: 600px; height: 40px;font-size: 18px;background-color: #FFECCB; color: black;border:none"></td>
            </tr>

            <tr>
                <th style="text-align: center">Mô tả </th>
                <td>
                <textarea name = "mota" style="width: 600px; height:40px; font-size: 18px;background-color: #FFECCB; color: black;border:none"></textarea>
                </td>
            </tr>
            
            <tr>
                <td style="text-align: center;" colspan="2"><input type="submit" name="sua" value="Cập nhật" style = "font-size: 18px"></td>
            </tr>
        </form>
    </table>
</div>




<!-- ------------------------------------------------------Món ăn ---------------------------------------------------------------------------------- -->

<h2 class = "title">Món ăn</h2>
<div class = "food_service" style="display: flex; justify-content:center; padding-left: 200px;">





    <table>
     <form method="POST" action="tranghienthi.php?quanly=themmonan&iddichvu=<?php echo $_GET['iddichvu']?>">
            <tr>
                <th>Tên Combo</th>
                <th>Giá</th>
                <th>Hình ảnh</th>
                <th>Quản lý món ăn</th>
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
                <td style = "text-align: center"><?php echo $row['food_combo']?></td>
                <td style = "text-align: center"><?php echo $row['price']?></td>
                <td style="text-align: center"><img src="../../view/admin/ql_dichvu/uploads/<?php echo $row['image'] ?>" width="100" height="100"></td>
                <td style="text-align: center"><a href="tranghienthi.php?quanly=xoamonandichvu&iddichvu=<?php echo $_GET['iddichvu']?>&idmonan=<?php echo $row['ID_food']; ?>">Xóa</a> | <a href="tranghienthi.php?quanly=suamonandichvu&idmonan=<?php echo $row['ID_food']; ?>">Sửa</a></td>     
            
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