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
        <div class="modal-footer d-flex justify-content-center">
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

  <div class ="home d-flex align-items-center flex-column" >
    <div class="row d-flex justify-content-center">
      <h2 id= "clase"> Estas son tus clases, <?php echo $this->session->userdata['nombre'] . ":"; ?></h2>
    </div>
    <div class="row d-flex justify-content-around">
        <?php  foreach ($asignatura as $asignatura_item): ?>
          <div onclick="setURl(this)"; style="cursor: pointer;" class="clases col-md-3 card" id="<?php echo $asignatura_item['idAsignatura']?>">          
              <?php 
              if( $asignatura_item['idAsignatura']=== "1"){
                $titulo= "Semana 2: Actividad 1";
                $url = 'https://i.imgur.com/h66JjYX.png';
              } else if ($asignatura_item['idAsignatura']=== "2"){
                $titulo= "Semana 2: Actividad 1";
                $url = 'https://i.imgur.com/iXv4Yz8.png';
              } else if ($asignatura_item['idAsignatura']=== "3"){
                $titulo= "Semana 2: Actividad 2";
                $url = 'https://i.imgur.com/P4dcS2C.png';
              }
              ?>
            <div class="card-header" style="background-image:url('<?php echo $url ?>'); background-position: center; background-size: cover">            
            </div>
            <div class="card-content">
              <p><?php 
              echo $titulo;
              ?></p>
            </div>

          </div>
        <?php endforeach; ?>
      </div>      
  </div>
