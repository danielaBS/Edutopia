window.onload = function setView(){
  var header= document.getElementById('header');
  header.style.backgroundImage = "url('https://i.imgur.com/9nbGv3j.png')";
}

window.onscroll = function navBar(){
  var navbar = document.getElementById("navbar");
  document.getElementsByClassName('className')

  if (window.pageYOffset >= 188) {
    navbar.classList.add("sticky")
    console.log('adios');
  } else {
    console.log("hola");
    navbar.classList.remove("sticky");
  }
}
