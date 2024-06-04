<style>
    .insert th,td
    {
        border: 1px solid black;
    }

    th,td
    {
        width: 170px;
    }

    th
    {
        padding: 15px;
    }

    .dv_container
    {
        display: flex;
        justify-content: center;
        margin-left: 150px;
    }

    .title
    {
        display: flex;
        justify-content: center;
        margin-bottom: 30px;
        padding-top: 40px;
        font-family: 'Lalezar';
        margin-left: 150px;
        color:#fd7e14;
    }

    .small_descript, .banner_col
    {
        padding: 20px 15px 20px 15px;
    }

    input[type = 'submit']
    {
        background-color: rgba(73, 169, 111, 1);
        border-radius: 8px;
        border: none; 
        color: white;
        font-size: 28px;
        width: 150px;
        height: fit-content;
        padding: 5px 10px 5px 10px;
        margin: 20px 0 0 0;
        font-family: 'Lalezar';
    }

    .body
  {
    background-image: url('/project/GourMez-Web/view/admin/ql_dichvu/uploads/background.png');
    height: 690px;
    margin-top: -50px;
    margin-bottom: -70px;
    padding-top: 40px;
  }
  table
    {
        background-color: rgba(255,255,255,0.8);
        border-radius: 20px;
        margin-bottom: 50px;
        
    }
</style>
<?php
    $conn = connectdb();
    $sql_lietke_dichvu = "SELECT * FROM service ORDER BY id_service ASC";
    $query_lietke_dichvu = mysqli_query($conn,$sql_lietke_dichvu);
?>

<div class = "body">
<h2 class="title" style = "padding-left:0px"> Tất cả dịch vụ </h2>

<div class = "dv_container">

    <div class="insert" style="font-size: 20px;">
        <table style = "border-collaspe:collaspe">
            <tr>
                <th style="text-align: center">ID</th>
                <th style="text-align: center">Tên dịch vụ</th>
                <th style="text-align: center">Mô tả</th>
                <th style="text-align: center">Logo</th>
                <th style="text-align: center">Banner</th>
                <th style="text-align: center">Thực đơn</th>
                <th style="text-align: center">Quản lý</th>
            </tr>
            <?php
                $i = 0;
                while($row = mysqli_fetch_array($query_lietke_dichvu))
                {
                    $i++;
            ?>     
            <tr>
                <td style="text-align: center"><?php echo $row['id_service'] ?></td>
                <td style="text-align: center"><?php echo $row['service_name']?></td>
                <td class = "small_descript" style="font-size: 15px; width: 250px; text-align: justify; "><?php echo $row['small_descript'] ?></td>
                <td style="text-align: center">
                    <img src = "../../view/admin/ql_dichvu/uploads/<?php echo $row['image']?>" style = "width: 150px; height: 150px;">
                </td>
                <td class = "banner_col" style="text-align: center">
                    <img src = "../../view/admin/ql_dichvu/uploads/<?php echo $row['banner']?>" style = "width: 200px; height: 100px;">
                </td>
                <td>
                    <button><a href="tranghienthi.php?quanly=thucdondv&iddichvu=<?php echo $row['id_service']; ?>">Xem thực đơn</a></button>
                </td>
                <td style="text-align: center"><a href="tranghienthi.php?quanly=xoaDichVu&iddichvu=<?php echo $row['id_service']; ?>">Xóa</a> | <a href="tranghienthi.php?quanly=suaDichVu&iddichvu=<?php echo $row['id_service']; ?>">Sửa</a></td>     
            </tr>
            <?php
                }
            ?>

    
            <tr>
                <td style="text-align: center" colspan="7">
                    <form action="../admin/tranghienthi.php?quanly=themdichvu" method="post">
                        <input type="submit" value="Thêm dịch vụ" style="font-size: 18px;">
                    </form>
                </td>
            </tr>
        </table>
    </div>

</div>
</div>