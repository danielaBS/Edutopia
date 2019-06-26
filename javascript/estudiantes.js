var classAct = false;
window.onload = function setView(){
  var headerIMG= document.getElementById('headerIMG');
  headerIMG.style.backgroundImage = "url('https://i.imgur.com/Po4JpNc.png')";

  var here = document.getElementById('ub');
  var headerIMG= document.getElementById('headerIMG');

  here.style.display = "none";

  var url = window.location.pathname;
  var nameFile = url.substring(url.lastIndexOf('/')+1);
  var title;

  var titulos = [
    ["actividadTipoA", "Actividad A"],
    ["actividadTipoB", "Actividad B"],
    ["actividadTipoC", "Actividad C"],
    ["claseEsp", "Español"],
    ["claseIng", "Inglés"],
    ["cancion", "Actividad A - Canciones"],
  ];

  var urlLOG = window.location.href;
  var scc = urlLOG.substring(urlLOG.lastIndexOf('=')+1);
  var chrDiv = document.getElementById("charDiv");
  var imgChar = chrDiv.getElementsByTagName("img");

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
            }else if (res==="un" && nameFile !== "actividadTipoA"){
              chrDiv.style.display = "block";
              imgChar[0].src = "https://i.imgur.com/L0K7pKo.png";
            }else if (res=="do" && nameFile !== "actividadTipoA"){
              chrDiv.style.display = "block";
              imgChar[0].src = "https://i.imgur.com/83uoeWy.png";
            }
          }
    });

  if(nameFile === "actividadTipoA" || nameFile === "actividadTipoB" || nameFile === "actividadTipoC" || nameFile === "claseEsp" || nameFile === "claseIng" || nameFile === "cancion"){

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

  if(nameFile==="claseEsp" || nameFile==="claseIng"){
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
  } else {
    navbar.classList.remove("sticky");
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

      $.ajax({
        url: "http://localhost/edutopia/estudiante/pages/setChar",
        type: "POST",
        data: obj,
        success: function (res) {
            var sli = res.slice(1,4);
              // Returns successful data submission message when the entered information is stored in database.
            if (sli==="set")
            {
              alert("El personaje se ha guardado exitosamente.");
              $('#personaje').modal('hide');
            }else{
              alert("Ha ocurrido un error. Por favor intente nuevamente. :(")
            }
          }
      });      // only one radio can be logically checked, don't check the rest
      break;
    }
  }
  setTimeout(location.reload.bind(location), 500);
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
      window.location.assign("http://localhost/edutopia/estudiante/pages/index/cultura-y-paz");
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
