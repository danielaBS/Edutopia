<table id= "usersTableEst" class="list">
  <tr class="tablaUsers">
    <th>Nombres</th>
    <th>Apellidos</th>
    <th>Identificación</th>
    <th>Usuario</th>
    <th>Editar</th>
  </tr>
  <tr class="tableUsers"><?php foreach ($estudiantes as $estudiante_item): ?>
    <td><input type="text" value=<?php
    $nombreUno = $estudiante_item['nombreEst1'];
    $nombreDos = $estudiante_item['nombreEst2'];
    $string = $nombreUno . "&nbsp;" . $nombreDos;
    echo $string;
    ?> disabled></td>
    <td><input type="text" value=<?php
    $apellidoUno = $estudiante_item['apellidoEst1'];
    $apellidoDos = $estudiante_item['apellidoEst2'];
    $string = $apellidoUno . "&nbsp;" . $apellidoDos;
    echo $string;
    ?> disabled></td>
    <td><input type="text" value=<?php
    echo $estudiante_item['identificacionEst'];
    ?> disabled></td>
    <td><?php
    echo $estudiante_item['usuarioEst'];
    ?></td>
    <td>
    <button class="hide btnsa" id="saveBtn" title="Guardar">
      <img border="0" alt="Guardar" src="https://i.imgur.com/mhmU0iz.png" width="25">
    <button class="edit" onclick="modificarUser(this)" title="Modificar registro">
      <img border="0" alt="Modificar" src="https://i.imgur.com/v7BIMrF.png" width="20">
    <button class="edit" onclick="eliminarUser(this)" title="Eliminar registro">
      <img border="0" alt="Eliminar" src="https://i.imgur.com/bZFT7zG.png" width="20">
    </td>
    <?php echo '<br>'?>
  </tr>
<?php endforeach; ?>
</div>
