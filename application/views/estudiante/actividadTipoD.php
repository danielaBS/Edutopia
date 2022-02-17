<?php
$acti=  array(
  'idAct' => '6'
);
$this->session->set_userdata($acti);
?>
<div class="home">
  <img width="80" height="80" src= "https://cdn3.iconfinder.com/data/icons/business-finance-77/80/03_light_bulb_2-512.png">
  <h5>Da clic en el siguiente vídeo y toma nota de la situación planteada. Luego contesta las preguntas presentadas al final.</h5>
  <br>
  <div id= "problemática">
    <iframe width="800" height="450" src="https://www.youtube.com/embed/JECmy4zP3aA" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
  </div>
  <div>
    <p id="preguntaCP"></p>
    <div class="opcionesCyP">
      <input type="radio" name="pregunta1" value="a">
      <span></span><br>
      <input type="radio" name="pregunta1" value="b">
      <span></span><br>
      <input type="radio" name="pregunta1" value="c">
      <span></span><br>
      <input type="radio" name="pregunta1" value="d">
      <span></span><br>
    </div>
  </div>
  <br>
  <p id="aviso"></p>
  <br>
  <div style="width:100%; height:100px; overflow:hidden; float: left; margin: 5px 0 0; text-align:center">
    <input id="cpBtnNext" class="btns" style="margin: 0;" type= "button" value="Siguiente" onclick="actCPnext()"></input><p id="resultado"></p>
  </div>
</div>
