<?php
$acti=  array(
  'idAct' => '1'
);
$this->session->set_userdata($acti);
?>
<div class="home">
  <img width="80" height="80" src= "https://cdn3.iconfinder.com/data/icons/business-finance-77/80/03_light_bulb_2-512.png">
  <h5>Da clic en el siguiente vídeo antes de iniciar la actividad.</h5>
  <?php
  $canciones = $this->asignatura_model->getSongA();
  shuffle($canciones);
  ?>
  <br>
  <div class= "tutorial" id= "tut">
    <iframe width="700" height="393.75" src="https://www.youtube.com/embed/EA68KUb4e7Q" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
    <div class= "tutInfo">
      <img src="https://i.imgur.com/5R9SE2W.png" width="200px" style="margin: 30px 0">
      <p> Una vez termines de ver el tutorial, deslizate hacía abajo y escoge una canción para empezar.</p>
    </div>
  </div>
  <?php foreach (array_slice($canciones, 0, 4) as $cancion_item):?>
    <div class = "songs">
      <div onclick="openSong(this)" class= "canciones <?php echo $cancion_item['link']?>" data-toggle="modal" data-target="#<?php echo $cancion_item['link']?>">
        <img width="280" height="auto" src="<?php echo $cancion_item['imagen']?>">
        <p><?php
        $tit = $cancion_item['titulo'];
        $art = $cancion_item['artista'];
        echo $tit  . " - " . $art;
        ?></p>
      </div>
    </div>
  <?php endforeach; ?>
</div>
