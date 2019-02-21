<table class="list">
  <tr class="tablaUsers">
    <th>Nombres</th>
    <th>Apellidos</th>
    <th>Identificación</th>
    <th>Usuario</th>
    <th>Fecha de creación</th>
  </tr>
  <tr class="tableUsers"><?php foreach ($profesores as $profesor_item): ?>
    <td><?php
    echo $profesor_item['nombreProf1'];
    echo"\n\n";
    echo $profesor_item['nombreProf2'];
    ?></td>
    <td><?php
    echo $profesor_item['apellidoProf1'];
    echo"\n\n";
    echo $profesor_item['apellidoProf2'];
    ?></td>
    <td><?php
    echo $profesor_item['identificacionProf'];
    ?></td>
    <td><?php
    echo $profesor_item['usuarioProf'];
    ?></td>
    <td><?php
    echo $profesor_item['fechaRegistroProf'];
    ?></td>
    <?php echo '<br>'?>
  </tr>
<?php endforeach; ?>
</div>
