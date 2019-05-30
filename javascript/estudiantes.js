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
    ["claseEsp", "Español"],
    ["claseIng", "Inglés"],
    ["actividadTipoA", "Actividad A"],
    ["actividadTipoB", "Actividad B"],
    ["actividadTipoC", "Actividad C"],
  ];

  if(nameFile === "claseEsp" || nameFile === "claseIng" || nameFile === "actividadTipoA" || nameFile === "actividadTipoB" || nameFile === "actividadTipoC"){
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
    console.log(".-.");
    var divs= document.getElementsByClassName("clases");
      for (i=0; i<divs.length;i++){
        divs[i].style.backgroundImage= "url('https://i.imgur.com/euRwkKe.png')";
      }
  }

  var asig = document.getElementsByClassName("asignatura");
  for (i=0; i<asig.length; i++){
    var currentli = $($('.asignatura')).parent().href="https://www.youtube.com/";
  }
}

function setURl(element){
  var obj;
  var h2= element.getElementsByClassName("asignatura");
  if(h2[0].innerHTML.slice(0,4) ==="Leng"){
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
            // Returns successful data submission message when the entered information is stored in database.
          if (res)
          {
            console.log(res)
          }else{
            console.log("not success :(")
          }
        }
  });
}

function openPopUp(element){
  var link = element.id;
  var popUp = document.getElementById(link);
  var iframe= document.getElementById("video");
  iframe.src = link;
  console.log(popUp.id );
  popUp.style.display = "block";
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
  document.getElementById("popUpA").style.display = "none";
}
