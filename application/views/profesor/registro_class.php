<body>
  <div class="formRegister">
    <div name= "formRegistro">
      <div id="titles">
        <a class= "tittle">Nombre de la clase:</a><br>
        <a class="tittle">Descripcion de la clase </a><br>
        <a class= "tittle">Grado:</a>
      </div>
      <div id="inputs">
        <input type="text" name="nombre" ><br>
        <input type="text" name="descripcion" ><br>
        <input type="number" name="grado" id ="grado" min="1" max="5">
      </div>
      <div id= "button">
        <input id="btnReg" type="button" onclick="validateForm()" value="Registrar">
      </div>
    </form>
  </div>
</div>
</body>
