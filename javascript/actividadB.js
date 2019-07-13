//MOSTRAR MENÚ DE ELEMENTOS

$(document).ready(function(){

  // DISPLAY ONLY ACTIVE CLASS

  $('.force-overflow').css("display", "none");
  $('.left').css("display", "none");
  $('.right').css("display", "none");
  $('.hide').css("display", "none");
  $('.active').css("display", "block");

  //

  $(".show span").click(function(){
    $('.left').css("display", "none");
    $('.hide').css("display", "block");
  });

  // CHANGE DISPLAYED LEFT MENU ON CLICK

  $('.noNav').bind('click', function(){
    var clssSlctd = $(this).attr('class');
    var hsClss = clssSlctd.split(" ");

    $(".".concat(hsClss[0])).removeClass('active');
    $(".left").css("display", "none");
    $("#".concat(hsClss[1])).css("display", "block");
    $(this).addClass('active');

    for(i=0; i<document.getElementById(hsClss[1]).getElementsByClassName("it").length; i++) {
      document.getElementById(hsClss[1]).getElementsByClassName("it")[i].classList.remove("active");
    }

    document.getElementById(hsClss[1]).getElementsByClassName("it")[0].classList.add("active");
    document.getElementById(hsClss[1]).getElementsByClassName("force-overflow")[0].style.display = "block";

  });

  $('.it').bind('click', function(){
    var classSlctd = $(this).attr('class');
    var hasClss = classSlctd.split(" ");

    $(".force-overflow").css("display", "none");
    $(".".concat(hasClss[0])).removeClass('active');
    $(this).addClass('active');
    $(".".concat(hasClss[1])).css("display", "block");
  });

  // DEFINIR LAYOUT

  $("#divDrag8 img").click(function(e){
    var clssSlctd = $(this).attr('class');
    var hsClss = clssSlctd.split(" ");

    $(".right").css("display", "none");
    $(".".concat(hsClss[0])).removeClass('active');
    $(this).addClass('active');
    $("#divDrag8 p").toggleClass('active  ');
    $(".".concat(hsClss[1])).css("display", "block");
  });

  $(".actividadB #imgs").click(function(e){
    $(".noNav").eq(1).click();
  });

  // CLONE IMG ELEMENTS

  var src = new Array();

    $(".drag").click(function(){
      src.push($(this).attr("src"));

      if($("#dropImgs").length == 0){
        $('<div></div>').attr({'id': 'dropImgs'}).addClass("droppable").appendTo(".actividadB");
      }

      $('<img>').attr({
      }).addClass("draggable dragged").appendTo(".droppable");

      for(i=0; i<src.length; i++){
        $(".draggable").eq(i).attr("src", src[i]);
        $('.draggable').eq(i).draggable({
         containment: "parent"
        });
      }
    });

    // INPUT ElEMENTS

    var elC;

    $(".txtEnt").click(function(){
      $(".noNav").eq(2).click();

      elC = $(this);

      $('input[type=range]').on('input', function () {
        var size = $(this).val();
        elC.css("fontSize", size+"px");
      });

      $('input[type=color]').on('change', function () {
        var col = $(this).val();
        elC.css("color", col);
      });
    });

});

// GUARDAR ACTIVIDAD

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
