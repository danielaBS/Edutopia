
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
var max= 0;
var random = 0;
var questionTime;
var iniciarPre;
var count;
var timer;

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
  questionTime= random.toFixed(2);
}

function iniciarActividad(random){
  var dialogo = document.getElementById("dialogo");
  dialogo.innerHTML = "1. Menciona al menos cinco sustantivos que hayas encontrado hasta aquí.";
}
// 4. The API will call this function when the video player is ready.
function onPlayerReady(event) {
   count = 0,
   timer,
   paused = false,
   min = iniciarPre +30;
   max= timePlayed + 50;

   random = Math.random() * (+max - +min) + +min;
   counter = function(){
     count++;
     if (count > event.target.getDuration()) { count = 0; }
     timer = setTimeout(function(){
       console.log(count + " " +  timePlayed + " " + random + " " + min);
       counter(event);
       if (count> random){
         iniciarActividad(random);
       }
     }, 1000);
   };

      $('button').on('click', function(){
          clearTimeout(timer);
          if ($(this).hasClass('start')) {
            event.target.playVideo();
              count = 0;
              paused = false;
              counter();
          } else {
              paused = !paused;
              timePlayed+=count;
              event.target.pauseVideo();
              if (!paused) {
                counter();
              }
              count = timePlayed;
          }
      });
}
