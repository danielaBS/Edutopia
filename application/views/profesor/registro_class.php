<body>
  <div class="formRegister">
    <div name= "formRegistro">
      <div id="titles">
        <span class= "tittle">Nombre de la clase:</span><br>
        <span class="tittle">Grado: </span><br>
        <span class="tittle">Grupo: </span><br>
        <span class="tittle">Asignatura: </span><br>
      </div>
      <div id="inputs">
        <?php $grupos; ?>
        <input type="text" name="nombre" ><br>
        <select name= "gradosList" form="gradosform">
          <?php foreach ($grados as $grados_item): ?>
            <option name=<?php echo $grados_item['nombreGrado'];?> value= <?php echo $grados_item['idGrado'];?>><?php echo $grados_item['nombreGrado'];?></option>
            <?php $grupos = array($this->grupos_model->get_grupos($grados_item['idGrado']));?>
          <?php endforeach; ?>
        </select><br>
<!--        <script>
          console.log(<?= json_encode($grados_item['idGrado']); ?>);
        </script>    -->
        <select name= "gruposList" form="gruposform">
          <?php foreach ($grupos as $grupos_item): ?>
            <option><?php echo "hola"; ?></option>
          <?php endforeach; ?>
        </select>
      </div>
      <div id= "button">
        <input id="btnReg" type="button" onclick="validateForm()" value="Registrar">
      </div>
    </div>
  </div>
</body>
