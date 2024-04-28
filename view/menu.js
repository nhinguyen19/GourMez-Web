function hienThiMonAnTheoCategory(category) {
  // Lấy tất cả các món ăn có thuộc tính data-category giống với danh mục được chọn
  var monAnElements = document.querySelectorAll('.Thucdon_mon[data-category="' + category + '"]');

  // Ẩn tất cả các món ăn
  var allMonAnElements = document.querySelectorAll('.Thucdon_mon');
  allMonAnElements.forEach(function(element) {
    element.style.display = 'none';
  });

  // Hiển thị các món ăn thuộc danh mục được chọn
  monAnElements.forEach(function(element) {
    element.style.display = 'block';
  });

  var thucdonTitleElement = document.querySelector('.title_thucdon');
  var categoryName = getCategoryName(category);
  thucdonTitleElement.innerText = categoryName;

  anCacNutChuyenTrang();
  annutDatngaynao();
}

function getCategoryName(category) {
  switch (category) {
    case 'category_ga':
      return 'Các món gà';
    case 'category_combo':
      return 'Combo tiết kiệm';
    case 'category_burger':
      return 'Burger';
    case 'category_snack':
      return 'Các món ăn kèm';
    case 'category_Noodle':
      return 'Mỳ ý';
    case 'category_drink':
      return 'Nước giải khát';
    default:
      return '';
  }}
  
  function anCacNutChuyenTrang() {
    var nutChuyenTrangElements = document.querySelectorAll('.btn_chuyentrang');
  
    nutChuyenTrangElements.forEach(function(element) {
      element.style.display = 'none';
    });
  }
  function annutDatngaynao() {
    var nutDatngaynao = document.querySelectorAll('.btn_datngaynao');
    nutDatngaynao.forEach(function(element) {
      element.style.display = 'none';
    });
  }
   
  function hienThiChiTietMonAn(button) {
    var chitietMonAn = button.parentNode.querySelector(".Chitiet_monan");
    chitietMonAn.style.display = "block";

    // Ẩn tất cả các mục món ăn khác
    var danhSachMonAn = document.querySelectorAll(".Thucdon_mon");
    danhSachMonAn.forEach(function (monAn) {
        if (monAn !== button.parentNode) {
            monAn.style.display = "none";
        }
    });

}