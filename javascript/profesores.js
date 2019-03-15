window.onload = function setView(){
  var headerIMG= document.getElementById('headerIMG');
  var menu = document.getElementById("dropddd");
  var menuTw = document.getElementById("dropdddr");
  var logoutBtn = document.getElementById('userLOBtn');
  var logoutMenu = document.getElementById('dropMenu');

  var isPressed = 1;

  headerIMG.style.backgroundImage = "url('https://i.imgur.com/xrWbEXa.png')";
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

function validateForm(){

    var nombreClase = document.getElementsByName('nombreClase').value;
    var descripcionClase =  document.getElementsByName('descripcionClase').value;
    var grado = document.getElementsByName('grado').value;

    obj= {
      "nombreClase": nombreClase,
      "descripcionClase": descripcionClase,
      "grado": grado
    };

    $.ajax({
        url: "http://localhost/edutopia/profesor/pages/registerclass",
        type: "POST",
        data: obj,
        success: function (res) {
            var len = res.length;
              // Returns successful data submission message when the entered information is stored in database.
            if (res === "true")
            {
              alert("success :)")
              window.location.reload();
              //  window.location = "http://localhost/edutopia/estudiante/pages";
            }else{
              alert("not success :(")
            }
          }
    });
  }

window.onscroll = function navBar(){
  var navbar = document.getElementById("navbarprof");
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
