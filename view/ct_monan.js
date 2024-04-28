// document.addEventListener("DOMContentLoaded", function() {
//     var menuLinks = document.querySelectorAll("#sidebar a");

//     // Xử lý sự kiện click cho mỗi liên kết trong sidebar
//     menuLinks.forEach(function(link) {
//         link.addEventListener("click", function(event) {
//             event.preventDefault(); // Ngăn chặn hành vi mặc định của liên kết

//             var categoryName = this.getAttribute("data-category"); // Lấy tên loại món ăn từ thuộc tính data-category

//             // Thay đổi URL bằng cách thêm tham số query "?category=<tên-loại-món-ăn>"
//             var newURL = "menu.html?category=" + encodeURIComponent(categoryName);
//             window.location.href = newURL; // Điều hướng trang đến URL mới
//         });
//     });
// });
// document.addEventListener("DOMContentLoaded", function() {
//     var urlParams = new URLSearchParams(window.location.search);
//     var categoryName = urlParams.get("category");

//     // Kiểm tra nếu có tham số query "category" trong URL
//     if (categoryName) {
//         // Hiển thị danh sách món ăn tương ứng với loại món ăn
//         console.log("Đang hiển thị danh sách món ăn cho loại: " + categoryName);
//         // Thực hiện các thao tác khác để hiển thị danh sách món ăn theo loại
//     }
// });