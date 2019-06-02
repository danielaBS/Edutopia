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
    <div onclick="openPopUp(this)" style="cursor: pointer;" class= "canciones <?php echo $cancion_item['link']?>" data-toggle="modal" data-target="#<?php echo $cancion_item['link']?>">
      <img width="560" height="auto" src="<?php echo $cancion_item['imagen']?>">
      <h2><?php
      $tit = $cancion_item['titulo'];
      $art = $cancion_item['artista'];
      echo $tit  . " - " . $art;
      ?></h2>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="<?php echo $cancion_item['link']?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
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
          <div class="modal-body">
            <iframe width="700" height="393.75" src="" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen id="video"></iframe>
            <div width="700" height="393.75" id="player"></div>
          </div>
          <div class="modal-body">
            <span><?php echo $cancion_item['letra']?></span>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
            <button type="button" class="btn btn-primary">Guardar</button>
          </div>
        </div>
      </div>
    </div>
  <?php endforeach; ?>
</div>
