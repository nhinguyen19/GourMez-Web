function hienThiMonAnTheoCategory(category) {
  switch (category) {
    case 'category_ga':
      window.location.href = '../menu/menu_ga.html';
      break;
    case 'category_combo':
      window.location.href = '../menu/menu_combotietkiem.html';
      break;
    case 'category_burger':
      window.location.href = '../menu/menu_burger.html';
      break;
    case 'category_snack':
      window.location.href = '../menu/menu_cacmonankem.html';
      break;
    case 'category_Noodle':
      window.location.href = '../menu/menu_myy.html';
      break;
    case 'category_drink':
      window.location.href = '../menu/menu_nuocgiaikhat.html';
      break;
    default:
      break;
  }
}