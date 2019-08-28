function sendData(promedio){
  obj= {
    'porcentaje' : promedio
  };

  $.ajax({
      url: "http://localhost/edutopia/estudiante/pages/guardarActSession",
      type: "POST",
      async: false,
      data: obj,
      success: function (res) {
          var len = res.length;
        }
  });

  console.log("terminado");
}
