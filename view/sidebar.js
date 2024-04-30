function hienThiMonAnTheoCategory(category) {
  switch (category) {
    case 'category_ga':
      window.location.href = 'menu_ga.html';
      break;
    case 'category_combo':
      window.location.href = 'menu_combotietkiem.html';
      break;
    case 'category_burger':
      window.location.href = 'menu_burger.html';
      break;
    case 'category_snack':
      window.location.href = 'menu_cacmonankem.html';
      break;
    case 'category_Noodle':
      window.location.href = 'menu_myy.html';
      break;
    case 'category_drink':
      window.location.href = 'menu_nuocgiaikhat.html';
      break;
    default:
      break;
  }
}