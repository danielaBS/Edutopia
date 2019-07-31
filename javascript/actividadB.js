var imgClick = false;
var txtClick = false;

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
      $("#imgs").before($('<textarea></textarea>').val('Da click para empezar a escribir.').addClass("bod"));
      imgClick = false;
    }

    $(".droppable").last().append($('<div></div>').attr({
    }).addClass("divIMG"));

    $(".divIMG").last().append($('<button>').html("<i class='fas fa-trash-alt'></i>").addClass("delete"));

    $(".divIMG").last().append($('<img>').attr({
    }).addClass("dragged"));

    for(i=0; i< $(".dragged").length; i++){
      $(".dragged").last().attr('src', src.pop()),
      $(".divIMG").eq(i).resizable({
        minHeight: 80,
        minWidth: 80  ,
        containment: "parent",
        autoHide: "true",
      });
      $(".divIMG").eq(i).draggable({containment: "parent"});
    }

  });

  $('.wrapup').on('click', '#txtBub', function(){
    txtClick = true;
    if($(".droppable").length === 0){
      alert("Agrega una imagen primero.");
    } else {
      $(".droppable").last().append($('<div></div>').addClass("divBubble"));
      $(".divBubble").last().append($('<button>').html("<i class='fas fa-trash-alt'></i>").addClass("delete"));
      $(".divBubble").last().append($('<textarea></textarea>').addClass("txtBubble"));
      $( ".divBubble" ).draggable({containment: "parent"});
    }
  });

  $('.wrapup').on('click', '.delete', function(){
    $(this).parent().remove();
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

  //GET WIDTH ANG HEIGHT ON INPUT

  $.fn.textWidth = function(text, font) {
      if (!$.fn.textWidth.fakeEl) $.fn.textWidth.fakeEl = $('<span>').hide().appendTo(document.body);
      $.fn.textWidth.fakeEl.text(text || this.val() || this.text() || this.attr('placeholder')).css('font', font || this.css('font'));
      return $.fn.textWidth.fakeEl.width();
  };

  $.fn.textHeight = function(text, font) {
      if (!$.fn.textHeight.fakeEl) $.fn.textHeight.fakeEl = $('<span>').hide().appendTo(document.body);
      $.fn.textHeight.fakeEl.text(text || this.val() || this.text() || this.attr('placeholder')).css('font', font || this.css('font'));
      return $.fn.textHeight.fakeEl.height();
  };

  //RESIZE ELEMENTOS AUTOMATICAMENTE

  $('.actividadB').on('input', '.tit', function() {
      var inputWidth = $(this).textWidth();
      $(this).css({
          width: inputWidth
      })
  }).trigger('input');

  $('.actividadB').on('input', '.bod', function() {
      var inputHeight = $(this).textHeight();
      $(this).css({
          height: inputHeight
      })
  }).trigger('input');

  $('.actividadB').on('input', '.txtBubble', function() {
      var inputWidth = $(this).textWidth();
      var inputHeight = $(this).textHeight();
      $(this).css({
          width: inputWidth,
          height: inputHeight
      })

  }).trigger('input');


  function inputWidth(elem, minW, maxW) {
      elem = $(this);
  }

  function inputHeight(elem, minH, maxH) {
      elem = $(this);
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
