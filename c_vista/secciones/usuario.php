<?php

  session_start();

  if(!$_SESSION["validar"]){
    header("location:index.php?action=ingreso");
    exit();  //saliendo del script PHP
  }

 ?>


<div class="tabla">


 <center>
   <table cellspacing ="0" colspacing="0">
       <tr class="cabesera">
            <td>usuario</td>
            <td>contraseña</td>
            <td>email</td>
            <td colspan="2">Acciones</td>

       </tr>
       <?php
           $vistaUsuario = new MvcController();
           $vistaUsuario ->vistaUsuarioController();
           $vistaUsuario ->borrarUsuarioController();






           if (isset($_GET['action'])) {
             if ($_GET['action']=="cambio") {
               echo "Cambio Exitoso";
             }
           }
        ?>

   </table>



 </center>

 </div>
