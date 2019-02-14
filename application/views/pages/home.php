<!DOCTYPE html>

<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
    <head>
      <title>Edutopia</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Roboto+Slab" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>/css/style.css">
        <script type="text/javascript" src="<?php echo base_url() . '/javascript/scrollDown.js'; ?>" ></script>
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
          <img id="icono" src="https://i.imgur.com/bkpJfBm.png" ><input id="identifEst" type="text" class="box" name="identificacion" maxlength="30" size="40" placeholder="No. Identificación">
        </div>
        <div class="mensaje">
          <img id="icono" src="https://i.imgur.com/JPQBdJi.png"><input id="userEst" type="text" class="box" name="usuario" maxlength="30" size="40" placeholder="Usuario">
        </div>
        <div class="candado">
          <img id="icono" src="https://i.imgur.com/CIKGU9h.png" ><input id="contrasenaEst" type="password" class="box" name="contrasena" maxlength="30" size="40" placeholder="Contraseña">
        </div>
        <div class="boton" >
          <button id="botloginEst" style="font-family: 'Roboto', sans-serif;" class= "iniciarsesionEst" type="button"> Iniciar sesión </button>
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
          <img id="icono" src="https://i.imgur.com/bkpJfBm.png" ><input id="identifProf" type="text" class="box" name="identificacion" maxlength="30" size="40" placeholder="No. Identificación">
        </div>
        <div class="mensaje">
          <img id="icono" src="https://i.imgur.com/JPQBdJi.png"><input id="userProf" type="text" class="box" name="usuario" maxlength="30" size="40" placeholder="Usuario">
        </div>
        <div class="candado">
          <img id="icono" src="https://i.imgur.com/CIKGU9h.png" ><input id="contrasenaProf" type="password" class="box" name="contrasena" maxlength="30" size="40" placeholder="Contraseña">
        </div>
        <div class="boton" >
          <button id="botloginProf" style="font-family: 'Roboto', sans-serif;" class= "iniciarsesionProf" type="button"> Iniciar sesión </button>
        </div>
      </div>
      </div>
    </body>
    <div id="footer">
      <button id="logADMIN" style="font-family: 'Roboto', sans-serif;" type="button"> </button>
    </div>
</html>
