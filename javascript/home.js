window.onload = function changeView() {

  // Global variables

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

  var btnNextEst = document.getElementById('siguienteEst');
  var pssInputEst = document.getElementById('contrasenaEst');
  var btnNextProf = document.getElementById('siguienteProf');
  var pssInputProf = document.getElementById('contrasenaProf');
  var formPassEst = document.getElementById('myForm');
  var formPassProf = document.getElementById('myFormProf');

  var isPressed = 1;

  bod.style.backgroundImage = "url('https://i.imgur.com/Po4JpNc.png')";
  pagEst.style.height = screen.height - screen.height / 4.1;
  pagProf.style.backgroundImage = "url('https://i.imgur.com/CRJa2Vc.png')";
  pagProf.style.display = "none";
  footer.style.backgroundColor = "#8CC0E7";

  botonSwitch.style.backgroundColor = "#8CC0E7";
  botonSwitch.style.color = "#00004D";
  botonSwitch.innerHTML = "Iniciar sesión como Profesor";

  //Onclick validates if the user has defined a password

  //Teachers

  btnNextProf.onclick = function next(){
    var idIngProf = idProf.value;
    var usuarioIngProf = userProf.value;

    obj = {
      "idProf": idIngProf,
      "usuarioProf": usuarioIngProf
    };

    if (usuarioIngProf.length !== 0 && idIngProf.length !==0) {
      btnNextProf.classList.add("hide");
      // AJAX code to POST data.
      $.ajax({
        url: "http://localhost/edutopia/profesor/pages/log",
        type: "POST",
        data: obj,
        success: function (res) {
          console.log(res);
          // Returns successful data submission message when the entered information is stored in database.
          if (res === "0true"){
            formPassProf.style.display = "block";
          }
          if (res === "0false"){
            pssInputProf.classList.remove("hide");
            pssInputProf.classList.add("box");
            botLogProf.classList.remove("hide");
            botLogProf.classList.add("iniciarsesionProf");
          }
          if(res === "00"){
            alert("Este usuario no existe");
            window.location.reload();
          }
        }
      });
    } else {
      alert("Ingrese todos los datos")
    }
  }

  //Students

  btnNextEst.onclick = function next(){
    var idIngEst = idEst.value;
    var usuarioIngEst = userEst.value;

    obj = {
      "idEst": idIngEst,
      "usuarioEst": usuarioIngEst
    };

    if (usuarioIngEst.length !== 0 && idIngEst.length !==0) {
      btnNextEst.classList.add("hide");
      // AJAX code to POST data.
      $.ajax({
        url: "http://localhost/edutopia/estudiante/pages/log",
        type: "POST",
        data: obj,
        success: function (res) {
          // Returns successful data submission message when the entered information is stored in database.
          if (res === "0true"){
            formPassEst.style.display = "block";
          }
          if (res === "0false"){
            pssInputEst.classList.remove("hide");
            pssInputEst.classList.add("box");
            botLogEst.classList.remove("hide");
            botLogEst.classList.add("iniciarsesionEst");
          }
          if(res === "00"){
            alert("Este usuario no existe");
            window.location.reload();
          }
        }
      });
    } else {
      alert("Ingrese todos los datos")
    }
  }

  // onclick changes the view from student's login to teacher's login

  logADMIN.onclick = function displaySecPage() {
    isPressed += 1;
    if (isPressed % 2 == 0) {
      formPassEst.style.display = "none";
      isPressed = false;
      footer.style.backgroundColor = "#00004D";
      pagProf.style.display = "block";
      botonSwitch.innerHTML = "Iniciar sesión como Estudiante";
      botonSwitch.style.backgroundColor = "#00004D";
      botonSwitch.style.color = "#CECECE";
    } else {
      formPassProf.style.display = "none";
      footer.style.backgroundColor = "#8CC0E7";
      pagProf.style.display = "none";
      botonSwitch.innerHTML = "Iniciar sesión como Profesor";
      botonSwitch.style.backgroundColor = "#8CC0E7";
      botonSwitch.style.color = "#00004D";
    }
  }

  //Login for teachers with password defined

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
        url: "http://localhost/edutopia/profesor/pages/login2",
        type: "POST",
        data: obj,
        success: function (res) {
          // Returns successful data submission message when the entered information is stored in database.
          var string = res.slice(0, 5);

          if (string === "1true"){
            window.location = "http://localhost/edutopia/administrador/pages/index/home_admin";
          }else if (string === "2true"){
            window.location = "http://localhost/edutopia/profesor/pages/index/home_prof";
          }else{
            alert("Datos incorrectos")
          }
        }
      });
    } else {
      alert("Ingrese todos los datos")
    }
  }

  //Login for students with password defined

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
        url: "http://localhost/edutopia/estudiante/pages/login2",
        type: "POST",
        data: obj,
        success: function (res) {
          // Returns successful data submission message when the entered information is stored in database.
          if (res === "falsetrue"){
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
}

//Method to close the form to define users' passwords

function closeForm() {
  document.getElementById("myForm").style.display = "none";
  document.getElementById("myFormProf").style.display = "none";
  document.getElementById("siguienteEst").classList.remove("hide");
  document.getElementById("siguienteProf").classList.remove("hide");
}

//Methods to define the users' passwords;

function definePasswdProf(){
  var psSet = document.getElementById("passwordSetProf").value;
  var psConfirmed = document.getElementById("passwordConfProf").value;

  if(psSet!=="" && psConfirmed!==""){
    if(psSet===psConfirmed){
      obj = {
        "contrasenaProf": psConfirmed,
        "firstLog":true
      };

      $.ajax({
          url: "http://localhost/edutopia/profesor/pages/modifUser",
          type: "POST",
          data: obj,
          success: function (res) {
                // Returns successful data submission message when the entered information is stored in database.
              if (res === "1true"){
                alert("La contraseña se ha guardado");
                window.location = "http://localhost/edutopia/administrador/pages/index/home_admin";
              } else if(res === "2true"){
                alert("La contraseña se ha guardado");
                window.location = "http://localhost/edutopia/profesor/pages/index/home_prof";
              }
          }
      });
    }else{
      alert("Las contraseñas no coinciden");
    }
  }else{
    alert("Llene todos los campos");
  }
}

function definePasswdEst(){
  var psSet = document.getElementById("passwordSetEst").value;
  var psConfirmed = document.getElementById("passwordConfEst").value;

  if(psSet!=="" && psConfirmed!==""){
    if(psSet===psConfirmed){
      obj = {
        "contrasenaEst": psConfirmed,
        "firstLog":true
      };

      $.ajax({
        url: "http://localhost/edutopia/estudiante/pages/modifUser",
        type: "POST",
        data: obj,
        success: function (res) {
          // Returns successful data submission message when the entered information is stored in database.
          if (res === "true"){
            alert("La contraseña se ha guardado");
            window.location = "http://localhost/edutopia/estudiante/pages";
          }
        }
      });
    }else{
      alert("Las contraseñas no coinciden");
    }
  }else{
    alert("Llene todos los campos");
  }
}
