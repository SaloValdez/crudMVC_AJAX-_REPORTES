<?php

  session_start();

  if(!$_SESSION["validar"]){
    header("location:index.php?action=ingreso");
    exit();  //saliendo del script PHP
  }

 ?>




<center>
  <h1>EDITAR USUARIO</h1>
    <div class="registro">
      <?php
      $editarUsuario = new MvcController();
      $editarUsuario ->editarUsuarioController();
      $editarUsuario ->actualizarUsuarioController();
      ?>
  </div>
</center>
