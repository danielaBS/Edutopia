<div class= "body_grad">
  <?php foreach ($grados as $grados_item): ?>
    <div onclick="location.href='#';" style="cursor: pointer;" class= "grados">
      <span class="titulo"> <?php echo $grados_item['nombreGrado'];?></span><br>
      <span>
        <?php
          //$this->estudiante_model->getStudentsGrad($grados_item['idGrado']);
        ?></span>
    </div>
  <?php endforeach; ?>
</div>
