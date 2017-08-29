
<center>
  <h1>REGISTRO USUARIO</h1>
    <div class="registro">
      <form class=""  method="post" onsubmit="return validarRegistro()">
          <div class="in">
            <label for="usuRegistro">Usuario:<span></span></label><br>
            <input type="text" name="usu" value="" id="usuRegistro" placeholder="Maximo 9 caracteres" maxlength="9" >
          </div>
          <div class="in">
            <label for="contraRegistro">Contraseña:</label><br>
            <input type="password" name="contra" value="" id="contraRegistro"  maxlength="6" placeholder="Min. 6 caracteres, incluir numero(s) y una mayúscula" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,}">
          </div>
          <div class="in">
            <label for="emailRegistro">Email:<span></span></label><br>
            <input type="text" name="email" value="" id="emailRegistro" placeholder="ejemplo@correo.com"><br>
            <p><input id="terminos" type="checkbox" name="" value="">&nbsp;&nbsp;<a href="#">Acepta terminos y condiciones</a></p><br>
          </div>
          <div class="in">
            <input type="submit" value="Registrar" >
          </div>
      </form>
  </div>

  <?php
      $registro = new MvcController();
      $registro ->registroUsuarioController();
      if (isset($_GET['action'])) {
        if ($_GET['action']=="ok") {
          echo "Registro Exitoso";
        }
        if ($_GET['action']=="no") {
          echo "Registro vacio";
        }
      }
   ?>
</center>
