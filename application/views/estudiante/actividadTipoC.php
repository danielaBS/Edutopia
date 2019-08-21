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
$countLines= 0;
$ran = random_int(0, 23 - 10);
$text = array();
$line = array();
$words = array();
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
    <br>
    <p>El texto presentado a continuación es un extracto de un texto sugerido por el plan de estudio del colegio Shalom de la ciudad de Cali. Se usa solo con fines educativos y todos los derechos le corresponden a su autor(a).</p>
    <br>
    <div class= "planLector">
      <p>... <?php
      for ($i= $ran; $i<$ran+12; $i++){
        $line = strlen($values[$i][1])/80;
        $countLines= $countLines + $line;
        if($countLines<18){
          array_push($text, $values[$i][1]);
          echo $values[$i][1]."<br>";
        }
      }?></p>
    </div>
    <form method="post" id="formC">
      <div class ="preguntas">
        <h3 style="margin:20px">¡Lee con atención!</h3>
        <div style="text-align:left; margin: 20px 40px;">
          <p style ="margin:0">Escribe en la casilla que corresponde todos los verbos y sustantivos que hayas encontrado en el texto.</p>
        </div>
          <div style= "display: inline-block">
            <div class= "textAreaC" style="text-align:left">
              <p>Verbos<p>
              <textarea rows="4" cols="30"id= "verbosC" name= "verbosC" placeholder="Clic aquí par empezar..."></textarea>
            </div>
            <div class= "textAreaC" style="text-align:left">
              <p>Sustantivos<p>
              <textarea rows="4" cols="30" id="sustantivosC" name= "sustantivosC" placeholder="Clic aquí par empezar..."></textarea>
            </div>
          </div>
      </div>
      <br>
      <div style="width:100%; height:100px; overflow:hidden; float: left; margin: 10px 0 0; text-align:center">
        <input class="btns" style="margin: 0;" type= "button" value="Enviar" onclick="actividadCSave()"></input><p id="resultado"></p>
      </div>
    </form>
    <?php
    $textFormat = json_encode($text);
    ?>
    </div>
    <div id="loader" class="hidLoad lds-ellipsis"><div></div><div></div><div></div><div></div></div>
    <div id="results">
    </div>
  </div>
</div>

<script type="text/javascript">
var obj = JSON.parse('<?= $textFormat; ?>');
function actividadCSave(){
  var verb = $("#verbosC").val();
  var sust = $("#sustantivosC").val();
  $("#loader").removeClass("hidLoad");
  $.post("http://localhost/edutopia/submit", { verbo: verb, sustantivo: sust, palabra: obj},
    function(data) {
    $('#results').html(data);
    $('#formC')[0].reset();
    $("#loader").addClass("hidLoad");
  });

}
</script>
