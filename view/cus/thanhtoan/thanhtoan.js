var citis = document.getElementById("city");
var districts = document.getElementById("district");
var wards = document.getElementById("ward");

var Parameter = {
  url: "https://raw.githubusercontent.com/kenzouno1/DiaGioiHanhChinhVN/master/data.json",
  method: "GET",
  responseType: "application/json"
};

axios(Parameter).then(function (result) {
  renderCity(result.data);
});

function renderCity(data) {
  for (const x of data) {
    citis.options[citis.options.length] = new Option(x.Name, x.Id);
  }

  citis.onchange = function () {
    districts.length = 1;
    wards.length = 1;
    if (this.value != "") {
      const result = data.filter(n => n.Id === this.value);

      for (const k of result[0].Districts) {
        districts.options[districts.options.length] = new Option(k.Name, k.Id);
      }
    }
  };

  districts.onchange = function () {
    wards.length = 1;
    const dataCity = data.filter(n => n.Id === citis.value);
    if (this.value != "") {
      const dataWards = dataCity[0].Districts.filter(n => n.Id === this.value)[0].Wards;

      for (const w of dataWards) {
        wards.options[wards.options.length] = new Option(w.Name, w.Id);
      }
    }
  };
}

document.getElementById('GuiDeliTC').addEventListener('click', function(event) {
  event.preventDefault();
  const city = citis.options[citis.selectedIndex].text;
  if (city !== 'Đà Lạt') {
    openPopup();
  } else {
    // Redirect to the specified URL
    window.location.href = '../view/cus/menu/menu.php';
  }
});

function openPopup() {
  // Create the popup HTML dynamically
  const popupHtml = `
    <div id="popup" class="popup">
      <div class="popup-content">
        <p>Xin lỗi quý khách, GOURMEZ chỉ khả dụng giao hàng tại Đà Lạt</p>
        <button onclick="closePopup()">Đóng</button>
      </div>
    </div>
  `;
  // Append the popup HTML to the body
  document.body.insertAdjacentHTML('beforeend', popupHtml);
  // Show the popup
  document.getElementById('popup').style.display = 'flex';
}

function closePopup() {
  // Remove the popup from the DOM
  const popup = document.getElementById('popup');
  if (popup) {
    popup.remove();
  }
}
