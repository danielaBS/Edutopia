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
            <div  class=" ply" name="<?php echo $can?>" onclick="print(this)">Imprimir tiempos</div>
            <h2 id= "ll"></h2>
          </div>
          <div class="modal-body"  style="display: inline-block; width:100%;">
            <div style= "float: left; text-align: left; width:55%; padding:4%">
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
              $timee = array();
              $sum = array();
              $sum2 = array();

                //TENGO CONTROL ABSOLUTO MUAJAJAJAJA

              if (empty($values)) {
                  echo "No data found.\n";
              } else {
                  foreach ($values as $row) {
                    array_push($palabrotas, $row[0]);
                    array_push($tiemposInicio, $row[1]);
                    array_push($tiemposFin, $row[2]);
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

                array_push($poldios, $sum[0]);
                for ($i=0; $i<count($poldios); $i++){
                  $this->session->set_userdata(array($cancion_item['link'] => $poldios[0]));
                }
                 ?>
            </div>
            <div class="modal-body" style="float: left; text-align: left; width:45%;background-Color:lavender; ">
              <p style="color:black">Presta atención a la letra de la canción.</p>
              <p style="color:black" id="dialogo"></p>
              <input type= "text" name "verbos"></input>
              <input type= "text" name "sustantivos"></input>
              <input type= "text" name "adjetivos"></input>
              <input type= "text" name "adverbios"></input>
              <input type= "submit"></input>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal" onclick="closeForm()">Cerrar</button>
            <button type="button" class="btn btn-primary">Guardar</button>
          </div>
        </div>
      </div>
    </div>
  <?php endforeach; ?>
</div>
