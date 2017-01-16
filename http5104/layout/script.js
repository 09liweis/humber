function toggleMenu() {
  var menu = document.querySelector("#main-menu");
  if (menu.className == 'show-small') {
    menu.classList.remove('show-small');
  } else {
	menu.classList.add('show-small');
  }
}