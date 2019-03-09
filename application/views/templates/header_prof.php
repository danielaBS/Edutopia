<!DOCTYPE html>

<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
    <head>
      <title>Edutopia</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="icon" type="image/png" href="https://i.imgur.com/c4uU8lr.png">
        <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Roboto+Slab" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>/css/stylep.css">
        <script type="text/javascript" src="<?php echo base_url() . '/javascript/profesores.js'; ?>" ></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    </head>
<div class="headerIMG" id="headerIMG">
  <img class="img" src="https://i.imgur.com/ePjP4ib.png">
</div>

<div id="navbarprof">
  <  <div class="logout">
      <input type="image" id="userLOBtn" src="https://i.imgur.com/JPQBdJi.png" alt="Submit" height="25">
        <div id="dropMenu" class="hide">
          <a>Cerrar sesión</a>
        </div>
  </div>
  <a class="btn" id="actividades">Acerca de</a>
  <a class="btn" id="actividades">Estadisticas</a>
  <div class="dropdown">
 <button class="dropbtn">Actividades</button>
 <div class="dropdown-content">
   <a>Plataformas</a>
   <a>Evaluaciones</a>
   <a>Actividades de repaso</a>
   <a>Progreso</a>
 </div>
</div>
<div class="dropdown">
    <button class="dropbtn">Grados</button>
    <div class="dropdown-content">
      <a class="btnIcon" href="http://localhost/edutopia/profesor/pages/index/Class_list">Clases</a>
      <a>Periodos</a>
        <div class="dropdown-right">
          <button id ="leftMenu" class="dropbtnRight">Temas</button><img src="https://cdn4.iconfinder.com/data/icons/ionicons/512/icon-arrow-right-b-512.png" width="20px" style="margin-top:6%; margin-left: 30%">
          <div class="dropdown-contentRight">
          <a>Material de estudio</a>
          <a>Evaluaciones</a>
          <a>Actividades de repaso</a>
          </div>
        </div>
      </div>
    </div>
  <a class="btn" id="home" href="http://localhost/edutopia/profesor/pages/index/home_prof">Inicio</a>
</div>
