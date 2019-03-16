<body>
  <div class="formRegister">
    <div name= "formRegistro">
      <div id="titles">
        <span class= "tittle">Nombre de la clase:</span><br>
        <span class="tittle">Descripcion de la clase </span><br>
        <span class= "tittle">Grado:</span>
      </div>
      <div id="inputs">
        <input type="text" name="nombre" ><br>
        <input type="text" name="descripcionClase" ><br>
        <input type="number" name="grado" id ="grado" min="1" max="5">
      </div>
      <div id= "button">
        <input id="btnReg" type="button" onclick="validateForm()" value="Registrar">
      </div>
    </form>
  </div>
</div>
</body>
