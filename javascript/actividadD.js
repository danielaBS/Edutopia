var i=1;
var preguntas =
 [
   ["1. ¿Cuál es el problema que se presenta?", "c"],
   ["2. ¿Cómo puede resolver la situación la profesora?", "d"],
   ["3. ¿Qué harías tú siendo el estudiante que tiró la basura?", "a"],
   ["4. ¿Qué harías tú siendo el estudinte acusado erroneamente?", "c"],
   ["5. ¿Qué hubieras hecho tú para evitar esta situación?", "b"]
 ];

var respuestas =
[
  ["1", "a. Hay basura tirada en los pasillos del colegio."],
  ["1", "b. La profesora no sabe a quién creerle."],
  ["1", "c. Un estudiante señala al otro de haber tirado la basura al suelo y el otro culpa al primero. Alguien está mintiendo."],
  ["1", "d. Los niños quieren ir a jugar sin tener que recoger la basura."],
  ["2", "a. Explicarles que está mal mentir, y pedirles que ayuden a recoger la basura."],
  ["2", "b. Hablar con los niños a la vez y preguntarles qué pasó."],
  ["2", "c. Castigar a ambos niños y hacer que recojan la basura."],
  ["2", "d. Hablar con los niños explicandoles que está mal mentir y culpar a otras personas de los errores propios y preguntarles que pasó."],
  ["3", "a. Hablaría con la profesora y le explicaría que fue un accidente y que no quería ser regañado"],
  ["3", "b. No diría la verdad por temor a ser castigado."],
  ["3", "c. Mentiría y culparía a otro estudiante como en la situación presentada."],
  ["3", "d. Recibiría el castigo sin decir nada."],
  ["4", "a. Golpear y/o insultar al estudiante que me acusa."],
  ["4", "b. Aceptar el castigo sin defenderme."],
  ["4", "c. Hablar calmadamente con el estudiante que me acusa y con la profesora para aclarar la situación."],
  ["4", "d. Hablar con la profesora y explicarle la situación calmadamente."],
  ["5", "a. Siempre decir la verdad."],
  ["5", "b. No tirar la basura."],
  ["5", "c. Procurar aceptar las consecuencias de nuestras acciones."],
  ["5", "d. Escuchar a la profesora."]
];


$( document ).ready(function() {
  $('#preguntaCP').html(preguntas[0][0]);
  $( "input[value='a']" ).next().text(respuestas[0][1]);
  $( "input[value='b']" ).next().text(respuestas[1][1]);
  $( "input[value='c']" ).next().text(respuestas[2][1]);
  $( "input[value='d']" ).next().text(respuestas[3][1]);
});

var k=4;


function actCPnext(){
  var radioValue = $("input[name='pregunta1']:checked").val();
  console.log(radioValue);
  if(radioValue != null && radioValue != " "){
    console.log(preguntas[i-1][1]);
    if(radioValue === preguntas[i-1][1]){
      if(i<5){
        $('#preguntaCP').html(preguntas[i][0]);
        $('input[name="pregunta1"]').attr('checked', false);
        $( "input[value='a']" ).next().text(respuestas[k][1]);
        $( "input[value='b']" ).next().text(respuestas[k+1][1]);
        $( "input[value='c']" ).next().text(respuestas[k+2][1]);
        $( "input[value='d']" ).next().text(respuestas[k+3][1]);
        k+=4;

      }

      i++;

      if(i>=6){
        $('#aviso').html("Completaste la actividad.");
      }
    }else{
      $('#aviso').html("Parece que esa no es la respuesta más adecuada. Intentalo nuevamente.");
    }
  }else{
    $('#aviso').html("Por favor selecciona una opción.");
  }
}

var instance = M.Carousel.init({
    fullWidth: true,
    indicators: true
  });

  // Or with jQuery

  $('.carousel.carousel-slider').carousel({
    fullWidth: true,
    indicators: true
  });
