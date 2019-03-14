<div class= "body_class">
  <?php foreach ($clase as $clase_item): ?>
  <div onclick="location.href='';" style="cursor: pointer;" class="clase">
  <a class="titulo"> <?php echo $clase_item['nombreClase'];?></a><br>
  <a><?php echo $clase_item['descripcionClase']; ?></a>
  </div>

<?php endforeach; ?>
</div>
<a class="btnIcon" href="http://localhost/edutopia/profesor/pages/index/registro_class">Agregar Clase</a>
