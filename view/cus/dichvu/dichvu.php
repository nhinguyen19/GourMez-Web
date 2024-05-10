<!-- <link rel="stylesheet" href="../dichvu/style_dv.css"> -->

<style>

@font-face {
  font-family: 'Lalezar';
  src: url('https://fonts.googleapis.com/css2?family=Lalezar&display=swap');
}
.container
{
    font-family: 'Lalezar';
}
.big
{
    display: grid;
    width: 1360px;
    grid-template-columns: 500px 700px;
    background-color: rgba(251, 229, 218, 1);
    margin-left: 50px;
    padding: 50px;
    border: 1px solid yellowgreen;
}
.content
{
    width: 480px ;
    padding-left: 50px;
    justify-content: center;
    align-items: center;
    text-align:justify;
    font-size: medium;
    line-height: 30px;
    padding-top: 60px;
}

.content h3
{
    color: orangered;
    font-family: 'Lalezar';
    font-size: 40px;
}

.content p
{
    color: grey;
    font-family: 'Times New Roman', Times, serif;
    font-size: 25px;
}

button
{
    width: fit-content;
    height: 50px;
    background-color: rgba(252, 47, 19, 1);
    border-radius: 30px;
    border-color: rgba(252, 47, 19, 1) ;
    color: white;
    font-size: 25px;
    padding-left: 10px;
    padding-right: 10px;
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif'
}

</style>

<?php
    require_once("C:/xampp/htdocs/project/GourMez-Web/model/connect.php");
    $conn = connectdb();
    $sql = "SELECT id_service,image,service_name, small_descript FROM service";
    $query = mysqli_query($conn, $sql);
?>


<div class="container" style=" margin: 10px;">
    <img src="../view/cus/img/banner_dv.png" style="width:1400px; height: 700px;align-items: center; margin-left: 10px">

    
    <div class="container_dv">
    <?php
    $i = 0;
    while ($row = mysqli_fetch_array($query)) {
        $i++;
    ?>
        <form method="POST" action="tranghienthi.php?quanly=<?php echo $row['id_service'] ?>">
            <div style="border: 1px solid green" class="big">
                <img src="../view/admin/ql_dichvu/uploads/<?php echo $row['image'] ?>" style="width: 400px; height:400px;padding-left:30px;">
                <div class="content">
                    <h3 style="color: orangered"><?php echo $row['service_name'] ?></h3>
                    <p><?php echo $row['small_descript'] ?></p>
                    <button type="submit">Đặt hàng</button>
                </div>
            </div>
        </form>
    <?php
    }
    ?>
</div>

    