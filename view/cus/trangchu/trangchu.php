<link rel="stylesheet" href="../view/cus/trangchu/trangchu.css">
<div class="trangchumain">
<div id="carouselExampleInterval" class="carousel slide" data-bs-ride="carousel">
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
                <button class="buttonguideli" id="GuiDeliTC" type="submit">Hiện nhà hàng gần bạn</button>
              </td>
            </tr>
            </table>
          </div>
          </td>
          </tr>
          </table>
        </div>

          
              
       
    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.21.1/axios.min.js"></script>
    <script>
	var citis = document.getElementById("city");
var districts = document.getElementById("district");
var wards = document.getElementById("ward");
var Parameter = {
  url: "https://raw.githubusercontent.com/kenzouno1/DiaGioiHanhChinhVN/master/data.json", 
  method: "GET", 
  responseType: "application/json", 
};
var promise = axios(Parameter);
promise.then(function (result) {
  renderCity(result.data);
});

function renderCity(data) {
  for (const x of data) {
    citis.options[citis.options.length] = new Option(x.Name, x.Id);
  }
  citis.onchange = function () {
    district.length = 1;
    ward.length = 1;
    if(this.value != ""){
      const result = data.filter(n => n.Id === this.value);

      for (const k of result[0].Districts) {
        district.options[district.options.length] = new Option(k.Name, k.Id);
      }
    }
  };
  district.onchange = function () {
    ward.length = 1;
    const dataCity = data.filter((n) => n.Id === citis.value);
    if (this.value != "") {
      const dataWards = dataCity[0].Districts.filter(n => n.Id === this.value)[0].Wards;

      for (const w of dataWards) {
        wards.options[wards.options.length] = new Option(w.Name, w.Id);
      }
    }Q
  };
}
	</script>
  <img class="postertrangchu" src="../view/cus/img/postertrangchu.png">
            </script>
            <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.10.2/umd/popper.min.js"></script>
</script>
</div>