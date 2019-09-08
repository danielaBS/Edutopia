<div class="home">
  <h2>En esta página puedes conocer tu progreso y los recuerdos que has ganado</h2>
  <iframe width="1200" height="672" src="https://www.youtube.com/embed/U3vX8g46Knw" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
</div>
<h1>Recuerda que tu misión es recuperar los recuerdos de
  <?php
    $char = $this->session->userdata("personaje");
    if($char === "do"){
      echo "Cleo.";
    }else if($char === "un"){
      echo "Matías.";
    }
  ?></h1>
<br><br><br>
<h2>Estos son los puntos que has obtenido hasta ahora:
<?php
$idEst = $this->session->userdata("id");
$puntosObtenidos = $this->asignatura_model->getPoints($idEst);

$puntaje = sizeof($puntosObtenidos)*5;
echo $puntaje;
?>
</h2>
<br><br><br><br>
