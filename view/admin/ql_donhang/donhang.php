<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.10.2/umd/popper.min.js"></script>
<link rel="stylesheet" href="ql_donhang/donhang.css"> 
<div class="main1">

<div class="nagivation">
    <a class="link" href="#" id="displayall">Tất cả</a>
    <a class="link" href="#" id="received">Đã ghi nhận</a>
    <a class="link" href="#" id="processed">Đang xử lý</a>
    <a class="link" href="#" id="delivery">Đang giao hàng</a>
    <a class="link" href="#" id="completed">Đã hoàn thành</a>
    <a class="link" href="#" id="canceled">Đơn hủy</a>
</div>
<div id="content">

</div>
</div>
<script>
      $(document).ready(function() {
        // Automatically trigger click on "displayall" link when page loads
        $("#displayall").trigger("click");
    });

    $("#displayall").click(function(e) {
        e.preventDefault();
        $("#content").load("ql_donhang/allorder.php");
    });

    $("#received").click(function(e) {
        e.preventDefault();
        $("#content").load("ql_donhang/receivedorder.php");
    });

    $("#processed").click(function(e) {
        e.preventDefault();
        $("#content").load("ql_donhang/processedorder.php");
    });

    $("#delivery").click(function(e) {
        e.preventDefault();
        $("#content").load("ql_donhang/deliveryorder.php");
    });

    $("#completed").click(function(e) {
        e.preventDefault();
        $("#content").load("ql_donhang/completedorder.php");
    });

    $("#canceled").click(function(e) {
        e.preventDefault();
        $("#content").load("ql_donhang/cancelledorder.php");
    });
    </script>
  