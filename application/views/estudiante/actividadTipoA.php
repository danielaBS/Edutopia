<h2><?php
/*$command = escapeshellcmd('python c:/users/danie/mega/test.py');
$output = shell_exec($command);

if(isset($output) === true){
  echo $output;
}else{
  echo "el script no pudo ser cargado";
}
*/
?></h2>

<div class="home">
  <img width="80" height="80" src= "https://cdn3.iconfinder.com/data/icons/business-finance-77/80/03_light_bulb_2-512.png">
  <h5>Da clic en una canción para iniciar la actividad.</h5>
  <?php
  $canciones = $this->asignatura_model->getSongA();
  shuffle($canciones);
  ?>
  <?php foreach (array_slice($canciones, 0, 3) as $cancion_item):?>
    <div onclick="openPopUp(this)" style="cursor: pointer;" class= "canciones" id="<?php echo $cancion_item['link']?>">
      <img width="560" height="auto" src="<?php echo $cancion_item['imagen']?>">
      <h2><?php
      $tit = $cancion_item['titulo'];
      $art = $cancion_item['artista'];
      echo $tit  . " - " . $art;
      ?></h2>
    </div>
    <div class="popUpAct" id="<?php echo $cancion_item['link']?>">
      <button type="button" class="btn cancel" onclick="closeForm()">Cancelar</button>
      <div class= "videoPlay">
        <iframe width="700" height="393.75" src="" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen id="video"></iframe>
        <div width="700" height="393.75" id="player"></div>
      </div>
      <div class="letra">
        <h5><?php echo $cancion_item['titulo']?></h5>
        <span><?php echo $cancion_item['letra']?></span>
      </div>
    </div>
  <?php endforeach; ?>
</div>
