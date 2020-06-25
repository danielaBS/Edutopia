<head>
    <script src="https://github.com/devongovett/pdfkit/releases/download/v0.10.0/pdfkit.standalone.js"></script>
    <script src="https://github.com/devongovett/blob-stream/releases/download/v0.1.3/blob-stream.js"></script>
    <script type="text/javascript" src="<?php echo base_url() . '/javascript/savetoPDF.js'; ?>" ></script>

</head>
<?php
$acti=  array(
  'idAct' => '2'
);
$this->session->set_userdata($acti);
?>
<p id ="mensaje"></p>
<div class="wrapup">
  <div class="left" id="ele">
    <div class="show">
      <span style="font-size:30px;cursor:pointer" class="leftNav ele"><i class="far fa-images"></i> Elementos</span>
    </div>
    <div class="items">
      <div class = "it per active">
        <a>Personajes</a>
      </div>
      <div class = "it esc">
        <a>Escenarios</a>
      </div>
      <div class = "it obj">
        <a>Objetos</a>
      </div>
    </div>
    <div class="scrollbar" id="style-2">
      <div class="force-overflow per active" id= "divDrag1">
        <img id="drag1" class="drag" src= 'https://i.imgur.com/dVKdRBP.png'>
  		  <img id="drag2" class="drag" src= 'https://i.imgur.com/0XXXigm.png'>
  		  <img id="drag3" class="drag" src= 'https://i.imgur.com/lF3MGBi.png'>
  		  <img id="drag4" class="drag" src= 'https://i.imgur.com/nGlzfkn.png'>
        <img id="drag5" class="drag" src= 'https://i.imgur.com/bZ1bpgx.pngg'>
      </div>
      <div class="force-overflow esc" id= "divDrag2">
        <img id="drag6" class="drag" src= 'https://i.imgur.com/ZKlnrRT.png'>
  		  <img id="drag7" class="drag" src= 'https://i.imgur.com/UR3DqJW.png'>
  		  <img id="drag8" class="drag" src= 'https://i.imgur.com/77RWonh.png'>
  		  <img id="drag9" class="drag" src= 'https://i.imgur.com/qVctLby.png'>
        <img id="drag10" class="drag" src= 'https://i.imgur.com/5zghmAZ.png'>
        <img id="drag11" class="drag" src= 'https://i.imgur.com/KdWUYy4.png'>
        <img id="drag12" class="drag" src= 'https://i.imgur.com/gGT1VWt.png'>
        <img id="drag13" class="drag" src= 'https://i.imgur.com/6rHjrqU.png'>
      </div>
      <div class="force-overflow obj" id= "divDrag4">
        <img id="drag14" class="drag" src= 'https://i.imgur.com/goYqHvl.png'>
  		  <img id="drag15" class="drag" src= 'https://i.imgur.com/oOgDSFo.png'>
  		  <img id="drag16" class="drag" src= 'https://i.imgur.com/XZanTJ1.png'>
  		  <img id="drag17" class="drag" src= 'https://i.imgur.com/lecN7Ek.png'>
        <img id="drag18" class="drag" src= 'https://i.imgur.com/1eaC4Db.png'>
      </div>
    </div>
  </div>
  <div class="left hide">
    <span class="noNav esq active"><i class="far fa-object-group"></i> Esquema</span>
    <span class="noNav ele"><i class="far fa-images"></i> Elementos</span>
    <span class="noNav text"><i class="far fa-edit"></i> Texto</span>
  </div>
  <div class="left" id="text">
    <div class="show">
      <span style="font-size:30px;cursor:pointer" class="leftNav text"><i class="far fa-edit"></i> Texto</span>
    </div>
    <div class="txt" id="style-2">
      <div class="title active" id= "divDrag5" style="margin:50px 0 0 0; font-weight: normal !important" >
        <p>Color de la letra:  <input type= "color" name= "color"></p>
        <br>
        <input type= "button" name ="inp" value= "Cuadro de texto" id="txtBub"></input>
      </div>
    </div>
  </div>
  <div class="left active" style="font-weight: normal !important" id="esq">
    <div class="show">
      <span style="font-size:30px;cursor:pointer" class="leftNav esq"><i class="far fa-object-group"></i> Esquema</span>
    </div>
    <div class="items">
      <div class = "it lay active">
        <a>Layout</a>
      </div>
      <div class = "it viñ">
        <a>Viñeta</a>
      </div>
    </div>
    <div class="scrollbar" id="style-2">
      <div class="force-overflow lay active" id= "divDrag8" style="font-weight: normal !important">
        <p class="tx sto active">Hitoria con imágenes</p><img src= "https://i.imgur.com/dXe4S5U.png" width="200px" class= "op sto active">
        <p class="tx com noActive">Cómic</p><img src= "https://image.freepik.com/vector-gratis/fondo-plantilla-colorido-pagina-cinco-comic-vacio_1017-11427.jpg" width="200px"  class= "op com">
      </div>
      <div class="force-overflow viñ" id= "divDrag9">
        <img src="https://image.freepik.com/vector-gratis/conjunto-globos-dialogo-vinetas-comic_23-2147568638.jpg" width="300px">
      </div>
    </div>
  </div>
  <div class= "buts">
    <button>Tutorial</button>
    <button onclick="mensajeput()">Guardar</button>
  </div>
  <div class= "right sto active" id= "divDrop" style="font-weight: normal !important">
    <div class = "actividadB">
      <input class="txtEnt tit" type="text" required id="titulo" placeholder="Mi primera historia"></input>
      <div class= "txxbtns">
        <textarea class="txtEnt bod" name="message" id=texto placeholder="Da click para empezar a escribir" required></textarea>
        <button id="imgs"><span class="fas fa-plus-circle"></span> Agregar imagen</button>
      </div>
    </div>
  </div>
  <div class= "right com ">
    <div class = "actividadB">
      <h2>Crea tu comic</h2>
      <p>Aquí puedes poner en práctica todo lo aprendido en clase y crear tu propia historia.</p>
      <div class="comicCanvas">
      </div>
    </div>
  </div>
</div>
<div>PDF Output <button onclick="download()">Download</button></div>
<iframe width="100%" height="800px"></iframe>
