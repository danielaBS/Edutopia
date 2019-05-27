<div class ="home">
  <?php foreach ($asignatura as $asignatura_item): ?>
  <div onclick="setURl(this)"; style="cursor: pointer;" class="clases">
    <h2 class = "asignatura"><?php
    $idAsig = $this->asignatura_model->getNameAsig($asignatura_item['idAsignatura']);
    $string = $idAsig['nombreAsignatura'] . "&nbsp;" . "-" . "&nbsp;" . $this->session->userdata['grado'];
    echo $string;
    ?></h2>
  </div>
  <?php endforeach; ?>
</div>
