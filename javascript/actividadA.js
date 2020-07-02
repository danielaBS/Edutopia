var tag;
var firstScriptTag;
var player;
var i = 0;
var min= 0;
var max= 0;
var random = 0;
var iniciarPre;
var count;
var timer;
var suma;
var verbos;
var verbos2;
var sustantivos;
var sustantivos2;
var prcnt;
var actIterations = 0;

function toastView(){
  var toast = document.getElementById('toastView').style.display ="block";
  setTimeout(function(){
    $("#toastView").fadeOut();
  }, 1000);
}

function openSong(element){
  var link = element.className;
  var res = link.split(" ");

  window.open("http://localhost/edutopia/estudiante/pages/index/cancion?id=" + res[1], "_self");
}

function onPlay(idS){
  obj= {
    'link' : idS
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

function restartAct(){
  document.getElementById("resultado").innerHTML= "¡Bien hecho! Continúa con el resto de la actividad.";
  document.getElementsByTagName('button')[0].click();
}

function iniciarActividad(random){
  iniciarPre = random + 25;
  var letra = document.getElementById("letra");

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
      suma = res.split("APARTIRDEAQUÍ")[0].split(" ");
      verbos = res.split("APARTIRDEAQUÍ")[1].split(" ");
      sustantivos = res.split("APARTIRDEAQUÍ")[2].split(" ");
    }
  });

  function findLines(line) {
    return line >= random.toFixed(2);
  }

  var index = suma.findIndex(findLines);
  var ps = letra.getElementsByTagName("p");

  if(ps[index].innerHTML == "<br>"){
    ps[index+1].style.fontWeight = "bold";
    verbos2 = verbos.slice(0, index+1);
    sustantivos2 = sustantivos.slice(0, index+1);
  }else{
    ps[index].style.fontWeight = "bold";
    verbos2 = verbos.slice(0, index);
    sustantivos2 = sustantivos.slice(0, index);
  }

  for(i=0; i<verbos2.length; i++){
    verbos2 = verbos2.filter(word => word != "0");
    sustantivos2 = sustantivos2.filter(word => word != "0");
  }
  console.log(index + " " + ps[index].innerHTML + " " + random.toFixed(2) + " " + suma);
}

function clicked(){

  var result=0;
  var act = document.getElementById("preguntas");

  var textareas = act.getElementsByTagName("textarea");
  var textVerb = textareas[0].value.split(" ");
  var textSust = textareas[1].value.split(" ");

  if(textVerb!="" && textSust!=""){
    for (var i = 0; i < textVerb.length; i++) {
      if (verbos2.indexOf(textVerb[i]) > -1) {
        result++;
      }
    }

    for (var i = 0; i < textSust.length; i++) {
      if (sustantivos2.indexOf(textSust[i]) > -1) {
        result++;
      }
    }

    prcnt = ((result/(verbos2.length+sustantivos2.length))*100).toFixed(2);

  }else{
    alert("Por favor completa la actividad.");
  }

  if(prcnt >= 60 && actIterations<2){
    actIterations++;
    restartAct();
  } else if (prcnt <60){
    alert("Parece que te faltan algunos verbos o sustantivos. Intenta agregar algunos.");
  }

  if (prcnt >= 60 && actIterations>=2){
    var save = document.getElementById("next");
    save.value = "Enviar actividad";

    save.addEventListener("click", function (){

      obj= {
        'porcentaje' : prcnt
      };

      $.ajax({
          url: "http://localhost/edutopia/estudiante/pages/guardarActSession",
          type: "POST",
          async: false,
          data: obj,
          success: function (res) {
              var len = res.length;
            }
      });
      document.getElementById("resultado").innerHTML= "¡Bien hecho! Has terminado con la actividad.";

    });
  }
}

function randomNum(){
  min = parseInt(iniciarPre, 10) + 25;
  max= parseInt(iniciarPre, 10) + 35;
  random = Math.random() * (+max - +min) + +min;
  return random;
}

// 4. The API will call this function when the video player is ready.
function onPlayerReady(event) {
   count = 0,
   paused = false,

   counter = function(){
     ran = randomNum();

     if (count < event.target.getDuration() && !paused) {
       timer = setTimeout(function(){
         count++;
         counter();
         //animateLyrics(random);
         console.log(count + " " + ran.toFixed(2) + " " + min + " " + max + " " + event.target.getDuration());
         if (count>= ran){
           event.target.pauseVideo();
           iniciarActividad(ran);
           paused = !paused;
         }
       }, 1000);
     }
   };

   $('button').on('click', function(e){
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
