<div class="home">
  <?php
    $est = $this->session->userdata("id");
  ?>
  <?php  foreach ($actividad as $actividad_item): ?>
  <div onclick = "setURl(this)" style="cursor: pointer;" class="actividades" id="<?php echo $actividad_item['actividadLink']?>">
    <div class="date">
      <img src="<?php echo $actividad_item['imgLink'] ?>" width="60%">
      <p>Semana
        2</p>
    </div>
    <div class="act">
      <p class="info titulo">Actividad <?php echo $actividad_item['idAct'] . ": " . $actividad_item['nombreAct']?></p><br>
      <p class="info">
        <?php echo $actividad_item['descripción']?>
      </p>
      <span class= "keyword">Palabras clave:</span><p class= "info2"><?php echo $actividad_item['palabrasClave']?></p>
    </div>
    <?php
    $status = $this->asignatura_model->getActStatus($actividad_item['idAct'], $est);
    if ($status !== null && $status !== false){
    ?>
    <div class="fini" style="background-color: #2474B5 !important">
      <img src="https://funermostra.feriavalencia.com/wp-content/uploads/2019/03/604a0cadf94914c7ee6c6e552e9b4487-icono-de-c-rculo-de-marca-de-verificaci-n-curvo-by-vexels.png" width="60%">
        <p class = "status">Completado</p>
    </div>
  <?php } else if ($status === false){ ?>
    <div class="fini">
      <img src="https://i.kym-cdn.com/entries/icons/facebook/000/011/743/metal-gear-alert.jpg" width="60%">
      <p class = "status">Pendiente</p>
    </div>
  <?php } ?>
  </div>
  <?php endforeach; ?>
</div>
