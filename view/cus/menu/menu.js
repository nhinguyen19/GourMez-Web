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
function dieuhuong() {
  // Lấy giá trị data-chitiet-id
  var chitietId = $(event.target).closest('.Thucdon_mon').data('chitiet-id');

  // Tạo đường dẫn đến trang chi tiết món ăn
  var path = "ct_monan.html?id=" + chitietId;

  // Chuyển hướng sang trang chi tiết món ăn
  window.location.href = path;
}

