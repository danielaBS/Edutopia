<?php
require  '../Edutopia/vendor/autoload.php';

$client = new Google_Client();
$client->setApplicationName("Edutopia");
$client->setDeveloperKey("AIzaSyAQ5ThIN7jXkd1FKqs-63eRItK2jr8vv1k");

// Get the API client and construct the service object.
$service = new Google_Service_Sheets($client);

$asig= $this->session->userdata('idASig');
$grado= $this->session->userdata('grado');

$data = array();

$idHistoria = $this->asignatura_model->getActHistoria($asig, $grado);
foreach ($idHistoria as $key) {
  foreach ($key as $k) {
    array_push($data, $k);
  }
}

$spreadsheetId = $data[3];
$range = 'Hoja 1!A2:B' . $data[5];

$response = $service->spreadsheets_values->get($spreadsheetId, $range);
$values = $response->getValues();
$count = 0;
$ran = random_int(0, 23 - 10);
echo $ran;


?>

<div class="home">
  <img width="80" height="80" src= "https://cdn3.iconfinder.com/data/icons/business-finance-77/80/03_light_bulb_2-512.png">
  <h5>Da clic en el siguiente vídeo antes de iniciar la actividad.</h5>
  <br>
  <div class= "tutorial" id= "tut">
    <iframe width="700" height="393.75" src="https://www.youtube.com/embed/EA68KUb4e7Q" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
    <div class= "tutInfo">
      <img src="https://i.imgur.com/Zj4q6Ty.png" width="200px" style="margin: 10px 0">
      <p> Una vez termines de ver el tutorial, deslizate hacía abajo y empieza con la actividad.</p>
    </div>
  </div>
  <div class="actC">
    <div class= "planLector">
      <p>...<?php
      for ($i= $ran; $i<$ran+10; $i++){
        echo $values[$i][1]."<br>";
      }
      ?>...</p>


    </div>
    <div class ="preguntas">
    </div>
  </div>
</div>
