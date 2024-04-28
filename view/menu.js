function hienThiMonAnTheoCategory(category) {
  // Lấy danh sách tất cả các món ăn
  var monAnList = document.getElementsByClassName("food-item");

  // Ẩn tất cả các món ăn
  for (var i = 0; i < monAnList.length; i++) {
    monAnList[i].style.display = "none";
  }

  // Hiển thị các món ăn thuộc category được chọn
  var monAnCategoryList = document.querySelectorAll("[data-category=['" + category + "']");
  for (var j = 0; j < monAnCategoryList.length; j++) {
    monAnCategoryList[j].style.display = "block";
  }
}
var monAnList = document.getElementsByClassName("Thucdon_mon");
console.log( monAnList.length);
console.log( monAnList);
for (var i = 0; i < monAnList.length; i++) {
  
  console.log(monAnList[i]);
}

// Gán sự kiện cho các thẻ <a> trong sidebar menu
// var sidebarMenuItems = document.getElementsByClassName("sidebar_menu")[0].getElementsByTagName("a");
// for (var k = 0; k < sidebarMenuItems.length; k++) {
//   sidebarMenuItems[k].addEventListener("click", function() {
//     var category = this.getAttribute("data-category");
//     hienThiMonAnTheoCategory(category);
//   });
// }
// var btnChuyenTrangList = document.getElementsByClassName("btn_chuyentrang");
// for (var k = 0; k < btnChuyenTrangList.length; k++) {
//   btnChuyenTrangList[k].addEventListener("click", function() {
//     hienThiMonAnTheoButton(this);
//   });
// }