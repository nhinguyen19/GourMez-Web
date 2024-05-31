document.addEventListener('DOMContentLoaded', function() {
  const citySelect = document.getElementById('city');
  const wardSelect = document.getElementById('ward');

  const wards = {
      "Đà Lạt": Array.from({length: 12}, (_, i) => `Phường ${i + 1}`),
      "Hồ Chí Minh": [
          "Quận 1", "Quận 2", "Quận 3", "Quận 4", "Quận 5", 
          "Quận 6", "Quận 7", "Quận 8", "Quận 9", "Quận 10",
          "Quận 11", "Quận 12", "Quận Bình Thạnh", "Quận Gò Vấp",
          "Quận Phú Nhuận", "Quận Tân Bình", "Quận Tân Phú",
          "Quận Thủ Đức", "Huyện Bình Chánh", "Huyện Cần Giờ",
          "Huyện Củ Chi", "Huyện Hóc Môn", "Huyện Nhà Bè"
      ]
  };

  citySelect.addEventListener('change', function() {
      const selectedCity = citySelect.value;
      const options = wards[selectedCity] || [];

      wardSelect.innerHTML = '<option value="" selected>Chọn phường</option>';
      options.forEach(ward => {
          const option = document.createElement('option');
          option.value = ward;
          option.textContent = ward;
          wardSelect.appendChild(option);
      });
  });
});


document.getElementById('GuiDeliTC').addEventListener('click', function(event) {
  event.preventDefault();
  const city = citis.options[citis.selectedIndex].text;
  if (city !== 'Tỉnh Lâm Đồng') {
    openPopup();
  } else {
    // Redirect to the specified URL
    openPopup();
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
