<!-- <link rel="stylesheet" href="../dichvu/style_dv.css"> -->

<style>

@font-face {
  font-family: 'Lalezar';
  src: url('https://fonts.googleapis.com/css2?family=Lalezar&display=swap');
}
.container
{
    font-family: 'Lalezar';
    margin-bottom: 50px;
}
.big
{
    display: grid;
    grid-template-columns: 500px 700px;
    padding: 50px;
    margin-top: 50px;
    background-color: #F5EAD7;
    border-radius: 40px;
    width: fit-content;
    height: fit-content;
    margin-left: 50px;
}

.content
{
    width: 500px ;
    padding-left: 50px;
    justify-content: center;
    align-items: center;
    text-align:justify;
    font-size: medium;
    line-height: 30px;
    padding-top: 40px;
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

button:hover {
  box-shadow: 0 0 25px rgba(33,33,33,.2); 
}
hr
{
    background-color: black;
}
</style>

<?php
    require_once("../model/connect.php");
    $conn = connectdb();
    $sql = "SELECT id_service,image,service_name, small_descript FROM service";
    $query = mysqli_query($conn, $sql);
?>


<div class="container">
    <img src="../view/cus/img/BannerDichVu.png" style="width:100%; height: 700px;margin-top:50px">

    <div class="container_dv">
    <?php
    $i = 0;
    // $colors = ["#F7CACD", "#FEEFDD", "#50B2CO"];
    while ($row = mysqli_fetch_array($query)) {
        // $bgColor = $colors[$i % count($colors)]; 
        $i++;
    ?>
        <form style = "display:flex; justify-content: center;" method="POST" action="tranghienthi.php?quanly=<?php echo $row['id_service'] ?>">
            <div class="big">  
                <img src="../view/admin/ql_dichvu/uploads/<?php echo $row['image'] ?>" style="width: 400px; height:400px;padding-left:30px;">
                <div class="content">
                    <h3 style="color: orangered"><?php echo $row['service_name'] ?></h3>
                    <p><?php echo $row['small_descript'] ?></p>
                    <button type="submit" style = "font-family: 'Lalezar'">Đặt hàng</button>
                </div> 
            </div>
        </form> 
    <?php
    }
    ?>
    
    </div>
</div>


    