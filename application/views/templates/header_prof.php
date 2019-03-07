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
      <a>Clases</a>
      <a>Materias</a>
      <a>Periodos</a>
      <div><a>Temas</a>
        <div class="dropdown-content1">
          <a>Material de estudio</a>
          <a>Evaluaciones</a>
          <a>Actividades de repaso</a>
        </div>
      </div>
    </div>
  </div>
  <a class="btn" id="home" href="http://localhost/edutopia/profesor/pages/index/home_prof">Inicio</a>
  <a id="ub"></a>
</div>
<!--<nav id="navbarprof">
<ul>
  <li class="current-menu-item"><a href="#">Acerca de </a></li>
  <li class="current-menu-item"><a href="#">Estadisticas</a></li>
  <li class="current-menu-item"><a href="#">Actividades</a>
  <ul>
  <li><a href="#">Plataformas</a></li>
  <li><a href="#">Evaluaciones </a></li>
  <li><a href="#">Actividades de repaso</a></li>
  <li><a href="#">Progreso</a></li>
   </ul>
   </li>
  <li><a href="#">Grados</a>
   <ul>
   <li><a href="#">Clases</a></li>
   <li><a href="#">Materias</a></li>
   <li><a href="#">Periodos</a></li>
   <li><a href="#">Temas</a>
   <ul>
  <li><a href="#">Material de estudio</a></li>
  <li><a href="#">Evaluaciones</a></li>
  <li><a href="#">Actividades de repaso</a></li>
  </ul>
  </li>
  </li>
  </ul>
 <li class="current-menu-item"><a href="#">Home</a>
 </ul>
</nav>


*/
