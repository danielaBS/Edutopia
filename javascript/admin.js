window.onload = function setView(){
  var headerIMG= document.getElementById('headerIMG');
  var menu = document.getElementById("dropddd");
  headerIMG.style.backgroundImage = "url('https://i.imgur.com/9nbGv3j.png')";
  var inputGrado = document.getElementById('grado');
  var btnRegistro = document.getElementById('btnReg');
  var home = document.getElementById('home');
  var homeImg = document.getElementById('homeIMG');
  var here = document.getElementById('ub');
  var grados = document.getElementById('grados');
  var actividades = document.getElementById('actividades');
  var logoutBtn = document.getElementById('userLOBtn');
  var logoutMenu = document.getElementById('dropMenu');

  var isPressed = 1;

  var linksMenu = document.getElementById("navbar").getElementsByClassName("btn");
  menu.classList.add("dropdown-content");

  logoutBtn.addEventListener("click", function(){

    isPressed += 1;
    if (isPressed % 2 == 0) {
        isPressed = false;
        logoutMenu.classList.remove("hide");
        logoutMenu.classList.add("dropdown-user");
      }else{
        logoutMenu.classList.remove("dropdown-user");
        logoutMenu.classList.add("hide");
      }
  });

  var url = window.location.pathname;
  var nameFile = url.substring(url.lastIndexOf('/')+1);
  var title;

  here.style.display = "none";

  var titulos = [
    ["registro_users", "Registro de usuarios"],
    ["profesores_list", "Profesores"],
    ["estudiantes_list", "Estudiantes"],
  ];

  if(nameFile === "registro_users" || nameFile === "profesores_list" || nameFile === "estudiantes_list"){
    here.style.display = "block";
    here.classList.add("current");

    for( var i = 0, len = titulos.length; i < len; i++ ) {
      if( titulos[i][0] === nameFile ) {
        title = titulos[i][1];
        break;
      }
    }
  }else{
    var menuItems = [
      ["actividades", "actividades"],
      ["grados", "grados"],
      ["home_admin", "home"],
    ];

    for(var i=0;i<menuItems.length;i++){
      if(menuItems[i][0] === nameFile){
        document.getElementById(menuItems[i][1]).classList.add("active");
      }
    }
  }

  if(nameFile == "registro_users"){
    var tittleGrado = document.getElementById('optionChecked');
    var perfilE = document.getElementById('estudiante');
    var perfilP = document.getElementById('profesor');
    tittleGrado.classList.add("hide");
    inputGrado.classList.add("hide");

    perfilE.onclick = function checked(){
      tittleGrado.classList.remove("hide");
      inputGrado.classList.remove("hide");
      inputGrado.setAttribute("required", "");
    }
    perfilP.onclick = function checked(){
      tittleGrado.classList.add("hide");
      inputGrado.classList.add("hide");
      inputGrado.removeAttribute("required");
    }
  }

  here.innerHTML = title;
}

function validateForm(){
  var perfil = [
    document.querySelector('input[name="perfil"]:checked').value,
    document.getElementsByName('nombres')[0].value,
    document.getElementsByName('apellidos')[0].value,
    document.getElementsByName('identificacion')[0].value,
  ];

  var grado = document.getElementsByName('grado')[0].value;

  function val(perfilT){
    return perfilT !== "";
  }

  if(perfil.every(val)){
    var usuario = generateUsername(perfil[1], perfil[2]);

    obj= {
      "perfil": perfil[0],
      "nombres": perfil[1],
      "apellidos": perfil[2],
      "identificacion": perfil[3],
      "usuario": usuario,
      "grado": grado
    };

    $.ajax({
        url: "http://localhost/edutopia/administrador/pages/registroUsuarios",
        type: "POST",
        data: obj,
        success: function (res) {
            var len = res.length;
              // Returns successful data submission message when the entered information is stored in database.
            if (res === "true")
            {
              alert("success :)")
              window.location.reload();
              //  window.location = "http://localhost/edutopia/estudiante/pages";
            }else{
              alert("not success :(")
            }
          }
    });
  }else{
    alert("Llene todos los campos");
  }
}

window.onscroll = function navBar(){
  var navbar = document.getElementById("navbar");
  var menu = document.getElementById("dropddd");
  document.getElementsByClassName('className')

  if (window.pageYOffset >= 188) {
    navbar.classList.add("sticky");
    menu.classList.add("dropdown-content_Sticky");
  } else {
    navbar.classList.remove("sticky");
    menu.classList.remove("dropdown-content_Sticky");
  }
}

function generateUsername(nombres, apellidos){
  var nombre = nombres.split(" ");
  var apellido = apellidos.split(" ");
  var nameStr= [];
  var userNm="";

  if(nombre.length!==1){
    for (i=0; i<nombre.length; i++){
      nameStr[i]= nombre[i].slice(0,1);
    }
  }else{
    nameStr[0]= nombre[0].slice(0,1);
  }
  if(apellido.length!==1){
    for (i=nombre.length; i<nombre.length+apellido.length-1; i++){
        nameStr[i]= apellido[0];
    }
  }else{
    nameStr[nombre.length]= apellido[0];
  }
  userNm= nameStr.join(".").toLowerCase();

  return userNm;
}

  function eliminarUser(element) {
    var rowNmbr = element.closest('tr').rowIndex;
    var row = document.getElementById("usersTable").rows[rowNmbr];
    var data = row.cells[3].innerHTML;
    var profile = row.cells[4].innerHTML;

    var url = window.location.pathname;
    var nameFile = url.substring(url.lastIndexOf('/')+1);
    var title;

    var titulos = [
      ["profesores_list", "Profesores"],
      ["estudiantes_list", "Estudiantes"],
    ];

    for(var i = 0, len = titulos.length; i < len; i++) {
      if( titulos[i][0] === nameFile ) {
        title = titulos[i][1];
        break;
      }
    }

    var obj = {};

    if(title === "Profesores"){
      obj= {
        "perfil": "profesor",
        "usuario": data
      };

    }else if(title === "Estudiantes"){
      obj= {
        "perfil": "estudiante",
        "usuario": data
      };
    }

    if (profile.length===12){
      var passUserAd = prompt("Ingrese su contraseña");
      obj1= {
        "pswd": passUserAd
      };
      console.log(obj1);

      $.ajax({
        url: "http://localhost/edutopia/administrador/pages/validate",
        type: "POST",
        data: obj1,
        success: function (res){
          if (res==="true"){
            $.ajax({
                url: "http://localhost/edutopia/administrador/pages/eliminarUsuario",
                type: "POST",
                data: obj,
                success: function (res2) {
                    var len = res2.length;
                      // Returns successful data submission message when the entered information is stored in database.
                    if (res2==="true"){
                      alert("Usuario eliminado");
                      window.location.reload();
                    }
                  }
            });
          }else if(passUserAd!==null && res !== "true"){
            alert("Contraseña incorrecta");
          }
        }
      });
    }else if(profile.length===17){
      alert("Este usuario tiene perfil Administrador por lo que no puede modificarse o eliminarse");
    }
  }

  function modificarUser(element){
    var url = window.location.pathname;
    var nameFile = url.substring(url.lastIndexOf('/')+1);
    var title;

    var titulos = [
      ["profesores_list", "Profesores"],
      ["estudiantes_list", "Estudiantes"],
    ];

    for(var i = 0, len = titulos.length; i < len; i++) {
      if( titulos[i][0] === nameFile ) {
        title = titulos[i][1];
        break;
      }
    }

    var btnSave = document.getElementsByTagName('button');
    var inputs = document.getElementsByTagName('input');
    var rowNmbr;
    var row;
    var nmbr;
    var nmbrTwo;
    var data = [];

    var profile;
    var user;

    if(title=== "Profesores"){
      rowNmbr = element.closest('tr').rowIndex;
      row = document.getElementById('usersTable').rows[rowNmbr];
      profile = row.cells[4].innerHTML;
      user= row.cells[3].innerHTML;
      nmbr = 3*rowNmbr-3;
      nmbrTwo = 3*rowNmbr;

      if (profile.length===12){
        btnSave[nmbrTwo-2].classList.remove("hide");

        for (i=nmbr+1; i<3*rowNmbr+1; i++) {
          inputs[i].disabled = false;
        }
        btnSave[nmbrTwo-2].addEventListener("click", function(){

          for (i=nmbr; i<nmbrTwo+1; i++) {
            data[i] = inputs[i].value;
          }

          obj = {
            "perfil": profile,
            "nombres": data[nmbr+1],
            "apellidos": data[nmbr+2],
            "usuario": user,
            "identificacion": data[nmbr+3]
          };
          console.log(obj);

        $.ajax({
              url: "http://localhost/edutopia/administrador/pages/modificarUsuario",
              type: "POST",
              data: obj,
              success: function (res) {
                  var len = res.length;
                    // Returns successful data submission message when the entered information is stored in database.
                  if (res==="true"){
                    alert("Usuario modificado");
                    window.location.reload();
                  }else{
                    alert("Intente nuevamente");
                  }
                }
          });
        });
      }else if(profile.length===17){
        alert("Este usuario tiene perfil Administrador por lo que no puede modificarse o eliminarse");
      }
    }else{
      rowNmbr = element.closest('tr').rowIndex;
      row = document.getElementById('usersTableEst').rows[rowNmbr];
      profile = row.cells[4].innerHTML;
      user= row.cells[3].innerHTML;
      nmbr = 3*rowNmbr-3;
      nmbrTwo = 3*rowNmbr;

      btnSave[nmbrTwo-2].classList.remove("hide");

      for (i=nmbr+1; i<3*rowNmbr+1; i++) {
        inputs[i].disabled = false;
      }

      btnSave[nmbrTwo-2].addEventListener("click", function(){
        for (i=nmbr; i<3*rowNmbr+1; i++) {
          data[i] = inputs[i].value;
        }

        obj = {
          "perfil": "Estudiante",
          "nombres": data[nmbr+1],
          "apellidos": data[nmbr+2],
          "usuario": user,
          "identificacion": data[nmbr+3]
        };

      $.ajax({
            url: "http://localhost/edutopia/administrador/pages/modificarUsuario",
            type: "POST",
            data: obj,
            success: function (res) {
                var len = res.length;
                  // Returns successful data submission message when the entered information is stored in database.
                if (res==="true"){
                  alert("Usuario modificado");
                  window.location.reload();
                }else{
                  alert("Intente nuevamente");
                }
              }
        });
      });
    }
  }
