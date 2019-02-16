window.onload = function setView(){
  var header= document.getElementById('header');
  header.style.backgroundImage = "url('https://i.imgur.com/9nbGv3j.png')";
  var perfilE = document.getElementById('estudiante');
  var perfilP = document.getElementById('profesor');
  var tittleGrado = document.getElementById("optionChecked");
  var inputGrado = document.getElementById("grado");
  var btnRegistro = document.getElementById("btnReg");

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
  var form= document.forms["formRegistro"];

  var perfil = [
  document.forms["formRegistro"]["perfil"].value,
  document.forms["formRegistro"]["nombres"].value,
  document.forms["formRegistro"]["apellidos"].value,
  document.forms["formRegistro"]["identificacion"].value,
];

function val(perfilT){
  return perfilT !== "";
}
if(perfil.every(val)){
  var usuario = document.createElement("input");
  usuario.type= 'hidden';
  usuario.name= 'usuario';
  usuario.value= generateUsername(perfil[1], perfil[2]);
  var contraseña = document.createElement("input");
  contraseña.type= 'hidden';
  contraseña.name= 'contraseña';
  contraseña.value= generatePasswd(8);

console.log(usuario.value);
/*form.appendChild(usuario);
form.appendChild(contraseña);
form.action= "http://localhost/edutopia/administrador/pages/registroUsuarios";
  return true;
}else{
  alert("Llene todos los campos");
  return false;
}*/
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
  console.log(nombre.length);
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
