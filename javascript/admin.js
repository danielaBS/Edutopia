window.onload = function setView(){
  var header= document.getElementById('header');
  header.style.backgroundImage = "url('https://i.imgur.com/9nbGv3j.png')";
  var perfilE = document.getElementById('estudiante');
  var perfilP = document.getElementById('profesor');
  var tittleGrado= document.getElementById("optionChecked");
  var inputGrado= document.getElementById("grado");

  tittleGrado.classList.add("show");
  inputGrado.classList.add("show");

  perfilE.onclick = function checked(){
    tittleGrado.classList.remove("show");
    inputGrado.classList.remove("show");
  }
  perfilP.onclick = function checked(){
    tittleGrado.classList.add("show");
    inputGrado.classList.add("show");
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
function validateForm(){
  var perfil = [
  document.forms["formRegistro"]["perfil"].value,
  document.forms["formRegistro"]["nombres"].value,
  document.forms["formRegistro"]["apellidos"].value,
  document.forms["formRegistro"]["identificacion"].value,
  document.forms["formRegistro"]["grado"].value
];
function val(perfilT){
  return perfilT !== "";
}
if(perfil.every(val)){
  return true;
}else{
  alert("Llene todos los campos");
  return false;
}
}
