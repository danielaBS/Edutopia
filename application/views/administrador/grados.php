<div class= "body_grad">
  <?php foreach ($grados as $grados_item): ?>
    <div onclick="location.href='#';" style="cursor: pointer;" class= "grados">
      <span class="titulo"> <?php echo $grados_item['nombreGrado'];?></span><br>  
    </div>
  <?php endforeach; ?>
</div>
