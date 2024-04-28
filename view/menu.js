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
   