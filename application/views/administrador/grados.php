<div class= "body_grad">
  <div class= "profesores">
    <?php foreach ($profesores as $profesor_item): ?>
      <div onclick="location.href='#';" style="cursor: pointer;" class= "profesor">
        <span><?php echo $profesor_item['nombreProf1'];?></span>
      </div>
    <?php endforeach; ?>
  </div>
  <div class="grados">
    <?php foreach ($grados as $grados_item): ?>
      <div onclick="location.href='#';" style="cursor: pointer;" class= "grado">
        <span class="titulo"> <?php echo $grados_item['nombreGrado'];?></span><br>
      </div>
    <?php endforeach; ?>
  </div>
</div>
