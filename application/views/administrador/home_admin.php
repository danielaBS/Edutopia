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
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
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
        <a class= "current" href="http://localhost/edutopia/administrador/pages/index/home_admin">
          <img border="0" alt="Inicio" src="https://i.imgur.com/sqyTsRk.png" width="25">
      </div>
      <div>
      </div>
    </body>
