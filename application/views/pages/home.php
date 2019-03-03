<!DOCTYPE html>

<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
    <head>
      <title>Edutopia</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="icon" type="image/png" href="https://i.imgur.com/c4uU8lr.png">
        <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Roboto+Slab" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>/css/style.css">
        <script type="text/javascript" src="<?php echo base_url() . '/javascript/home.js'; ?>" ></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/crypto-js/3.1.2/rollups/aes.js"></script>
    </head>
    <body>
      <div id= "pageEst">
        <div id="imgHeaderEst">
          <img src="https://i.imgur.com/yyRuMzt.png">
        </div>
        <div id="containerForm">
        <div class="imagenCara">
          <img style="width:180px"src="https://i.imgur.com/jl8Ye11.png">
        </div>
        <div class="id">
          <input id="identifEst" type="text" class="box" name="identificacion" maxlength="30" size="40" placeholder="No. de Identificación">
        </div>
        <div class="mensaje">
          <input id="userEst" type="text" class="box" name="usuario" maxlength="30" size="40" placeholder="Usuario">
        </div>
        <div class= "boton">
          <button id="siguienteEst" style="font-family: 'Roboto', sans-serif;" class= "validateFirstLog" type="button"> Siguiente </button>
        </div>
        <div class="form-popup" id="myForm">
          <div class="form-container">
            <img src="https://i.imgur.com/OeTDLxB.png" alt="Smiley face" width="85">
            <h2>Defina su contraseña</h2>
            <input type="password" placeholder="Contraseña" name="contraseña" id="passwordSetEst" required>
            <input type="password" placeholder="Confirme la contraseña" id="passwordConfEst" name="contraseñaConf" required>
            <button class="btn" onclick="definePasswdEst()">Guardar contraseña</button>
            <button type="button" class="btn cancel" onclick="closeForm()">Cancelar</button>
          </div>
        </div>
        <div class="candado">
          <input id="contrasenaEst" type="password" class="hide" name="contrasena" maxlength="30" size="40" placeholder="Contraseña">
        </div>
        <div class="boton" >
          <button id="botloginEst" style="font-family: 'Roboto', sans-serif;" class= "hide" type="button"> Iniciar sesión </button>
        </div>
      </div>
    </div>

      <div id = "pageProf">
        <div id="imgHeaderProf">
          <img src="https://i.imgur.com/98VHRTH.png">
        </div>
        <div id="containerForm">
        <div class="imagenCara">
          <img style="width:180px"src="https://i.imgur.com/t5qdoy2.png">
        </div>
        <div class="id">
          <input id="identifProf" type="text" class="box" name="identificacion" maxlength="30" size="40" placeholder="No. de Identificación">
        </div>
        <div class="mensaje">
          <input id="userProf" type="text" class="box" name="usuario" maxlength="30" size="40" placeholder="Usuario">
        </div>
        <div class= "boton">
          <button id="siguienteProf" style="font-family: 'Roboto', sans-serif;" class= "validateFirstLogProf" type="button"> Siguiente </button>
        </div>
        <div class="form-popup" id="myFormProf">
          <div class="form-container">
            <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/8/82/LutraCanadensis_fullres.jpg/250px-LutraCanadensis_fullres.jpg" alt="Smiley face" height="42" width="42">
            <h2>Defina su contraseña</h2>
            <input type="password" placeholder="Contraseña" name="contraseña" id="passwordSetProf" required>
            <input type="password" placeholder="Confirme la contraseña" id="passwordConfProf" name="contraseñaConf" required>
            <button class="btn" onclick="definePasswdProf()">Guardar contraseña</button>
            <button type="button" class="btn cancel" onclick="closeForm()">Cancelar</button>
          </div>
        </div>
        <div class="candado">
          <input id="contrasenaProf" type="password" class="hide" name="contrasena" maxlength="30" size="40" placeholder="Contraseña">
        </div>
        <div class="boton" >
          <button id="botloginProf" style="font-family: 'Roboto', sans-serif;" class= "hide" type="button"> Iniciar sesión </button>
        </div>
      </div>
      </div>
    </body>
    <div id="footer">
      <button id="logADMIN" style="font-family: 'Roboto', sans-serif;" type="button"> </button>
    </div>
</html>
