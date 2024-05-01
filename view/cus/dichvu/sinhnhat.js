let slideIndex = 0;
showSlides();

function showSlides() {
  let i;
  let slides = document.getElementsByClassName("mySlides");
  for (i = 0; i < slides.length; i++) {
    slides[i].style.display = "none";
  }
  slideIndex++;
  if (slideIndex > slides.length) {slideIndex = 1}
  slides[slideIndex-1].style.display = "block";
  setTimeout(showSlides, 5000); // Change image every 2 seconds
}




// // Lấy ra các nút "Prev" và "Next"
// let prevButton = document.querySelector('.prev');
// let nextButton = document.querySelector('.next');

// // Gán sự kiện click cho nút "Prev"
// prevButton.addEventListener('click', function() {
//     plusSlides(-1); // Di chuyển đến slide trước đó
//     automaticMode = false; // Tắt chế độ tự động
// });

// // Gán sự kiện click cho nút "Next"
// nextButton.addEventListener('click', function() {
//     plusSlides(1); // Di chuyển đến slide tiếp theo
//     automaticMode = false; // Tắt chế độ tự động
// });

// // Hàm tự động chuyển slide
// function showSlides_automatic() {
//     let i;
//     let slides = document.getElementsByClassName("mySlides");
//     let dots = document.getElementsByClassName("dot");
//     for (i = 0; i < slides.length; i++) {
//       slides[i].style.display = "none";  
//     }
//     slideIndex++;
//     if (slideIndex > slides.length) {slideIndex = 1}    
//     for (i = 0; i < dots.length; i++) {
//       dots[i].className = dots[i].className.replace(" active", "");
//     }
//     slides[slideIndex-1].style.display = "block";  
//     dots[slideIndex-1].className += " active";
//     if (automaticMode) {
//         setTimeout(showSlides_automatic, 4000); // Tự động chuyển slide sau 4 giây
//     }
// }

// // Bắt đầu chuyển slide tự động khi trang được tải
// showSlides_automatic();
