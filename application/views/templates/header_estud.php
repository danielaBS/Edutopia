<!DOCTYPE html>

<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
    <head>
      <title>Edutopia - Estudiantes</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="icon" type="image/png" href="https://i.imgur.com/c4uU8lr.png">
        <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Roboto+Slab" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>/css/styleE.css">
        <script type="text/javascript" src="<?php echo base_url() . '/javascript/estudiantes.js'; ?>" ></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    </head>
<div class="headerIMG" id="headerIMG">
  <img class="img" src="https://i.imgur.com/yyRuMzt.png">
</div>
<div id="navbar">
  <div class="logout">
    <input type="image" id="userLOBtn" src="https://i.imgur.com/JPQBdJi.png" alt="Submit" height="25">
      <div id="dropMenu" class="hide">
        <a>Cerrar sesión</a>
      </div>
  </div>
  <a class="btn" id="actividades" href="">Acerca de</a>
  <div class="dropdown">
    <button class="dropbtn">Actividades</button>
    <div id="dropddd" class="hide">
      <a href="">Evaluaciones</a>
      <a href="">Actividades de repaso</a>
      <a href="">Progreso</a>
    </div>
  </div>
  <div class="dropdown">
    <button class="dropbtn">Clases</button>
    <div id="dropdddr" class="hide">
      <a href="">Periodos</a>
      <div class="dropdown-right">
        <a class="leftMenu dropbtnRight">Temas<img src="https://cdn4.iconfinder.com/data/icons/ionicons/512/icon-arrow-right-b-512.png" width="20px" style="margin-left: 44%"></a>
        <div class="dropdown-contentRight">
          <a href="">Material de estudio</a>
          <a href="">Evaluaciones</a>
          <a href="">Actividades de repaso</a>
        </div>
      </div>
    </div>
  </div>
  <a class="btn" id="home" href="http://localhost/edutopia/estudiante/pages/index/home_est">Inicio</a>
  <a id="ub"></a>
</div>
