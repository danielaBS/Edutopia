function mensajeput(){
  var titulo = document.getElementById("titulo").value;
  var texto = document.getElementById("texto").value;
  if(titulo.length>5 && titulo != " " && titulo != null){
    if(texto !==" " && texto !== null && texto.length>15){
      document.getElementById("mensaje").innerHTML = "¡Excelente trabajo! Continúa aprendiendo.";
      obj= {
        'titulo' : titulo,
        'texto' : texto
      };

        $.ajax({
          url: "http://localhost/edutopia/estudiante/pages/guardarHistoria",
          type: "POST",
          async: false,
          data: obj,
          success: function (res) {
            var len = res.length;
          }
        });
    }else{
      document.getElementById("mensaje").innerHTML = "Por favor escribe tu cuento aquí. El cuento debe contener al menos 15 palabras.";
    }
  }else{
    document.getElementById("mensaje").innerHTML = "Por favor ingresa un título para tu historia.";
  }
}

function allowDrop(ev) {
  ev.preventDefault();
}

function drag(ev) {
  ev.dataTransfer.setData("text", ev.target.id);
}

function drop(ev) {
  ev.preventDefault();
  var data = ev.dataTransfer.getData("text");
  ev.target.appendChild(document.getElementById(data));
}
