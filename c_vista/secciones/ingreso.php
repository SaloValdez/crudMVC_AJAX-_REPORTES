
<center>
  <h1>INGRESAR</h1>
    <div class="registro">
      <form  method="post">
          <div class="in">
            <input type="text" name="usuIngreso" value="" placeholder="usuario">
          </div>
          <div class="in">
            <input type="text" name="contraIngreso" value="" placeholder="contraseña">
          </div>
          <div class="in">
            <input type="submit" name="email" value="Ingresar" >
          </div>
      </form>
  </div>
  <?php
      $ingreso = new MvcController();
      $ingreso ->ingresoUsuarioController();
      if (isset($_GET['action'])) {
        if ($_GET['action']=="fallo") {
          echo "Fallo al ingresar";
        }
        if($_GET["action"] == "fallo3intentos"){
		       echo "Ha fallado 3 veces para ingresar, favor llenar el captcha";
	     }
      }
   ?>
</center>
