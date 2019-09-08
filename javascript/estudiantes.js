var classAct = false;
var nameFile;

window.onload = function setView(){
  var headerIMG= document.getElementById('headerIMG');
  headerIMG.style.backgroundImage = "url('https://i.imgur.com/Po4JpNc.png')";

  var here = document.getElementById('ub');
  var headerIMG= document.getElementById('headerIMG');

  here.style.display = "none";
  $('personajeIntro').hide();

  var url = window.location.pathname;
  nameFile = url.substring(url.lastIndexOf('/')+1);
  var title;

  var titulos = [
    ["actividadTipoA", "Actividad A"],
    ["actividadTipoB", "Actividad B"],
    ["actividadTipoC", "Actividad C"],
    ["actividadTipoD", "Actividad A - Cultura y Paz"],
    ["claseEsp", "Español"],
    ["claseIng", "Inglés"],
    ["cancion", "Actividad A - Canciones"],
    ["culturaYpaz", "Cultura y Paz"],
  ];

  var urlLOG = window.location.href;
  var scc = urlLOG.substring(urlLOG.lastIndexOf('=')+1);
  var chrDiv = document.getElementById("charDiv");
  var imgChar = chrDiv.getElementsByTagName("img");

   imgsCleo = [
    {"pag": "home_est", "url": "https://i.imgur.com/jPl4fMJ.png"},
    {"pag": "home_est", "url": "https://i.imgur.com/uE7fBr0.png"},
    {"pag": "claseEsp", "url": "https://i.imgur.com/2e4DJGR.png"},
    {"pag": "claseEsp", "url": "https://i.imgur.com/jFCVHTt.png"},
  ];

   imgsMatias = [
     {"pag": "home_est", "url": "https://i.imgur.com/nhVD0OI.png"},
     {"pag": "home_est", "url": "https://i.imgur.com/bxRTwFf.png"},
     {"pag": "claseEsp", "url": "https://i.imgur.com/yE8721q.png"},
     {"pag": "claseEsp", "url": "https://i.imgur.com/W4M5Cp0.png"},
  ];

  $.ajax({
      url: "http://localhost/edutopia/estudiante/pages/getChar",
      type: "POST",
      success: function (res) {
          var len = res.length;
            // Returns successful data submission message when the entered information is stored in database.
          if (res!=="un" && res !=="do")
          {
            $(document).ready(function(){
                $("#personaje").modal();
            }, 1000);
          }else if (res==="un" && nameFile !== "actividadTipoA" && nameFile !== "actividadTipoB" && nameFile !== "cancion"){
            chrDiv.style.display = "block";

            if(nameFile === "home_est"){
              imgChar[0].src = "https://i.imgur.com/L0K7pKo.png";
            }else if(nameFile === "claseEsp"){
              imgChar[0].src = "https://i.imgur.com/2e4DJGR.png";
            }

            var i = 0;

            var links = imgsMatias.filter(function (url) {
              if (url.pag == nameFile) {
                return url
              }
            });

            setInterval(function () {
              imgChar[0].src = links[i].url;

              i = i + 1;

              if (i >= links.length) {
                i =  0;
              }

            }, 9000);

          }else if (res=="do" && nameFile !== "actividadTipoA" && nameFile !== "actividadTipoB" && nameFile !== "cancion" && nameFile !== "actividadTipoC" && nameFile !== "actividadTipoD"){
            chrDiv.style.display = "block";
            if(nameFile === "home_est"){
              imgChar[0].src = "https://i.imgur.com/83uoeWy.png";
            }else if(nameFile === "claseEsp"){
              imgChar[0].src = "https://i.imgur.com/2e4DJGR.png";
            }

            var i = 0;

            var links = imgsCleo.filter(function (url) {
              if (url.pag == nameFile) {
                return url
              }
            });

            setInterval(function () {
              imgChar[0].src = links[i].url;
              i = i + 1;

              if (i >= links.length) {
                i =  0;
              }

            }, 9000);
          }
        }
      });

  if(nameFile === "actividadTipoA" || nameFile === "actividadTipoB" || nameFile === "actividadTipoC" || nameFile === "claseEsp" || nameFile === "claseIng" || nameFile === "cancion" || nameFile === "culturaYpaz" || nameFile === "actividadTipoD"){

    here.style.display = "block";
    here.classList.add("current");

    for( var i = 0, len = titulos.length; i < len; i++ ) {
      if( titulos[i][0] === nameFile ) {
        title = titulos[i][1];
        break;
      }
    }
  }

  here.innerHTML = title;

  if(nameFile==="claseEsp" || nameFile==="claseIng" || nameFile ==="culturaYpaz"){

    classAct = true;


    var dates = document.getElementsByClassName("date");

    for(i=0; i<dates.length; i++){
        dates[i].style.backgroundColor = "rgba(0,0,77,1.0)";
    }

    var acts = document.getElementsByClassName("act");

    for(i=0; i<dates.length; i++){
      if(Number.isInteger(i/2)){
        acts[i].style.backgroundColor = "rgba(36,116,181,0.6)";
      }else{
        acts[i].style.backgroundColor = "rgba(140,192,231,0.6)";
      }
    }
  }

  if(nameFile === "actividadTipoA"){
    el = document.getElementById("tut");
    el.scrollIntoView(false);
    window.scrollBy(0, 80);
  }

  if(nameFile==="home_est" || nameFile ==="pages"){
    document.getElementById("home").classList.add("current");
    var divEsp = document.getElementById("1");
    var divEng = document.getElementById("2");
    var divCyP = document.getElementById("3");
    divEsp.style.backgroundImage= "url('https://i.imgur.com/h66JjYX.png')";
    divEng.style.backgroundImage= "url('https://i.imgur.com/iXv4Yz8.png')";
    divCyP.style.backgroundImage= "url('https://i.imgur.com/P4dcS2C.png')";

    tag1 = document.createElement('script');

    tag1.src = "https://www.youtube.com/iframe_api";
    firstScriptTag1 = document.getElementsByTagName('script')[0];
    firstScriptTag1.parentNode.insertBefore(tag1, firstScriptTag1);

    // 3. This function creates an <iframe> (and YouTube player)
    //    after the API code downloads.


    player1 = new YT.Player('intro', {
      height: '450',
      width: '800',
      videoId: 'Bf2g0UeHCVM',
      events: {
              'onReady': onPlayerReadyH,
              'onStateChange': onPlayerStateChangeH
            }
    });

  }else if(nameFile === "progreso"){
    document.getElementById("progres").classList.add("current");
  }

  var idS = urlLOG.substring(urlLOG.lastIndexOf('/')+1, urlLOG.lastIndexOf('?'));

  if(nameFile === "cancion"){

    if(urlLOG.includes("https://www.youtube.com/embed")){
      // 2. This code loads the IFrame Player API code asynchronously.
      tag = document.createElement('script');

      tag.src = "https://www.youtube.com/iframe_api";
      firstScriptTag = document.getElementsByTagName('script')[0];
      firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);

      // 3. This function creates an <iframe> (and YouTube player)
      //    after the API code downloads.

      var rndm = randomNum();

      player = new YT.Player('player', {
        height: '370',
        width: '650',
        videoId: idS,
        events: {
          'onReady': onPlayerReady
              }
      });

      onPlay(idS);
    }
  }
}

window.onscroll = function navBar(){
  var navbar = document.getElementById("navbar");

  if (window.pageYOffset >= 188) {
    navbar.classList.add("sticky");
    if(nameFile === "actividadTipoB"){
      $(".buts").css({
        position: "fixed",
        top: "7vh"
      });

      $(".left").css({
        position: "sticky",
        top: "5vh",
      });
    }

  } else {
    navbar.classList.remove("sticky");
    if(nameFile === "actividadTipoB"){
      $(".buts").css({
        position: "absolute",
        top: "32vh"
      });

      $(".left").css({
        position: "",
      });
    }
  }
}

function setChar(){
  var obj;
  var choose = document.getElementsByName('char');
  for (var i = 0, length = choose.length; i < length; i++)
  {
    if (choose[i].checked){
      obj= {
        'personaje': choose[i].value
      };

      var txt;
      if (confirm("¿Estás seguro que quieres escoger este personaje?")) {

        $.ajax({
          url: "http://localhost/edutopia/estudiante/pages/setChar",
          type: "POST",
          async: false,
          data: obj,
          success: function (res) {
              var sli = res.slice(1,4);
                // Returns successful data submission message when the entered information is stored in database.
              if (sli==="set")
              {
                $('#personaje').modal('hide');
                document.getElementById('clicking').click();

                tag2 = document.createElement('script');
                tag2.src = "https://www.youtube.com/iframe_api";
                firstScriptTag2= document.getElementsByTagName('script')[0];
                firstScriptTag2.parentNode.insertBefore(tag2, firstScriptTag2);

                // 3. This function creates an <iframe> (and YouTube player)
                //    after the API code downloads.

                player2 = new YT.Player('charIntro', {
                  height: '672',
                  width: '1200',
                  videoId: 'U3vX8g46Knw',
                  events: {
                          'onReady': onPlayerReadyY,
                          'onStateChange': onPlayerStateChangeY
                        }
                });

              }else{
                alert("Ha ocurrido un error. Por favor intente nuevamente. :(")
              }
            }
        });

      } else {
        txt = "Asegurate de escoger un personaje.";
      }
      break;
    }
  }
}

var done1 = false;

function onPlayerReadyH(event) {
  event.target.playVideo();
}

function onPlayerStateChangeH(event) {
  if (event.data == YT.PlayerState.PLAYING && !done1) {
    setTimeout(stopVideo, 6000);
    done1 = true;
  }
}

function stopVideo() {
  player1.stopVideo();
  player1.destroy();
}

var done2 = false;

function onPlayerReadyY(event) {
  event.target.playVideo();
}

function onPlayerStateChangeY(event) {
  if (event.data == YT.PlayerState.PLAYING && !done2) {
    setTimeout(stopVideoY, 17000);
    done2 = true;
  }
}

function stopVideoY() {
  player2.stopVideo();
  player2.destroy();
  $('#perIN').css("display", "none");
  setTimeout(window.location.assign("http://localhost/edutopia/estudiante/pages/index/home_est"), 500);
}

function setURl(element){
  var obj;
  var linkAct = element.id;

  if(classAct){
    var h1 = element.getElementsByClassName('status')[0].innerHTML;
    if(h1 === "Completado"){
      alert("Ya completaste esta actividad.");
    }else{
      window.location.assign(linkAct);
    }

  } else {
    if(linkAct === "1"){
      obj= {
        'idAsig': '1'
      };
      window.location.assign("http://localhost/edutopia/estudiante/pages/index/claseEsp");
    }else if (linkAct === "2"){
      obj= {
        'idAsig': '2'
      };
      window.location.assign("http://localhost/edutopia/estudiante/pages/index/claseIng");
    }else if (linkAct === "3"){
      obj= {
        'idAsig': '3'
      };
      window.location.assign("http://localhost/edutopia/estudiante/pages/index/culturaYpaz");
    }
    $.ajax({
        url: "http://localhost/edutopia/estudiante/pages/setId",
        type: "POST",
        data: obj,
        success: function (res) {
            var len = res.length;
          }
    });
  }
}
