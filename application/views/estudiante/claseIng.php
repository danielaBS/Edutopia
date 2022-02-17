<div class="home d-flex justify-content-center align-items-center flex-column">
  <?php
    $est = $this->session->userdata("id");
  ?>
  <?php  foreach ($actividad as $actividad_item): ?>
  <div onclick = "setURl(this)" style="cursor: pointer;" class="d-flex justify-content-center actividades" id="<?php echo $actividad_item['actividadLink']?>">
  <div class="date col-md-3 d-flex align-items-center justify-content-center flex-column">
      <img src="<?php echo $actividad_item['imgLink'] ?>" width="45%">
      <p class="status">Week
        2</p>
    </div>
    <div class="act col-md-6">
      <p class="info titulo">Actividad <?php echo $actividad_item['idAct'] . ": " . $actividad_item['nombreAct']?></p><br>
      <p class="info">
        <?php echo $actividad_item['descripción']?>
      </p>
      <span class= "keyword">Keywords:</span><p class= "info2"><?php echo $actividad_item['palabrasClave']?></p>
    </div>
    <?php
    $status = $this->asignatura_model->getActStatus($actividad_item['idAct'], $est );
    if ($status !== null && $status !== false){
    ?>
    <div class="fini col-md-3 d-flex align-items-center justify-content-center flex-column" style="background-color: #fff !important">    
    <img src="<?php echo base_url() . '/images/check-circle-solid.svg'; ?>" width="130px">
        <p class = "status">Completed</p>
    </div>
  <?php } else if ($status === false){ ?>
    <div class="fini col-md-3 d-flex align-items-center justify-content-center flex-column">
      <img src="<?php echo base_url() . '/images/exclamation-circle-solid.svg'; ?>" width="130px">
      <p class = "status">To do</p>
    </div>
  <?php } ?>
  </div>
  <?php endforeach; ?>
</div>
