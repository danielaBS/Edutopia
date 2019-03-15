window.onload = function setView(){
  var headerIMG= document.getElementById('headerIMG');
  headerIMG.style.backgroundImage = "url('https://i.imgur.com/Po4JpNc.png')";

  var here = document.getElementById('ub');
  var headerIMG= document.getElementById('headerIMG');

  here.style.display = "none";

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
