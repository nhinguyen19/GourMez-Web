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
  
function dieuhuong()
{
  $(document).ready(function() {
      $(".btn_xemchitiet").click(function() {
          var monAnId = $(this).data("mon-id");
          var url = "ct_monan.html?id=" + monAnId;
          window.location.href = url;
      });
  });
}


  