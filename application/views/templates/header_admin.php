<!DOCTYPE html>


<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
    <head>
      <title>Edutopia - Profesores</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="icon" type="image/png" href="https://i.imgur.com/c4uU8lr.png">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <link rel="icon" type="image/png" href="https://i.imgur.com/c4uU8lr.png">
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>/css/styleP.css">
        <script type="text/javascript" src="<?php echo base_url() . '/javascript/profesores.js'; ?>" ></script>
    </head>
<div class="headerIMG" id="headerIMG">
  <img class="img" src="https://i.imgur.com/ePjP4ib.png">
</div>
<div id="navbar">
  <li class="nav-item dropdown">
    <a class="nav-item nav-link dropdown-toggle mr-md-2" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
      <img src="https://i.imgur.com/JPQBdJi.png" height="25">
    </a>
    <div class="dropdown-menu dropdown-menu dropdown-menu-right">
      <a class="dropdown-item" href="#">Cerrar sesión</a>
    </div>
  </li>
  <li class="nav-item">
    <a class="btn" id="actividades" href="http://localhost/edutopia/administrador/pages/index/actividades">Actividades</a>
  </li>
  <li class="nav-item">
    <a class="btn" id="grados" href="http://localhost/edutopia/administrador/pages/index/grados">Grados</a>
  </li>
  <li class="nav-item dropdown">
    <a class="nav-item nav-link dropdown-toggle mr-md-2" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
      Usuarios
    </a>
    <div class="dropdown-menu">
      <a class="dropdown-item" href="http://localhost/edutopia/administrador/pages/index/profesores_list">Profesores</a>
      <a class="dropdown-item" href="http://localhost/edutopia/administrador/pages/index/estudiantes_list">Estudiantes</a>
      <a class="dropdown-item" href="http://localhost/edutopia/administrador/pages/index/registro_users">Agregar Usuarios</a>
    </div>
  </li>
  <li class="nav-item">
    <a class="btn" id="home" href="http://localhost/edutopia/administrador/pages/index/home_admin">Inicio</a>
  </li>
  <li  class="nav-item">
    <a id="ub"></a>
  </li>
</div>
