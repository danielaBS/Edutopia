<!DOCTYPE html>
<html>
<body>
<style>
h2 {
  margin: 2%;
}
input {
  margin: 2%;
}

</style>
<h2>Crea tu propia historia</h2>
<p>Aquí puedes poner en práctica todo lo aprendido en clase y crear tu propia historia.</p>
<input type="text" placeholder="Título" size= 40 required id="titulo"></input>
<br>
<textarea name="message" rows="10" cols="80" id="texto" required placeholder="Da click aquí para empezar."></textarea>
<br>
<input type="submit" onclick = "mensajeput()"></input>
<p style="margin: 0 0 60px 0" id="mensaje"> </p>

<script>

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

</script>
</body>
</html>
