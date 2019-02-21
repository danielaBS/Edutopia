<table class="list">
  <tr class="tablaUsers">
    <th>Nombres</th>
    <th>Apellidos</th>
    <th>Identificación</th>
    <th>Usuario</th>
    <th>Fecha de creación</th>
  </tr>
  <tr class="tableUsers"><?php foreach ($estudiantes as $estudiante_item): ?>
    <td><?php
    echo $estudiante_item['nombreEst1'];
    echo"\n\n";
    echo $estudiante_item['nombreEst2'];
    ?></td>
    <td><?php
    echo $estudiante_item['apellidoEst1'];
    echo"\n\n";
    echo $estudiante_item['apellidoEst2'];
    ?></td>
    <td><?php
    echo $estudiante_item['identificacionEst'];
    ?></td>
    <td><?php
    echo $estudiante_item['usuarioEst'];
    ?></td>
    <td><?php
    echo $estudiante_item['fechaRegistroEst'];
    ?></td>
    <?php echo '<br>'?>
  </tr>
<?php endforeach; ?>
</div>
