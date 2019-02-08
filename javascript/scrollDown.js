
window.onload = function changeView() {
    var bod = document.getElementsByTagName('BODY')[0];
    var pagEst = document.getElementById('pageEst');
    var pagProf = document.getElementById('pageProf');

    var footer = document.getElementById('footer');
    var botonSwitch = document.getElementById('logADMIN');

    var idEst= document.getElementById('identifEst');
    var userEst = document.getElementById('userEst');
    var contraseñaEst = document.getElementById('contrasenaEst');
    var botLogEst = document.getElementById('botloginEst');

    var idProf= document.getElementById('identifProf');
    var userProf = document.getElementById('userProf');
    var contraseñaProf = document.getElementById('contrasenaProf');
    var botLogProf = document.getElementById('botloginProf');

    var isPressed = 1;

    bod.style.backgroundImage = "url('https://i.imgur.com/qShVdVp.png')";
    pagEst.style.height = screen.height - screen.height / 4.1;
    pagProf.style.backgroundImage = "url('https://i.imgur.com/6u1akYP.png')";
    pagProf.style.display = "none";
    footer.style.backgroundColor = "#8CC0E7";

    botonSwitch.style.backgroundColor = "#8CC0E7";
    botonSwitch.style.color = "#00004D";
    botonSwitch.innerHTML = "Iniciar sesión como Profesor";

    logADMIN.onclick = function displaySecPage() {
        isPressed += 1;
        if (isPressed % 2 == 0) {
            isPressed = false;
            footer.style.backgroundColor = "#00004D";
            pagProf.style.display = "block";
            botonSwitch.innerHTML = "Iniciar sesión como Estudiante";
            botonSwitch.style.backgroundColor = "#00004D";
            botonSwitch.style.color = "#CECECE";
        } else {
            footer.style.backgroundColor = "#8CC0E7";
            pagProf.style.display = "none";
            botonSwitch.innerHTML = "Iniciar sesión como Profesor";
            botonSwitch.style.backgroundColor = "#8CC0E7";
            botonSwitch.style.color = "#00004D";
        }
    }

    botLogEst.onclick = function loginEst() {
      var idIngEst = idEst.value;
      var usuarioIngEst = userEst.value;
      var passIngEst = contraseñaEst.value;
      var hash = CryptoJS.AES.encrypt(passIngEst, "!55frRe34");
      obj = {
        "idEst": idIngEst,
        "usuarioEst": usuarioIngEst,
        "contrasenaEst": passIngEst
      };
      if (usuarioIngEst.length !== 0 && passIngEst.length !== 0 && idIngEst.length !==0) {
            // AJAX code to POST data.
          $.ajax({
              url: "http://localhost/edutopia/estudiante/pages/index",
              type: "POST",
              data: obj,
              success: function (res) {
                  var len = res.length;
                  var string = res.slice(0, 4);
                  console.log(string);
                    // Returns successful data submission message when the entered information is stored in database.
                  if (string === "true")
                  {
                      window.location = "http://localhost/edutopia/estudiante/pages";
                  } else {
                      alert("Datos incorrectos")
                  }
              }
          });
        } else {
          alert("Ingrese todos los datos")
        }
    }
    botLogProf.onclick = function loginProf() {
      var idIngProf = idProf.value;
      var usuarioIngProf = userProf.value;
      var passIngProf = contraseñaProf.value;

      obj = {
        "idProf": idIngProf,
        "usuarioProf": usuarioIngProf,
        "contrasenaProf": passIngProf
      };
      if (usuarioIngProf.length !== 0 && passIngProf.length !== 0 && idIngProf.length !==0) {
            // AJAX code to POST data.
          $.ajax({
              url: "http://localhost/edutopia/profesor/pages/index",
              type: "POST",
              data: obj,
              success: function (res) {
                  var len = res.length;
                  var string = res.slice(0, 5);
                    // Returns successful data submission message when the entered information is stored in database.
                  if (string === "1true")
                  {
                    window.location = "http://localhost/edutopia/profesor/pages/index/homeAdmin";
                  }
                  else if (string === "2true"){
                    window.location = "http://localhost/edutopia/profesor/pages/index/homeProf";
                  }else{
                    alert("Datos incorrectos")
                  }
              }
          });
        } else {
          alert("Ingrese todos los datos")
        }
    }
}
