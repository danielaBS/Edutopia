    <body>
      <div class="formRegister">
          <div id="titles">
            <div class= "tittle">
              <span>Perfil:</span><br>
            </div>
            <div  class= "tittle">
              <span>Nombres:</span><br>
            </div>
            <div  class= "tittle">
              <span>Apellidos:</span><br>
            </div>
            <div  class= "tittle">
              <span id="ide">No. de Identificación:</span><br>
            </div>
            <div  class= "tittle">
              <span id ="optionChecked">Grado:</span>
            </div>
          
          </div>
          <div id="inputs">
            <input type="radio" name="perfil" id="profesor" value="profesor" checked> Profesor
            <input type="radio" name="perfil" id="estudiante" value="estudiante"> Estudiante<br>
            <input type="text" name="nombres" ><br>
            <input type="text" name="apellidos" ><br>
            <input type="text" name="identificacion" ><br>
            <input type="number" name="grado" id ="grado" min="1" max="5">
          </div>
        </div>
      <div id= "button">
        <input id="btnReg" type="button" onclick="validateForm()" value="Registrar">
      </div>
  </body>
