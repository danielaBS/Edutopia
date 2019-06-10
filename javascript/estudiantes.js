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
            }else if (res==="un"){
              chrDiv.style.display = "block";
              imgChar[0].src = "https://i.imgur.com/zpDfbiR.png";
            }else if (res=="do"){
              chrDiv.style.display = "block";
              imgChar[0].src = "https://i.imgur.com/Zj4q6Ty.png";
            }
          }
    });

  if(nameFile === "actividadTipoA" || nameFile === "actividadTipoB" || nameFile === "actividadTipoC"){
    here.style.display = "block";
    here.classList.add("current");

    for( var i = 0, len = titulos.length; i < len; i++ ) {
      if( titulos[i][0] === nameFile ) {
        title = titulos[i][1];
        break;
      }
    }
  }

  var obj;

  if(nameFile === "claseEsp"){
    obj= {
      'idAsig': 1
    };
    document.getElementById("esp").classList.add("current");
  }
  if(nameFile === "claseIng"){
    obj= {
      'idAsig': 2
    };
    document.getElementById("ing").classList.add("current");
  }

  here.innerHTML = title;

  if(nameFile==="claseEsp" || nameFile==="claseIng"){

      $.ajax({
          url: "http://localhost/edutopia/estudiante/pages/setId",
          type: "POST",
          data: obj,
          success: function (res) {
              var len = res.length;
            }
      });

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

  if(nameFile==="home_est" || nameFile ==="pages"){
    document.getElementById("home").classList.add("current");
    var divEsp = document.getElementById("1");
    var divEng = document.getElementById("2");
    divEsp.style.backgroundImage= "url('https://i.imgur.com/h66JjYX.png')";
    divEng.style.backgroundImage= "url('https://i.imgur.com/awJxCQl.png')";
  }

  var asig = document.getElementsByClassName("asignatura");
  for (i=0; i<asig.length; i++){
    var currentli = $($('.asignatura')).parent().href="https://www.youtube.com/";
  }

  if(nameFile==="TESTgoosheet"){
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
  setTimeout(location.reload.bind(location), 100);
}

function setURl(element){
  var obj;
  var h2= element.id;
  if(h2 ==="1"){
    obj= {
      'idAsig': '1'
    };
    window.location.assign("http://localhost/edutopia/estudiante/pages/index/claseEsp");
  }else{
    obj= {
      'idAsig': '2'
    };
    window.location.assign("http://localhost/edutopia/estudiante/pages/index/claseIng");
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
