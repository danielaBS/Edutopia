window.onload = function setView(){
  var headerIMG= document.getElementById('headerIMG');

  headerIMG.style.backgroundImage = "url('https://i.imgur.com/xrWbEXa.png')";
  menu.classList.add("dropdown-content");
  menuTw.classList.add("dropdown-content");
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
  var navbar = document.getElementById("navbar");
  document.getElementsByClassName('className')

  if (window.pageYOffset >= 188) {
    navbar.classList.add("sticky");
  } else {
    navbar.classList.remove("sticky");
  }
}
