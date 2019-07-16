var imgClick = false;

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

    if($("#text").css("display") === "none"){
      document.getElementById(hsClss[1]).getElementsByClassName("it")[0].classList.add("active");
      document.getElementById(hsClss[1]).getElementsByClassName("force-overflow")[0].style.display = "block";
    }

  });

//CAMBIAR DE SUB CATEGORIA EN ELEMENTOS

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
    imgClick = true;
    $(".noNav").eq(1).click();
  });

  // CLONE IMG ELEMENTS

  var src = new Array();

  $(".drag").click(function(){
    src.push($(this).attr("src"));

    if(imgClick === true){
      $("#imgs").before($('<div></div>').attr({'id': 'dropImgs'}).addClass("droppable"));
      $("#imgs").before($('<textarea></textarea>').val('Da click para empezar a escribir.').addClass("txtEnt"));
      imgClick = false;
    }

    $(".droppable").last().append($('<img>').attr({
    }).addClass("draggable dragged"));

    $('.wrapup').on('click', '#txtBub', function(){
      console.log("sd");
      $(".droppable").last().append($('<div></div>').addClass("draggable divBubble"));
      $(".divBubble").last().append($('<textarea></textarea>').addClass("draggable txtBubble"));

          $('.draggable').draggable({
           containment: "parent"
          });

    });

    for(i=0; i<src.length; i++){
      $(".draggable").eq(i).attr("src", src[i]);
      $('.draggable').eq(i).draggable({
       containment: "parent"
      });
    }
  });

  // INPUT ElEMENTS

  var elC;

  $('.actividadB').on('click', '.txtEnt', function(){
    $(".noNav").eq(2).click();

    elC = $(this);

    $('input[type=color]').on('change', function () {
      var col = $(this).val();
      elC.css("color", col);
    });

  });

  $.fn.textWidth = function(text, font) {
    console.log("ho");

      if (!$.fn.textWidth.fakeEl) $.fn.textWidth.fakeEl = $('<span>').hide().appendTo(document.body);
      $.fn.textWidth.fakeEl.text(text || this.val() || this.text() || this.attr('placeholder')).css('font', font || this.css('font'));
      return $.fn.textWidth.fakeEl.width();
  };

  $.fn.textHeight = function(text, font) {
      if (!$.fn.textHeight.fakeEl) $.fn.textHeight.fakeEl = $('<span>').hide().appendTo(document.body);
      $.fn.textHeight.fakeEl.text(text || this.val() || this.text() || this.attr('placeholder')).css('font', font || this.css('font'));
      return $.fn.textHeight.fakeEl.height();
  };

  $('.actividadB').on('input', '.txtEnt', '.txtBubble', function() {
      var inputWidth = $(this).textWidth();
      var inputHeight = $(this).textHeight();
      $(this).css({
          width: inputWidth,
          height: inputHeight
      })

  }).trigger('input');


  function inputWidth(elem, minW, maxW) {
      elem = $(this);
      console.log(elem)
  }

  function inputHeight(elem, minH, maxH) {
      elem = $(this);
      console.log(elem)
  }
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
