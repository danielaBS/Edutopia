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

  <div id="perIN">
    <a id="clicking" href="#personajeIntro"></a>
    <a id="playVid"></a>
    <div id="personajeIntro">
      <div id="charIntro">
      </div>
    </div>
  </div>

  <div class ="home">
    <div id= "intro">
      <img src= "https://i.imgur.com/yMX9eDN.jpg" width="800">
    </div>
    <h2 id= "clase"> Estas son tus clases, <?php
      echo $this->session->userdata['nombre'] . ":"; ?></h2>
    <?php  foreach ($asignatura as $asignatura_item): ?>
      <div onclick="setURl(this)"; style="cursor: pointer;" class="clases" id="<?php echo $asignatura_item['idAsignatura']?>">
      </div>
    <?php endforeach; ?>
  </div>
