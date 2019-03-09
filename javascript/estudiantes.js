window.onload = function setView(){
  var headerIMG= document.getElementById('headerIMG');
  headerIMG.style.backgroundImage = "url('https://i.imgur.com/Po4JpNc.png')";

  var headerIMG= document.getElementById('headerIMG');
  var menu = document.getElementById("dropddd");
  var menuTw = document.getElementById("dropdddr");
  var logoutBtn = document.getElementById('userLOBtn');
  var logoutMenu = document.getElementById('dropMenu');

  var isPressed = 1;

  menu.classList.add("dropdown-content");
  menuTw.classList.add("dropdown-content");

  logoutBtn.addEventListener("click", function(){

    isPressed += 1;
    if (isPressed % 2 == 0) {
        isPressed = false;
        logoutMenu.classList.remove("hide");
        logoutMenu.classList.add("dropdown-user");
      }else{
        logoutMenu.classList.remove("dropdown-user");
        logoutMenu.classList.add("hide");
      }
  });
}

window.onscroll = function navBar(){
  var navbar = document.getElementById("navbar");
  var menu = document.getElementById("dropddd");
  var menuTw = document.getElementById("dropdddr");
  document.getElementsByClassName('className')

  if (window.pageYOffset >= 188) {
    navbar.classList.add("sticky");
    menu.classList.add("dropdown-content_Sticky");
    menuTw.classList.add("dropdown-content_Sticky");
  } else {
    navbar.classList.remove("sticky");
    menu.classList.remove("dropdown-content_Sticky");
    menuTw.classList.remove("dropdown-content_Sticky");
  }
}
