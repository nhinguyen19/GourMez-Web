<link rel="stylesheet" href="../view/LIB/bootstrap/css/bootstrap.min.css">
<link rel="stylesheet" href="../view/cus/trangchu/trangchu.css">
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<div class="trangchumain">
<img class="postertrangchu" src="../view/cus/img/GM1.png">
<!-- <div id="carouselExampleInterval" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
              <div class="carousel-item active" data-bs-interval="10000">
                <img class="banner" src="../view/cus/img/bannertrangchu.png" class="d-block w-100" alt="...">
              </div>
              <div class="carousel-item" data-bs-interval="2000">
                <img class="banner" src="../view/cus/img/bannertrangchu2.png" class="d-block w-100" alt="...">
              </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Next</span>
            </button>
        </div>

        <div class ="deliform">
          <table class="formdeli">
            <tr> 
              <td> 
                <div class="labelradius">
                  <p class="radius"> Giao hàng tận nơi</p>
                  </div>
              </td>
              <td>
              </td>
            </tr>
            <tr> 
              <td colspan ="2">
              <div class="inputdeliform">
                <table class="formdeli2">
                  <tr>
               <td> 
                <select class="form-select form-select-sm mb-3" id="city" aria-label=".form-select-sm">
                  <option value="" selected>Chọn tỉnh thành</option>           
                  </select>
               </td>
               <td>
                <select class="form-select form-select-sm mb-3" id="district" aria-label=".form-select-sm">
                  <option value="" selected>Chọn quận huyện</option>
                  </select>
               </td>
              <td>
                <select class="form-select form-select-sm mb-3" id="ward" aria-label=".form-select-sm">
                  <option value="" selected>Chọn phường </option>
                  </select>
              </td>
            </tr>
            <tr>
              <td colspan ="3">
                <input class="inputdeli" type="text" id="diachideli" placeholder="Nhập địa chỉ cụ thể của bạn">
              </td>
            </tr>
            <tr>
              <td colspan="3">
                <button class="buttonguideli" id="GuiDeliTC" type="submit"> Đặt giao hàng</button>
              </td>
            </tr>
            </table>
          </div>
          </td>
          </tr>
          </table>
        </div>  -->
    
        <div class="chuongtrinh">
            <a class="link" href="#" id="displayfood">Hôm nay ăn gì?      </a>
            <a class="link" href="#" id="displaynews">Khuyến mãi siêu hot</a>
        </div>
        <div class="ctcontent" id="content">
            <!-- Nơi hiển thị danh sách món ăn -->
        </div>
        <script>
          $("#displayfood").click(function(e)
        {
          e.preventDefault();
          $("#content").load("../view/cus/trangchu/getdishes.php");
        })
        $("#displaynews").click(function(e)
        {
          e.preventDefault();
          $("#content").load("../view/cus/trangchu/getdiscountnews.php");
        })
         
        </script>


        <img class="poster" src="../view/cus/img/pic1.png">
        <div class="memcontain">
    <div class="member-box">
        <div class="memgroup">
            <img src="../view/cus/img/mem2.jpg" alt="Member 1">
            <h3>Thành viên 1</h3>
            <button class="detail-btn" data-id="1">Xem chi tiết</button>
            <div class="member-info" id="info-1"></div>
        </div>
        <div class="memgroup">
            <img src="../view/cus/img/mem1.jpg" alt="Member 2">
            <h3>Thành viên 2</h3>
            <button class="detail-btn" data-id="2">Xem chi tiết</button>
            <div class="member-info" id="info-2"></div>
        </div>
        <div class="memgroup">
            <img src="path_to_image3.jpg" alt="Member 3">
            <h3>Thành viên 3</h3>
            <button class="detail-btn" data-id="3">Xem chi tiết</button>
            <div class="member-info" id="info-3"></div>
        </div>
        <div class="memgroup">
            <img src="path_to_image4.jpg" alt="Member 4">
            <h3>Thành viên 4</h3>
            <button class="detail-btn" data-id="4">Xem chi tiết</button>
            <div class="member-info" id="info-4"></div>
        </div>
        <div class="memgroup">
            <img src="path_to_image5.jpg" alt="Member 5">
            <h3>Thành viên 5</h3>
            <button class="detail-btn" data-id="5">Xem chi tiết</button>
            <div class="member-info" id="info-5"></div>
        </div>
    </div>
</div>
  //<img class="postertrangchu" src="../view/cus/img/postertrangchu.png">
            </script>
           
            <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.10.2/umd/popper.min.js"></script>
            <script src="../view/LIB/bootstrap/js/bootstrap.min.js"></script>
</div>