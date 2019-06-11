<?php
/*$command = escapeshellcmd('python c:/users/danie/mega/test.py');
$output = shell_exec($command);

if(isset($output) === true){
  echo $output;
}else{
  echo "el script no pudo ser cargado";
}
*/
require  '../Edutopia/vendor/autoload.php';

$client = new Google_Client();
$client->setApplicationName("Edutopia");
$client->setDeveloperKey("AIzaSyAQ5ThIN7jXkd1FKqs-63eRItK2jr8vv1k");

// Get the API client and construct the service object.
$service = new Google_Service_Sheets($client);

// Prints the names and majors of students in a sample spreadsheet:
// https://docs.google.com/spreadsheets/d/1BxiMVs0XRA5nFMdKvBdBZjgmUUqptlbs74OgvE2upms/edit
$lines = array();
$numLines = array();
$cancion1 = array();
$cancion2 = array();
$cancion3 = array();

$verbos = array();
$verbos1 = array();
$verbos2 = array();
$verbos3 = array();

?>

<div class="home">
  <img width="80" height="80" src= "https://cdn3.iconfinder.com/data/icons/business-finance-77/80/03_light_bulb_2-512.png">
  <h5>Da clic en una canción para iniciar la actividad.</h5>
  <?php
  $canciones = $this->asignatura_model->getSongA();
  shuffle($canciones);
  ?>
  <?php foreach (array_slice($canciones, 0, 3) as $cancion_item):?>
    <div onclick="openPopUp(this)" style="cursor: pointer;" class= "canciones <?php echo $cancion_item['link']?>" data-toggle="modal" data-target="#<?php echo $cancion_item['link']?>">
      <img width="560" height="auto" src="<?php echo $cancion_item['imagen']?>">
      <h3><?php
      $tit = $cancion_item['titulo'];
      $art = $cancion_item['artista'];
      $can = $cancion_item['link'];
      echo $tit  . " - " . $art;
      ?></h3>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="<?php echo $can?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
      <div class="modal-dialog .modal-dialog-centered  modal-lg" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLongTitle"><?php
                $tit = $cancion_item['titulo'];
                $art = $cancion_item['artista'];
                echo $tit  . " - " . $art;
                ?>
              </h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body" style="display:inline-block">
            <div style="cursor: pointer; z-index:10; position: relative; width:700px; height:393.75px"  id="player">
               <iframe style="margin: 0 0 0 34px; width:700px; height:393.75px" src="" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen id="video"></iframe>
            </div>
            <button  class="start ply"  name="<?php echo $can ?>">Iniciar actividad</button>
            <button  class="pause ply"  name="<?php echo $can ?>">Pausar actividad</button>
          </div>
          <div class="modal-body"  style="display: inline-block; width:100%">
            <div style= "float: left; text-align: left; width:60%; padding:4%" id="letra">
              <?php

              $spreadsheetId = $cancion_item['letra'];
              $range = 'Hoja 1!A2:F' . $cancion_item['lineas'];

              $response = $service->spreadsheets_values->get($spreadsheetId, $range);
              $values = $response->getValues();

              $palabrotas = array();
              $tiemposInicio = array();
              $tiemposFin = array();

              $palabritas = array();
              $tiempoEntero = array();
              $tiempoEnteroFin = array();
              $poldios = array();
              $sum = array();

                //TENGO CONTROL ABSOLUTO MUAJAJAJAJA

              if (empty($values)) {
                  echo "No data found.\n";
              } else {
                  foreach ($values as $row) {
                    array_push($palabrotas, $row[0]);
                    array_push($tiemposInicio, $row[1]);
                    array_push($tiemposFin, $row[2]);
                    array_push($verbos, $row[4]);

                      // Print columns A and D, which correspond to indices 0 and 4.
                      ?><p style="color: black"><?php echo($row[0]); ?></p>
                      <?php
                  }
                    foreach ($tiemposInicio as $tiempo1) {
                      array_push($tiempoEntero, explode(":", $tiempo1));
                    }
                    foreach ($tiemposFin as $tiempo2) {
                      array_push($tiempoEnteroFin, explode(":", $tiempo2));
                    }
                    foreach ($palabrotas as $linea) {
                      array_push($palabritas, explode(" ", $linea));
                    }
                    for($i=0; $i<count($tiempoEntero); $i++){
                      array_push($sum, $tiempoEntero[$i][1]*60 + $tiempoEntero[$i][2] + ($tiempoEntero[$i][3]/100));
                    }
                }

                array_push($lines, $sum);
                array_push($poldios, $sum[0]);
                array_push($numLines, $cancion_item['lineas']);

                for ($i=0; $i<count($poldios); $i++){
                  $this->session->set_userdata(
                    array($cancion_item['link'] => $poldios[0]));
                }



                 ?>
            </div>
            <div class="modal-body" id= "preguntas" style="float: left; text-align: left; width:40%;background-Color:lavender; ">
              <p style="color:black">Presta atención a la letra de la canción.</p>
              <p style="color:black" id="dialogo"></p>
              <textarea rows="4" cols="30" name= "verbos"></textarea>
              <textarea rows="4" cols="30" name= "sustantivos"></textarea>
              <textarea rows="4" cols="30" name= "adjetivos"></textarea>
              <textarea rows="4" cols="30" name= "adverbios"></textarea>
              <input style="margin: 4px 0 0 0;" type= "submit" name="submit"></input><p id="resultado"></p>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal" onclick="closeForm()">Cerrar</button>
            <button type="button" class="btn btn-primary">Guardar</button>
          </div>
        </div>
      </div>
    </div>
  <?php endforeach;

  foreach (array_slice($lines,0, 1)as $line) {
    foreach ($line as $words){
      array_push($cancion1, $words);
    }
  }

  foreach (array_slice($verbos, 0, $numLines[0]-1)as $linea) {
    array_push($verbos1, $linea);
  }

  foreach (array_slice($verbos, $numLines[0]-1, $numLines[1]-1)as $lineb) {
    array_push($verbos2, $lineb);
  }

  foreach (array_slice($verbos, count($verbos)- $numLines[2] +1, count($verbos))as $linec) {
    array_push($verbos3, $linec);
  }

  $this->session->set_userdata(array(
    'cancion1' => $cancion1,
    'cancion2' => $cancion2,
    'cancion3' => $cancion3,
    'verbos1' => $verbos1,
    'verbos2' => $verbos2,
    'verbos3' => $verbos3,
  ));

  ?>
</div>
