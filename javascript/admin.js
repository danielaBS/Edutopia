window.onload = function setView(){
  var headerIMG= document.getElementById('headerIMG');
  headerIMG.style.backgroundImage = "url('https://i.imgur.com/9nbGv3j.png')";
  var perfilE = document.getElementById('estudiante');
  var perfilP = document.getElementById('profesor');
  var tittleGrado = document.getElementById('optionChecked');
  var inputGrado = document.getElementById('grado');
  var btnRegistro = document.getElementById('btnReg');
  var home = document.getElementById('home');
  var here = document.getElementById('ub');

  var url = window.location.pathname;
  var nameFile = url.substring(url.lastIndexOf('/')+1);
  var title;

  var titulos = [
    ["home_admin", "Inicio"],
    ["registro_users", "Registro de usuarios"],
    ["profesores_list", "Profesores"],
    ["estudiantes_list", "Estudiantes"],
  ];

  for( var i = 0, len = titulos.length; i < len; i++ ) {
      if( titulos[i][0] === nameFile ) {
          title = titulos[i][1];
          break;
      }
  }

  if(nameFile!=="home_admin"){
    home.classList.add("left");
    here.classList.add("current");
  }else{
    home.classList.add("current");
    here.classList.add("left");
  }

  here.innerHTML = title;

  tittleGrado.classList.add("hide");
  inputGrado.classList.add("hide");

  perfilE.onclick = function checked(){
    tittleGrado.classList.remove("hide");
    inputGrado.classList.remove("hide");
    inputGrado.setAttribute("required", "");
  }
  perfilP.onclick = function checked(){
    tittleGrado.classList.add("hide");
    inputGrado.classList.add("hide");
    inputGrado.removeAttribute("required");
  }
}

function validateForm(){
  var perfil = [
    document.querySelector('input[name="perfil"]:checked').value,
    document.getElementsByName('nombres')[0].value,
    document.getElementsByName('apellidos')[0].value,
    document.getElementsByName('identificacion')[0].value,
  ];

  var grado = document.getElementsByName('grado')[0].value;

  function val(perfilT){
    return perfilT !== "";
  }

  if(perfil.every(val)){
    var usuario = generateUsername(perfil[1], perfil[2]);
    var contraseña = generatePasswd(8);

    obj= {
      "perfil": perfil[0],
      "nombres": perfil[1],
      "apellidos": perfil[2],
      "identificacion": perfil[3],
      "usuario": usuario,
      "contraseña": contraseña,
      "grado": grado
    };

    $.ajax({
        url: "http://localhost/edutopia/administrador/pages/registroUsuarios",
        type: "POST",
        data: obj,
        success: function (res) {
            var len = res.length;
              // Returns successful data submission message when the entered information is stored in database.
            if (res==="true")
            {
              alert("success :)")
              //  window.location = "http://localhost/edutopia/estudiante/pages";
            }else{
              alert("not success :(")
            }
          }
    });
  }else{
    alert("Llene todos los campos");
  }
}

window.onscroll = function navBar(){
  var navbar = document.getElementById("navbar");
  document.getElementsByClassName('className')

  if (window.pageYOffset >= 188) {
    navbar.classList.add("sticky")
  } else {
    navbar.classList.remove("sticky");
  }
}

function generateUsername(nombres, apellidos){
  var nombre = nombres.split(" ");
  var apellido = apellidos.split(" ");
  var nameStr= [];
  var userNm="";

  if(nombre.length!==1){
    for (i=0; i<nombre.length; i++){
      nameStr[i]= nombre[i].slice(0,1);
    }
  }else{
    nameStr[0]= nombre[0].slice(0,1);
  }
  if(apellido.length!==1){
    for (i=nombre.length; i<nombre.length+apellido.length-1; i++){
        nameStr[i]= apellido[0];
    }
  }else{
    nameStr[nombre.length]= apellido[0];
  }
  userNm= nameStr.join(".");
  return userNm;
}

function generatePasswd(passwordLength){
  var numberChars = "0123456789";
    var upperChars = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
    var lowerChars = "abcdefghijklmnopqrstuvwxyz";
    var allChars = numberChars + upperChars + lowerChars;
    var randPasswordArray = Array(passwordLength);
    randPasswordArray[0] = numberChars;
    randPasswordArray[1] = upperChars;
    randPasswordArray[2] = lowerChars;
    randPasswordArray = randPasswordArray.fill(allChars, 3);
    return shuffleArray(randPasswordArray.map(function(x) { return x[Math.floor(Math.random() * x.length)] })).join('');
  }

  function shuffleArray(array) {
    for (var i = array.length - 1; i > 0; i--) {
      var j = Math.floor(Math.random() * (i + 1));
      var temp = array[i];
      array[i] = array[j];
      array[j] = temp;
    }
    return array;
  }
