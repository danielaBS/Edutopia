<div class= "body_class">
  <?php foreach ($clase as $clase_item): ?>
  <div onclick="location.href='';" style="cursor: pointer;" class="clase">
  <span class="titulo"> <?php echo $clase_item['nombreClase'];?></span><br>
  <span><?php echo $clase_item['descripcionClase']; ?></span>
  </div>

<?php endforeach; ?>
</div>
<span class="btnIcon" href="http://localhost/edutopia/profesor/pages/index/registro_class">Agregar Clase</span>
