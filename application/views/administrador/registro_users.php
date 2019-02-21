    <body>
      <div class="formRegister">
        <div name= "formRegistro">
          <a class= "tittle">Perfil:</a>
          <input type="radio" name="perfil" id="profesor" value="profesor" checked>Profesor
          <input type="radio" name="perfil" id="estudiante" value="estudiante">Estudiante<br>
          <a class= "tittle">Nombres:</a>
          <input type="text" name="nombres" ><br>
          <a class= "tittle">Apellidos:</a>
          <input type="text" name="apellidos" ><br>
          <a class= "tittle" id="ide">No. de Identificación:</a>
          <input type="text" name="identificacion" ><br>
          <a class= "tittle" id ="optionChecked">Grado:</a>
          <input type="number" name="grado" id ="grado" min="1" max="5" ><br>
          <input id="btnReg" type="button" onclick="validateForm()" value="Registrar">
        </form>
      </div>
    </body>
