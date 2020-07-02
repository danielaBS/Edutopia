<?php

require  '../Edutopia/vendor/autoload.php';

$client = new Google_Client();
$client->setApplicationName("Edutopia");
$client->setDeveloperKey("AIzaSyAQ5ThIN7jXkd1FKqs-63eRItK2jr8vv1k");

// Get the API client and construct the service object.
$service = new Google_Service_Sheets($client);

// Prints the names and majors of students in a sample spreadsheet:
// https://docs.google.com/spreadsheets/d/1BxiMVs0XRA5nFMdKvBdBZjgmUUqptlbs74OgvE2upms/edit

$data = array();

$idSo = $_GET['id'] . "&controls=0";
$res = $this->asignatura_model->getSongData($idSo);

foreach ($res as $key) {
  foreach ($key as $k) {
    array_push($data, $k);
  }
}

$spreadsheetId = $data[6];
$range = 'Hoja 1!A2:F' . $data[7];

$response = $service->spreadsheets_values->get($spreadsheetId, $range);
$values = $response->getValues();

$palabras = array();
$tiemposInicio = array();
$tiemposFin = array();
$verbos = array();
$sustantivos = array();

$palabritas = array();
$tiempoEnteroInicio = array();
$tiempoEnteroFin = array();
$sum = array();

//TENGO CONTROL ABSOLUTO MUAJAJAJAJA

if (empty($values)) {
  echo "No data found.\n";
} else {

  foreach ($values as $row) {
    array_push($palabras, $row[0]);
    array_push($tiemposInicio, $row[1]);
    array_push($tiemposFin, $row[2]);
    array_push($verbos, $row[4]);
    array_push($sustantivos, $row[5]);
  }

  foreach ($tiemposInicio as $tiempo1) {
    array_push($tiempoEnteroInicio, explode(":", $tiempo1));
  }

  foreach ($tiemposFin as $tiempo2) {
    array_push($tiempoEnteroFin, explode(":", $tiempo2));
  }

  foreach ($palabras as $linea) {
    array_push($palabritas, explode(" ", $linea));
  }

  for($i=0; $i<count($tiempoEnteroInicio); $i++){
    array_push($sum, $tiempoEnteroInicio[$i][1]*60 + $tiempoEnteroInicio[$i][2] + ($tiempoEnteroInicio[$i][3]/100));
  }


  $this->session->set_userdata(array(
    'sumas' => $sum,
    'verbos' => $verbos,
    'sustantivos' => $sustantivos,
  ));
}
?>
<div class="home">
  <div style="display:inline-block; margin:0 15% 0">
    <div style= "width: 650px; height: 365.625px; float:left; position: absolute; z-index:1;" onclick="toastView()"></div>
    <div id="toastView">Por favor de clic en el botón 'Iniciar actividad' para empezar.</div>
    <div id="player" style="float:left;"></div>
    <div style= "width:30%; height: 365.625px; float:left; margin: 0 40px 0; padding: 0 10px; text-align: justify">
      <p>Deslizate hacia abajo y busca en la letra de la canción los sustantivos y verbos.
        Cuándo el vídeo se detenga, escribelos en el recuadro que corresponde.</p>
      <img src= "https://i.imgur.com/s07d2lp.png" width="100%">
      <span style= "font-weight: bold">Recuerda:</span>
      <p>Los verbos son las acciones que realizas.</p>
      <p>Los sustantivos son palabras que identifican elementos; ya sean objetos, seres vivos, lugares, etc.</p>
    </div>
  </div>
  <div class="botones">
    <button class="start btns" autofocus>Iniciar actividad</button>
    <button class="pause btns">Pausar actividad</button>
  </div>
  <div id= "preguntas">
    <h3 style="margin:20px">Presta atención a la letra de la canción.</h3>
    <div style="text-align:left; margin: 20px 40px;">
      <p style ="margin:0">1. Escribe en la casilla que corresponde todos los verbos que hayas encontrado separados por un espacio hasta la parte de la canción que está <span style='font-weight:bold'>señalada</span>.</p>
      <p style ="margin:0">2. Escribe en la casilla que corresponde todos los sustantivos que hayas encontrado separados por un espacio hasta la parte de la canción que está <span style='font-weight:bold'>señalada</span>.</p>
    </div>
    <div class= "opciones">
      <div id="letra" style="margin:10px 0; text-align:left"><?php
      $this->session->set_userdata(array('tiempoInicio' => $sum[0]));
      foreach ($palabras as $key) {
        ?><p style="padding:0; margin:0"><?php
        echo($key);
      }?></div>
    </div>
    <div style="padding:10px; float: right; margin: 5% 5% 2%">
      <div class= "textArea" style="text-align:left">
        <p>Verbos<p>
        <textarea rows="4" cols="30" name= "verbos" placeholder="Clic aquí par empezar..."></textarea>
      </div>
      <div class= "textArea" style="text-align:left">
        <p>Sustantivos<p>
        <textarea rows="4" cols="30" name= "sustantivos" placeholder="Clic aquí par empezar..."></textarea>
      </div>
    </div>
    <div>
      <input class="btns" style="margin: 4px 0 0 0;" type= "submit" name="submit" value="Siguiente" id="next" onclick="clicked()"></input><p id="resultado"></p>
    </div>
  </div>
</div>
<?php
