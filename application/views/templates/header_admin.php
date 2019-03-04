<!DOCTYPE html>

<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
    <head>
      <title>Edutopia</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="icon" type="image/png" href="https://i.imgur.com/c4uU8lr.png">
        <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Roboto+Slab" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>/css/styleA.css">
        <script type="text/javascript" src="<?php echo base_url() . '/javascript/admin.js'; ?>" ></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    </head>
<div class="headerIMG" id="headerIMG">
  <img class="img" src="https://i.imgur.com/8flU2av.png">
</div>
<div id="navbar">
  <div class="logout">
    <input type="image" id="userLOBtn" src="https://i.imgur.com/JPQBdJi.png" alt="Submit" height="25">
      <div id="dropMenu" class="hide">
        <a>Cerrar sesión</a>
      </div>
  </div>
  <a class="btn" id="actividades" href="http://localhost/edutopia/administrador/pages/index/actividades">Actividades</a>
  <a class="btn" id="grados" href="http://localhost/edutopia/administrador/pages/index/grados">Grados</a>
  <div class="dropdown">
    <button class="dropbtn">Usuarios</button>
    <div class="dropdown-content">
      <a href="http://localhost/edutopia/administrador/pages/index/profesores_list">Profesores</a>
      <a href="http://localhost/edutopia/administrador/pages/index/estudiantes_list">Estudiantes</a>
      <a class="btnIcon" href="http://localhost/edutopia/administrador/pages/index/registro_users">Agregar Usuarios</a>
    </div>
  </div>
  <a class="btn" id="home" href="http://localhost/edutopia/administrador/pages/index/home_admin">Inicio</a>
  <a id="ub"></a>
</div>
