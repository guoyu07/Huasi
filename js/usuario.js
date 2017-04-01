
//Variables

var userMenuTriger = document.getElementById('menu-triger');
var userMenu = document.getElementById('user-menu');

function showMenu(domItem){
  domItem.style.display = 'block';
}

function hideMenu(domItem){
  domItem.style.display = "none";
}

hideMenu(userMenu);

userMenuTriger.onmouseover = function(){
  showMenu(userMenu);
}

userMenu.onmouseover = function(){
  showMenu(this);
}

userMenuTriger.onmouseout = function(){
  hideMenu(userMenu);
}

userMenu.onmouseout = function(){
  hideMenu(this);
}
