<div class="home">
  <?php
    $char = $this->session->userdata("personaje");
    $rec = $this->asignatura_model->getRecuerdos($this->session->userdata('id'));
    $act = $this->asignatura_model->getActividades();
  ?>
<div style= "width: 80%; margin: 2% 10%; text-align:left; background-color:#00004D; padding:0 30px;">
  <p style="font-size:30px; color: white !important ">Perfiles</p>
</div>
<div class="pf">
  <div class="leftPF">
    <div class="photo">
      <?php
      if($char === "do"){
        echo "<img style='border-radius:50%; width: 150px' src='https://i.pinimg.com/564x/93/63/af/9363af52803a6c461b35dc1222c21aea.jpg' alt='Cleo'>";
      }else if($char === "un"){
        echo "<img style='border-radius:50%; width: 150px' src='https://i.pinimg.com/564x/9e/cd/19/9ecd1972a44ef58b51d6953f6988f7d4.jpg' alt='Matías'>";
      }
       ?>
    </div>
    <div class = "statsbars">
      <div class = "stat">
        <div class = "statin">
        </div>
      </div>
      <span>Imaginación</span>
      <div class = "stat">
        <div class = "statin">
        </div>
      </div>
      <span>Valentia</span>
      <div class = "stat">
        <div class = "statin2">
        </div>
      </div>
      <span>Curiosidad</span>

    </div>
  </div>
  <div class= "pfInfo">
    <p style="font-size:40px; margin: 0; font-weight: 520; color: #FF1A1A !important">
      <?php
      if($char === "do"){
        echo "Cleo";
      }else if($char === "un"){
        echo "Matías";
      }
      ?>
    </p>
    <pre style="font-size:22px; text-align: left; color: rgb(0,0,77) !important">
Edad: 8 años
Vive en: El Santuario
Color favorito: Amarillo
Recuerdos:  <?php echo sizeof($rec); ?>/10</pre><p style="font-size:18px;">Realiza actividades para desbloquear recuerdos.</p>
  </div>
</div>

<div class= "blocked">
  <div class= "blur">
    <p class= "infoPer">Para desbloquear este personaje, recupera todos los recuerdos de <?php if($char === "do"){
        echo "Cleo";
      }else if($char === "un"){
        echo "Matías";
      }
      ?> primero.</p>
    </div>
  <div class="pfBlocked">
    <div class="leftPF">
      <div class="photo">
        <?php
        if($char === "do"){
          echo "<img style='border-radius:50%; width: 150px' src='https://i.pinimg.com/564x/9e/cd/19/9ecd1972a44ef58b51d6953f6988f7d4.jpg' alt='Matías'>";
        }else if($char === "un"){
          echo "<img style='border-radius:50%; width: 150px' src='https://i.pinimg.com/564x/93/63/af/9363af52803a6c461b35dc1222c21aea.jpg' alt='Cleo'>";
        }
         ?>
      </div>
      <div class = "statsbars">
        <div class = "stat">
          <div class = "statin">
          </div>
        </div>
        <span>???</span>
        <div class = "stat">
          <div class = "statin">
          </div>
        </div>
        <span>???</span>
        <div class = "stat">
          <div class = "statin2">
          </div>
        </div>
        <span>???</span>
      </div>
    </div>
    <div class= "pfInfo">
      <p style="font-size:40px; margin: 0; font-weight: 520; color: #FF1A1A !important">
        <?php
        if($char === "do"){
          echo "Matías";
        }else if($char === "un"){
          echo "Cleo";
        }
        ?>
      </p>
      <pre style="font-size:22px; text-align: left; color: rgb(0,0,77) !important">
  Edad: ??? años
  Vive en: ???
  Color favorito: ???
  Recuerdos:  0/???</pre><p style="font-size:18px;">Realiza actividades para desbloquear recuerdos.</p>
    </div>
  </div>
</div>
<div style="margin: 0 auto">
  <?php
  if($char === "do"){
    echo "<iframe width='1000' height='560' src='https://www.youtube.com/embed/U3vX8g46Knw' frameborder='0' allow='accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture' allowfullscreen></iframe>";
  }else if($char === "un"){
    echo "<iframe width='1000' height='560' src='https://www.youtube.com/embed/vOXZkm9p_zY' frameborder='0' allow='accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture' allowfullscreen></iframe>";
  }
  ?>

</div>
<br>
<div class="actData">
    <p>Tienes
    <?php
    $idEst = $this->session->userdata("id");
    $puntosObtenidos = $this->asignatura_model->getPoints($idEst);

    $puntaje = sizeof($puntosObtenidos)*5;
    echo $puntaje;
    ?> puntos. Realiza actividades y gana puntos para desbloquear recuerdos.
  </p>
  <p>Has realizado <?php echo sizeof($puntosObtenidos);?> actividades de <?php echo sizeof($act);?>. ¡Sigue así!</p>
</div>
<div class="carousel">
  <div class="arrow arleft">
    <img src="https://and.gov.co/static/djangocms_admin_style/fonts/src/arrow-right.svg" width="80px">
  </div>
  <div class="recuerdos">
    <iframe width="300" height="168" src="https://www.youtube.com/embed/U3vX8g46Knw" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
    <iframe width="300" height="168" src="https://www.youtube.com/embed/U3vX8g46Knw" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
    <iframe width="300" height="168" src="https://www.youtube.com/embed/U3vX8g46Knw" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
    <iframe width="300" height="168" src="https://www.youtube.com/embed/U3vX8g46Knw" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
  </div>
  <div class="arrow">
    <img src="https://and.gov.co/static/djangocms_admin_style/fonts/src/arrow-right.svg" width="80px">
  </div>
</div>
</div>
