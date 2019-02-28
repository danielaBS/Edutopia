    <body>
      <div class="formRegister">
        <div name= "formRegistro">
          <div id="titles">
            <a class= "tittle">Perfil:</a><br>
            <a class= "tittle">Nombres:</a><br>
            <a class= "tittle">Apellidos:</a><br>
            <a class= "tittle" id="ide">No. de Identificación:</a><br>
            <a class= "tittle" id ="optionChecked">Grado:</a>
          </div>
          <div id="inputs">
            <input type="radio" name="perfil" id="profesor" value="profesor" checked>Profesor
            <input type="radio" name="perfil" id="estudiante" value="estudiante">Estudiante<br>
            <input type="text" name="nombres" ><br>
            <input type="text" name="apellidos" ><br>
            <input type="text" name="identificacion" ><br>
            <input type="number" name="grado" id ="grado" min="1" max="5">
          </div>
          <div id= "button">
            <input id="btnReg" type="button" onclick="validateForm()" value="Registrar">
          </div>
        </form>
      </div>
    </div>
  </body>
