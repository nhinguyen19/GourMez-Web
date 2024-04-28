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
    location.assign("ct_monan.html");
}


  