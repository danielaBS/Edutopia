<div class="nota">
  <strong>Nota:</strong><a> Los usuarios con perfil Administrador no pueden elminarse ni modificarse.</a>
</div>
<table id= "usersTable" class="list">
  <tr class="tablaUsers">
    <th>Nombre de la clase</th>
    <th>Descripción</th>
    <th>Grado</th>
    <th>Usuario</th>
  </tr>
  <tr class="tableUsers"><?php foreach ($clase as $clase_item): ?>
    <td><input type="text" value=<?php
    echo $clase_item['nombreClase'];
    echo"\n\n";
    echo $clase_item['descripcionClase'];
    ?> disabled></td>
    <td><?php
    echo $clase_item['fechaCreacionClase'];
    ?></td>
  </tr>
<?php endforeach; ?>
</div>
