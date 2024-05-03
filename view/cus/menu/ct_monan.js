 // Lấy thông tin từ URL
 function getParameterByName(name) {
    var url = window.location.href;
    name = name.replace(/[\[\]]/g, '\\$&');
    var regex = new RegExp('[?&]' + name + '(=([^&#]*)|&|#|$)'),
        results = regex.exec(url);
    if (!results) return null;
    if (!results[2]) return '';
    return decodeURIComponent(results[2].replace(/\+/g, ' '));
}
// Sử dụng thông tin từ URL để hiển thị chi tiết món ăn
document.addEventListener('DOMContentLoaded', function() {
    var chitietId = getParameterByName('id');
    var allChitietMon = document.querySelectorAll('[id^="chitiet_mon"]');
    for (var i = 0; i < allChitietMon.length; i++) {
        if (allChitietMon[i].id === chitietId) {
            // Hiển thị chi tiết món ăn tương ứng
            allChitietMon[i].style.display = 'block';
        } else {
            // Ẩn các chi tiết món ăn khác
            allChitietMon[i].style.display = 'none';
        }
    }
});
    function decreaseQuantity() {
        var quantityElement = document.getElementById('quantity');
        var quantity = parseInt(quantityElement.innerText);

        if (quantity > 1) {
            quantity--;
            quantityElement.innerText = quantity;
        }
    }

    function increaseQuantity() {
        var quantityElement = document.getElementById('quantity');
        var quantity = parseInt(quantityElement.innerText);

        quantity++;
        quantityElement.innerText = quantity;
    }