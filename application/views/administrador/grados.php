<div class= "body_grad">
  <?php foreach ($grados as $grados_item): ?>
    <div onclick="location.href='#';" style="cursor: pointer;" class= "grados">
      <a class="titulo"> <?php echo $grados_item['nombreGrado'];?></a><br>
      <a>
        <?php
          $this->estudiante_model->getStudentsGrad($grados_item['idGrado']);
        ?></a>
    </div>
  <?php endforeach; ?>
</div>
