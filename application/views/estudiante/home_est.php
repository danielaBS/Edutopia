<div class ="home">
  <!-- Modal -->
  <div class="modal fade" id="personaje" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
    <div class="modal-dialog .modal-dialog-centered  modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-body" style="display:inline-block;">
          <h5>Selecciona un personaje para que te acompañe en tus aventuras.</h5>
          <div style="padding: 0 6%">
            <label>
              <input type="radio" name="char" value="do" checked>
              <img height="485" style="padding: 0 0 5px 0" src="https://i.imgur.com/g5l4Btl.png">
            </label>
            <label>
              <input type="radio" name="char" value="un">
              <img height="485" style="padding: 0 0 5px 0" src="https://i.imgur.com/WuWg6yV.png">
            </label>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
          <button type="button" class="btn btn-primary" onclick="setChar()">Guardar</button>
        </div>
      </div>
    </div>
  </div>
  <?php foreach ($asignatura as $asignatura_item): ?>
  <div onclick="setURl(this)"; style="cursor: pointer;" class="clases" id="<?php echo $asignatura_item['idAsignatura']?>">
    <h2 class = "asignatura"><?php
    $idAsig = $this->asignatura_model->getNameAsig($asignatura_item['idAsignatura']);
    $string = $idAsig['nombreAsignatura'] . "&nbsp;" . "-" . "&nbsp;" . $this->session->userdata['grado'];
    echo $string;
    ?></h2>
  </div>
  <?php endforeach; ?>
</div>
