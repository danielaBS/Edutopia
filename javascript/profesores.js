window.onload = function setView(){
  var headerIMG= document.getElementById('headerIMG');

  headerIMG.style.backgroundImage = "url('https://i.imgur.com/xrWbEXa.png')";

}

function validateForm(){

    var nombreClase = document.getElementsByName('nombre')[0].value;
    var descripcionClase =  document.getElementsByName('descripcionClase')[0].value;

    obj= {
      "nombreClase": nombreClase,
      "descripcionClase": descripcionClase
    };

    $.ajax({
        url: "http://localhost/edutopia/profesor/pages/registroClases",
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
