var tag;
var firstScriptTag;
var player;
var isPlaying = false;
var ply;
var i=0;

function openPopUp(element){
  var link = element.className;
  var res = link.split(" ");

  var popUp = document.getElementById(res[1]);
  var iframe= popUp.getElementsByTagName("iframe");
  iframe[0].src = res[1];
  popUp.style.display = "block";
  $(iframe).focus();

  // 2. This code loads the IFrame Player API code asynchronously.
  tag = document.createElement('script');

  tag.src = "https://www.youtube.com/iframe_api";
  firstScriptTag = document.getElementsByTagName('script')[0];
  firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);

  // 3. This function creates an <iframe> (and YouTube player)
  //    after the API code downloads.

  onYouTubeIframeAPIReady(res[1]);
  onPlay(res[1]);
}

window.onscroll = function navBar(){
  var navbar = document.getElementById("navbar");

  if (window.pageYOffset >= 188) {
    navbar.classList.add("sticky");
  } else {
    navbar.classList.remove("sticky");
  }
}

function closeForm() {
  var btnPlay = document.getElementsByClassName("seleccionado")
  for (var i=0; i<btnPlay.length; i++){
    btnPlay[i].classList.remove("seleccionado");
  }
}

function onYouTubeIframeAPIReady(id) {

  player = new YT.Player('player', {
    height: '393.75',
    width: '700',
    videoId: id,
    events: {
            'onReady': onPlayerReady
          }
  });
}

var timePlayed = 0;
var min= 0;
var max= 0;
var random = 0;
var questionTime;
var iniciarPre;
var count;
var timer;
var cancion;
var verbos;
var verbos2

function onPlay(id){
  obj= {
    'link' : id
  };
  $.ajax({
      url: "http://localhost/edutopia/estudiante/pages/getMinSec",
      type: "POST",
      async: false,
      data: obj,
      success: function (res) {
          var len = res.length;
          iniciarPre = res;
        }
  });
}

function iniciarActividad(random){
  var act = document.getElementById("preguntas");
  var letra = document.getElementById("letra");
  var textareas = act.getElementsByTagName("textarea");
  var dialogo = document.getElementById("dialogo");
  var btn = act.getElementsByTagName("input");

  dialogo.innerHTML = "1. Menciona todos los verbos que hayas encontrado hasta la parte de la canción que está <span style='font-weight:bold'>señalada</span>.";

  for(i=0; i<textareas.length; i++){
    if(textareas[i].getAttribute("name") == "verbos"){
      textareas[i].style.display = "block";
      textareas[i].classList.add("selected");
    }
  }

  for(i=0; i<btn.length; i++){
    btn[i].style.display = "block";
  }

  obj= {
    'random' : random
  };

  $.ajax({
    url: "http://localhost/edutopia/estudiante/pages/searchLine",
    type: "POST",
    async: false,
    data: obj,
    success: function (res) {
      var len = res.length;
      cancion = res.split("APARTIRDEAQUÍVERBOS")[0].split(" ");
      verbos = res.split("APARTIRDEAQUÍVERBOS")[1].split(" ");
    }
  });

  function findLines(line) {
    return line >= random.toFixed(2);
  }

  var index = cancion.findIndex(findLines);
  var ps = letra.getElementsByTagName("p");

  if(ps[index].innerHTML == "<br>"){
    ps[index+1].style.fontWeight = "bold";
    verbos2 = verbos.slice(0, index+1);
  }else{
    ps[index].style.fontWeight = "bold";
    verbos2 = verbos.slice(0, index);
  }

  for(i=0; i<verbos2.length; i++){
    verbos2 = verbos2.filter(word => word != "0");
  }

  console.log(ps[index].innerHTML);
  console.log(ps[index+1].innerHTML);
  console.log(cancion);
  console.log(verbos2);
  console.log(random.toFixed(2));
  console.log(index);


  $('input').on('click', function(){
    var result=0;
    var text= null;
    var text = act.getElementsByClassName('selected')[0].value.split(" ");

    for (var i = 0; i < text.length; i++) {
      if (verbos2.indexOf(text[i]) > -1) {
        result++;
      }
    }

    document.getElementById("resultado").innerHTML= "Tu puntuación es: "+ (result/verbos2.length*100).toFixed(2)+"%";
  });
}

// 4. The API will call this function when the video player is ready.
function onPlayerReady(event) {
   count = 0,
   paused = false,
   min = parseInt(iniciarPre, 10) + 20;
   max= parseInt(iniciarPre, 10) + 30;

   random = Math.random() * (+max - +min) + +min;

   counter = function(){
     if (count < event.target.getDuration() && !paused) {
       timer = setTimeout(function(){
         count++;
         counter();
         console.log(count + " " + random.toFixed(2) + " " + min + " " + max + " " + event.target.getDuration());
         if (count>= random){
           event.target.pauseVideo();
           iniciarActividad(random);
           paused = !paused;
         }
       }, 1000);
     }
   };

    $('button').on('click', function(){
        clearTimeout(timer);
        if ($(this).hasClass('start')) {
          event.target.playVideo();
            paused = false;
            counter();
        }else{
          paused = !paused;
          event.target.pauseVideo();
        }
    });
  }
