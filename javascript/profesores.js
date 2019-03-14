window.onload = function setView(){
  var headerIMG= document.getElementById('headerIMG');

  headerIMG.style.backgroundImage = "url('https://i.imgur.com/xrWbEXa.png')";
  menu.classList.add("dropdown-content");
  menuTw.classList.add("dropdown-content");
}

window.onscroll = function navBar(){
  var navbar = document.getElementById("navbar");
  document.getElementsByClassName('className')

  if (window.pageYOffset >= 188) {
    navbar.classList.add("sticky");
  } else {
    navbar.classList.remove("sticky");
  }
}
