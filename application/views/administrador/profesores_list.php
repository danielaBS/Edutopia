<div class="nota">
  <strong>Nota:</strong><span> Los usuarios con perfil Administrador no pueden elminarse ni modificarse.</span>
</div>
<table id= "usersTable" class="list">
  <tr class="tablaUsers">
    <th>Nombres</th>
    <th>Apellidos</th>
    <th>Identificación</th>
    <th>Usuario</th>
    <th>Perfil</th>
    <th>Fecha de creación</th>
    <th>Editar</th>
  </tr>
  <tr class="tableUsers"><?php foreach ($profesores as $profesor_item): ?>
    <td><input type="text" value=<?php
    $nombreUno = $profesor_item['nombreProf1'];
    $nombreDos = $profesor_item['nombreProf2'];
    $string = $nombreUno . "&nbsp;" . $nombreDos;
    echo $string;
    ?> disabled></td>
    <td><input type="text" value=<?php
    $apellidoUno = $profesor_item['apellidoProf1'];
    $apellidoDos = $profesor_item['apellidoProf2'];
    $string = $apellidoUno . "&nbsp;" . $apellidoDos;
    echo $string;
    ?> disabled></td>
    <td><input type="text" value=<?php
    echo $profesor_item['identificacionProf'];
    ?> disabled></td>
    <td><?php
    echo $profesor_item['usuarioProf'];
    ?></td>
    <td id="perfilProf"><?php
    if($profesor_item['estado']==="2"){
      echo "Profesor";
    }else if($profesor_item['estado']==="1"){
      echo "Administrador";
    }?>
    </td>
    <td><?php
    echo $profesor_item['fechaRegistroProf'];
    ?></td>
    <td>
    <button class="hide btnsa" id="saveBtn" title="Guardar" name="btnSa">
      <img border="0" alt="Guardar" src="https://i.imgur.com/mhmU0iz.png" width="25">
    <button class="edit" onclick="modificarUser(this)" title="Modificar registro">
      <img border="0" alt="Modificar" src="https://i.imgur.com/v7BIMrF.png" width="20">
    <button class="edit" onclick="eliminarUser(this)" title="Eliminar registro">
      <img border="0" alt="Eliminar" src="https://i.imgur.com/bZFT7zG.png" width="20">
    </td>
  </tr>
<?php endforeach; ?>
</div>
