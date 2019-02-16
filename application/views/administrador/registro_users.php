<!DOCTYPE html>

<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
    <head>
      <title>Inicio</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Roboto+Slab" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>/css/style.css">
        <script type="text/javascript" src="<?php echo base_url() . '/javascript/admin.js'; ?>" ></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    </head>
    <body>
      <div class="header" id="header">
        <img class="img" src="https://i.imgur.com/8flU2av.png">
      </div>
      <div id="navbar">
        <a href="#">Estadísticas</a>
        <a href="#">Actividades</a>
        <a href="#">Grados</a>
        <div class="dropdown">
          <button class="dropbtn">Usuarios</button>
          <div class="dropdown-content">
            <a href="#">Profesores</a>
            <a href="#">Estudiantes</a>
            <a class="btnIcon" href="http://localhost/edutopia/administrador/pages/index/registro_users">Agregar Usuarios</a>
          </div>
        </div>
        <a class= "left" href="http://localhost/edutopia/administrador/pages/index/home_admin">
          <img border="0" alt="W3Schools" src="https://i.imgur.com/sqyTsRk.png" width="25">
        <a class="current"> Registro de usuarios </a>
      </div>
      <div class="formRegister">
        <form name= "formRegistro" method="post" onsubmit="validateForm()">
          <a class= "tittle">Perfil:</a>
          <input type="radio" name="perfil" id="profesor" value="profesor" checked>Profesor
          <input type="radio" name="perfil" id="estudiante" value="estudiante">Estudiante<br>
          <a class= "tittle">Nombres:</a>
          <input type="text" name="nombres" ><br>
          <a class= "tittle">Apellidos:</a>
          <input type="text" name="apellidos" ><br>
          <a class= "tittle" id="ide">No. de Identificación:</a>
          <input type="text" name="identificacion" ><br>
          <a class= "tittle" id ="optionChecked">Grado:</a>
          <input type="number" name="grado" id ="grado" min="1" max="5" ><br>
          <input id="btnReg" type="submit" value="Registrar">
        </form>
      </div>
    </body>
